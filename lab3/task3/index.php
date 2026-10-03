<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    if (!isset($_GET['redirected'])) {
        header("Location: index.php?redirected=1");
        exit;
    }
}

echo "IP-адреса клієнта: " . $_SERVER['REMOTE_ADDR'] . "<br>";
echo "Браузер: " . $_SERVER['HTTP_USER_AGENT'] . "<br>";
echo "Скрипт: " . $_SERVER['PHP_SELF'] . "<br>";
echo "Метод запиту: " . $_SERVER['REQUEST_METHOD'] . "<br>";
echo "Шлях до файлу: " . $_SERVER['SCRIPT_FILENAME'] . "<br><br>";

echo '<form method="POST"><input type="submit" value="Зробити POST запит"></form>';
?>