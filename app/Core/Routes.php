<?php

use App\Controllers\AuthController;
use App\Controllers\LandingController;
use App\Controllers\PostController;

return [
    [
        'verb' => 'post',
        'path' => '/register',
        'controller' => AuthController::class,
        'method' => 'register',
    ],
    [
        'verb' => 'get',
        'path' => '/register',
        'controller' => AuthController::class,
        'method' => 'showRegisterForm',
    ],
    [
        'verb' => 'post',
        'path' => '/login',
        'controller' => AuthController::class,
        'method' => 'login',
    ],
    [
        'verb' => 'get',
        'path' => '/login',
        'controller' => AuthController::class,
        'method' => 'showLoginForm',
    ],
    [
        'verb' => 'post',
        'path' => '/',
        'controller' => AuthController::class,
        'method' => 'logout',
    ],
    [
        'verb' => 'get',
        'path' => '/',
        'controller' => LandingController::class,
        'method' => 'landing',
    ],
    [
        'verb' => 'get',
        'path' => '/posts/all',
        'controller' => PostController::class,
        'method' => 'index',
    ]
];
