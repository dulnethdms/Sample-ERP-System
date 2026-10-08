<?php
declare(strict_types=1);
$root = dirname(__DIR__, 2);
if (is_file($root.'/.env')) {
    foreach (file($root.'/.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        $line = trim($line);
        if ($line === '' || str_starts_with($line, '#') || !str_contains($line, '=')) continue;
        [$key, $value] = explode('=', $line, 2);
        $value = trim($value, " \t\n\r\0\x0B\"");
        putenv($key.'='.$value);
        $_ENV[$key] = $value;
    }
}
$app = require $root.'/config/app.php';
require $root.'/config/constants.php';
error_reporting(E_ALL);
ini_set('display_errors', $app['debug'] ? '1' : '0');
ini_set('log_errors', '1');
ini_set('error_log', $root.'/storage/logs/php-error.log');
session_name($app['session_name']);
session_set_cookie_params(['secure'=>$app['session_secure'],'httponly'=>true,'samesite'=>$app['session_samesite'],'path'=>'/']);
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
App\Core\Container::set('app', $app);
App\Core\Container::set('db', new App\Core\Database(require $root.'/config/database.php'));
App\Core\Router::dispatch(require $root.'/routes/web.php');
