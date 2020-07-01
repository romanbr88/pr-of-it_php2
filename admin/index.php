<?php

require __DIR__ . '/../autoload.php';

$class = Router::getClass($_SERVER['REQUEST_URI']);

if (!class_exists($class)) {
    die('Страница не найдена');
}

$ctrl = new $class;
$ctrl();