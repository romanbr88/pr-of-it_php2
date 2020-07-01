<?php

namespace Controllers\Admin;

use Models\Author;

class AddArticle extends BaseController
{

    protected function action()
    {
        $this->view->authors = Author::findAll();
        $html = $this->view->render(__DIR__ . '/../../Views/Admin/AddArticle.php');
        echo $html;
    }

}