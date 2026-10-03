<?php
session_start();

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit;
}

if (isset($_POST['login']) && isset($_POST['password'])) {
    if ($_POST['login'] == 'admin' && $_POST['password'] == '14') {
        $_SESSION['user'] = 'admin';
    }
}

if (isset($_SESSION['user'])) {
    echo "Привіт, " . $_SESSION['user'] . "<br>";
    echo '<form method="POST"><input type="submit" name="logout" value="Вихід"></form>';
} else {
    echo '<form method="POST">';
    echo 'Логін: <input type="text" name="login"><br>';
    echo 'Пароль: <input type="password" name="password"><br>';
    echo '<input type="submit" value="Увійти">';
    echo '</form>';
}
?>