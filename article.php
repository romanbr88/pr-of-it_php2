<?php

use Models\Article;

require __DIR__ . '/autoload.php';

$newsId = !isset($_GET['id']) ?: $_GET['id'];

$data = Article::findById($newsId);

if ($data) {
    require __DIR__ . '/Views/Article.php';
} else {
    require __DIR__ . '/Views/404.php';
}
