<?php

use Exceptions\ValidationException;
use RomanBR\MultiException\MultiException;

abstract class Model
{
    protected const TABLE = '';

    /**
     * @var int id записи
     */
    public int $id;

    /**
     * Возвращает все записи из таблицы
     *
     * @return array Массив из объектов всех записей таблицы
     */
    public static function findAll(): iterable
    {
        $db = new \Db();
        $sql = 'SELECT * FROM ' . static::TABLE;
        return $db->queryEach($sql, static::class);
    }

    /**
     * Возвращает одну запись из таблицы
     *
     * @param int $id id записи которую необходимо вернуть
     * @return bool|mixed Объект необходимой записи, или false в случае ее отсутствия
     */
    public static function findById(int $id)
    {
        $db = new \Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id = :id LIMIT 1';
        $result = $db->query($sql, static::class, [':id' => $id]);
        return empty($result) ? false : $result[0];
    }

    /**
     * Записывает данные в БД
     */
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
        return $this->id = $db->getLastId();
    }

    /**
     * Обновляет данные в БД
     */
    public function update()
    {
        $props = get_object_vars($this);
        $binds = [];
        $params = [];

        foreach ($props as $key => $value) {
            if ($key !== 'id') {
                $binds[] = $key . ' = :' . $key;
            }
            $params[':' . $key] = $value;
        }

        $sql = 'UPDATE ' . static::TABLE . ' SET ' . implode(', ', $binds) . ' WHERE id = :id';
        $db = new \Db();
        return $db->execute($sql, $params);
    }

    /**
     * Записывает или обновляет данные в БД
     */
    public function save()
    {
        if (isset($this->id)) {
            return $this->update();
        }
        return $this->insert();
    }

    /**
     * Удаляет данные из БД
     */
    public function delete()
    {
        $sql = "DELETE FROM " . static::TABLE . ' WHERE id = :id';
        $db = new \Db();
        return $db->execute($sql, [':id' => $this->id]);
    }

    /**
     * Заполняет свойства модели данными из массива и по возможности валидирует их
     *
     * @param array $data массив с данными
     */
    public function fill(array $data)
    {
        $errors = new MultiException();

        foreach ($data as $key => $val) {
            $validateMethod = 'validate' . ucfirst($key);

            if (method_exists($this, $validateMethod)) {
                try {
                    $this->$validateMethod($val);
                } catch (Throwable $e) {
                    $errors->addError(new ValidationException($e->getMessage()));
                }
            }

            $this->$key = $val;
        }

        if (count($errors) > 0) {
            throw $errors;
        }
    }
}