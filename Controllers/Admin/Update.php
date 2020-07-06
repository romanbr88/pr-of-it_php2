<?php

namespace Controllers\Admin;

use Exceptions\MultiException;
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
            $article->fill([
                'title' => $title,
                'content' => $content,
                'date' => $date,
            ]);
            $article->save();
        }

        header('Location: /admin');
        die();
    }

}