<?php
declare(strict_types=1);
namespace App\Core;
final class Auth { public static function id():?int{return isset($_SESSION['user_id'])?(int)$_SESSION['user_id']:null;} public static function check():bool{return self::id()!==null;} public static function login(int $id):void{session_regenerate_id(true);$_SESSION['user_id']=$id;} public static function logout():void{$_SESSION=[];if(ini_get('session.use_cookies')){ $p=session_get_cookie_params();setcookie(session_name(),'',time()-42000,$p['path'],$p['domain']??'',$p['secure'],$p['httponly']);}session_destroy();} }
