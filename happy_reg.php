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

			<div class="entry">

			<?php
			include("infodb.php");

			if (isset($_POST['submit']))
			{
			if(empty($_POST['name']))
			{
			echo '<p>Не введено имя<br><a href="reg.php">Назад</a></p>';
			}
			elseif(empty($_POST['email']))
			{
			echo '<p>Не введен E-mail<br><a href="reg.php">Назад</a></p>';
			}
			elseif(empty($_POST['pass']))
			{
			echo '<p>Не введен пароль<br><a href="reg.php">Назад</a></p>';
			}
			elseif(empty($_POST['pass2']))
			{
			echo '<p>Не подтвержден пароль<br><a href="reg.php">Назад</a></p>';
			}
			elseif($_POST['pass'] != $_POST['pass2'])
			{
			echo '<p>Пароли не совпадают<br><a href="reg.php">Назад</a></p>';
			}
			elseif(empty($_POST['age']))
			{
			echo '<p>Не введен возраст<br><a href="reg.php">Назад</a></p>';
			}
			elseif(empty($_POST['pol']))
			{
			echo '<p>Не указан ваш пол<br><a href="reg.php">Назад</a></p>';
			}
			elseif(empty($_POST['infa']))
			{
			echo '<p>Не заполнен последний пункт<br><a href="reg.php">Назад</a></p>';
			}
			else
			{
			$name = $_POST['name'];
			$pass = ($_POST['pass']);
			$email = $_POST['email'];
			$age = $_POST['age'];
			$pol = $_POST['pol'];
			$infa = $_POST['infa'];
			$query = "SELECT * FROM users WHERE email = '{$email}' ";
			$sql = mysql_query($query) or die(mysql_error());
			if (mysql_num_rows($sql) > 0)
			{
			echo '<p>Уже иммется аккаунт с таким email<br><a href="reg.php">Назад</a></p>';
			}

			else
			{
			$key = "user";
			$create =date("Y-m-d");
			$query = "INSERT INTO users (name, email, pass, age, pol, infa, creat, status) 
			VALUES ('{$name}', '{$email}', '{$pass}', '{$age}', '{$pol}', '{$infa}', '{$create}', '{$key}')";                       
			$result = mysql_query($query) or die(mysql_error());
			$sql = mysql_query("SELECT id FROM users WHERE email = '{$email}'");
			$qz = mysql_fetch_array($sql); 
			$id = $qz['id'];
			$_SESSION['user']= $name; 
			$_SESSION['status']= $key; 
			$_SESSION['ids']= $id; 
			$_SESSION['pol'] = $pol;
			mysql_query("INSERT INTO online (name, email, creat, status, ids) VALUES ('{$name}','{$email}','{$create}','{$key}','{$id}')");
			echo '<p>Успешная регистрация<br>Вы так же автоматически авторизованы</p>';
			echo '<a href = "profile.php?id='.$_SESSION['ids'].'">Хотите увидеть свой профиль?</a>';
			}}}
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