<!DOCTYPE html>
<html>
<head>
<meta charset="windows-cp1251">
<link rel=Stylesheet href="10.css">
</head>
<body>
	
<?php
if (file_exists('10.xml')) {
    $xml = simplexml_load_file('10.xml');
 
    // print_r($xml);
} else {
    exit('Failed to open test.xml.');
}
echo "<table>";
	echo "<tr>
		<td>ФИО</td>
		<td>Телефон</td>
		<td>Дата рождения</td>
		<td>Адрес</td>
		</tr>";
foreach ($xml as $key => $value) {
	// print_r($key);
	// print_r($value);
	// echo "<a href=\"$uploadfile\"; target=\"blank\">".$value->fio->lastname."</a>";
		
	echo "<tr>";
	echo "<td>";
	echo "<a href=\"10form.php\"; target=\"_self\" id=".$value['id'].">"
	    .iconv("UTF-8","cp1251",$value->fio->lastname)." "
	    .iconv("UTF-8","cp1251",$value->fio->firstname)." "
	    .iconv("UTF-8","cp1251",$value->fio->surname)."</a>";
	echo "</td>";
	echo "<td>";
	echo $value->phone;
	echo "</td>";
	echo "<td>";
	echo iconv("UTF-8","cp1251",$value->birthdate->day)."."
		.iconv("UTF-8","cp1251",$value->birthdate->month)."."
		.iconv("UTF-8","cp1251",$value->birthdate->year);
	echo "</td>";
	echo "<td>";
	echo iconv("UTF-8","cp1251",$value->adress->country).", "
		.iconv("UTF-8","cp1251",$value->adress->city);
	echo "</td>";
	echo "</tr>";
	
}
echo "</table>";
// header('Location:10form.php');
?>
</body>
