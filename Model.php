<?php


abstract class Model
{

    protected const TABLE = '';

    public int $id;

    public static function findAll(): array
    {
        $db = new \DB();
        $sql = 'SELECT * FROM ' . static::TABLE;
        return $db->query($sql, static::class);
    }

}