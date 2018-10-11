<?php

namespace App\Controllers;

class HomeController {
    public function index()
    {
        $foo = 'UNO';
        $foo_2 = 'DOS';
        return view('home.index', compact('foo', 'foo_2'));
    }
}