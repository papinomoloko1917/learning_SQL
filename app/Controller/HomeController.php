<?php

namespace App\Controller;

class HomeController
{
    static function index()
    {
        require_once __DIR__ . '/../../views/home.php';
    }
}
