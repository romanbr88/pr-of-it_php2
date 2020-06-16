<?php

use Models\Product;
use Models\User;

spl_autoload_register(function ($class) {
    require __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
});

$data = Product::findAll();
var_dump($data);

$data = User::findAll();
var_dump($data);