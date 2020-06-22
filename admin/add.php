<?php

use Models\Article;

require __DIR__ . '/../autoload.php';

$title = $_POST['title'] ?? null;
$content = $_POST['content'] ?? null;

if (isset($title, $content)) {
    $article = new Article();
    $article->title = $title;
    $article->content = $content;
    $article->date = date('Y-m-d H:i:s');
    $article->save();
    header('Location: /admin');
}

require __DIR__ . '/../Views/admin/Add.php';
