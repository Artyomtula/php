<?php
declare(strict_types=1);

/**
 * Автозагрузчик классов
 */
spl_autoload_register(function ($className) {
    // Преобразуем пространство имен в путь к файлу
    $filePath = str_replace('App\\Classes\\', 'src/Classes/', $className) . '.php';

    if (file_exists($filePath)) {
        require_once $filePath;
        return true;
    }
    return false;
});

use App\Classes\User;
use App\Classes\SuperUser;

echo "<h1>Демонстрация работы с классами</h1>";

// Создаем обычных пользователей
echo "<h2>Обычные пользователи:</h2>";
$user1 = new User("Артем Артемов", "artemov", "artem2024");
$user2 = new User("Иван Иванов", "ivanov", "ivan1234");
$user3 = new User("Анна Смирнова", "smirnova", "anna5678");

// Выводим информацию о пользователях
$user1->showInfo();
$user2->showInfo();
$user3->showInfo();

// Создаем суперпользователя
echo "<h2>Суперпользователь:</h2>";
$superUser = new SuperUser("Администратор", "admin", "admin123", "Супер-администратор");

// Выводим информацию о суперпользователе
$superUser->showInfo();

echo "<p>Скрипт завершен. Объекты будут уничтожены автоматически.</p>";
?>