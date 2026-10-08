<?php
declare(strict_types=1);
namespace App\Core;
use PDO;
use PDOException;
final class Database {
    private PDO $pdo;
    public function __construct(array $config) {
        $dsn=sprintf('mysql:host=%s;port=%s;dbname=%s;charset=%s',$config['host'],$config['port'],$config['database'],$config['charset']);
        try {$this->pdo=new PDO($dsn,$config['username'],$config['password'],[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,PDO::ATTR_EMULATE_PREPARES=>false]);}
        catch(PDOException $e){ error_log($e->getMessage()); throw new \RuntimeException('Database connection failed.'); }
    }
    public function pdo(): PDO { return $this->pdo; }
    public function transaction(callable $callback): mixed { $this->pdo->beginTransaction(); try{$result=$callback($this->pdo);$this->pdo->commit();return $result;}catch(\Throwable $e){if($this->pdo->inTransaction())$this->pdo->rollBack();throw $e;} }
}
