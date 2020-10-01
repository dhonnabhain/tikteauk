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
    private array $wheres = [];

    public function __construct()
    {
        $this->resolveTable();
    }

    public function create(array $fields)
    {
        $this->query = "INSERT INTO $this->table (%columns%) VALUES (%binds%)";

        try {
            $exec = $this->prepareColumnsAndBinds($fields)
                ->setColumnsAndBinds()
                ->run($fields);

            $this->cleanup();

            return $exec;
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function all()
    {
        $query = $GLOBALS['connection']->prepare("SELECT * FROM $this->table");
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetch(): array
    {
        $whereClause = $this->prepareWhere();
        $query = $GLOBALS['connection']->prepare("SELECT * FROM $this->table " . $whereClause);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function first(): self
    {
        $fetched = $this->fetch();

        if (count($fetched) > 0) {
            foreach ($fetched[0] as $attr => $item) {
                $this->{$attr} = $item;
            }
        }

        return $this;
    }

    public function where(array $condition): self
    {
        array_push($this->wheres, $condition);

        return $this;
    }

    public function prepareWhere(): ?string
    {
        if (count($this->wheres) > 0) {
            $whereClause = "WHERE ";

            foreach ($this->wheres as $where) {
                $whereClause .= "$where[0] = '$where[1]'";
            }

            return $whereClause;
        }
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

    private function cleanup(): void
    {
        $this->wheres = $this->binds = $this->columns = [];
    }
}
