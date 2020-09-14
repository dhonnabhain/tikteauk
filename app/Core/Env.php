<?php

namespace App\Core;

use Dotenv\Dotenv;

class Env
{
    public function __construct()
    {
        (Dotenv::createImmutable('../'))->load();
    }
}
