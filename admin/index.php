<?php

use Models\Article;

require __DIR__ . '/../autoload.php';

$data = Article::findAll();

require __DIR__ . '/../Views/admin/Main.php';
