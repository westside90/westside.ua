<?php
//Параметри коннекта з БД
header('Content-Type: text/html; charset=1251'); 
require_once "dbconnect.php";
mysql_query('SET NAMES cp1251');

//Параметри користувача
$user_db = "westside_db";
mysql_select_db($user_db, $db);

//Шапка сайту і меню
require_once "html/header.html";
require_once "html/menu.html";

//Отримуємо код сторінки
$page = $_GET['page'];

//Основна частина
echo "<table width='100%'>
		<tr>
			<td align='center' valign='top'>";
			
				//Список номенклатури
				if ($page == 0)
					{echo "<h2>Список рахунків</h2>";
					require_once "php/rahunki/rahunki_list.php";}
				//Додати номенклатуру
				if ($page == 1)
					{echo "<h2>Додати рахунок</h2>";
					require_once "php/rahunki/rahunki_form.php";}
				//Редагувати номенклатуру
				if ($page == 2)
					{echo "<h2>Редагувати рахунок</h2>";
					require_once "php/rahunki/rahunki_edit.php";}				

echo "			</td>
			<td width='250' align='right' valign='top'>";

//Правий блок			
require_once "html/right_block.html";

echo "			</td>
			</tr>
		</table>";

//Нижній блок
require_once "html/footer.html";
?>