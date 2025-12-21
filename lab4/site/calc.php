<?php
declare(strict_types=1);

$result = null;
$error = null;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $num1 = filter_input(INPUT_POST, 'num1', FILTER_VALIDATE_FLOAT);
    $num2 = filter_input(INPUT_POST, 'num2', FILTER_VALIDATE_FLOAT);
    $operator = trim(strip_tags($_POST['operator'] ?? ''));
    
    if($num1 !== false && $num2 !== false && $num1 !== null && $num2 !== null){
        switch($operator){
            case '+':
                $result = $num1 + $num2;
                break;
            case '-':
                $result = $num1 - $num2;
                break;
            case '*':
                $result = $num1 * $num2;
                break;
            case '/':
                if($num2 != 0){
                    $result = $num1 / $num2;
                } else {
                    $error = 'Ошибка: деление на ноль!';
                }
                break;
            default:
                $error = 'Неизвестный оператор';
        }
    } else {
        $error = 'Ошибка: введите корректные числа';
    }
}

$num1_value = $_POST['num1'] ?? '';
$num2_value = $_POST['num2'] ?? '';
$operator_value = $_POST['operator'] ?? '+';
?>
<!-- Область основного контента -->
<?php if($result !== null): ?>
    <p><strong>Результат: <?=$result?></strong></p>
<?php endif; ?>

<?php if($error !== null): ?>
    <p style="color: red;"><strong><?=$error?></strong></p>
<?php endif; ?>

<form action='<?=$_SERVER['REQUEST_URI']?>' method='post'>
  <label>Число 1:</label>
  <br>
  <input name='num1' type='text' value='<?=htmlspecialchars($num1_value)?>' required>
  <br>
  <label>Оператор: </label>
  <br>
  <select name='operator'>
    <option value='+' <?=$operator_value == '+' ? 'selected' : ''?>>+</option>
    <option value='-' <?=$operator_value == '-' ? 'selected' : ''?>>-</option>
    <option value='*' <?=$operator_value == '*' ? 'selected' : ''?>>*</option>
    <option value='/' <?=$operator_value == '/' ? 'selected' : ''?>>/</option>
  </select>
  <br>
  <label>Число 2: </label>
  <br>
  <input name='num2' type='text' value='<?=htmlspecialchars($num2_value)?>' required>
  <br>
  <br>
  <input type='submit' value='Считать'>
</form>
<!-- Область основного контента -->