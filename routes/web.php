<?php
declare(strict_types=1);
use App\Controllers\AuthController;
use App\Controllers\DashboardController;
use App\Controllers\UserController;
use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;
use App\Middleware\CsrfMiddleware;
return [
 ['GET','/login',[AuthController::class,'showLogin'],[GuestMiddleware::class]],
 ['POST','/login',[AuthController::class,'login'],[GuestMiddleware::class,CsrfMiddleware::class]],
 ['POST','/logout',[AuthController::class,'logout'],[AuthMiddleware::class,CsrfMiddleware::class]],
 ['GET','/dashboard',[DashboardController::class,'index'],[AuthMiddleware::class]],
 ['GET','/users',[UserController::class,'index'],[AuthMiddleware::class]],
 ['GET','/users/create',[UserController::class,'create'],[AuthMiddleware::class]],
 ['POST','/users',[UserController::class,'store'],[AuthMiddleware::class,CsrfMiddleware::class]],
 ['GET','/users/{id}/edit',[UserController::class,'edit'],[AuthMiddleware::class]],
 ['POST','/users/{id}',[UserController::class,'update'],[AuthMiddleware::class,CsrfMiddleware::class]],
 ['POST','/users/{id}/delete',[UserController::class,'delete'],[AuthMiddleware::class,CsrfMiddleware::class]],
];
