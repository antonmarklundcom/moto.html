#!/usr/bin/env bash
#
# The build gate. Runs on every PR (.github/workflows/verify.yml); run it
# locally before pushing:
#
#     ./verify.sh                 # check the repository
#     ./verify.sh --root dist/x   # check an unzipped deploy artifact
#
# In order:
#   1. php -l on every PHP file
#   2. unit tests: the indexing gate in all three modes and at every
#      threshold, fact rendering, price expiry, the lead key (tests/indexing.php)
#   3. the market module contract
#   4. content integrity: catalogue, editorial records, lead model, route files
#      <-> registry both ways; writes docs/verificar.md (tests/content.php)
#   5. for SITE_NOINDEX = true, content and false, a php -S server with the
#      [DEV] records (APP_ENV=dev): the route contract, meta robots == sitemap
#      == the mode's semantics, query strings noindex; in `false` also every
#      content, markup, JSON-LD, link and weight rule of PLAN §4.16 / §2.4 and
#      the /ir/wa/ click log (tests/site.php)
#   6. a production server (APP_ENV=prod): no [DEV] record reachable or listed
#   7. the lead handler degraded (no CRM) and against a mock VenderCRM
#      (tests/leads.php, tests/mock-crm.php)
#   8. no PHP warning, notice or deprecation from any server
#
# Logs go to a temporary APP_LOG_DIR: a real logs/ is never touched.
#
set -uo pipefail

ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
SITE_ROOT="$ROOT"
PORT="${VERIFY_PORT:-8730}"

while [ $# -gt 0 ]; do
  case "$1" in
    --root) SITE_ROOT="$(cd "$2" && pwd)"; shift 2 ;;
    --port) PORT="$2"; shift 2 ;;
    *) echo "unknown argument: $1" >&2; exit 2 ;;
  esac
done

FAILURES=0
WORK="$(mktemp -d)"
SERVER_PIDS=()

red()   { printf '\033[31m%s\033[0m\n' "$*"; }
green() { printf '\033[32m%s\033[0m\n' "$*"; }
step()  { printf '\n\033[1m== %s\033[0m\n' "$*"; }
fail()  { red "  FAIL  $*"; FAILURES=$((FAILURES + 1)); }
ok()    { printf '  ok    %s\n' "$*"; }

cleanup() {
  for pid in "${SERVER_PIDS[@]}"; do kill "$pid" 2>/dev/null; done
  rm -rf "$WORK"
}
trap cleanup EXIT

# run_php <label> <cmd...>: runs a PHP check, counts a failure on non-zero exit.
run_check() {
  local label="$1"; shift
  if ! "$@"; then fail "$label"; fi
}

# start_server <port> <log> [VAR=value ...]: php -S with router.php and env.
start_server() {
  local port="$1" log="$2"; shift 2
  env "$@" php -S "127.0.0.1:${port}" -t "$SITE_ROOT" "$SITE_ROOT/router.php" >"$log" 2>&1 &
  SERVER_PIDS+=($!)
  for _ in $(seq 1 60); do
    curl -s -o /dev/null "http://127.0.0.1:${port}/robots.txt" && return 0
    sleep 0.25
  done
  red "server on port $port failed to start"; cat "$log"; exit 2
}

stop_servers() {
  for pid in "${SERVER_PIDS[@]}"; do kill "$pid" 2>/dev/null; wait "$pid" 2>/dev/null; done
  SERVER_PIDS=()
}

command -v php >/dev/null || { red "php not found"; exit 2; }
command -v curl >/dev/null || { red "curl not found"; exit 2; }

# A config.php that pins the mode or the CRM would make every check below lie.
if [ -f "$SITE_ROOT/config.php" ] && php -r '$c = require $argv[1]; exit((($c["SITE_NOINDEX"] ?? "") !== "" || ($c["VENDERCRM_URL"] ?? "") !== "") ? 0 : 1);' "$SITE_ROOT/config.php"; then
  red "config.php sets SITE_NOINDEX or VENDERCRM_URL: move it aside to run verify.sh"; exit 2
fi

# ---------------------------------------------------------------- 1. php -l --
step "php -l"
LINT_FAILED=0
while IFS= read -r file; do
  if ! out=$(php -l "$file" 2>&1); then
    fail "$file"; echo "$out" | sed 's/^/        /'
    LINT_FAILED=1
  fi
done < <(find "$SITE_ROOT" -name '*.php' -not -path '*/node_modules/*' -not -path '*/dist/*' | sort)
[ "$LINT_FAILED" -eq 0 ] && ok "all PHP files parse"

# ------------------------------------------------------------ 2. unit tests --
step "unit tests (indexing gate, facts, lead key)"
run_check "tests/indexing.php" env -u SITE_NOINDEX APP_ENV=dev php "$ROOT/tests/indexing.php" "$SITE_ROOT"

