<?php
declare(strict_types=1);
namespace App\Services;
use App\Core\Auth;
use App\Core\Container;
final class AuditService { public function log(string $action,string $module,string $entityType,?int $entityId,?array $old=null,?array $new=null):void{$s=Container::get('db')->pdo()->prepare('INSERT INTO audit_logs(user_id,action,module,entity_type,entity_id,old_values,new_values,ip_address,user_agent) VALUES(?,?,?,?,?,?,?,?,?)');$s->execute([Auth::id(),$action,$module,$entityType,$entityId,$old?json_encode($old):null,$new?json_encode($new):null,$_SERVER['REMOTE_ADDR']??null,substr($_SERVER['HTTP_USER_AGENT']??'',0,512)]);}}
