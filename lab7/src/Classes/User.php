<?php
declare(strict_types=1);

namespace App\Classes;

/**
 * Класс User
 *
 * Представляет пользователя системы с базовыми свойствами и методами
 *
 * @package App\Classes
 */
class User {
    public string $name;
    public string $login;
    private string $password;

    /**
     * Конструктор класса User
     * @param string $name Имя пользователя
     * @param string $login Логин пользователя
     * @param string $password Пароль пользователя
     */
    public function __construct(string $name, string $login, string $password) {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
        echo "Пользователь {$this->login} создан<br>";
    }

    /**
     * Выводит информацию о пользователе
     *
     * @return void
     */
    public function showInfo(): void {
        echo "<div style='border: 1px solid #ccc; padding: 10px; margin: 10px;'>";
        echo "<h3>Информация о пользователе:</h3>";
        echo "<p><strong>Имя:</strong> {$this->name}</p>";
        echo "<p><strong>Логин:</strong> {$this->login}</p>";
        echo "<p><strong>Пароль:</strong> ******</p>";
        echo "</div>";
    }

    /**
     * Деструктор класса User
     *
     * @return void
     */
    public function __destruct() {
        echo "Пользователь {$this->login} удален<br>";
    }
}
?>