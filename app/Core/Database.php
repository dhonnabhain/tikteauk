<?php

namespace App\Core;

use PDO;

class Database
{
    public function __construct()
    {
        $this->buildConnection();
    }

    private function buildConnection(): void
    {
        $GLOBALS['connection'] = new PDO($_ENV['DB_SERVER'] . ':host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
    }
}
