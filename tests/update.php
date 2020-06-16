<?php

require __DIR__ . '/../Db.php';

$db = new Db();
$sql = 'UPDATE products SET price = :price WHERE id = :id';
$result = $db->execute($sql, [':id' => 3, ':price' => 25000]);

var_dump($result);