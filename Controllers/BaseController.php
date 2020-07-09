<?php

namespace Controllers;

abstract class BaseController
{
    protected \View $view;

    public function __construct()
    {
        $this->view = new \View();
    }

    protected function beforeAction()
    {
        if (!$this->access()) {
            die('Доступ закрыт');
        }

        $this->action();
    }

    protected function access(): bool
    {
        return true;
    }

    abstract protected function action();

    public function __invoke()
    {
        $this->beforeAction();
    }
}