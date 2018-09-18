<?php

require_once ('db.php');

$sql = "CREATE TABLE news (id int (10) AUTO_INCREMENT, title varchar(100) NOT NULL, text text NOT NULL, views int NOT NULL DEFAULT 0, PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8";

$newTable = $pdo->prepare($sql);
$newTable->execute();