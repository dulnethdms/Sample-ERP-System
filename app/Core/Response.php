<?php
declare(strict_types=1);
namespace App\Core;
final class Response {
    public static function view(string $view,array $data=[]): void { extract($data); $file=dirname(__DIR__,2).'/resources/views/'.$view.'.php'; if(!is_file($file)) throw new \RuntimeException('View not found.'); require $file; }
    public static function json(array $data,int $status=200): never { http_response_code($status); header('Content-Type: application/json; charset=utf-8'); echo json_encode($data,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES); exit; }
    public static function redirect(string $url): never { header('Location: '.$url); exit; }
}
