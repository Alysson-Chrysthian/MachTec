<?php

namespace Alyssoncpc\Machtec\Domain;

use Closure;

class Router {

    protected static array $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public static function add(Methods $method, string $uri, array|Closure $controller, array $middleware = [])
    {
        $uri = preg_replace('#\{(.*)\}#', '([A-z0-9]{0,})', $uri);
        Router::$routes[$method->value][$uri] = [
            'controller' => $controller,
            'middleware' => $middleware,
        ];
    }

    public static function checkRoute()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        foreach (Router::$routes[$method] as $pattern => $funcs) {
            if (preg_match('#^' . $pattern . '$#', $uri, $args)) {
                array_shift($args);

                foreach ($funcs['middleware'] as $middleware) {
                    if (!call_user_func_array($middleware, $args)) {
                        http_response_code(401);
                        return;
                    }
                }

                return call_user_func_array($funcs['controller'], $args);
            }
        }

        http_response_code(404);
    }

}