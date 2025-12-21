<?php
declare(strict_types=1);

/**
 * Генерирует HTML меню из массива
 * 
 * @param array $menu Массив пунктов меню
 * @param bool $vertical Флаг вертикального отображения
 * @return string HTML код меню
 */
function getMenu(array $menu, bool $vertical = true): string
{
    $cssClass = $vertical ? 'menu vertical' : 'menu horizontal';
    $html = "<ul class=\"$cssClass\">";
    
    foreach ($menu as $menuItem) {
        $html .= "<li><a href='{$menuItem['href']}'>{$menuItem['link']}</a></li>";
    }
    
    $html .= '</ul>';
    return $html;
}

/**
 * Генерирует HTML таблицу умножения
 * 
 * @param int $rows Количество строк
 * @param int $cols Количество столбцов
 * @param string $color Цвет фона заголовков
 * @return int Количество вызовов функции
 */
function getTable(int $rows = 5, int $cols = 5, string $color = 'yellow'): int
{
    static $count = 0;
    $count++;
    
    $html = '<table>';
    
    for ($i = 1; $i <= $rows; $i++) {
        $html .= '<tr>';
        for ($j = 1; $j <= $cols; $j++) {
            if ($i === 1 || $j === 1) {
                $html .= "<th style='background-color: $color;'>" . ($i * $j) . "</th>";
            } else {
                $html .= "<td>" . ($i * $j) . "</td>";
            }
        }
        $html .= '</tr>';
    }
    
    $html .= '</table>';
    echo $html;
    
    return $count;
}
?>