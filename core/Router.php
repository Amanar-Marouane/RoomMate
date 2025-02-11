<?php

namespace core;

use core\Middleware\Middleware;

require_once __DIR__ . "/Functions.php";
require_once __DIR__ . "/AutoLoader.php";

class Router
{
    private array $routes = [];

    public function route($method, string $uri, $filePath, $class = null, $class_method = null)
    {
        $method = strtolower($method);
        $this->routes[$method][] = [
            "uri" => $uri,
            "path" => $filePath,
            "class" => $class,
            "method" => $class_method,
            "middleware" => null,
        ];
        return $this;
    }

    public function dispatch(string $uri): void
    {
        $method = strtolower(request_method());
        $middleware = new Middleware;
        messagesHandler();
        foreach ($this->routes[$method] as $route) {
            $pattern =  preg_replace("#\{\w+\}#", "([^\/]+)", $route["uri"]);
            if (preg_match("#^$pattern$#", $uri, $matches)) {
                $allowed = $route['middleware'];
                if (!is_null($allowed)) {
                    $middleware->middlewareHandler($allowed);
                };
                if (!is_null($route["class"])) {
                    $instance = $route["class"];
                    $method = $route["method"];
                    call_user_func_array([$instance, $method], [$matches[1] ?? ""]);
                    return;
                }
                include __DIR__ . "/../app/{$route["path"]}";
                return;
            }
        }
        include __DIR__ . "/../app/views/404.view.php";
    }

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]["middleware"] = $key;
    }
}
