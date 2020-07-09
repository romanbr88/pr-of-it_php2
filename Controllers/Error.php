<?php

namespace Controllers;

class Error extends BaseController implements \Countable
{
    protected array $errors = [];

    public function addError(string $errorText)
    {
        $this->errors[] = $errorText;
    }

    protected function action()
    {
        $this->view->errors = $this->errors;
        $html = $this->view->render(__DIR__ . '/../Views/Error.php');
        echo $html;
    }

    public function count()
    {
        return count($this->errors);
    }
}