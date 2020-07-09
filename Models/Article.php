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

    protected function validateTitle($title)
    {
        if (empty($title)) {
            throw new \Exception('Заголовок новости необходимо заполнить');
        }
    }

    protected function validateContent($content)
    {
        if (empty($content)) {
            throw new \Exception('Текст новости необходимо заполнить');
        }
    }

    protected function validateDate($date)
    {
        if (empty($date)) {
            throw new \Exception('Дату необходимо заполнить');
        }

        $validDate = \DateTime::createFromFormat('Y-m-d G:i:s', $date);

        if (!$validDate) {
            throw new \Exception('Неверный формат даты');
        }
    }
}