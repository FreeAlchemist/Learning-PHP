<!DOCTYPE html>
<html>
<head>
<meta charset="windows-cp1251">
<link rel=Stylesheet href="10.css">
</head>
<body>
	<?php
	// echo "GET[id]: ";
	// echo $_GET['id'];
	// echo "<hr>";
	// echo "FILENAME: ";
	// echo $_GET['filename'];
	// echo "<hr>";
	if (!empty($_GET['id'])) {
		$id=$_GET['id'];
	}
	else{$id=00;}
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
		// print_r($xml);
		// echo "FOREACH VALUE[id]: ";
		// echo $value['id'];
		// echo "<hr>";
		// echo "MAXID: ";
		// echo $maxid.$value['id'];
		// echo $key;
		// echo "<hr>";
		if((int)$value['id']>$maxid){
			echo "VALUE[id]: ";
			echo $value['id'];
			$maxid=(int)$value['id'];
			echo "<hr>";
			echo "MAXID changed to: ";
			echo $maxid;
			echo "<hr>";
		}
		if ($value['id']==$id) {
				
			echo '<form method="post" action="10postxml.php">
				<input type="reset">
				<table>
					<tr>
						<td>Фамилия</td>
						<td>Имя</td>
						<td>Отчество</td>
						<td>Телефон</td>
						
					</tr>
					<tr>';
			echo '<td><input type="text" name="lastname" value="'.iconv("UTF-8","cp1251",$value->fio->lastname).'"></td>';
			echo '<td><input type="text" name="firstname" placeholder="Иван" value="'.iconv("UTF-8","cp1251",$value->fio->firstname).'"></td>';
			echo '<td><input type="text" name="surname" value="'.iconv("UTF-8","cp1251",$value->fio->surname).'"></td>';
			echo '<td><input type="text" name="phone" value="'.$value->phone.'"></td>';

			// echo '<td><input type="text" name="lastname" value="'.$value->fio->lastname.'"></td>';
			// echo '<td><input type="text" name="firstname" placeholder="Иван" value="'.$value->fio->firstname.'"></td>';
			// echo '<td><input type="text" name="surname" value="'.$value->fio->surname.'"></td>';
			// echo '<td><input type="text" name="phone" value="'.$value->phone.'"></td>';
			
			// echo ''..'';
			echo '</tr><tr>
						<td>Дата рождения</td>
						<td>Страна</td>
						<td>Город</td>
					</tr>
					<tr>';
			$bd=$value->birthdate;
			echo '<td><input name="birthdate" type="date" value="'.$bd->year.'-'.$bd->month.'-'.$bd->day.'"></td>';
			$ad=$value->adress;
			echo '<td><input type="text" name="country" value="'.iconv("UTF-8","cp1251",$ad->country).'"></td>';
			echo '<td><input type="text" name="city" value="'.iconv("UTF-8","cp1251",$ad->city).'"></td>';	
			echo '				</tr>
				</table>
				<input type="submit" value="Сохранить изменения">
				<input type="hidden" name="filename" value="'.$filename.'">
				<input type="hidden" name="id" value="'.$id.'">
				<input type="submit" name="delete" value="Удалить контакт">
			</form>';
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
						</tr>
						<tr>';
				echo '<td><input type="text" name="lastname" placeholder="Иванов"></td>';
				echo '<td><input type="text" name="firstname" placeholder="Иван"></td>';
				echo '<td><input type="text" name="surname" placeholder="Иванович"></td>';
				echo '<td><input type="text" name="phone" placeholder="+70001112233"></td>';
				
				// echo ''..'';
				echo '</tr><tr>
							<td>Дата рождения</td>
							<td>Страна</td>
							<td>Город</td>
						</tr>
						<tr>';
				
				// $bd=$value->birthdate;
				echo '<td><input name="birthdate" type="date"></td>';
				// $ad=$value->adress;
				echo '<td><input type="text" name="country" placeholder="Россия"></td>';
				echo '<td><input type="text" name="city" placeholder="Ленинград"></td>';	
				echo '				</tr>
					</table>
					<input type="submit" name="create" value="Сохранить контакт">
					<input type="hidden" name="filename" value="'.$filename.'">
					<input type="hidden" name="id" value="'.($maxid+1).'">
					<input type="submit" name="cancel" value="Отмена" formaction="10.php">
				</form>';
		}
	?>

	</body>
</html>
