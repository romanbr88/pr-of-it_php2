<?php

use Controllers\Error;
use Exceptions\DbException;
use Exceptions\Http404Exception;

require __DIR__ . '/autoload.php';

$class = Router::getClass($_SERVER['REQUEST_URI']);

if (!class_exists($class)) {
    die('Страница не найдена');
}

try {
    $ctrl = new $class;
    $ctrl();
} catch (DbException $ex) {
    $ctrl = new Error();
    $ctrl->addError($ex->getMessage());
    $ctrl();
} catch (Http404Exception $ex) {
    http_response_code(404);
    $ctrl = new Error();
    $ctrl->addError($ex->getMessage());
    $ctrl();
}

