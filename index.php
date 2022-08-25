<?php

$url = isset($_SERVER['PATH_INFO']) ? ltrim($_SERVER['PATH_INFO'], '/') : '/';
session_start();

require __DIR__ . '/vendor/autoload.php';

$routes = require __DIR__ . '/routes/web.php';

$page = false;
foreach ($routes as $route) {
    if ($url === $route['url'] && strtoupper($route['request_method']) === $_SERVER['REQUEST_METHOD']) {
        (new $route['controller'])->{$route['method']}();
        $page = true;
    }
}
if (!$page) {
    echo '404!';
}