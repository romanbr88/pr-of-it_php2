<?php

require __DIR__ . '/../Db.php';

$db = new Db();
$sql = 'INSERT INTO products (title, price) VALUES (:title, :price)';
$result = $db->execute($sql, [':title' => 'Samsung Galaxy', ':price' => 30000]);

var_dump($result);