<?php
declare(strict_types=1);
namespace App\Repositories;
use App\Core\Container;
final class UserRepository { private $pdo; public function __construct(){ $this->pdo=Container::get('db')->pdo(); }
public function findByEmail(string $email):?array{$s=$this->pdo->prepare('SELECT * FROM users WHERE email=? AND deleted_at IS NULL LIMIT 1');$s->execute([$email]);return $s->fetch()?:null;}
public function find(int $id):?array{$s=$this->pdo->prepare('SELECT u.*,GROUP_CONCAT(r.name ORDER BY r.name SEPARATOR ", ") roles FROM users u LEFT JOIN user_roles ur ON ur.user_id=u.id LEFT JOIN roles r ON r.id=ur.role_id WHERE u.id=? AND u.deleted_at IS NULL GROUP BY u.id');$s->execute([$id]);return $s->fetch()?:null;}
public function all(string $search='',int $limit=20,int $offset=0):array{$like='%'.$search.'%';$s=$this->pdo->prepare('SELECT u.id,u.name,u.email,u.status,u.created_at,GROUP_CONCAT(r.name ORDER BY r.name SEPARATOR ", ") roles FROM users u LEFT JOIN user_roles ur ON ur.user_id=u.id LEFT JOIN roles r ON r.id=ur.role_id WHERE u.deleted_at IS NULL AND (u.name LIKE ? OR u.email LIKE ?) GROUP BY u.id ORDER BY u.id DESC LIMIT ? OFFSET ?');$s->bindValue(1,$like);$s->bindValue(2,$like);$s->bindValue(3,$limit,
\PDO::PARAM_INT);$s->bindValue(4,$offset,\PDO::PARAM_INT);$s->execute();return $s->fetchAll();}
public function count(string $search=''):int{$s=$this->pdo->prepare('SELECT COUNT(*) FROM users WHERE deleted_at IS NULL AND (name LIKE ? OR email LIKE ?)');$like='%'.$search.'%';$s->execute([$like,$like]);return (int)$s->fetchColumn();}
public function create(array $d):int{$s=$this->pdo->prepare('INSERT INTO users(name,email,password_hash,status) VALUES(?,?,?,?)');$s->execute([$d['name'],$d['email'],$d['password_hash'],$d['status']??'active']);return (int)$this->pdo->lastInsertId();}
public function update(int $id,array $d):void{$sql='UPDATE users SET name=?,email=?,status=?';$p=[$d['name'],$d['email'],$d['status']];if(isset($d['password_hash'])){$sql.=',password_hash=?';$p[]=$d['password_hash'];}$sql.=' WHERE id=? AND deleted_at IS NULL';$p[]=$id;$s=$this->pdo->prepare($sql);$s->execute($p);}
public function softDelete(int $id):void{$s=$this->pdo->prepare('UPDATE users SET deleted_at=NOW(),status="inactive" WHERE id=?');$s->execute([$id]);}
public function roles():array{return $this->pdo->query('SELECT id,name FROM roles ORDER BY name')->fetchAll();}
public function setRoles(int $userId,array $roleIds):void{$this->pdo->prepare('DELETE FROM user_roles WHERE user_id=?')->execute([$userId]);$s=$this->pdo->prepare('INSERT INTO user_roles(user_id,role_id) VALUES(?,?)');foreach($roleIds as $rid)$s->execute([$userId,(int)$rid]);}
}
