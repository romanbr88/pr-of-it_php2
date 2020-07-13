<?php

namespace Controllers;

class Error extends BaseController
{
    protected \Throwable $errors;

    public function __construct(\Throwable $ex)
    {
        parent::__construct();
        $this->errors = $ex;
    }

    protected function action()
    {
        $this->view->errors = $this->errors;
        $html = $this->view->render(__DIR__ . '/../Views/Error.php');
        echo $html;
    }
}