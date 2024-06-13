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
		<p>Установка домофонов</p>
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
			<h2>Добро пожаловать</h2>
			<div class="entry">
			<?php 
			include("infodb.php");
			if (isset($_POST['log'])) {
			if (!empty($_POST['email']) and !empty($_POST['pass'])) 
			{
			$email= $_POST['email'];
			$pass= $_POST['pass'];
			$sql = mysql_query("SELECT id, name, status, pol  FROM users WHERE email = '".$email."' AND pass = '".$pass."'");
			if (mysql_num_rows($sql) > 0) {
			$qz = mysql_fetch_array($sql); 
			$_SESSION['user'] = $qz['name'];
			$_SESSION['ids'] = $qz['id'];
			}}}
			mysql_close($link); 
			?>
			<?php 
			include("infodb.php");
			if (isset($_POST['log'])) {
			if (empty($_POST['email'])) { echo '<p>Не введен E-mail<br><a href="log.php">Назад</a></p>'; }
			elseif (empty($_POST['pass']))  {echo '<p>Не введен пароль<br><a href="log.php">Назад</a></p>'; }
			else
			{
			$email= $_POST['email'];
			$pass= $_POST['pass'];
			$sql = mysql_query("SELECT id, name, status, pol  FROM users WHERE email = '".$email."' AND pass = '".$pass."'");
			if (mysql_num_rows($sql) > 0) {
			$qz = mysql_fetch_array($sql); 
			$_SESSION['user'] = $qz['name'];
			$_SESSION['status'] = $qz['status'];
			$_SESSION['ids'] = $qz['id'];
			$_SESSION['pol'] = $qz['pol'];
			$create = date("Y-m-d");
			mysql_query("INSERT INTO online (name, email, creat, status, ids) values ('{$qz['name']}','{$email}','{$create}','{$qz['status']}','{$qz['id']}')");
			echo '<p>Привет '.$qz['name'].'!</p><p>Вход успешно выполнен</p>'; 
			echo '<p><a href = "profile.php?id='.$_SESSION['ids'].'">Хотите увидеть свой профиль?</a></p>';
			} else { echo '<p>Неверная пара логин / пароль Проверьте вводимые данные</p><p><a href="log.php">Назад</a></p>'; } } }
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