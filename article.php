<?php

use Models\Article;

require __DIR__ . '/autoload.php';

$newsId = $_GET['id'] ?? null;

if (!isset($newsId)) {
    header('Location: /');
}

$data = Article::findById($newsId);

var_dump($data->author_id);

if ($data) {
    require __DIR__ . '/Views/Article.php';
} else {
    require __DIR__ . '/Views/404.php';
}
