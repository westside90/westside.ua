<?php
//Налаштування сторінки і коннект з БД
//error_reporting(0);
require_once "dbconnect.php";
//Налаштування сторінки і коннект з БД

//Ініціювання змінних
if (!isset($_POST['name'])) { $_POST['name'] = null; }

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
require_once "../HTML/registration_form.html";
//Шаблон форми

//Массив даних
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";
//Массив даних
?>