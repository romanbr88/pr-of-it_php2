<?php

use Models\Article;

require __DIR__ . '/autoload.php';

$data = Article::getLastNews();

require __DIR__ . '/Views/Main.php';
