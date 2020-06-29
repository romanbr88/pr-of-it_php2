<?php


namespace Controllers;


abstract class BaseController
{

    protected \View $view;

    public function __construct()
    {
        $this->view = new \View();
    }

    public function action()
    {
        if (!$this->access()) {
            die('Доступ закрыт');
        }

        $this->handle();
    }

    protected function access(): bool
    {
        return true;
    }

    abstract protected function handle();

    public function __invoke()
    {
        $this->action();
    }

}