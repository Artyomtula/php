<?php
require_once 'inc/lib.inc.php';
require_once 'inc/data.inc.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Таблица умножения</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <?php include 'inc/top.inc.php'; ?>
  </header>
  <section>
    <h1>Таблица умножения</h1>
    <form>
      <label>Количество колонок: </label>
      <br>
      <input name='cols' type='text' value='<?= $cols ?>'>
      <br>
      <label>Количество строк: </label>
      <br>
      <input name='rows' type='text' value='<?= $rows ?>'>
      <br>
      <label>Цвет: </label>
      <br>
      <input name='color' type='color' value='<?= $color ?>'>
      <br>
      <br>
      <input type='submit' value='Создать'>
    </form>
    <br>
    <!-- Таблица -->
    <?php getTable((int)$rows, (int)$cols, (string)$color); ?>
    <!-- Таблица -->
  </section>
  <nav>
    <?php include 'inc/menu.inc.php'; ?>
  </nav>
  <footer>
    <?php include 'inc/bottom.inc.php'; ?>
  </footer>
</body>
</html>