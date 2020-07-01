<?php

abstract class Router
{

    public static function getClass(string $uri): string
    {
        $params = array_map('ucfirst', explode('/', trim($uri, '/')));
        $ctrl = '\\Controllers\\';

        if (count($params) === 1 && $params[0] === '') {
            return $ctrl . 'Index';
        }

        if (count($params) === 1 && $params[0] === 'Admin') {
            return $ctrl . $params[0] . '\\Index';
        }

        $ctrl = $ctrl . implode('\\', $params);

        if (strpos($ctrl, '\\?') !== false) {
            $ctrl = stristr($ctrl, '\\?', true);
        }

        return $ctrl;
    }

}