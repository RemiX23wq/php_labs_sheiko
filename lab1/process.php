<?php
header('Content-Type: text/html; charset=utf-8');

if ($_POST['fname'] != "" && $_POST['lname'] != "") {
    $n = $_POST['fname'];
    $s = $_POST['lname'];
    echo "Привіт, " . $n . " " . $s . "!";
} else {
    echo "Ти нічого не ввів.";
}
?>