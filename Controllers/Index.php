<?php

namespace Controllers;

use \Models\Article;

class Index extends BaseController
{

    protected function action()
    {
        $this->view->articles = Article::getLastNews(3);
        $html = $this->view->render(__DIR__ . '/../Views/Main.php');
        echo $html;
    }

}