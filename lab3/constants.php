<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Константы PHP</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <h1>Все определённые константы PHP</h1>
    
    <?php
    $constants = get_defined_constants(true);
    $totalCount = 0;
    
    foreach ($constants as $category => $consts) {
        echo "<h2>$category (" . count($consts) . " констант)</h2>";
        echo "<table>";
        echo "<tr><th>Имя константы</th><th>Значение</th></tr>";
        
        foreach ($consts as $name => $value) {
            $valueStr = is_array($value) ? 'Array' : var_export($value, true);
            echo "<tr><td>$name</td><td>" . htmlspecialchars($valueStr) . "</td></tr>";
            $totalCount++;
        }
        
        echo "</table><br>";
    }
    
    echo "<h2>Всего констант: $totalCount</h2>";
    ?>
</body>
</html>
