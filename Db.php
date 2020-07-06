<?php

use App\Config;
use Exceptions\DbException;

class Db
{

    protected PDO $dbh;

    public function __construct()
    {
        $config = Config::instance();
        try {
            $this->dbh = new \PDO(
                'pgsql:host=' . $config->data['db']['host'] . ';dbname=' . $config->data['db']['dbname'] . '',
                $config->data['db']['username'],
                $config->data['db']['passwd']
            );
        } catch (Throwable $ex) {
            throw new DbException('Ошибка соединения с БД: ' . $ex->getMessage());
        }
    }

    public function query(string $sql, string $class, array $params = []): array
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($params);
        if (!$res) {
            throw new DbException('Ошибка выполнения запроса: ' . $sql);
        }
        return $sth->fetchAll(PDO::FETCH_CLASS, $class);
    }

    public function execute(string $sql, array $params = []): bool
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($params);
        if (!$res) {
            throw new DbException('Ошибка выполнения запроса: ' . $sql);
        }
        return $res;
    }

    public function getLastId()
    {
        return $this->dbh->lastInsertId();
    }

}