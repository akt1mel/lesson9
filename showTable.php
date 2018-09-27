<?php
require_once ('db.php');

$sql = "DESCRIBE ".$_GET['table'];

$showTable = $pdo->prepare($sql);
$showTable->execute();


if(isset($_GET['del'])) {

    $sql = "ALTER TABLE ".$_GET['table']." DROP COLUMN ".$_GET['del'];
    $delColumn = $pdo->prepare($sql);
    $delColumn->execute();
    header('Location: showTable.php?table='.$_GET['table']);
}

?>


<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Управление таблицами</title>
</head>
<body>
    <h2>Таблица <?= $_GET['table'] ?></h2>
    <table border="1">
      <tr>
        <th>Field</th>
        <th>Type</th>
        <th>Null</th>
        <th>Key</th>
        <th>Default</th>
        <th>Extra</th>
      </tr>
      <?php foreach ($showTable as $table): ?>
        <tr>
          <td><?= $table['Field']?></td>
          <td><?= $table['Type']?></td>
          <td><?= $table['Null']?></td>
          <td><?= $table['Key']?></td>
          <td><?= $table['Default']?></td>
          <td><?= $table['Extra']?></td>
          <td> <a href="changeField.php?table=<?=$_GET['table']?>&field=<?=$table['Field']?>">Изменить</a> </td>
          <td> <a href="showTable.php?del=<?= $table['Field']?>&table=<?=$_GET['table']?>">Удалить</a> </td>
        </tr>
      <?php endforeach; ?>
    </table>
    <a href="index.php">На главную</a>

</body>
</html>