# ---------------------------------------------------------- 3. market module --
step "market module"
market_out=$(php -r '
require "'"$SITE_ROOT"'/lib/bootstrap.php";
$fail = 0;
$say  = function (string $m) use (&$fail) { echo $m, "\n"; $fail = 1; };
$contract = [
    "market_id", "market_locale", "market_currency", "market_country",
    "fmt_money", "validate_tax_id", "tax_id_check_digit", "fmt_date_long",
    "market_vat_rates", "market_table", "market_last_reviewed",
];
foreach ($contract as $fn) {
    function_exists($fn) || $say("the market module does not define {$fn}()");
}
foreach (glob(ROOT_DIR . "/lib/market/*.php") as $file) {
    $src = (string) file_get_contents($file);
    foreach ($contract as $fn) {
        str_contains($src, "function {$fn}(") || $say(basename($file) . " does not define {$fn}()");
    }
}
market_id() === "py" && fmt_money(12500000) !== "Gs. 12.500.000" && $say("fmt_money() must print Gs. 12.500.000 (PLAN D9), got " . fmt_money(12500000));
str_contains(fmt_date_long("2026-09-04"), "2026") || $say("fmt_date_long() lost the year");
exit($fail);
' 2>&1)
if [ -z "$market_out" ]; then ok "the market module implements the contract; Gs. 12.500.000"; else fail "market module"; echo "$market_out" | sed 's/^/        /'; fi

# ------------------------------------------------------- 4. content integrity --
step "content integrity"
WRITE_FLAG=""
[ "$SITE_ROOT" = "$ROOT" ] && WRITE_FLAG="--write-verificar"
run_check "tests/content.php" env APP_ENV=prod php "$ROOT/tests/content.php" "$SITE_ROOT" $WRITE_FLAG
[ -n "$WRITE_FLAG" ] && ok "docs/verificar.md rewritten from the verify blocks"

# ---------------------------------------------- 5. the three SITE_NOINDEX modes --
for MODE in true content false; do
  step "site, SITE_NOINDEX=${MODE} (with [DEV] records)"
  LOGDIR="$WORK/logs-$MODE"; mkdir -p "$LOGDIR"
  start_server "$PORT" "$WORK/server-$MODE.log" APP_ENV=dev SITE_NOINDEX="$MODE" APP_LOG_DIR="$LOGDIR"
  FULL=""
  [ "$MODE" = "false" ] && FULL="--full"
  run_check "site checks, mode ${MODE}" env APP_ENV=dev SITE_NOINDEX="$MODE" APP_LOG_DIR="$LOGDIR" \
    php "$ROOT/tests/site.php" "http://127.0.0.1:${PORT}" "$SITE_ROOT" "$MODE" $FULL
  stop_servers
done

# ------------------------------------------------------ 6. production mode ---
step "site, production (APP_ENV=prod, SITE_NOINDEX=false)"
LOGDIR="$WORK/logs-prod"; mkdir -p "$LOGDIR"
start_server "$PORT" "$WORK/server-prod.log" APP_ENV=prod SITE_NOINDEX=false APP_LOG_DIR="$LOGDIR"
run_check "site checks, production" env APP_ENV=prod SITE_NOINDEX=false APP_LOG_DIR="$LOGDIR" \
  php "$ROOT/tests/site.php" "http://127.0.0.1:${PORT}" "$SITE_ROOT" false --prod
stop_servers

# ---------------------------------------------------------------- 7. leads ---
step "enviar.php, degraded (no CRM)"
LOGDIR="$WORK/logs-degraded"; mkdir -p "$LOGDIR"
start_server "$PORT" "$WORK/server-degraded.log" APP_ENV=dev APP_LOG_DIR="$LOGDIR"
run_check "leads, degraded" env APP_ENV=dev APP_LOG_DIR="$LOGDIR" \
  php "$ROOT/tests/leads.php" "http://127.0.0.1:${PORT}" "$SITE_ROOT" degraded
stop_servers

step "enviar.php → mock VenderCRM"
LOGDIR="$WORK/logs-crm"; mkdir -p "$LOGDIR"
CRM_PORT=$((PORT + 1))
APP_LOG_DIR="$LOGDIR" php -S "127.0.0.1:${CRM_PORT}" "$ROOT/tests/mock-crm.php" >"$WORK/mock-crm.log" 2>&1 &
SERVER_PIDS+=($!)
start_server "$PORT" "$WORK/server-crm.log" APP_ENV=dev APP_LOG_DIR="$LOGDIR" \
  VENDERCRM_URL="http://127.0.0.1:${CRM_PORT}" VENDERCRM_API_KEY=verify-key
run_check "leads, CRM" env APP_ENV=dev APP_LOG_DIR="$LOGDIR" VENDERCRM_API_KEY=verify-key \
  php "$ROOT/tests/leads.php" "http://127.0.0.1:${PORT}" "$SITE_ROOT" crm
stop_servers

# ------------------------------------------------------- 8. PHP diagnostics --
step "php warnings"
if grep -hE 'PHP (Warning|Notice|Fatal error|Parse error|Deprecated)' "$WORK"/server-*.log "$WORK"/mock-crm.log >/dev/null 2>&1; then
  fail "the servers logged PHP diagnostics"
  grep -hE 'PHP (Warning|Notice|Fatal error|Parse error|Deprecated)' "$WORK"/server-*.log | sort -u | head -20 | sed 's/^/        /'
else
  ok "no warnings, notices or deprecations while serving"
fi

echo
if [ "$FAILURES" -eq 0 ]; then
  green "verify.sh: PASS"
  exit 0
fi
red "verify.sh: $FAILURES failure(s)"
exit 1
