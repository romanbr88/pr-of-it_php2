<?php

namespace Controllers;

class Article extends BaseController
{

    protected function action()
    {
        $newsId = $_GET['id'] ?? null;

        if (!isset($newsId)) {
            header('Location: /');
            die();
        }

        $this->view->article = \Models\Article::findById($newsId);
        $html = $this->view->render(__DIR__ . '/../Views/Article.php');
        echo $html;
    }

}