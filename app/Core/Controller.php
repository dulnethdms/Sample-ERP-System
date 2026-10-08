<?php
declare(strict_types=1);
namespace App\Core;
abstract class Controller { protected function db(): Database{return Container::get('db');} protected function view(string $view,array $data=[]):void{Response::view($view,$data);} protected function json(array $data,int $status=200):never{Response::json($data,$status);} protected function redirect(string $url):never{Response::redirect($url);} }
