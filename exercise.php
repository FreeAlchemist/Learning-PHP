<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>	
</body>
<?php

// echo "<hr>Exercise 01<br>";
// $n=10;
// $text="Hello World!";
// for ($i = 1; $i <= $n; $i++) {

// print($i.": ".$text);
// echo "<br>";
// }

// echo "<hr>Exercise 02<br>";
// $n=3;
// function fact($n){
// 	if ($n==1) {return 1;}
// return $n*fact($n-1);
// }
// echo fact($n);

// echo "<hr>Exercise 03<br>";
// $n=10;
// $fib = array(1,1);
// print_r($fib);
// echo "<br>";
// for ($i = 2; $i < $n; $i++) {
// 	$tmp1 = $fib[$i - 2];
// 	$tmp2 = $fib[$i - 1];
// 	$fib[$i] = $tmp1+$tmp2;
// }
// print_r($fib);

// echo "<hr>Exercise 04<br>";
// class Animal
// {
// 	public $food='leaves';
// 	public function eat (){
// 		$f="food";
// 		echo "Eats: ".$this->$f."<hr>";
// 	}

// 	function __construct() {
			
// 	      print "Конструктор класса Animal<br>";
// 	  }
// }

// class Mammal extends Animal
// {
// 	public $food='milk';
// 	function __construct() {
// 	       parent::__construct();
// 	       print "Конструктор класса Mammal<br>";
// 	   }
// }

// class Predator extends Mammal
// {
// 	public $food='meat';
// 	function __construct() {
// 	       parent::__construct();
// 	       print "Конструктор класса Predator<br>";
// 	   }
// }

// class Cat extends Predator
// {
// 	public $food='fish';
// 	function __construct() {
// 	       parent::__construct();
// 	       print "Конструктор класса Cat<br>";
// 	   }
// }

// $petr = new Animal();
// $petr->eat();

// $stepan = new Mammal();
// $stepan->eat();

// $ivan = new Predator();
// $ivan->eat();

// $sveta = new CAt();
// $sveta->eat();

echo "<hr>Exercise 05<br>";
$str2 = "Two Ts and one F.
Gone 	for a: walk ;
today";
print($str2."<br>");

$str=str_split($str2);
print_r($str);
$strcount = array();
$wordcount = array();
$nocount=array('.',',',' ',"\t","\n","\r",';',':');
foreach ($str as $key => $value) {
	if (array_search($value, $nocount)===false) {
		if (array_key_exists($value, $strcount)) {
				$strcount[$value]++;
			}
			else{
				$strcount[$value]=1;
			}

		$word .= $value;
	}
	else{
		if (strlen($word)>0) {
		$wordcount[]=$word;
		}
		$word='';
	}
}

echo "<hr>Считаем символы: <br>";
print_r($strcount);

echo "<hr>Считаем слова: <br>";
print_r($wordcount);
print_r(sizeof($wordcount));



?>
