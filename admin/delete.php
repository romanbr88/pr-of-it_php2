<?php

use Models\Article;

require __DIR__ . '/../autoload.php';

$id = $_GET['id'] ?? null;
$data = Article::findById($id);

$data->delete();

header('Location: /admin');
die();
