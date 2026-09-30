<?php
/**
 * [DEV] overrides for content/site.php: a WhatsApp number, so verify.sh
 * exercises every CTA through /ir/wa/general. The number is the format
 * example of PLAN D9, not a real line. APP_ENV=dev only.
 */

declare(strict_types=1);

return [
    'whatsapp' => '+595 981 123 456',
];
