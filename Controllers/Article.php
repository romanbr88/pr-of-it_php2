<?php

namespace Controllers;

use Exceptions\Http404Exception;

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

        if (empty($this->view->article)) {
            throw new Http404Exception('Запись не найдена!');
        }

        $html = $this->view->render(__DIR__ . '/../Views/Article.php');
        echo $html;
    }
}