<?php
// Анонимная функция для обмена значений
$swap = function(&$a, &$b) {
    $temp = $a;
    $a = $b;
    $b = $temp;
};

// Тест
$a = 5;
$b = 8;
$swap($a, $b);

echo "a = $a<br>";
echo "b = $b<br>";
echo (5 === $b ? 'true' : 'false') . "<br>";
echo (8 === $a ? 'true' : 'false') . "<br>";
?>
