<?php


abstract class Model
{

    protected const TABLE = '';

    public int $id;

    public static function findAll(): array
    {
        $db = new \Db();
        $sql = 'SELECT * FROM ' . static::TABLE;
        return $db->query($sql, static::class);
    }

    public static function findById(int $id)
    {
        $db = new \Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id = :id LIMIT 1';
        $result = $db->query($sql, static::class, [':id' => $id]);
        return empty($result) ? false : $result[0];
    }

    public function insert()
    {
        $props = get_object_vars($this);
        $columns = [];
        $binds = [];
        $params = [];

        foreach ($props as $key => $value) {
            $columns[] = $key;
            $binds[] = ':' . $key;
            $params[':' . $key] = $value;
        }

        $sql = 'INSERT INTO ' . static::TABLE . ' (' . implode(', ', $columns) . ') VALUES (' . implode(', ', $binds) . ')';
        $db = new \Db();
        $db->execute($sql, $params);
        $this->id = $db->getLastId();
    }

    public function update()
    {
        $props = get_object_vars($this);
        $binds = [];
        $params = [];

        foreach ($props as $key => $value) {
            $binds[] = $key . ' = :' . $key;
            $params[':' . $key] = $value;
        }

        $sql = 'UPDATE ' . static::TABLE . ' SET ' . implode(', ', $binds) . ' WHERE id = ' . $this->id;
        $db = new \Db();
        $db->execute($sql, $params);
    }

}