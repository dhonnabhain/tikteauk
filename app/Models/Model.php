<?php

namespace App\Models;

use PDO;
use Symfony\Component\String\Inflector\EnglishInflector;

abstract class Model
{
    private string $table;
    private string $query;
    private array $columns = [];
    private array $binds = [];

    public function __construct()
    {
        $this->resolveTable();
    }

    public function create(array $fields)
    {
        $this->query = "INSERT INTO $this->table (%columns%) VALUES (%binds%)";

        return $this->prepareColumnsAndBinds($fields)
            ->setColumnsAndBinds()
            ->run($fields);
    }

    public function all()
    {
        $query = $GLOBALS['connection']->prepare("SELECT * FROM $this->table");
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    private function resolveTable(): void
    {
        $namespace = get_class($this);
        $classname = array_reverse(explode('\\', $namespace))[0];

        $this->table = strtoupper((new EnglishInflector)->pluralize($classname)[0]);
    }

    private function prepareColumnsAndBinds(array $fields): self
    {
        foreach (array_keys($fields) as $col) {
            array_push($this->columns, $col);
            array_push($this->binds, ":$col");
        }

        return $this;
    }

    private function setColumnsAndBinds(): self
    {
        $this->query = str_replace('%columns%', join(',', $this->columns), $this->query);
        $this->query = str_replace('%binds%', join(',', $this->binds), $this->query);

        return $this;
    }

    private function run(array $fields = [])
    {
        $stmt = $GLOBALS['connection']->prepare($this->query);

        foreach ($this->binds as $bind) {
            $stmt->bindParam($bind, $fields[preg_replace('/:/', '', $bind)]);
        }

        return $stmt->execute();
    }
}
