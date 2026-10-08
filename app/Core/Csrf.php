<?php
declare(strict_types=1);
namespace App\Core;
final class Csrf { public static function token():string{if(empty($_SESSION['_csrf']))$_SESSION['_csrf']=bin2hex(random_bytes(32));return $_SESSION['_csrf'];} public static function field():string{return '<input type="hidden" name="_csrf" value="'.htmlspecialchars(self::token(),ENT_QUOTES,'UTF-8').'">';} public static function validate(?string $token):void{if(!$token||!hash_equals(self::token(),$token))throw new \RuntimeException('Invalid CSRF token.');} }
