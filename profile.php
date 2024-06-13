<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="application/xhtml+xml; charset=windows-1251" />
<title>МЕТАКОМ ПЛЮС</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>

<div id="container">

	<div id="header">
		<h1>МЕТАКОМ <span>ПЛЮС</span></h1>
		<p>Установка домофонов и охранных систем</p>

		<div id="topmenu">
		<ul>
			<li><a href = "/">Главная</a></li>
			<li><a href = "news.php">Новости</a></li>
			<li><a href = "adr.php">Контакты</a></li>
			<li><a href = "faq.php">Наши реквизиты</a></li>
			<li><a href = "obr.php">Оборудование</a></li>
			<li><a href = "chavo.php">Вопросы и цены</a></li>
		</ul>
		</div>

	</div>

	<div id="contentcontainer">

		<div id="content">

		<div class="post">

			<h2>Ваш профиль</h2>

			<div class="entry">

			<?php
			include("infodb.php");
			if (!empty($_GET['id'])) {
			$id = $_GET['id']; 
			$sql = mysql_query("select * from users where id = '{$id}'");
			if ( mysql_num_rows($sql) > 0 ) {
			$user_info = mysql_fetch_array($sql);
			echo '<p><b>Имя:</b> '.$user_info['name'].'</p>';
			echo '<p><b>Возраст:</b> '.$user_info['age'].'</p>';
			echo '<p><b>Пол:</b> '.$user_info['pol'].'</p>';
			echo '<p><b>О себе:</b> '.$user_info['infa'].'</p>';
			echo '<p><b>Email:</b> '.$user_info['email'].'</p>';
			echo '<p><b>Дата рег:</b> '.$user_info['creat'].'</p>';
			echo '<p><b>Статус:</b> '.$user_info['status'].'</p>';

			if (!empty($_SESSION['ids'])){
			if ($id == $_SESSION['ids']) {
			echo '<p><b>Удалить аккаунт?</b> <a href="delete.php">Да</a> / <a href="/">Нет</a></p>'; }
			}} 
			else { echo '<p>Аккаунта не существует</p>';  }} 

			else {echo "<p>Аккаунт успешно удалён</p>";}

			mysql_close($link);
			?>

						</div>

		</div>

		</div>

		<div id="sidebar">

		<ul>

		<li><h2>Пользователю</h2>
		<?php
		if (file_exists('header_user.html'))
		{ include_once("header_user.html"); }
		else 
		{echo '<p>Элемент интерфейса недоступен из за неполадок</p>'; }
		?>
		</li>

		<li><h2>Меню</h2>

		<?php
		if (file_exists('menu.html')) { include_once("menu.html"); } else {
		echo '<p>Элемент интерфейса не доступен из за неполадок</p>'; }
		?>

		</li>

		</ul>

		</div>

	</div>
</div>

<div id="footer">
	<p>Метаком Плюс &copy; 2013</p>
</div>

</body>
</html>