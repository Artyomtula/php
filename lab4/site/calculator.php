<?php
declare(strict_types=1);

/*
ЗАДАНИЕ 1
- Проверьте, была ли корректно отправлена форма
- Если она была отправлена, отфильтруйте полученные значения
- В зависимости от оператора производите различные математические действия
- В случае деления, проверьте, делитель на равенство с нулем (на ноль делить нельзя)
- Сохраните полученный результат вычисления в переменной
*/

$result = null;
$error = null;
$num1_value = '';
$num2_value = '';
$operator_value = '+';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Фильтрация полученных значений
    $num1 = filter_input(INPUT_POST, 'num1', FILTER_VALIDATE_FLOAT);
    $num2 = filter_input(INPUT_POST, 'num2', FILTER_VALIDATE_FLOAT);
    $operator = trim(strip_tags($_POST['operator'] ?? ''));
    
    // Сохраняем введённые значения для отображения в форме
    $num1_value = $_POST['num1'] ?? '';
    $num2_value = $_POST['num2'] ?? '';
    $operator_value = $operator;
    
    // Проверяем корректность введённых чисел
    if($num1 !== false && $num2 !== false && $num1 !== null && $num2 !== null){
        // Выполняем вычисления в зависимости от оператора
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
                // Проверка деления на ноль
                if($num2 != 0){
                    $result = $num1 / $num2;
                } else {
                    $error = 'Ошибка: деление на ноль невозможно!';
                }
                break;
            default:
                $error = 'Неизвестный оператор';
        }
    } else {
        $error = 'Ошибка: введите корректные числа';
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Калькулятор</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			max-width: 500px;
			margin: 50px auto;
			padding: 20px;
		}
		input[type="text"], select {
			width: 100%;
			padding: 8px;
			margin: 5px 0 15px 0;
			box-sizing: border-box;
		}
		button {
			background-color: #4CAF50;
			color: white;
			padding: 10px 20px;
			border: none;
			cursor: pointer;
			font-size: 16px;
		}
		button:hover {
			background-color: #45a049;
		}
		.result {
			background-color: #e7f3e7;
			padding: 15px;
			margin: 20px 0;
			border-left: 4px solid #4CAF50;
			font-size: 18px;
		}
		.error {
			background-color: #f8d7da;
			padding: 15px;
			margin: 20px 0;
			border-left: 4px solid #dc3545;
			color: #721c24;
		}
	</style>
</head>
<body>

<h1>Калькулятор</h1>

<?php
/*
ЗАДАНИЕ 2
- Если результат существует, выведите его
*/

if($result !== null): ?>
    <div class="result">
        <strong>Результат: <?=$result?></strong>
    </div>
<?php endif; ?>

<?php if($error !== null): ?>
    <div class="error">
        <strong><?=$error?></strong>
    </div>
<?php endif; ?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

<p><label for="num1">Число 1</label><br>
<input type="text" name="num1" id="num1" value="<?=htmlspecialchars($num1_value)?>" required></p>

<p><label for="operator">Оператор</label><br>
<select name="operator" id="operator">
    <option value="+" <?=$operator_value == '+' ? 'selected' : ''?>>+</option>
    <option value="-" <?=$operator_value == '-' ? 'selected' : ''?>>-</option>
    <option value="*" <?=$operator_value == '*' ? 'selected' : ''?>>*</option>
    <option value="/" <?=$operator_value == '/' ? 'selected' : ''?>>/</option>
</select></p>

<p><label for="num2">Число 2</label><br>
<input type="text" name="num2" id="num2" value="<?=htmlspecialchars($num2_value)?>" required></p>

<button type="submit">Считать!</button>

</form>

</body>
</html>