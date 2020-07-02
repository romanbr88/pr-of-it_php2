<?php

namespace Controllers;

class Error extends BaseController
{
    protected string $errorText;

    public function setErrorText(string $errorText)
    {
        $this->errorText = $errorText;
    }

    protected function action()
    {
        $this->view->errorText = $this->errorText;
        $html = $this->view->render(__DIR__ . '/../Views/Error.php');
        echo $html;
    }

}