<?php
declare(strict_types=1);
namespace App\Controllers;
use App\Core\Controller;
use App\Core\Csrf;
use App\Core\Auth;
use App\Core\Request;
use App\Services\AuthService;
use App\Middleware\AuthMiddleware;
final class AuthController extends Controller {public function showLogin():void{$this->view('auth/login');} public function login():void{Csrf::validate(Request::input('_csrf'));$ok=(new AuthService())->attempt((string)Request::input('email'),(string)Request::input('password'));if(!$ok){flash('error','Invalid email or password.');$this->redirect('/login');}$this->redirect('/dashboard');} public function logout():void{Csrf::validate(Request::input('_csrf'));Auth::logout();$this->redirect('/login');}}
