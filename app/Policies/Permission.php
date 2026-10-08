<?php
declare(strict_types=1);
namespace App\Policies;
use App\Core\Auth;
use App\Core\Container;
final class Permission { public static function allows(string $permission):bool{if(!Auth::check())return false;$s=Container::get('db')->pdo()->prepare('SELECT 1 FROM user_roles ur JOIN role_permissions rp ON rp.role_id=ur.role_id JOIN permissions p ON p.id=rp.permission_id WHERE ur.user_id=? AND p.name=? LIMIT 1');$s->execute([Auth::id(),$permission]);return (bool)$s->fetchColumn();} public static function require(string $permission):void{if(!self::allows($permission)){http_response_code(403);exit('403 Forbidden');}} }
