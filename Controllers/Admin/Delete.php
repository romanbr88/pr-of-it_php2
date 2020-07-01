<?php

namespace Controllers\Admin;

use Models\Article;

class Delete extends BaseController
{

    protected function action()
    {
        $id = $_GET['id'] ?? null;

        if (isset($id)) {
            $data = Article::findById($id);
            $data->delete();
        }

        header('Location: /admin/index.php?ctrl=Index&role=admin');
        die();
    }

}