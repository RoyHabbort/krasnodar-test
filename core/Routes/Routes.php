<?php

namespace Core\Routes;

class Routes {

    protected static $routes = [
        'GET' => [],
        'POST' => []
    ];

    public static function get(string $path, string $handler) {
        $route = new Route('GET', $path, $handler);
        static::addRoutes('GET', $route);
    }

    public static function post(string $path, string $handler) {
        $route = new Route('POST', $path, $handler);
        static::addRoutes('POST', $route);
    }

    public static function addRoutes(string $type, Route $route) {
        if (empty(static::$routes[$type])) {
            throw new \OutOfBoundsException('Not allowed type of route');
        }

        static::$routes[$type][] = $route;
    }

    public static function getRoute(string $type, string $path) {
        if (empty(static::$routes[$type])) {
            throw new \OutOfBoundsException('Not allowed type of route');
        }

        foreach(static::$routes[$type] as $route) {
            if ($route->isRoute($type, $path)) {
                return $route;
            }
            //@todo: сделать кастомное
            throw new \RangeException();
        }
    }


}