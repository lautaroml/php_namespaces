<?php

function view($resource, $params = null) {
    $resource = str_replace('.', '/', $resource) . '.php';

    if ($params) {
        extract($params);
    }

    return require __DIR__.'/../resources/views/' . $resource;
}