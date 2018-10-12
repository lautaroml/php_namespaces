<?php

function view($resource, $params = []) {
    $resource = str_replace('.', '/', $resource) . '.html';

    $loader = new Twig_Loader_Filesystem(__DIR__.'/../resources/views');

    $twig = new Twig_Environment($loader);

    echo $twig->render($resource, $params );
}