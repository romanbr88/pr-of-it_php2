<?php

use Models\Article;

require __DIR__ . '/../autoload.php';

$id = $_GET['id'] ?? null;
$title = $_POST['title'] ?? null;
$content = $_POST['content'] ?? null;
$date = $_POST['date'] ?? null;

if (isset($title, $content, $date)) {
    $article = Article::findById($id);
    $article->title = $title;
    $article->content = $content;
    $article->date = $date;
    $article->save();
    header('Location: /admin');
    die();
}

$view = new View();

$view->article = Article::findById($id);

$html = $view->render(__DIR__ . '/../Views/admin/Edit.php');
echo $html;
