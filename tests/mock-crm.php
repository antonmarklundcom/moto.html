<?php
/**
 * A stand-in for VenderCRM's POST /api/v1/leads, for verify.sh only:
 *
 *     APP_LOG_DIR=/tmp/x php -S 127.0.0.1:PORT tests/mock-crm.php
 *
 * Records every request (headers + JSON body) to $APP_LOG_DIR/mock-crm.jsonl
 * and answers like the real endpoint: 201 for a new idempotency_key, 200
 * {duplicate:true} for a replayed one, 500 when the lead's name is "fail".
 */

declare(strict_types=1);

$dir  = rtrim((string) getenv('APP_LOG_DIR'), '/');
$raw  = (string) file_get_contents('php://input');
$body = json_decode($raw, true);
$seen = [];
foreach (is_file("{$dir}/mock-crm.jsonl") ? file("{$dir}/mock-crm.jsonl") : [] as $line) {
    $prev = json_decode($line, true);
    $seen[$prev['body']['idempotency_key'] ?? ''] = true;
}
file_put_contents("{$dir}/mock-crm.jsonl", json_encode([
    'path'    => parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),
    'api_key' => $_SERVER['HTTP_X_API_KEY'] ?? null,
    'type'    => $_SERVER['CONTENT_TYPE'] ?? null,
    'body'    => $body,
]) . "\n", FILE_APPEND);

header('Content-Type: application/json');
if (($body['name'] ?? '') === 'fail') {
    http_response_code(500);
    echo '{"error":"mock failure"}';
} elseif (isset($seen[$body['idempotency_key'] ?? ''])) {
    http_response_code(200);
    echo '{"contactId":"c1","dealId":null,"submissionId":"s1","duplicate":true}';
} else {
    http_response_code(201);
    echo '{"contactId":"c1","dealId":null,"submissionId":"s1","duplicate":false}';
}
