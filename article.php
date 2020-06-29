<?php

use Models\Article;

require __DIR__ . '/autoload.php';

$newsId = $_GET['id'] ?? null;

if (!isset($newsId)) {
    header('Location: /');
    die();
}

$view = new View();

$view->article = Article::findById($newsId);

$html = $view->render(__DIR__ . '/Views/Article.php');
echo $html;
