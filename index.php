<?php

use Exceptions\DbExceptions;

require __DIR__ . '/autoload.php';

$class = Router::getClass($_SERVER['REQUEST_URI']);

if (!class_exists($class)) {
    die('Страница не найдена');
}

try {
    $ctrl = new $class;
    $ctrl();
} catch (DbExceptions $ex) {
    $ctrl = new \Controllers\Error();
    $ctrl->setErrorText($ex->getMessage());
    $ctrl();
}

