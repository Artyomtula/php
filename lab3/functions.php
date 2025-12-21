<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Функции PHP по модулям</title>
    <style>
        .module {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            padding: 10px;
        }
        .module h2 {
            background-color: #f0f0f0;
            padding: 5px;
        }
        ul {
            column-count: 3;
        }
    </style>
</head>
<body>
    <h1>Функции PHP по загруженным модулям</h1>
    
    <?php
    $extensions = get_loaded_extensions();
    $totalFunctions = 0;
    
    foreach ($extensions as $extension) {
        $functions = get_extension_funcs($extension);
        
        echo "<div class='module'>";
        echo "<h2>$extension";
        
        if ($functions !== false) {
            $count = count($functions);
            echo " ($count функций)";
            $totalFunctions += $count;
            
            echo "</h2><ul>";
            foreach ($functions as $function) {
                echo "<li>$function</li>";
            }
            echo "</ul>";
        } else {
            echo " (нет функций)</h2>";
        }
        
        echo "</div>";
    }
    
    echo "<h2>Всего функций: $totalFunctions</h2>";
    ?>
</body>
</html>
