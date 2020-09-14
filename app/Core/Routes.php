<?php

use App\Controllers\ErrorController;
use App\Controllers\LandingController;

return [
    [
        'verb' => 'get',
        'path' => '/',
        'controller' => LandingController::class,
        'method' => 'landing',
    ]
];
