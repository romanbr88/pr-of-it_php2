<?php


namespace App;


class Config
{

    protected static $instance = null;
    public array $data = [];

    protected function __Construct()
    {
        $this->data = [
            'db' => [
                'host' => 'localhost',
                'dbname' => 'profit',
                'username' => 'postgres',
                'passwd' => '',
            ]
        ];
    }

    public static function instance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

}