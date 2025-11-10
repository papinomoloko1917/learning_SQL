<?php

namespace App\config;

use App\Controller\HomeController;
use App\Controller\ArticleController;


return [
    '/' => [HomeController::class, 'index'],
    '/articles' => [ArticleController::class, 'index'],
    '/addArticle' => [ArticleController::class, 'add'],
];
