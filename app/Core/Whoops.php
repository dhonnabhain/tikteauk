<?php

namespace App\Core;

use Whoops\Run;

class Whoops
{
    public function __construct()
    {
        $whoops = new Run();
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        $whoops->register();
    }
}
