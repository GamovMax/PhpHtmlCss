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
			if (isset($_POST['com'])) { 
			if (!empty($_POST['com'])) {
			$comment = htmlspecialchars($_POST['com']); 
			$name = $_SESSION['user'];
			$ids = $_SESSION['ids'];
			$pol = $_SESSION['pol'];
			$create = date("Y-m-d");
			mysql_query("Insert into chat (name, creat, comment, ids, pol) values ('{$name}','{$create}','{$comment}','{$ids}', '{$pol}')");
			} }
			$sql = mysql_query("select * from chat order by id");
			while ( $info = mysql_fetch_array($sql)) {
			if ( $info['pol'] == 'мужской')  { $add = 'написал';} else { $add = 'написала';}
			echo "
			<h3>Сообщение ".$add." <a href=\"profile.php?id=".$info['ids']."\">".$info['name']."</a>:</h3>
			<p>".$info['creat']."</p>
			<p>".$info['comment']."</p>"; }
			mysql_close($link);
			echo '<p><a href = "#top" >Вверx</a></p>';
			if (isset($_SESSION['status']))  {
			echo '
			<h2>Добавить запись:</h2>
			<form action="chat.php" method="post">
			<p><textarea name="com" cols="40" rows="4" required></textarea></p>
			<p><input type="submit" value="Отправить"/>
			<input type="reset" value="Очистить" /></p>
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