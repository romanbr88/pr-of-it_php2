<?php

use Controllers\Error;
use Exceptions\DbException;
use Exceptions\Http404Exception;
use App\Logger;

require __DIR__ . '/autoload.php';

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
} catch (Http404Exception $ex) {
    $log->append(date('Y-m-d H:i:s'), $ex->getFile(), $ex->getMessage())->save();
    http_response_code(404);
    $ctrl = new Error($ex);
    $ctrl();
}

