<?php
//Налаштування сторінки і коннект з БД
error_reporting(0);
require_once "../dbconnect.php";
//Налаштування сторінки і коннект з БД

//Ініціювання змінних
if (!isset($_POST['name'])) { $_POST['name'] = null; }
if (!isset($_POST['type'])) { $_POST['type'] = 2; }
//Ініціювання змінних

//Витрати/Надходження
function type_list($selected)
	{
	echo "<select name = 'type'  onchange = \"document.forms.form.action = '#'; document.form.submit();\">";
	echo "<option value = '2'";
	if ($selected == 2) {echo " selected";}
	echo "> ...вибрати тип</option>";
	echo "<option value = '0'";
	if ($selected == 0) {echo " selected";}
	echo ">Витрата</option>";
	echo "<option value = '1'";
	if ($selected == 1) {echo " selected";}
	echo ">Надходження</option>";
	echo "</select>";
	}
//Витрати/Надходження

//Шаблон форми	
require_once "../../HTML/nomenklatura/vytraty_form.html";
//Шаблон форми

//Массив даних
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";
//Массив даних
?>