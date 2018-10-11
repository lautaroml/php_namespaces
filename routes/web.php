<?php

Router::get('/', 'HomeController@index');

Router::get('foo1', function(){
    echo 'a';
});

