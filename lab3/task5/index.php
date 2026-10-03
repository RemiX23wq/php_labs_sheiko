<?php
session_start();

if (isset($_SESSION['last_activity'])) {
    $inactive_time = time() - $_SESSION['last_activity'];
    
    if ($inactive_time > 300) {
        session_unset();
        session_destroy();
        echo "Сесія завершена через неактивність понад 5 хвилин.<br>";
    } else {
        echo "Сесія активна.<br>";
    }
} else {
    echo "Сесія тільки почалася.<br>";
}

$_SESSION['last_activity'] = time();
echo '<br><a href="index.php">Оновити сторінку</a>';
?>