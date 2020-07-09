<?php

namespace Controllers;

use Models\Article;

class Articles extends BaseController
{
    protected function action()
    {
        $this->view->articles = Article::findAll();
        $html = $this->view->render(__DIR__ . '/../Views/Articles.php');
        echo $html;
    }
}