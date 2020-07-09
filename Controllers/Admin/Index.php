<?php

namespace Controllers\Admin;

use Models\Article;

class Index extends BaseController
{
    protected function action()
    {
        $this->view->articles = Article::findAll();

        $html = $this->view->render(__DIR__ . '/../../Views/Admin/Main.php');
        echo $html;
    }
}