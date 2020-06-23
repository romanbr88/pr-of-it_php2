<?php


namespace Models;


class Author extends \Model
{

    /**
     * Имя таблицы в БД
     */
    protected const TABLE = 'authors';

    /**
     * @var string Имя автора
     */
    public string $name;

}