<?php
declare(strict_types=1);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$cols = abs((int) $_POST['cols']);
	$rows = abs((int) $_POST['rows']);
	$color = trim(strip_tags($_POST['color']));
}
$cols = ($cols ?? 0) ? $cols : 10;
$rows = ($rows ?? 0) ? $rows : 10;
$color = ($color ?? '') ? $color : '#ffff00';
?>
<!-- Область основного контента -->
<form action='<?=$_SERVER['REQUEST_URI']?>' method='POST'>
  <label>Количество колонок: </label>
  <br>
  <input name='cols' type='text' value='<?=$cols?>'>
  <br>
  <label>Количество строк: </label>
  <br>
  <input name='rows' type='text' value='<?=$rows?>'>
  <br>
  <label>Цвет: </label>
  <br>
  <input name='color' type='color' value='<?=$color?>'>
  <br>
  <br>
  <input type='submit' value='Создать'>
</form>
<br>
<!-- Таблица -->
<?php getTable($rows, $cols, $color); ?>
<!-- Таблица -->
<!-- Область основного контента -->