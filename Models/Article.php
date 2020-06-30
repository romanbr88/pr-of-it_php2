<?php


namespace Models;


class Article extends \Model
{

    /**
     * Имя таблицы в БД
     */
    protected const TABLE = 'news';

    /**
     * @var string Заголовок новости
     */
    public string $title;

    /**
     * @var string Тело новости
     */
    public string $content;

    /**
     * @var string Дата новости
     */
    public string $date;

    /**
     * @var int id автора новости
     */
    public ?int $author_id;

    public function __get($name)
    {
        if ($name === 'author' && isset($this->author_id)) {
            return Author::findById($this->author_id);
        }
        return null;
    }

    /**
     * Возвращает список последних новостей
     *
     * @param int $count количество возвращаемых новостей
     * @return array массив с новостями
     */
    public static function getLastNews(int $count): array
    {
        $db = new \Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER BY id DESC LIMIT :count';
        return $db->query($sql, static::class, [':count' => $count]);
    }

}