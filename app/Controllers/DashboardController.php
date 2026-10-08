<?php
declare(strict_types=1);
namespace App\Controllers;
use App\Core\Controller;
use App\Core\Auth;
use App\Core\Container;
use App\Middleware\AuthMiddleware;
final class DashboardController extends Controller {public function index():void{$pdo=Container::get('db')->pdo();$stats=[];foreach(['users'=>'SELECT COUNT(*) FROM users WHERE deleted_at IS NULL','employees'=>'SELECT COUNT(*) FROM employees WHERE deleted_at IS NULL','customers'=>'SELECT COUNT(*) FROM customers WHERE deleted_at IS NULL','suppliers'=>'SELECT COUNT(*) FROM suppliers WHERE deleted_at IS NULL','products'=>'SELECT COUNT(*) FROM products WHERE deleted_at IS NULL','invoices'=>'SELECT COUNT(*) FROM invoices WHERE deleted_at IS NULL'] as $k=>$q){try{$stats[$k]=(int)$pdo->query($q)->fetchColumn();}catch(\Throwable){$stats[$k]=0;}}$this->view('dashboard/index',['user_id'=>Auth::id(),'stats'=>$stats]);}}
