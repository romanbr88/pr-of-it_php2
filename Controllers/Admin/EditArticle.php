<?php

namespace Controllers\Admin;

use Controllers\BaseController;
use Models\Article;
use Models\Author;

class EditArticle extends BaseController
{

    protected function action()
    {
        $id = $_GET['id'] ?? null;
        $this->view->article = Article::findById($id);
        $this->view->authors = Author::findAll();
        $html = $this->view->render(__DIR__ . '/../../Views/Admin/EditArticle.php');
        echo $html;
    }

}