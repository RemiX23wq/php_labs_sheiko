<?php
header('Content-Type: text/html; charset=utf-8');
$f = $_FILES['user_file'];

if ($f['name'] != "") {
    $name = $f['name'];
    $size = $f['size'];
    $tmp = $f['tmp_name'];
    
    if ($size < 2000000) {
        $path = "uploads/" . $name;
        
        if (file_exists($path)) {
            $name = time() . "_" . $name;
            $path = "uploads/" . $name;
        }
        
        move_uploaded_file($tmp, $path);
        
        echo "Файл завантажено!<br>";
        echo "Назва: " . $name . "<br>";
        echo "Розмір: " . $size . " байт<br>";
        echo "<a href='$path' download>Скачати назад</a>";
    } else {
        echo "Файл завеликий!";
    }
} else {
    echo "Помилка.";
}
?>