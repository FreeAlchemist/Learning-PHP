<html>
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<script src="js/message_block.js"></script>
</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-md-4">
			user info
		</div>
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-12">
					<textarea id="msgtext" class="form-control" rows="3"></textarea>
					<input class="btn btn-primary" type="submit" value="Send" onclick="addmsg();">
					<div id="messagebox" style="margin-top:20px;">

						<div class="panel panel-default">
						  <div class="panel-heading">
						    <h3 class="panel-title">Username Date</h3>
						  </div>
						  <div class="panel-body">
						    Comment
						  </div>
						</div>


					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
// общие константы
//define('PATH', '/gb/'); // путь к гостевой книге
//define('RECSPERPAGE', 10); // количество записей на одной странице
//define('ADMIN_EMAIL', 'artem@sapegin.ru'); // email администратора
//define('ERROR_LOG_FILE', 'logs/error.log'); // файл лога ошибок

// Параметры БД
// define('DBHOST', 'localhost'); // имя хоста
// define('DBUSER', 'root'); // имя пользователя
// define('DBPASSWD', '123'); // пароль
// define('DBNAME', 'guestbook'); // имя базы данных
?>

</body>
</html
