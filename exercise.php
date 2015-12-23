<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>	
</body>
<?php

//Exercise 01
echo "<hr>Exercise 01<br>";
$n=5;
$text="Hello World!";
for ($i = 1; $i <= $n; $i++) {

print($i.": ".$text);
echo "<br>";
}

//Exercise 05
echo "<hr>Exercise 05<br>";

// $str1="строка для анализа";
// echo mb_detect_encoding($str1);
// print($str1);

$str2 = "Two Ts and one F.	Gone for a: walk;
today";
print($str2);

foreach (count_chars($str2, 1) as $i => $val) {
   echo "\"" , chr($i) , "\" встречается в строке $val раз(а).\n<br>";
}

?>
