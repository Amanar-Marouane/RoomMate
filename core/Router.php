<?php

namespace core;

use core\Middleware\Middleware;

class Router
{
    private array $routes = [];

    public function route($method, string $uri, $class = null, $class_method = null)
    {
        $method = strtolower($method);
        $this->routes[$method][] = [
            "uri" => $uri,
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
                $allowed = $route["middleware"];
                if (!is_null($allowed)) {
                    $middleware->middlewareHandler($allowed);
                };
                $instance = $route["class"];
                $method = $route["method"];
                call_user_func_array([$instance, $method], [$matches[1] ?? ""]);
                return;
            }
        }
        include __DIR__ . "/../app/views/404.view.php";
    }

    public function only($key)
    {
        $method = strtolower(request_method());
        if (!isset($this->routes[$method]) || empty($this->routes[$method])) {
            return $this;
        }
        $lastIndex = array_key_last($this->routes[$method]);
        if ($lastIndex !== null) {
            $this->routes[$method][$lastIndex]["middleware"] = $key;
        }
        return $this;
    }
}
