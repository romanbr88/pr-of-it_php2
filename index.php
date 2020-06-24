<?php

use Models\Article;

require __DIR__ . '/autoload.php';

$view = new View();

$view->articles = Article::getLastNews(3);

$html = $view->render(__DIR__ . '/Views/Main.php');
echo $html;
