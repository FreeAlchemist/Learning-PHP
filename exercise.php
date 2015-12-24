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
$n=10;
$text="Hello World!";
for ($i = 1; $i <= $n; $i++) {

print($i.": ".$text);
echo "<br>";
}

//Exercise 03
echo "<hr>Exercise 03<br>";
$n=10;
$fib = array(1,1);
print_r($fib);
echo "<br>";
for ($i = 2; $i < $n; $i++) {
	$tmp1 = $fib[$i - 2];
	$tmp2 = $fib[$i - 1];
	$fib[$i] = $tmp1+$tmp2;
}
print_r($fib);

//Exercise 05
echo "<hr>Exercise 05<br>";

// $str1="строка для анализа";
// echo mb_detect_encoding($str1);
// print($str1."<br>");

$str2 = "Two Ts and one F.
Gone for a: walk ;

today";

echo("<pre>Two Ts and one F.
Gone for a: walk;
today</pre>");

print($str2."<br>");

foreach (count_chars($str2, 1) as $i => $val) {
   echo "\"" , chr($i) , "\" встречается в строке $val раз(а).\n<br>";
}

//Exercise 06
echo "<hr>Exercise 06<br>";


?>
