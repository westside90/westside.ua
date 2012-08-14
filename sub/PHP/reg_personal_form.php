<?php
//Налаштування сторінки і коннект з БД
//error_reporting(0);
require_once "dbconnect.php";
//Налаштування сторінки і коннект з БД

$sql = mysql_query ("SELECT * FROM `users`.`personal` WHERE `user` = 0");
if (mysql_num_rows ($sql) > 0) $_POST = mysql_fetch_array ($sql, MYSQL_ASSOC);


//Ініціювання змінних
if (!isset($_POST['first_name'])) { $_POST['first_name'] = null; }
if (!isset($_POST['second_name'])) { $_POST['second_name'] = null; }
if (!isset($_POST['third_name'])) { $_POST['third_name'] = null; }
if (!isset($_POST['birth_date'])) { $_POST['birth_date'] = null; }
if (!isset($_POST['ident_number'])) { $_POST['ident_number'] = null; }
if (!isset($_POST['indeks'])) { $_POST['indeks'] = null; }
if (!isset($_POST['oblast'])) { $_POST['oblast'] = null; }
if (!isset($_POST['misto'])) { $_POST['misto'] = null; }
if (!isset($_POST['address'])) { $_POST['address'] = null; }
if (!isset($_POST['tel'])) { $_POST['tel'] = null; }
if (!isset($_POST['start_date'])) { $_POST['start_date'] = null; }
//Ініціювання змінних


//Список одиниць виміру
function units_list($selected)
	{
	$sql = mysql_query ("SELECT `id`,`name` FROM `units`");
	$n = mysql_num_rows ($sql);
	while ($units[] = mysql_fetch_array ($sql, MYSQL_ASSOC));
	echo "<select name = 'units'  onchange = \"document.forms.form.action = '#'; document.form.submit();\">";
	echo "<option value = '0'";
	if ($selected == 0) {echo " selected";}
	echo "> ...вибрати одиниці</option>";
		for ($i = 0; $i < $n; $i++)
			{
			echo "<option value ='".$units[$i]['id']."'";
				if ($selected == $units[$i]['id']) {echo " selected";}
			echo ">".$units[$i]['name']."</option>";
			}
	echo "</select>";
	}
//Список одиниць виміру

//Шаблон форми	
require_once "../HTML/reg_personal_form.html";
//Шаблон форми

//Массив даних
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";
//Массив даних
?>