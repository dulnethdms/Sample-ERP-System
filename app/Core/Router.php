<?php
declare(strict_types=1);
namespace App\Core;
final class Router {
    public static function dispatch(array $routes): void {
        $method=Request::method(); $path=Request::path();
        foreach($routes as $route){[$rm,$pattern,$handler,$middleware]=$route+[null,null,null,[]]; if($rm!==$method)continue; $regex='#^'.preg_replace('#\{([a-zA-Z_][a-zA-Z0-9_]*)\}#','(?P<$1>[^/]+)',$pattern).'$#'; if(preg_match($regex,$path,$matches)){ $params=array_filter($matches,'is_string',ARRAY_FILTER_USE_KEY); foreach($middleware as $mw){(new $mw)->handle();} [$class,$action]=$handler; (new $class)->{$action}($params); return; }}
        http_response_code(404); echo '404 Not Found';
    }
}
