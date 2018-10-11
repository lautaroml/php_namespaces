<?php

namespace App\Controllers;

class HomeController {
    public function index()
    {
        $title = 'Página de inicio';
        return view('home.index', compact('title'));
    }

    public function contact()
    {
        $title = 'Contáctenos';
        return view('home.contact', compact('title'));
    }
}