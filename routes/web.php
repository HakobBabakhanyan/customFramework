<?php


return [
    [
        'url' => '/',
        'controller' => \App\Http\Controllers\IndexController::class,
        'method' => 'index',
        'request_method' => 'get'
    ],
    [
        'url' => 'task',
        'controller' => \App\Http\Controllers\TaskController::class,
        'method' => 'index',
        'request_method' => 'get'
    ],
    [
        'url' => 'create',
        'controller' => \App\Http\Controllers\TaskController::class,
        'method' => 'create',
        'request_method' => 'post'
    ],
    [
        'url' => 'update',
        'controller' => \App\Http\Controllers\TaskController::class,
        'method' => 'update',
        'request_method' => 'post'
    ],
    [
        'url' => 'update/status',
        'controller' => \App\Http\Controllers\TaskController::class,
        'method' => 'updateStatus',
        'request_method' => 'post'
    ],
    [
        'url' => 'login',
        'controller' => \App\Http\Controllers\LoginController::class,
        'method' => 'index',
        'request_method' => 'get'
    ],
    [
        'url' => 'login',
        'controller' => \App\Http\Controllers\LoginController::class,
        'method' => 'login',
        'request_method' => 'post'
    ]
];