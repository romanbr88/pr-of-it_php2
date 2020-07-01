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
        $author_id = $_POST['author_id'] ?? null;
        $date = $_POST['date'] ?? null;

        if (isset($id, $title, $content, $author_id, $date)) {
            $article = Article::findById($id);
            $article->title = $title;
            $article->content = $content;
            $article->author_id = $author_id;
            $article->date = $date;
            $article->save();
        }

        header('Location: /admin/index.php?ctrl=Index&role=admin');
        die();
    }

}