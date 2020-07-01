<?php

require __DIR__ . '/../autoload.php';

$ctrl = $_GET['ctrl'] ?? 'Index';

$class = '\\Controllers\\Admin\\' . $ctrl;

if (!class_exists($class)) {
    die('Страница не найдена');
}

$ctrl = new $class;
$ctrl();