<?php

use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Controllers\LandingController;
use App\Controllers\PostController;

return [
    # Auth
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
        'verb' => 'get',
        'path' => '/logout',
        'controller' => AuthController::class,
        'method' => 'logout',
    ],

    # Content
    [
        'verb' => 'get',
        'path' => '/home',
        'controller' => HomeController::class,
        'method' => 'show',
    ],
    [
        'verb' => 'get',
        'path' => '/profil',
        'controller' => HomeController::class,
        'method' => 'show',
    ],
    [
        'verb' => 'get',
        'path' => '/posts/all',
        'controller' => PostController::class,
        'method' => 'index',
    ],

    # Public
    [
        'verb' => 'get',
        'path' => '/',
        'controller' => LandingController::class,
        'method' => 'landing',
    ],
];
