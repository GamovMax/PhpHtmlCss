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

			<div class="entry">

			<?php
			if (isset($_SESSION['status'])) {
			include("infodb.php");
			if (isset($_POST['otp'])) { 
			if (!empty($_POST['otp'])) {
			$name = $_SESSION['user'];
			$city=$_POST['city'];
			$adr=$_POST['adr'];
			$tel=$_POST['tel'];
			$har=$_POST['har'];

			if(($_POST['adr']=="")||($_POST['tel']=="")||($_POST['har']==""))
			echo "<h2>Заполните все поля</h2>";
			else
			mysql_query("Insert into zakaz (name, city, adr, tel, har) values ('{$name}','{$city}','{$adr}','{$tel}','{$har}')") or die ("Ошибка при отправке");
			} }

			mysql_close($link);
			if (isset($_SESSION['status']))  {
			echo '
			<h2>Заказ ключей:</h2>
			<form action="zakaz.php" method="post">
			<p>Город:</p>
			<select name="city">      
			<p><option selected="selected" value="Пенза">Пенза</option></p>
			<p><option value="Заречный">Заречный</option></p>
			</select>

			<p>Адрес:</p>
			<p><input type="text" name="adr" required/></p>
			<p>Телефон:</p>
			<p><input type="text" name="tel" required/></p>
			<p>Количество:</p>
			<p><input type="text" name="har" required/></p>
			<p>
			<input type="submit" name="otp" value="Отправить"/>
			<input type="reset" value="Очистить" required/>
			</p>
			</form>

			';
			}
			} else { echo '<h2>Страница не доступна не зарегестрированным пользователям</h2>';} 
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