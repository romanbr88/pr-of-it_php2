<?php

use Models\Article;

spl_autoload_register(function ($class) {
    require __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
});

$data = Article::getLastNews();

require __DIR__ . '/Views/Main.php';
