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
			<h2>Прайс-лист на установку нового оборудования при монтаже подъезда</h2>
			<div class="entry">
			<table cellpadding="10">
			<tr>
			<td><p class="p_faq1"><b>№ п/п</b></p></td>
			<td width="50%"><p class="p_faq1"><b>Наименование</b></p></td>
			<td><p class="p_faq1"><b>Цена (руб.)</b></p></td>
			</tr>
			<tr>
			<td><p class="p_faq1">1</p></td>
			<td><p class="p_faq1">Пульт вызова , блок питания, замок электромагнитный, доводчик , 
1 ключ, работы по монтажу оборудования</p></td>
			<td><p class="p_faq1">12000 руб</p></td>
			</tr>
			<tr>
			<td><p class="p_faq1">2</p></td>
			<td><p class="p_faq1">Установка квартирного переговорного устройства</p></td>
			<td><p class="p_faq1">600 руб</p></td>
			</tr>
			<tr>
			<td><p class="p_faq1">3</p></td>
			<td><p class="p_faq1">Ключи “DALLAS”, “Proxi”</p></td>
			<td><p class="p_faq1">110 руб</p></td>
			</tr>
			<tr>
			<td><p class="p_faq1">4</p></td>
			<td><p class="p_faq1">Дверь подъездная стальная с утеплителем
порошковой покраской</p></td>
			<td><p class="p_faq1">от 10 000 руб</p></td>
			</tr>
			</table>
			</div>
			<h2>Тариф на абонентское обслуживание подъездного домофона</h2>
			<div class="entry">
			оплата производится каждой квартирой индивидуально по расчетным книжкам фирмы "метаком плюс",или по индивидуальным лицевым счетам,оплату производить в почтовых отделениях и в отделениях сбербанка.
Квартира, в которой установлено переговорное устройство, оплачивает - 30 рублей в месяц.
Квартира, в которой нет переговорного устройства (пользование ключами)не оплачивает.</p>
			<p>При оплате менее 80 % жильцов, фирма не несет ответственности за выполнение договора.
Жильцам, не производивших оплату, какие-либо услуги не оказываются до погашения задолженности.</p>
			<p>
В стоимость включено:</p>
			<p>-ремонт и настройка общего оборудования (пульт, блок питания, замок, -ключевое устройство, процессор, доводчик), квартирных переговорных устройств,</p>
			<p>-ремонт поврежденного общего оборудования и электропроводки.</p>
			<p>-ремонт  доводчика.</p>
			</div>
			<h2>Образец договора на техническое обслуживание</h2>
			<div class="entry">
			<p><a href="dogovor-metakom-plyus-novyy-variant.docx">Скачать</a></p>
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