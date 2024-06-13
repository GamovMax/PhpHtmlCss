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

			<h2>Админская</h2>

			<div class="entry">

			<?php
			if ($_SESSION['status'] == 'admin' or $_SESSION['status'] == 'mod')
			{ 
			include("infodb.php");
			if ($_SESSION['status'] == 'admin') 
			{
			if (!empty($_POST['email_user'])) {
			$sql = mysql_query("select * from users where email = '{$_POST['email_user']}'");
			if(mysql_num_rows($sql) > 0 ) { 

			if (isset($_POST['create_admin'])) { mysql_query("update users set status = 'admin' where email = '{$_POST['email_user']}'");   }
			if (isset($_POST['create_mod'])) { mysql_query("update users set status = 'mod' where email = '{$_POST['email_user']}'");     }
			if (isset($_POST['create_user'])) {  mysql_query("update users set status = 'user' where email = '{$_POST['email_user']}'");    }
			if (isset($_POST['delete_profile'])) 
			{
			$sql = mysql_query("select * from users where email = '{$_POST['email_user']}'");
			$info = mysql_fetch_array($sql);
			$delete = date("Y-m-d");
			mysql_query("insert into del_users (name, status, pol, email , age, infa, creat, delet) values ('{$info['name']}','{$info['status']}','{$info['pol']}','{$info['email']}', '{$info['age']}','{$info['infa']}', '{$info['creat']}', '$delete')");
			mysql_query("delete from users where email = '{$_POST['email_user']}'");
			}

			}
			else echo"Ошибка";}

			if (isset($_POST['delete_all'])) {  mysql_query("truncate table users");  }
			
			echo '
			
			<form action="admin.php" method="post">
			<table><tr><td>
			Введите Email участника: <br>
			<input type="text" name="email_user" />
			</td><td>
			<input type="submit" value="дать права админа" name="create_admin"> 
			</td></tr>
			<tr><td></td><td>
			<input type="submit" value="дать права модератора" name="create_mod"/>  </td></tr>
			<tr><td></td><td>
			<input type="submit" value="дать права пользователя" name="create_user"/> </td></tr>
			<tr><td><input type="submit" value="удалить аккаунт" name="delete_profile"/> </td><td></td></tr>
			<tr><td></td><td><input type="submit" value="удалить все аккаунты" name="delete_all"/></td></tr>
			</table>
			</form>
			';
			}

			if (isset($_POST['clear_chat'])) {  mysql_query("truncate table chat");  }
			if (isset($_POST['clear_delete_users'])) {  mysql_query("truncate table del_users");  }
			if (isset($_POST['clear_online'])) {  mysql_query("truncate table online"); }
			if (isset($_POST['clear_message_private'])) {  mysql_query("delete from message where label = 'лично'");    }
			if (isset($_POST['clear_message_public'])) {   mysql_query("delete from message where label = 'публично'");  }
			if (isset($_POST['clear_message_all'])) {   mysql_query("truncate table message");  }

			echo '
			
			<form action="admin.php" method="post">
			<table>
			<tr><td><input type="submit" value="очистить чат" name="clear_chat"/></td></tr>
			<tr><td><input type="submit" value="очистить историю удалившихся" name="clear_delete_users"/> </td></tr>
			<tr><td><input type="submit" value="очистить историю посещений" name="clear_online"/></td></tr>
			<tr><td><input type="submit" value="очистить личные сообщения" name="clear_message_private"/> </td></tr>
			<tr><td><input type="submit" value="очистить публичные сообщения" name="clear_message_public"/> </td></tr>
			<tr><td><input type="submit" value="очистить все сообщения админам" name="clear_message_all"/> </td></tr>
			</table>
			</form>
			
			';
			
			$sql = mysql_query("select * from del_users order by id");
			if(!$sql)
			{
			die("Возникла ошибка - ".mysql_error()."<br>");
			} 
			if (mysql_num_rows($sql) > 0) {
			echo '<h2>Таблица удалившихся:</h2>';
			echo '<table border="1"><tr><th>Имя</th><th>Email</th><th>Возраст</th><th>Пол</th><th>Инфа</th><th>Создание</th><th>Удаление</th><th>Статус</th></tr>';
			while ($x = mysql_fetch_array($sql)) {
			echo  '<tr><td>'.$x['name'].'</td><td>'.$x['email'].'</td><td>'.$x['age'].'</td><td>'.$x['pol'].'</td><td>'.$x['infa'].'</td><td>'.$x['creat'].'</td><td>'.$x['delet'].'</td><td>'.$x['status'].'</td></tr>';
			}
			echo '</table>'; } else { echo '<h2>Таблица удалившихся пуста</h2>'; }

			echo '<br><h2>Вопросы</h2>';
			
			$sql = mysql_query("select message.id,message.name,message.comment,message.creat,message.pol,message.ids,users.email FROM message,users where users.id=message.ids order by id");
			while ( $info = mysql_fetch_array($sql)) {
			if ( $info['pol'] == 'мужской')  { $add = 'Написал';} else { $add = 'Написала';}

			echo "<table>
			<tr><td>

			<table width=\"100%\"><tr><td>
			<b>".$add." </b><a href=\"profile.php?id=".$info['ids']."\"><b>".$info['name']."</b></a> (".$info['email'].") :</td>
			<td align=\"right\"><b>".$info['creat']."</b>
			</td></tr></table>

			</td></tr>
			<tr><td>".$info['comment']."</td></tr>
			</table>";

			}

			$sql = mysql_query("select * from sver order by id");
			if(!$sql)
			{
			die("Возникла ошибка - ".mysql_error()."<br>");
			} 
			if (mysql_num_rows($sql) > 0) {
			echo '<br><h2>Акт сверки платежей</h2>';
			echo '<table border="1"><tr><th>Адрес</th><th>Телефон</th><th>Email</th><th>Дата начала</th><th>Дата окончания</th></tr>';
			while ($x = mysql_fetch_array($sql)) {
			echo  '<tr><td>'.$x['adr'].'</td><td>'.$x['tel'].'</td><td>'.$x['em'].'</td><td>'.$x['per1'].'</td><td>'.$x['per2'].'</td></tr>';
			}
			echo '</table>'; } else { echo '<h2>Таблица пуста</h2>'; }





			$sql = mysql_query("select * from zakaz order by id");
			if(!$sql)
			{
			die("Возникла ошибка - ".mysql_error()."<br>");
			} 
			if (mysql_num_rows($sql) > 0) {
			echo '<br><h2>Заказы ключей</h2>';
			echo '<table border=1><tr><th>Имя</th><th>Город</th><th>Адрес</th><th>Телефон</th><th>Количество</th></tr>';
			while ($x = mysql_fetch_array($sql)) {
			echo  '<tr><td>'.$x['name'].'</td><td>'.$x['city'].'</td><td>'.$x['adr'].'</td><td>'.$x['tel'].'</td><td>'.$x['har'].'</td></tr>';
			}
			echo '</table>'; } else { echo '<h2>Таблица пуста</h2>'; }

			mysql_close($link);
			} else { echo '<h2>Только администраторы и модераторы имеют доступ к этой странице!</h2>'; }
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