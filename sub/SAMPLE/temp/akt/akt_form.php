<?php
//Налаштування сторінки і коннект з БД
error_reporting(0);
require_once "PHP/dbconnect2.php";
//Налаштування сторінки і коннект з БД

//Визначаємо номер накладної і дату
$number = mysql_result (mysql_query ("SELECT MAX(`number`) FROM `akt` WHERE `document` = ".$_GET['document'].""), 0) + 1;
if (!isset($number)) { $number = 1; }
$date = date("Y-m-d");
//Визначаємо номер накладної і дату

//Ініціюємо змінні
if (isset($_GET['k'])) { $k = $_GET['k']; } else { $k = 1; }

if (!isset($_POST['number'])) { $_POST['number'] = $number; }
if (!isset($_POST['date'])) { $_POST['date'] = $date; }
if (!isset($_POST['kontragent'])) { $_POST['kontragent'] = 0; }
if (!isset($_POST['prymitka'])) { $_POST['prymitka'] = "&nbsp;"; }

if (!isset($_POST['posluga'][$k-1])) { $_POST['posluga'][$k-1] = 0; }
if (!isset($_POST['kkst'][$k-1])) { $_POST['kkst'][$k-1] = 0; }
if (!isset($_POST['cost'][$k-1])) { $_POST['cost'][$k-1] = 0; }
//Ініціюємо змінні

//Список послуг
function poslugi_list($selected, $num, $k)
	{
	$sql = mysql_query ("SELECT `id`,`name` FROM `nomenklatura` WHERE `type` = 1");
	$n = mysql_num_rows ($sql);
	while ($posluga[] = mysql_fetch_array ($sql, MYSQL_ASSOC));
	echo "<select name = 'posluga[$num]' onchange = \"document.forms.form.action = '?k=".$k."'; document.form.submit();\">";
	echo "<option value = '0'";
	if ($selected == 0) {echo " selected";}
	echo "> ...вибрати послугу</option>";
		for ($i = 0; $i < $n; $i++)
			{
			echo "<option value = '".$posluga[$i]['id']."'";
				if ($selected == $posluga[$i]['id']) {echo " selected";}
			echo ">".$posluga[$i]['name']."</option>";
			}
	echo "</select>";
	}
//Список послуг

//Список контрагентів
function kontragent_list($selected, $k, $document)
	{
	$sql = mysql_query ("SELECT `id`,`short_name` FROM `kontragent`");
	while ($kontragent[] = mysql_fetch_array ($sql, MYSQL_ASSOC));
	$n = count($kontragent)-1;
	unset($kontragent[$n]);
	echo "<select name = 'kontragent' onchange =\"document.forms.form.action = '?k=".$k."&document=".$_GET['document']."'; document.form.submit();\">";
	echo "<option value = '0'";
	if ($selected == 0) {echo " selected";}
	echo "> ...вибрати "; 
		if ($_GET['document'] == 0) { echo "замовника"; }
		if ($_GET['document'] == 1) { echo "виконавця"; }
		echo "</option>";	
		for ($i = 0; $i < $n; $i++)
			{
			echo "<option value = '".$kontragent[$i]['id']."'";
				if ($selected == $kontragent[$i]['id']) {echo " selected";}
			echo ">".$kontragent[$i]['short_name']."</option>";
			}
	echo "</select>";
	}
//Список контрагентів	

//Функція видалення строки
function element_del($j)
	{
	for ($i = $j; $i < $_GET['k']; $i++)
		{
		$_POST['kkst'][$i] = $_POST['kkst'][$i + 1];
		$_POST['cost'][$i] = $_POST['cost'][$i + 1];
		$_POST['posluga'][$i] = $_POST['posluga'][$i+1];
		}
	unset($_POST['kkst'][$_GET['k']]);
	unset($_POST['cost'][$_GET['k']]);
	unset($_POST['posluga'][$_GET['k']]);
	}
//Функція видалення строки
	
//Функція знаходження загальної суми	
function summa_all($k)
	{
	$summa_all = 0;
	for ($i = 0; $i < $k; $i++)
		{
		$summa_all += (0 + str_replace(" ","",$_POST['cost'][$i])) * (0 + str_replace(" ","",$_POST['kkst'][$i]));
		}
	return $summa_all;
	}
//Функція знаходження загальної суми

//Отримуємо одиниці виміру
function get_units($posluga)
	{
	if ($posluga == 0) 
		{ $unit = null; }
	else
		{ $unit = " ".mysql_result (mysql_query ("SELECT `name` FROM `units` WHERE `id` = (SELECT `units` FROM `nomenklatura` WHERE `id` = ".$posluga.")"), 0); }
	return $unit;
	}
//Отримуємо одиниці виміру

//Підключаємо шаблон форми
require_once "temp/akt_form.html";
//Підключаємо шаблон форми

//Массив даних
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";
//Массив даних
?>
