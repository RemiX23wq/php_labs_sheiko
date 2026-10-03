<?php
if (isset($_POST['delete'])) {
    setcookie('username', '', time() - 3600);
    header("Location: index.php");
    exit;
}

if (isset($_POST['username'])) {
    setcookie('username', $_POST['username'], time() + (7 * 24 * 60 * 60)); // 7 днів
    header("Location: index.php");
    exit;
}

if (isset($_COOKIE['username'])) {
    echo "Привіт, " . $_COOKIE['username'] . "<br>";
    echo '<form method="POST"><input type="submit" name="delete" value="Видалити cookie"></form>';
} else {
    echo '<form method="POST">';
    echo 'Ім\'я: <input type="text" name="username">';
    echo '<input type="submit" value="Зберегти">';
    echo '</form>';
}
?>