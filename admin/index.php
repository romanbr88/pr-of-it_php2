<?php

use Models\Article;

require __DIR__ . '/../autoload.php';

$view = new View();

$view->articles = Article::findAll();

$html = $view->render(__DIR__ . '/../Views/admin/Main.php');
echo $html;
