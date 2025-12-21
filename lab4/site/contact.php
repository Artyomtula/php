<?php
declare(strict_types=1);

define('USERS_FILE', __DIR__.'/db/users.txt');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['fname'], $_POST['lname'])) {
    $fname = trim(htmlspecialchars($_POST['fname']));
    $lname = trim(htmlspecialchars($_POST['lname']));

    $line = "$lname $fname\n";
    file_put_contents(USERS_FILE, $line, FILE_APPEND);

    header("Location: " . $_SERVER['REQUEST_URI']);
    exit;
}
?>
<!-- Область основного контента -->
<h3>Адрес</h3>
<address>123456 Москва, Малый Американский переулок 21</address>
<h3>Заполните форму</h3>
<form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
  Имя: <input type="text" name="fname" required><br>
  Фамилия: <input type="text" name="lname" required><br>
  <br>
  <input type="submit" value="Отправить!">
</form>

<?php
if (file_exists(USERS_FILE)) {
    $lines = file(USERS_FILE, FILE_IGNORE_NEW_LINES);

    echo '<h3>Список пользователей:</h3>';
    echo '<ol>';
    foreach ($lines as $line) {
        echo '<li>' . htmlspecialchars($line) . '</li>';
    }
    echo '</ol>';

    echo '<p>Размер файла: ' . filesize(USERS_FILE) . ' байт.</p>';
} else {
    echo '<p>Список пользователей пуст.</p>';
}
?>
<!-- Область основного контента -->