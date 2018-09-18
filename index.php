<?php
require_once ('db.php');

$sql = "SHOW TABLES";

$showTables = $pdo->prepare($sql);
$showTables->execute();

?>


<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Управление таблицами</title>
</head>
<body>
    <h2>Текущие таблицы базы данных <?= $db ?></h2>
    <ul>
        <?php foreach ($showTables as $table): ?>
        <li><a href=""><?= var_dump($table)?></a></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
