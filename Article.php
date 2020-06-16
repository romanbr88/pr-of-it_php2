<?php

use Models\Article;

spl_autoload_register(function ($class) {
    require __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
});

$newsId = isset($_GET['id']) ? $_GET['id'] : 0;

$data = Article::findById($newsId);

if ($data) {
    require __DIR__ . '/Views/Article.php';
} else {
    require __DIR__ . '/Views/404.php';
}
