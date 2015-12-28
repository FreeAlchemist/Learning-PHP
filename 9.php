<!DOCTYPE html>
<html>
<head>
<meta charset="windows-cp1251">
</head>
<body>

<form method='post' enctype='multipart/form-data' action='9.php'>
    File: <input type='file' name='file_upload'>
    <input type='submit'>
</form>
<hr>


<?php
$uploaddir = './uploads/';
$uploadfile = $uploaddir . "9.txt";

echo '<pre>';
if (move_uploaded_file($_FILES['file_upload']['tmp_name'], $uploadfile)) {
    echo "Файл корректен и был успешно загружен.\n";
} else {
    echo "Возможная атака с помощью файловой загрузки!\n";
}

print_r($_POST);
if (!empty($_POST["filetext"])) {
file_put_contents($uploadfile, $_POST["filetext"]);
}

$content=file_get_contents($uploadfile);
// echo $content;
// $POST[filetext]=$content;

echo 'Некоторая отладочная информация:';
print_r($_FILES);

print "</pre>";



?>
<form method="post" action='9.php'>
	<textarea name="filetext" value="place for text">
		<?=$content;?>
	</textarea>
	 <input type='submit'>
	 <a href=<?=$uploadfile;?>>Скачать</a>
</form>


</body>
