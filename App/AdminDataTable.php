<?php

namespace App;

class AdminDataTable
{
    protected array $models;
    protected array $functions;

    public function __construct(array $models, array $functions)
    {
        $this->models = $models;
        $this->functions = $functions;
    }

    public function render(): string
    {
        $view = new \View();
        $rows = [];

        foreach ($this->models as $model) {
            $rows[] = array_map(function (callable $fn) use ($model) {
                return $fn($model);
            }, $this->functions);
        }

        $view->rows = $rows;
        return $view->render(__DIR__ . '/../Views/DataTable.php');
    }
}