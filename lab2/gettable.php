<?php
    /**
     * Отрисовывает таблицу умножения
     *
     * @param int $cols Количество столбцов
     * @param int $rows Количество строк
     * @param string $color Цвет фона заголовков
     * @return int Количество вызовов функции
     */
    function getTable(int $cols = 10, int $rows = 10, string $color = 'yellow'): int {
        static $count = 0;
        $count++;
        
        echo "<table>";
        for ($r = 1; $r <= $rows; $r++) {
            echo "<tr>";
            for ($c = 1; $c <= $cols; $c++) {
                if ($r == 1 || $c == 1) {
                    echo "<th style='background-color: $color;'>" . ($r * $c) . "</th>";
                } else {
                    echo "<td>" . ($r * $c) . "</td>";
                }
            }
            echo "</tr>";
        }
        echo "</table><br>";
        
        return $count;
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Таблица умножения</title>
    <style>
        table {
            border: 2px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid black;
        }

        th {
            background-color: yellow;
        }
    </style>
</head>
<body>
    <h1>Таблица умножения</h1>
    <?php
    // ЗАДАНИЕ 5
    // Вызов без параметров
    getTable();
    
    // Вызов с одним параметром
    getTable(5);
    
    // Вызов с двумя параметрами
    getTable(7, 8);
    
    // Вызов со всеми параметрами
    $callCount = getTable(6, 6, 'lightblue');
    
    echo "<p>Функция getTable() была вызвана $callCount раз(а)</p>";
    ?>
</body>
</html>
