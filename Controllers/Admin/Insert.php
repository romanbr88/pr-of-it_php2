<?php

namespace Controllers\Admin;

use Models\Article;

class Insert extends BaseController
{

    protected function action()
    {
        $title = $_POST['title'] ?? null;
        $content = $_POST['content'] ?? null;
        $author_id = $_POST['author_id'] ?? null;

        if (isset($title, $content, $author_id)) {
            $article = new Article();
            $article->title = $title;
            $article->content = $content;
            $article->author_id = $author_id;
            $article->date = date('Y-m-d H:i:s');
            $article->save();
        }

        header('Location: /admin/index.php?ctrl=Index&role=admin');
        die();
    }

}