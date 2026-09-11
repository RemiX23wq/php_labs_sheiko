<?php
echo "Hello, World!<br>";

$str = "Варіант";
$num = 14; 
$f = 14.5;
$b = true;

echo $str . " " . $num . "<br>";
var_dump($str, $num, $f, $b);
echo "<br><br>";

$s1 = "Привіт, ";
$s2 = "Світ!";
echo $s1 . $s2 . "<br><br>";

$v = 14;
if ($v % 2 == 0) {
    echo "Число парне<br><br>";
} else {
    echo "Число непарне<br><br>";
}

for ($i = 1; $i <= 10; $i++) {
    echo $i . " ";
}
echo "<br>";

$j = 10;
while ($j >= 1) {
    echo $j . " ";
    $j--;
}
echo "<br><br>";

$arr = array(
    "name" => "Дмитро",
    "surname" => "Шейко",
    "age" => 19,
    "spec" => "КН"
);

foreach ($arr as $k => $v) {
    echo $k . " - " . $v . "<br>";
}

$arr["bal"] = 90;
echo "<br>";
var_dump($arr);
?>