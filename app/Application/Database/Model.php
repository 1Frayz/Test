<?php

namespace App\Application\Database;

use App\Application\Database\Connection;

class Model extends Connection implements ModelInterface
{
    protected array $fields = [];
    protected string $table;
    protected int $id;
    protected string $created_at;
    protected string $updated_at;

    protected array $collection = [];

    public function created_at()
    {
        return $this->created_at;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function find(string $column, mixed $value, bool $many = false): mixed
    {
        $query = "SELECT * FROM `$this->table` WHERE `$column` = :$column";
        $stmt = self::connect()->prepare($query);
        $stmt->execute([$column => $value]);

        if ($many) {
            $this->collection = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $this->collection;
        } else {
            $entity = $stmt->fetch(\PDO::FETCH_ASSOC);
            if (!$entity) {
                return false;
            }
            foreach ($entity as $key => $value) {
                $this->$key = $value;
            }
            return $this;
        }
    }

    public function store(): void
    {
        $columns = implode(", ", array_map(function ($field) {
            return "`$field`";
        }, $this->fields));

        $binds = implode(", ", array_map(function ($field) {
            return ":$field";
        }, $this->fields));

        $query = "INSERT INTO `{$this->table}` ($columns) VALUES ($binds)";
        $stmt = $this->connect()->prepare($query);
        $params = [];
        foreach ($this->fields as $field) {
            $params[$field] = $this->$field;
        }

        $stmt->execute($params);
    }

    public function update(array $data): void
    {
        $keys = array_keys($data);
        $fields = array_map(function ($item) {
            return "`$item` = :$item";
        }, $keys);

        $updatedFields = implode(", ", $fields);
        $query = "UPDATE `$this->table` SET $updatedFields WHERE `id` = :id";
        $stmt = $this->connect()->prepare($query);
        $data['id'] = $this->id;
        $stmt->execute($data);
    }

    public function all(int $page = 1, int $itemsPerPage = 10): array
    {
        $offset = ($page - 1) * $itemsPerPage;
        $query = "SELECT * FROM `$this->table` ORDER BY id DESC LIMIT :limit OFFSET :offset";
        $stmt = $this->connect()->prepare($query);
        $stmt->bindValue(':limit', $itemsPerPage, \PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
        $stmt->execute();
        $items = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($items as $item) {
            foreach ($item as $key => $value) {
                $this->$key = $value;
            }
            $this->collection[] = clone $this;
        }
        return $this->collection;
    }

    public function count(): int
    {
        $query = "SELECT COUNT(*) as count FROM `$this->table`";
        $stmt = $this->connect()->query($query);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return (int) $result['count'];
    }
}
