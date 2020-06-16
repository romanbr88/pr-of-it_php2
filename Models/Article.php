<?php


namespace Models;


class Article extends \Model
{

    protected const TABLE = 'news';

    public string $title;
    public string $content;
    public string $date;

    public static function getLastNews(): array
    {
        $db = new \Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER BY id DESC LIMIT 3';
        return $db->query($sql, static::class);
    }

}