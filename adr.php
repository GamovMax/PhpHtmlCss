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
			<h2>Контакты</h2>
			<div class="entry">
			<p>ООО «Метаком плюс» </p>
			<p>Адрес: Россия, г. Пенза ул.Пушкина 3 офис 514</p>
			<p>пн-чт с 9:00 до 18:00</p>
			<p>пт с 9:00 до 16:00</p>
			<p>сб-вс выходной</p>
			<p>Телефон: +7 8412 260-795, +7 8412 253-821, +7 8412 717-368</p>
			<p>E-mail: penza10@mail.ru</p>
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
		<li>
		<?php
		if(!empty($_SESSION['status']))
		{
		echo "<h2>Меню</h2>";
		if (file_exists('menu.html')) { include_once("menu.html"); } else {
		echo '<p>Элемент интерфейса не доступен из за неполадок</p>'; }
		}
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