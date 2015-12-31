<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel=Stylesheet href="10.css">
</head>
	<body>
	<?php
	echo "GET[id]: ";
	echo $_GET['id'];
	echo "<br>";
	echo "filename: ";
	echo $_GET['filename'];
	$id=$_GET['id'];
	$filename=$_GET['filename'];
	$lastname;
	$firstname;
	$surname;
	$phone;

	// $filename="10.xml";
	if (file_exists($filename)) {
	    $xml = simplexml_load_file($filename);
	    // print_r($xml);
	} else {
	    exit('Failed to open !'.$filename."!");
	}
	$maxid=0;
	foreach ($xml as $key => $value) {
		if ($value['id']==$id) {
				
			echo '<form method="post" action="10postxml.php">
				<input type="reset">
				<table>
					<tr>
						<td>Фамилия</td>
						<td>Имя</td>
						<td>Отчество</td>
						<td>Телефон</td>
						<td>Дата рождения</td>
					</tr>
					<tr>';
			echo '<td><input type="text" name="lastname" value="'.$value->fio->lastname.'"></td>';
			echo '<td><input type="text" name="firstname" placeholder="Иван" value="'.$value->fio->firstname.'"></td>';
			echo '<td><input type="text" name="surname" value="'.$value->fio->surname.'"></td>';
			echo '<td><input type="text" name="phone" value="'.$value->phone.'"></td>';
			$bd=$value->birthdate;
			echo '<td><input name="birthdate" type="date" value="'.$bd->year.'-'.$bd->month.'-'.$bd->day.'"></td>';
			// echo ''..'';
			echo '</tr><tr>
						<td>Страна</td>
						<td>Город</td>
					</tr>
					<tr>';
			$ad=$value->adress;
			echo '<td><input type="text" name="country" value="'.$ad->country.'"></td>';
			echo '<td><input type="text" name="city" value="'.$ad->city.'"></td>';	

			echo '				</tr>
				</table>
				<input type="submit" value="Сохранить изменения">
				<input type="hidden" name="filename" value="'.$filename.'">
				<input type="hidden" name="id" value="'.$id.'">
				<input type="submit" name="delete" value="Удалить контакт">
			</form>';
		}
		if($value['id']>$maxid){
			echo "<br>value[id]: ";
			echo $value['id'];
			$maxid=$value['id'];
			echo "<br>maxid: ";
			echo $maxid;
		}
	}
	if (!empty($_GET['add'])) {
		echo '<form method="post" action="10postxml.php">
					<input type="reset">
					<table>
						<tr>
							<td>Фамилия</td>
							<td>Имя</td>
							<td>Отчество</td>
							<td>Телефон</td>
							<td>Дата рождения</td>
						</tr>
						<tr>';
				echo '<td><input type="text" name="lastname"></td>';
				echo '<td><input type="text" name="firstname" placeholder="Иван"></td>';
				echo '<td><input type="text" name="surname"></td>';
				echo '<td><input type="text" name="phone"></td>';
				$bd=$value->birthdate;
				echo '<td><input name="birthdate" type="date"></td>';
				// echo ''..'';
				echo '</tr><tr>
							<td>Страна</td>
							<td>Город</td>
						</tr>
						<tr>';
				$ad=$value->adress;
				echo '<td><input type="text" name="country"></td>';
				echo '<td><input type="text" name="city"></td>';	

				echo '				</tr>
					</table>
					<input type="submit" name="create" value="Сохранить изменения">
					<input type="hidden" name="filename" value="'.$filename.'">
					<input type="hidden" name="id" value="'.($maxid+1).'">
					<input type="submit" name="cancel" value="Отмена">
				</form>';
		}
	?>

	</body>
</html>
