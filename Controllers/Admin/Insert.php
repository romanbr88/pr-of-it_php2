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
            $article->fill([
                'title' => $title,
                'content' => $content,
                'date' => date('Y-m-d H:i:s'),
            ]);
            $article->save();
        }

        header('Location: /admin');
        die();
    }
}