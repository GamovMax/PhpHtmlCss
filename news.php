<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="application/xhtml+xml; charset=windows-1251" />
<title>МЕТАКОМ ПЛЮС</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<a name="top"></a>
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
			include("infodb.php");

			if (isset($_POST['new'])) {
			if (!empty($_POST['new'])) {
			$comment = $_POST['new'];
			$name = $_POST['zag'];
			$create = date("Y-m-d");

			mysql_query("Insert into news (name, creat, comment) values ('{$name}','{$create}','{$comment}')"); } }
			$sql = mysql_query("select * from news order by id desc");
			while ( $info = mysql_fetch_array($sql)) {
			if ( $info['pol'] == 'мужской')  { $add = 'добавил';} else { $add = 'добавила';}
			echo "
			<h2>".$info['name']."</h2>
			<p>".$info['creat']."</p>

			<p>".$info['comment']."</p>"; }
			mysql_close($link);

			echo '<p><a href = "#top" >Вверx</a></p>';

			if(isset ($_SESSION['status']))
			{
			if ($_SESSION['status'] == 'admin' or $_SESSION['status'] == 'mod' )  {
			echo'
			<h2>Добавить новость:</h2>
			<form action="news.php" method="post">
			<p>Заголовок новости</p>
			<p><input type="text" name="zag"/></p>
			<p><textarea name="new" cols="40" rows="4" required></textarea></p>
			<p><input type="submit" value="Отправить"/>
			<input type="reset" value="Очистить" /></p>
			</form>';
			}
			}
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