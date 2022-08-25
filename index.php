<?php

$url = isset($_SERVER['PATH_INFO']) ? ltrim($_SERVER['PATH_INFO'],'/') : '/';
session_start();

require __DIR__.'/vendor/autoload.php';

$routes = require __DIR__.'/routes/web.php';


foreach ($routes as $route) {
    if ($url === $route['url'] && strtoupper($route['request_method']) === $_SERVER['REQUEST_METHOD']) {
        (new $route['controller'])->{$route['method']}();
    }
}

//if ($url == '/')
//{
//
//    // This is the home page
//    // Initiate the home controller
//    // and render the home view
//
//
//    $indexModel = New \App\Models\Tasks();
//    $indexController = New \App\Http\Controllers\IndexController($indexModel);
//    $indexView = New \App\Views\IndexView($indexController, $indexModel);
//
//    print $indexView->index();
//
//}else{
//
//
//}