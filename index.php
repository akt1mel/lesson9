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
        <li><a href="showTable.php?table=<?=$table["Tables_in_netology"]?>"><?= $table["Tables_in_netology"]?></a></li>
        <?php endforeach; ?>
    </ul>

</body>
</html>
