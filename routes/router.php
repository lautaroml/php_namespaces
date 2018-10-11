<?php

class Router
{
    public static $uris = [];

    public function parse($route)
    {
        $this->connectRoute($route);
    }

    public static function get($uri, $action)
    {
        static::$uris['get'][trim($uri, '/')] = $action;
    }

    private function connectRoute($route)
    {
        $this->isSetMethod($route);
        $this->isSetPath($route);
        $this->executeAction($route);
    }

    private function isSetMethod($route)
    {
        if (! isset(static::$uris[$route['method']])) {
            throw new Exception('El metodo no se encuentra definido');
        }
    }

    private function isSetPath($route)
    {
        if (! isset(static::$uris[$route['method']][$route['path']])) {
            throw new Exception('El path no se encuentra definido');
        }
    }

    private function executeAction($route)
    {
        if (static::$uris[$route['method']][$route['path']] instanceof Closure) {
            return call_user_func(static::$uris[$route['method']][$route['path']]);
        }
        return $this->callController($route);
    }

    private function callController($route)
    {
        $controller_name = explode('@', static::$uris[$route['method']][$route['path']])[0];
        $action = explode('@', static::$uris[$route['method']][$route['path']])[1];

        $controller = 'App\Controllers\\' . $controller_name;
        $controller = new $controller;
        return $controller->$action();
    }

}
