<?php

use App\Config;

class Db
{

    protected PDO $dbh;

    public function __construct()
    {
        $config = new Config();
        $this->dbh = new \PDO(
            'pgsql:host=' . $config->data['db']['host'] . ';dbname=' . $config->data['db']['dbname'] . '',
            $config->data['db']['username'],
            $config->data['db']['passwd']
        );
    }

    public function query(string $sql, string $class, array $params = []): array
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(PDO::FETCH_CLASS, $class);
    }

    public function execute(string $sql, array $params = []): bool
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }

}