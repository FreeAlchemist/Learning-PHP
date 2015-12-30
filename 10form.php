<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel=Stylesheet href="10.css">
</head>
	<body>
		<form method="post" action="10postxml.php">
			<input type="reset">
			<p>Фамилия: <input type="text" name="lastname" placeholder="Петров" value="Петров" autofocus required></p>
			<p>Имя: <input type="text" name="firstname" placeholder="Иван" value="Иван" required></p>
			<p>Отчество: <input type="text" name="mothername" placeholder="Сидорович"></p>
			<p>Телефон: <input type="text" name="phone" placeholder="89995554433" value="89995554433" required></p>
			<p>Дата рождения: <input type="date"></p>
			<p>Адрес: <input type="text" name="adress" placeholder="Улица Ленина"></p>
			<input type="submit" value="Сохранить изменения">
		</form>	
	</body>
</html>
<?php

echo $_SERVER['HTTP_REFERER'];
?>
