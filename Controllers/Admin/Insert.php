<?php

namespace Controllers\Admin;

use Models\Article;

class Insert extends BaseController
{

    protected function action()
    {
        $title = $_POST['title'] ?? null;
        $content = $_POST['content'] ?? null;

        if (isset($title, $content)) {
            $article = new Article();
            $article->title = $title;
            $article->content = $content;
            $article->date = date('Y-m-d H:i:s');
            $article->save();
        }

        header('Location: /admin');
        die();
    }

}