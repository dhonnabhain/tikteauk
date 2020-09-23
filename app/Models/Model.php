<?php

namespace App\Models;

use PDO;
use Symfony\Component\String\Inflector\EnglishInflector;

abstract class Model
{
    private string $table;

    public function __construct()
    {
        $this->extractTableName();
    }

    public function all()
    {
        $query = $GLOBALS['connection']->prepare("SELECT * FROM $this->table");
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    private function extractTableName(): void
    {
        $namespace = get_class($this);
        $classname = array_reverse(explode('\\', $namespace))[0];

        $this->table = strtoupper((new EnglishInflector)->pluralize($classname)[0]);
    }
}
