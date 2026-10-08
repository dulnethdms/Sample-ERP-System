<?php
declare(strict_types=1);
return [
    'name' => getenv('APP_NAME') ?: 'ERP System',
    'env' => getenv('APP_ENV') ?: 'production',
    'debug' => filter_var(getenv('APP_DEBUG') ?: false, FILTER_VALIDATE_BOOLEAN),
    'url' => rtrim(getenv('APP_URL') ?: 'http://localhost', '/'),
    'session_name' => getenv('SESSION_NAME') ?: 'erp_session',
    'session_secure' => filter_var(getenv('SESSION_SECURE') ?: false, FILTER_VALIDATE_BOOLEAN),
    'session_samesite' => getenv('SESSION_SAMESITE') ?: 'Lax',
    'login_max_attempts' => (int)(getenv('LOGIN_MAX_ATTEMPTS') ?: 5),
    'login_lock_minutes' => (int)(getenv('LOGIN_LOCK_MINUTES') ?: 15),
];
