<?php
declare(strict_types=1);
namespace App\Middleware;
use App\Core\Csrf;
use App\Core\Request;
final class CsrfMiddleware { public function handle():void{if(in_array(Request::method(),['POST','PUT','PATCH','DELETE'],true))Csrf::validate(Request::input('_csrf'));} }
