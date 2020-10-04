<?php

namespace App\Models;

use PDO;
use Symfony\Component\String\Inflector\EnglishInflector;

abstract class Model
{
    protected array $hidden = [];
    private string $table;
    private $stmt;
    private string $query;
    private array $columns = [];
    private array $binds = [];
    private array $wheresColumns = [];
    private array $wheresBinds = [];
    private array $wheres = [];

    public function __construct()
    {
        $this->resolveTable();
    }

    public function create(array $fields)
    {
        $this->query = "INSERT INTO $this->table (%columns%) VALUES (%binds%)";

        try {
            $exec = $this->prepareBindings($fields)
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
        $this->query = "SELECT * FROM $this->table";

        return $this->run()
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetch(): array
    {
        $this->query = "SELECT * FROM $this->table WHERE %wheres%";

        return $this->prepareBindings($this->wheres, 'wheres')
            ->setColumnsEqualsBinds('%wheres%', 'wheresColumns', 'wheresBinds')
            ->run()
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function first(): self
    {
        $fetched = $this->fetch();

        $this->populate($fetched);

        return $this;
    }

    public function update(array $fields)
    {
        $this->query = "UPDATE $this->table SET %columns% WHERE %wheres%";

        try {
            $this->prepareBindings($fields)
                ->prepareBindings($this->wheres, 'wheres')
                ->setColumnsEqualsBinds()
                ->setColumnsEqualsBinds('%wheres%', 'wheresColumns', 'wheresBinds')
                ->run($fields);

            $this->cleanup();

            return $this;
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function where(array $condition): self
    {
        $this->wheres[$condition[0]] = $condition[1];

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

    public function prepareSet($fields): ?string
    {
        if (count($fields) > 0) {
            $last = end($fields);
            $setClause = "SET ";

            foreach ($fields as $field) {
                $lastChar = $field[0] === $last ? '' : ', ';
                $setClause .= "$field[0] = '$field[1]'" . $lastChar;
            }

            return $setClause;
        }
    }

    private function resolveTable(): void
    {
        $namespace = get_class($this);
        $classname = array_reverse(explode('\\', $namespace))[0];

        $this->table = strtoupper((new EnglishInflector)->pluralize($classname)[0]);
    }

    private function prepareBindings(array $fields, string $prefix = ''): self
    {
        $columnsProperty = $this->bindPropertyResolver($prefix, 'columns');
        $bindsProperty = $this->bindPropertyResolver($prefix, 'binds');

        foreach (array_keys($fields) as $item) {
            array_push($this->{$columnsProperty}, $item);
            array_push($this->{$bindsProperty}, $this->buildBindName($prefix, $item));
        }

        return $this;
    }

    private function setColumnsAndBinds(): self
    {
        $this->query = str_replace('%columns%', join(',', $this->columns), $this->query);
        $this->query = str_replace('%binds%', join(',', $this->binds), $this->query);

        return $this;
    }

    private function setColumnsEqualsBinds(string $toReplace = '%columns%', string $property = 'columns', string $binds = 'binds'): self
    {
        $clause = '';
        $lastItem = end($this->{$property});

        foreach ($this->{$property} as $idx => $col) {
            $glue = $lastItem === $col ? ' ' : $this->glueDefiner($toReplace);
            $clause .= $col . ' = ' . $this->{$binds}[$idx] . $glue;
        }

        $this->query = str_replace($toReplace, $clause, $this->query);

        return $this;
    }

    private function run(array $fields = [])
    {
        $this->stmt = $GLOBALS['connection']->prepare($this->query);

        foreach ($this->binds as $bind) {
            $this->stmt->bindParam($bind, $fields[preg_replace('/:/', '', $bind)]);
        }

        foreach ($this->wheresBinds as $bind) {
            $this->stmt->bindParam($bind, $this->wheres[preg_replace('/:wheres_/', '', $bind)]);
        }

        $this->stmt->execute();

        return $this->stmt;
    }

    private function cleanup(): void
    {
        $this->wheres = $this->binds = $this->columns = [];
    }

    private function populate(array $fetched = []): void
    {
        if (count($fetched) > 0) {
            foreach ($fetched[0] as $attr => $item) {
                if (!in_array($attr, $this->hidden)) {
                    $this->{$attr} = $item;
                }
            }
        }
    }

    private function bindPropertyResolver(string $prefix, string $item)
    {
        $hasPrefix = $prefix !== '';
        $lastPart = $hasPrefix ? ucfirst($item) : $item;

        return $prefix . $lastPart;
    }

    private function buildBindName(string $prefix, string $item)
    {
        $hasPrefix = $prefix !== '';
        $lastPart = $hasPrefix ? "_$item" : $item;

        return ':' . $prefix . $lastPart;
    }

    private function glueDefiner(string $type)
    {
        $type = preg_replace('/%/', '', $type);

        switch ($type) {
            case 'wheres':
                return ' AND ';
                break;

            default:
                return ', ';
                break;
        }
    }
}
