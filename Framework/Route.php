<?php

namespace Framework;

use Closure;

class Route
{
    /**
     * array of required routes
     *
     * @var array
     */
    protected static $routes = [];


    /**
     * add Route to $route array
     *
     * @param  string $method
     * @param  string $url
     * @param  Closure $target
     * @return void
     */
    public static function addRoute(string $method, string $uri, string $action): void
    {
        //destructure array into variables
        [$controller, $controllerMethod] = explode('@', $action);
        array_push(self::$routes, [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'controllerMethod' => $controllerMethod,
        ]);
    }


    /**
     * add get route
     *
     * @param  mixed $uri
     * @param  mixed $controller
     * @return void
     */
    public static function get(string $uri, string $controller): void
    {
        self::addRoute('GET', $uri, $controller);
    }

    /**
     * add post route
     *
     * @param  mixed $uri
     * @param  mixed $controller
     * @return void
     */
    public static function post(string $uri, string $controller): void
    {
        self::addRoute('POST', $uri, $controller);
    }

    /**
     * add put route
     *
     * @param  mixed $uri
     * @param  mixed $controller
     * @return void
     */
    public static function put(string $uri, string $controller): void
    {
        self::addRoute('PUT', $uri, $controller);
    }


    /**
     * add delete route
     *
     * @param  mixed $uri
     * @param  mixed $controller
     * @return void
     */
    public static function delete(string $uri, string $controller): void
    {
        self::addRoute('DELETE', $uri, $controller);
    }

    /**
     * add patch route
     *
     * @param  mixed $uri
     * @param  mixed $controller
     * @return void
     */
    public static function patch(string $uri, string $controller): void
    {
        self::addRoute('PATCH', $uri, $controller);
    }

    public static function route()
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestURI = $_SERVER['REQUEST_URI'];



        foreach (self::$routes as $route)
        {
            if ($route['method'] == $requestMethod && $route['uri'] == $requestURI)
            {
                $controller = 'App\\Controllers\\' . $route['controller'];
                $controllerMethod = $route['controllerMethod'];
                $controller = new $controller();
                $controller->$controllerMethod();
                break;
            }
        }


    }


}