<?php

namespace Controllers\Admin;

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
        $role = 'admin';

        if ($role === 'admin') {
            return true;
        }

        return false;
    }

    abstract protected function action();

    public function __invoke()
    {
        $this->beforeAction();
    }

}