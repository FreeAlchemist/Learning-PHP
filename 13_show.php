<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php
$dir=$_GET['dir'];
echo "Указанный каталог: ".$dir." содержит:<hr>";


if ($handle = opendir($dir)) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            echo "$entry<br>";
            
        }
    }
    closedir($handle);
}

echo "<hr>";

// echo "Работаем в каталоге: ".getcwd() . "<br>";

$files = scandir($dir);

foreach ($files as $key => $value) {
	if(is_dir($value)){
		echo "\\".$value;
		 $files1 = scandir($value);
		 foreach ($files1 as $key => $value) {
		 	echo "\\".$value."<br>";
		 }
		 echo "<br>";
		
	}
	// else{echo "not dir<br>";}
}
//is_dir(filename);

echo "<hr>";
print_r($files);
?>
</body>
