<?php

class Db
{

    protected PDO $dbh;

    public function __construct()
    {
        $this->dbh = new \PDO('pgsql:host=localhost;dbname=profit', 'postgres', '');
    }

    public function query(string $sql, string $class, array $params = []): array
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(PDO::FETCH_CLASS, $class);
    }

    public function execute(string $sql): bool
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute();
    }

}