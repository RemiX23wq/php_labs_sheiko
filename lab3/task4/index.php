<?php
session_start();

if (isset($_POST['item'])) {
    $item = $_POST['item'];
    
    $_SESSION['cart'][] = $item;
    
    $history = array();
    if (isset($_COOKIE['history'])) {
        $history = unserialize($_COOKIE['history']);
    }
    $history[] = $item;
    setcookie('history', serialize($history), time() + 3600);
    
    header("Location: index.php");
    exit;
}

echo "<b>Поточна корзина (Сесія):</b><br>";
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $value) {
        echo "- " . $value . "<br>";
    }
}

echo "<br><b>Минулі покупки (Кукі):</b><br>";
if (isset($_COOKIE['history'])) {
    $history_data = unserialize($_COOKIE['history']);
    foreach ($history_data as $value) {
        echo "- " . $value . "<br>";
    }
}

echo '<br><form method="POST">Товар: <input type="text" name="item"><input type="submit" value="Додати"></form>';
?>