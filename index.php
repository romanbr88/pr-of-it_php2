<?php

use Models\Article;

require __DIR__ . '/autoload.php';

$data = Article::getLastNews(3);

require __DIR__ . '/Views/Main.php';
