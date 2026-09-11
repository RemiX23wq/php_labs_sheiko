<?php
header('Content-Type: text/html; charset=utf-8');
$txt = $_POST['log_text'];

if ($txt != "") {
    file_put_contents("log.txt", $txt . "\n", FILE_APPEND);
    echo "Записано!<br><br>";
}

if (file_exists("log.txt")) {
    $content = file_get_contents("log.txt");
    echo "<pre>" . $content . "</pre>";
}
?>