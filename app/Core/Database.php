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
        $connection = new PDO($_ENV['DB_SERVER'] . ':host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $GLOBALS['connection'] = $connection;
    }
}
