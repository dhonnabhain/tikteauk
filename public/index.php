<?php

use App\Controllers\HomeController;
use App\Core\Database;
use App\Core\Env;
use App\Core\Router;
use App\Core\Whoops;

require __DIR__ . '/../vendor/autoload.php';

session_start();

new Env;
new Whoops;
new Database;
new Router;

// dump((new HomeController)->home());
