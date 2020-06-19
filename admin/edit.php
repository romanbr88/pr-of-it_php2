<?php

use Models\Article;

require __DIR__ . '/../autoload.php';

$id = $_GET['id'] ?? null;
$data = Article::findById($id);

$title = $_POST['title'] ?? null;
$content = $_POST['content'] ?? null;
$date = $_POST['date'] ?? null;

if (isset($title, $content, $date)) {
    $data->title = $title;
    $data->content = $content;
    $data->date = $date;
    $data->update();
    header('Location: /admin');
}

require __DIR__ . '/../Views/admin/Edit.php';
