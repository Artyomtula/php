<?php
    // Массив меню
    $leftMenu = [
        ['link' => 'Домой', 'href' => 'index.php'],
        ['link' => 'О нас', 'href' => 'about.php'],
        ['link' => 'Контакты', 'href' => 'contact.php'],
        ['link' => 'Таблица умножения', 'href' => 'table.php'],
        ['link' => 'Калькулятор', 'href' => 'calc.php']
    ];

    /**
     * Отрисовывает меню
     *
     * @param array $menu Массив с элементами меню
     * @param bool $vertical Вертикальное меню (true) или горизонтальное (false)
     * @return void
     */
    function getMenu(array $menu, bool $vertical = true): void {
        $class = $vertical ? 'menu' : 'menu horizontal';
        
        echo "<ul class='$class'>";
        foreach ($menu as $item) {
            echo "<li><a href='{$item['href']}'>{$item['link']}</a></li>";
        }
        echo "</ul>";
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Меню</title>
    <style>
        .menu {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .horizontal li {
            display: inline;
            padding: 5px
        }
    </style>
</head>
<body>
    <h1>Меню</h1>
    <?php
    // ЗАДАНИЕ 3 - Вертикальное меню
    echo "<h2>Вертикальное меню</h2>";
    getMenu($leftMenu);
    
    // ЗАДАНИЕ 4 - Горизонтальное меню
    echo "<h2>Горизонтальное меню</h2>";
    getMenu($leftMenu, false);
    ?>
</body>
</html>
