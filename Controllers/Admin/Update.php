<?php

namespace Controllers\Admin;

use Models\Article;

class Update extends BaseController
{

    protected function action()
    {
        $id = $_GET['id'] ?? null;
        $title = $_POST['title'] ?? null;
        $content = $_POST['content'] ?? null;
        $date = $_POST['date'] ?? null;

        if (isset($id, $title, $content, $date)) {
            $article = Article::findById($id);
            $article->title = $title;
            $article->content = $content;
            $article->date = $date;
            $article->save();
        }

        header('Location: /admin');
        die();
    }

}