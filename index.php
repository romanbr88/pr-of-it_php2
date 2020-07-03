<?php

require __DIR__ . '/autoload.php';

$class = Router::getClass($_SERVER['REQUEST_URI']);

if (!class_exists($class)) {
    die('Страница не найдена');
}

try {
    $ctrl = new $class;
    $ctrl();
} catch (\Exceptions\DbExceptions $ex) {
    $ctrl = new \Controllers\Error();
    $ctrl->setErrorText($ex->getMessage());
    $ctrl();
} catch (\Exceptions\Http404Exception $ex) {
    http_response_code(404);
    $ctrl = new \Controllers\Error();
    $ctrl->setErrorText($ex->getMessage());
    $ctrl();
}

