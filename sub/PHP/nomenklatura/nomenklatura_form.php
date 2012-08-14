<?php
//Налаштування сторінки і коннект з БД
//error_reporting(0);
require_once "../dbconnect.php";
//Налаштування сторінки і коннект з БД

//Ініціювання змінних
if (!isset($_POST['name'])) { $_POST['name'] = null; }
if (!isset($_POST['full_name'])) { $_POST['full_name'] = null; }
if (!isset($_POST['type'])) { $_POST['type'] = 2; }
if (!isset($_POST['units'])) { $_POST['units'] = 0; }
if (!isset($_POST['prymitka'])) { $_POST['prymitka'] = null; }
//Ініціювання змінних

//Тип номенклатури
function type_list($selected)
	{
	echo "<select name = 'type'  onchange = \"document.forms.form.action = '#'; document.form.submit();\">";
	echo "<option value = '2'";
	if ($selected == 2) {echo " selected";}
	echo "> ...вибрати тип</option>";
	echo "<option value = '0'";
	if ($selected == 0) {echo " selected";}
	echo ">Товар</option>";
	echo "<option value = '1'";
	if ($selected == 1) {echo " selected";}
	echo ">Послуги</option>";
	echo "</select>";
	}
//Тип номенклатури

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
require_once "../../HTML/nomenklatura/nomenklatura_form.html";
//Шаблон форми

//Массив даних
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";
//Массив даних
?>