<?php

require __DIR__.'/../routes/router.php';
require __DIR__.'/../routes/web.php';
require __DIR__.'/globals.php';


class App
{
    public function serve()
    {
        $route = [
            'method'=> strtolower($_SERVER['REQUEST_METHOD']),
            'path'  => trim($_SERVER['PATH_INFO'], '/')
        ];

        $router = new Router();
        $router->parse($route);
    }
}

return (new App());