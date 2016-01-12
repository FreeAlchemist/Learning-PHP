<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php
$path=$_GET['path'];
// $path="D:\www";
// $path="D:\www\beta";
// $path="D:\www\phonebook";
// $path="D:\www\exercise";

echo "Указанный каталог: ".$path." содержит:<hr>";

function showpath($path,$depth=0,$foldernum=0){
	$arr = scandir($path);
	foreach ($arr as $key => $value) {
		if(substr($value, 0,1) != "."){
			if (is_dir($path . '/' . $value) == true){
				for ($i=0; $i<$depth; $i++){
					echo " &nbsp; ";
				}
				echo "<b>".$value."</b><br>";
				showpath($path . '/' . $value,$depth+1);
			}
			else {
				for ($i=0; $i<$depth; $i++){
					echo "&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;";
				}
				echo $value."<br>";
			}
		}
	}
}

showpath($path);

?>
</body>
