<?php

use Controllers\Error;
use Exceptions\DbException;
use Exceptions\MultiException;
use App\Logger;

require __DIR__ . '/../autoload.php';

$class = Router::getClass($_SERVER['REQUEST_URI']);

if (!class_exists($class)) {
    die('Страница не найдена');
}

$log = new Logger();

try {
    $ctrl = new $class;
    $ctrl();
} catch (DbException $ex) {
    $log->append(date('Y-m-d H:i:s'), $ex->getFile(), $ex->getMessage())->save();
    $ctrl = new Error();
    $ctrl->addError($ex->getMessage());
    $ctrl();
} catch (MultiException $ex) {
    $ctrl = new Error();
    foreach ($ex->getErrors() as $error) {
        $ctrl->addError($error->getMessage());
    }
    $ctrl();
}