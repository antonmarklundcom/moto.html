#!/usr/bin/env bash
#
# Post-deploy verification against a LIVE site (PLAN D19). Run after every
# Hostinger Git deploy of main, and after the DNS cutover:
#
#     ./deploy/verify-live.sh https://moto.com.py
#
# It builds the route contract locally (deploy/routes.php, production
# records only — never [DEV]) and asserts, against the live URL:
#   - every page answers 200, every redirect its status and Location
#   - every denied path (content/, lib/, docs/, prompts/, tests/, deploy/,
#     scripts/, logs/, .git/, *.md, config*.php …) answers 403 or 404 —
#     the whole repository is on the server, so this is the safety check
#   - https, www → apex, trailing slash → 301 without it
#   - robots.txt and sitemap.xml render and agree with meta robots
#
# It never boots a server and never touches config.php.
#
set -uo pipefail

ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
BASE="${1:-}"
if [ -z "$BASE" ]; then
  echo "usage: $0 <base-url>   e.g. $0 https://moto.com.py" >&2
  exit 2
fi
BASE="${BASE%/}"

red()   { printf '\033[31m%s\033[0m\n' "$*"; }
green() { printf '\033[32m%s\033[0m\n' "$*"; }
step()  { printf '\n\033[1m== %s\033[0m\n' "$*"; }
fail()  { red "  FAIL  $*"; FAILURES=$((FAILURES + 1)); }
ok()    { printf '  ok    %s\n' "$*"; }
FAILURES=0

step "reachability"
code=$(curl -s -o /dev/null -w '%{http_code}' --max-time 10 "$BASE/")
[ "$code" = "000" ] && { red "could not reach $BASE"; exit 2; }
ok "$BASE/ answers $code"

step "https and host"
case "$BASE" in https://*) ok "base URL is https" ;; *) fail "base URL is not https" ;; esac
host="${BASE#https://}"; host="${host#http://}"
plain=$(curl -s -o /dev/null -w '%{http_code} %{redirect_url}' --max-time 10 "http://${host}/guias")
case "$plain" in 301\ https://*) ok "http → https (301)" ;; *) fail "http://${host}/guias answered: $plain" ;; esac
case "$host" in
  www.*) ;;
  *) www=$(curl -s -o /dev/null -w '%{http_code} %{redirect_url}' --max-time 10 "https://www.${host}/guias")
     case "$www" in 301\ "https://${host}/guias") ok "www → apex (301)" ;; 000*) ok "www.${host} not served (no DNS/cert) — skipped" ;; *) fail "https://www.${host}/guias answered: $www" ;; esac ;;
esac

step "route contract"
ROUTE_COUNT=0
while IFS=$'\t' read -r path expected location; do
  [ -z "$path" ] && continue
  ROUTE_COUNT=$((ROUTE_COUNT + 1))
  result=$(curl -s -o /dev/null -w '%{http_code} %{redirect_url}' --max-time 15 "${BASE}${path}")
  actual="${result%% *}"
  target="${result#* }"
  if [ "$expected" = "deny" ]; then
    case "$actual" in 403|404) ;; *) fail "$path must be denied (403/404), got $actual — check .htaccess reached the server" ;; esac
    continue
  fi
  if [ "$actual" != "$expected" ]; then
    fail "$path — expected $expected, got $actual"
  elif [ -n "${location:-}" ] && [ "$target" != "${BASE}${location}" ]; then
    fail "$path — expected Location ${BASE}${location}, got $target"
  fi
done < <(APP_ENV=prod php "$ROOT/deploy/routes.php" "$ROOT")
ok "$ROUTE_COUNT URLs checked"

step "robots.txt and sitemap.xml"
robots=$(curl -s --max-time 10 "$BASE/robots.txt")
for want in "Disallow: /ir/" "Disallow: /enviar.php" "Disallow: /gracias" "Sitemap: ${BASE}/sitemap.xml"; do
  printf '%s' "$robots" | grep -qF "$want" || fail "robots.txt lacks: $want"
done
sitemap=$(curl -s --max-time 15 "$BASE/sitemap.xml")
printf '%s' "$sitemap" | grep -q '<urlset' || fail "sitemap.xml has no <urlset> — is SITE_URL set in config.php?"
mismatch=0
while IFS= read -r loc; do
  [ -z "$loc" ] && continue
  page=$(curl -s --max-time 15 "$loc")
  if printf '%s' "$page" | grep -q '<meta name="robots" content="noindex'; then
    fail "$loc is in the sitemap but serves noindex"; mismatch=1
  fi
done < <(printf '%s' "$sitemap" | grep -oP '(?<=<loc>)[^<]+')
[ "$mismatch" -eq 0 ] && ok "every sitemap URL is indexable ($(printf '%s' "$sitemap" | grep -c '<loc>') URLs)"
if printf '%s' "$sitemap" | grep -q '<loc>' ; then :; else
  echo "  note  the sitemap is empty: SITE_NOINDEX in config.php is not 'false' (PLAN D12)"
fi

echo
if [ "$FAILURES" -eq 0 ]; then
  green "verify-live.sh: PASS ($BASE)"
  exit 0
fi
red "verify-live.sh: FAIL ($FAILURES problem(s) against $BASE)"
exit 1
