<?php

namespace Controllers\Admin;

use Models\Article;
use App\AdminDataTable;

class Index extends BaseController
{
    protected function action()
    {
        $dataTable = new AdminDataTable(iterator_to_array(Article::findAll()), [
            function ($model) {
                return $model->id;
            },
            function ($model) {
                return '<a href="/article/?id=' . $model->id . '">' . $model->title . '</a>';
            },
            function ($model) {
                return $model->date;
            },
            function ($model) {
                $author = '';
                if (!is_null($model->author)) {
                    $author = $model->author->name;
                }
                return $author;
            },
            function ($model) {
                return '<a href="/admin/EditArticle/?id=' . $model->id . '">Редактировать</a><br>
                        <a href="/admin/Delete/?id=' . $model->id . '">Удалить</a>';
            },
        ]);

        $this->view->dataTable = $dataTable->render();
        $html = $this->view->render(__DIR__ . '/../../Views/Admin/Main.php');
        echo $html;
    }
}