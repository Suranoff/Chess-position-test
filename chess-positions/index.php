<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'settings.php'; // файл настроек БД
require_once 'autoloader.php'; // простой загрузчик классов

/** Простой роутинг  */
$routes = [
    '/\/chess\/(.+)/' => ['App\ChessController', 'actionPosition'],
    '/\/migrate-up\//' => ['App\Migration', 'up'],
    '/\/migrate-down\//' => ['App\Migration', 'down'],
];

foreach ($routes as $url => $action) {

    $matches = preg_match($url, $_SERVER['REQUEST_URI'], $params);

    if ($matches > 0) {

        $controller = new $action[0]();

        $controller->{$action[1]}($params);

        break;
    }
}