<?php

use App\Controllers\AccountController;
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
        'path' => '/posts/all',
        'controller' => PostController::class,
        'method' => 'index',
    ],

    # Account
    [
        'verb' => 'get',
        'path' => '/account',
        'controller' => AccountController::class,
        'method' => 'show',
    ],
    [
        'verb' => 'post',
        'path' => '/account/general',
        'controller' => AccountController::class,
        'method' => 'updateGeneral',
    ],
    [
        'verb' => 'post',
        'path' => '/account/password',
        'controller' => AccountController::class,
        'method' => 'updatePassword',
    ],
    [
        'verb' => 'post',
        'path' => '/account/bio',
        'controller' => AccountController::class,
        'method' => 'updateBio',
    ],

    # Public
    [
        'verb' => 'get',
        'path' => '/',
        'controller' => LandingController::class,
        'method' => 'landing',
    ],
];
