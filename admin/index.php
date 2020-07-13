<?php

use Controllers\Error;
use Exceptions\DbException;
use Exceptions\MultiException;
use App\Logger;

require __DIR__ . '/../autoload.php';
require __DIR__ . '/../vendor/autoload.php';

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
    $ctrl = new Error($ex);
    $ctrl();
} catch (MultiException $ex) {
    $ctrl = new Error($ex);
    $ctrl();
}