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
			<h2>Наши реквизиты</h2>
			<div class="entry">
			<p>ООО «Метаком плюс»</p>
			<p>Ген. директор  Зуянова Н.Г.</p>
			<p>Юр.адрес: г.Пенза ул.Свердлова д.4,</p>
			<p>Адрес почтовый : 440052 г. Пенза, ул. Пушкина 3 оф. 514</p>
			<p>ИНН 5836641670</p>
			<p>ОГРН 110586002910</p>
			<p>Расчетный счёт № 40702810448000007032</p>
			<p>Пензенское отделение №8624 г.Пенза</p>
			<p>Корр. счёт № 30101810000000000635</p>
			<p>БИК 045655635</p>
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