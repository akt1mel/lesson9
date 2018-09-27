<?php
require_once ('db.php');

if(isset($_POST['submit'])) {
  $sql = "ALTER TABLE ".$_POST['tableName']." MODIFY ".$_POST['fieldName']." ".$_POST['type'];
  $changeColumnType = $pdo->prepare($sql);
  $changeColumnType->execute();

  echo $sql;
  header("Location: showTable.php?table=".$_POST['tableName']);
}



?>

<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Управление таблицами</title>
  </head>
  <body>
    <h2>Таблица <?= $_GET['table'] ?></h2>
    <h3>Изменение поля <?= $_GET['field'] ?></h3>
    <form method="post">
      <label for="type">Введите тип поля</label>
      <input type="hidden" name="tableName" value=<?= $_GET['table']?>>
      <input type="hidden" name="fieldName" value=<?= $_GET['field']?>>
      <input type="text" name="type" id="type" placeholder="например varchar(201)">
      <input type="submit" name="submit" value="Применить" >
    </form>
  </body>
</html>
