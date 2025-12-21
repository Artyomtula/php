<?php
// Функция map
function map(array $array, callable $callback): array {
    $result = [];
    foreach ($array as $item) {
        $result[] = $callback($item);
    }
    return $result;
}

// Тест со стрелочной функцией
$numbers = [1, 2, 3, 4, 5];
$squared = map($numbers, fn($n) => $n * $n);

echo "Исходный массив: " . implode(', ', $numbers) . "<br>";
echo "Возведённые в квадрат: " . implode(', ', $squared) . "<br>";
?>
