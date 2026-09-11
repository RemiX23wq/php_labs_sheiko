<?php
header('Content-Type: text/html; charset=utf-8');
$dir = opendir("uploads/");

while ($file = readdir($dir)) {
    if ($file != "." && $file != ".." && $file != ".gitkeep") {
        echo "<a href='uploads/$file' download>$file</a><br>";
    }
}
closedir($dir);
?>