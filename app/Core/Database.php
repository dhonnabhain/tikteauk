<?php

namespace App\Core;

use PDO;

class Database
{
    public function __construct()
    {
        $this->buildConnection();
    }

    private function buildConnection()
    {
        global $connection;

        $connection = new PDO('mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
    }
}
