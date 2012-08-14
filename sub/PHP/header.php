<?php
error_reporting(0);

//Мова сайту
if (isset($_GET['lang']))
	{ $lang = $_GET['lang']; }
else
	{ $lang = 'ua'; }
$url = $_SERVER['REQUEST_URI'];
//Мова сайту
	
//Розмітка сторінки
echo "<head>
		<title>Buhgalter24.com.ua
			</title>
		<table width = '100%'>
			<tr>
				<td align = 'left'>
					<div style = 'background-color: #0a5c90; text-shadow: 2px 2px 3px black; color: white; font-size:40px; font-weight:900; font-family: cursive'>БУХГАЛТЕР<font style ='vertical-align: -5px; background-color: #0a5c90; text-shadow: 2px 2px 3px black; color: red; font-size:60px; font-weight:400; font-family: cursive' >24</font>
					</div>
			</tr>
			<tr>
				<td>
					<a href = '".$url."&lang=ru'><img src = 'PNG/ru.png'></a>
					<a href = '".$url."&lang=ua'><img src = 'PNG/ua.png'></a>
					<input type = 'submit' onClick = \"window.history.go(-1);\" value = '<- Назад'>
					<input type = 'submit' onClick = \"window.history.go(1);\" value = 'Вперед ->'>";
					
					//Поле з датою і часом
					echo "<form name = 'clock'>
					<input size = '28' name = 'full'>
					</form>
					<script>
					function fulltime () 
						{
						var time=new Date();
						document.clock.full.value=time.toLocaleString();
						setTimeout('fulltime()',500)
						}
					fulltime();
					</script>";
					//Поле з датою і часом
					
					echo "</td>
			</tr>
		</table>";

//Піключення скриптів і CSS
//echo "<link type = 'text/css' href = 'css/main.css' rel = 'stylesheet' media= 'all'>";

//Параметри коннекта з БД
header('Content-Type: text/html; charset=1251'); 
require_once "PHP/dbconnect.php";
require_once "PHP/function.php";
require_once "PHP/language.php";
require_once "PHP/create.php";
$date = date("Y-m-d");
$start_date = '2012-01-01';

//Відображення помилок
if ($_SESSION['login'] == "Kirill") error_reporting(0);
//Відображення помилок

//Розмітка сторінки		
echo "</head>
		<hr>
		<body bgcolor = '#e8e4d7'>";
?>