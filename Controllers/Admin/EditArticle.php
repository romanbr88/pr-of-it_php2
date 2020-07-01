<?php

namespace Controllers\Admin;

use Models\Article;

class EditArticle extends BaseController
{

    protected function action()
    {
        $id = $_GET['id'] ?? null;
        $this->view->article = Article::findById($id);
        $html = $this->view->render(__DIR__ . '/../../Views/Admin/EditArticle.php');
        echo $html;
    }

}