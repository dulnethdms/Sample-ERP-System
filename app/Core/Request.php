<?php
declare(strict_types=1);
namespace App\Core;
final class Request {
    public static function method(): string { return strtoupper($_SERVER['REQUEST_METHOD'] ?? 'GET'); }
    public static function path(): string { $path=parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/'; return rtrim($path,'/') ?: '/'; }
    public static function input(?string $key=null, mixed $default=null): mixed { $data=$_POST; if (str_contains($_SERVER['CONTENT_TYPE'] ?? '', 'application/json')) { $json=json_decode(file_get_contents('php://input'),true); if(is_array($json))$data=$json; } return $key===null?$data:($data[$key]??$default); }
    public static function query(?string $key=null,mixed $default=null): mixed { return $key===null?$_GET:($_GET[$key]??$default); }
}
