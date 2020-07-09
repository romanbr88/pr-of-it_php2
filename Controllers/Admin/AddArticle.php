<?php

namespace Controllers\Admin;

class AddArticle extends BaseController
{
    protected function action()
    {
        $html = $this->view->render(__DIR__ . '/../../Views/Admin/AddArticle.php');
        echo $html;
    }
}