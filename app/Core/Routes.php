<?php

use App\Controllers\LandingController;
use App\Controllers\PostController;

return [
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
