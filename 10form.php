<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel=Stylesheet href="10.css">
</head>
	<body>
	<?php
	echo $_GET['id'];
	echo "<br>";
	echo $_GET['filename'];
	$id=$_GET['id'];
	$filename=$_GET['filename'];
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
			$maxid=$value['id'];
		}
	}
	if (!empty($_POST['add'])) {}
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
				echo '<td><input type="text" name="lastname" value="$value->fio->lastname"></td>';
				echo '<td><input type="text" name="firstname" placeholder="Иван" value="$value->fio->firstname"></td>';
				echo '<td><input type="text" name="surname" value="$value->fio->surname"></td>';
				echo '<td><input type="text" name="phone" value="$value->phone"></td>';
				$bd=$value->birthdate;
				echo '<td><input name="birthdate" type="date" value="$bd->year-month-day"></td>';
				// echo ''..'';
				echo '</tr><tr>
							<td>Страна</td>
							<td>Город</td>
						</tr>
						<tr>';
				$ad=$value->adress;
				echo '<td><input type="text" name="country" value="$ad->country"></td>';
				echo '<td><input type="text" name="city" value="$ad->city"></td>';	

				echo '				</tr>
					</table>
					<input type="submit" value="Сохранить изменения">
					<input type="hidden" name="filename" value="$filename">
					<input type="hidden" name="id" value="$id">
					<input type="submit" name="delete" value="Удалить контакт">
				</form>';
	?>

	</body>
</html>
