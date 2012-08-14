<?php
//Налаштування сторінки і коннект з БД
header("Content-type: text/html; charset=windows-1251");
error_reporting(0);
require_once "../../PHP/dbconnect2.php";
//Налаштування сторінки і коннект з БД

//Визначаємо номер накладної і дату
$number = mysql_result (mysql_query ("SELECT MAX(`number`) FROM `nakladna` WHERE `document` = 1"), 0) + 1;
if (!isset($number)) { $number = 1;}
$date = date("Y-m-d");
//Визначаємо номер накладної і дату

//Ініціюємо змінні
if (isset($_GET['k'])) { $k = $_GET['k']; } else { $k = 1; }

if (!isset($_POST['number'])) { $_POST['number'] = $number; }
if (!isset($_POST['date'])) { $_POST['date'] = $date; }
if (!isset($_POST['kontragent'])) { $_POST['kontragent'] = 0; }
if (!isset($_POST['prymitka'])) { $_POST['prymitka'] = "&nbsp;"; }
if (!isset($_POST['order_number'])) { $_POST['order_number'] = "&nbsp;"; }
if (!isset($_POST['order_date'])) { $_POST['order_date'] = null; }
if (!isset($_POST['order_across'])) { $_POST['order_across'] = "&nbsp;"; }

if (!isset($_POST['tovar'][$k-1])) { $_POST['tovar'][$k-1] = 0; }
if (!isset($_POST['partia'][$k-1])) { $_POST['partia'][$k-1] = 0; }
if (!isset($_POST['kkst'][$k-1])) { $_POST['kkst'][$k-1] = 0; }
if (!isset($_POST['cost'][$k-1])) { $_POST['cost'][$k-1] = 0; }
//Ініціюємо змінні

//Функція форматування дати
function my_date_format($date)
	{
	$year = substr ($date, 0, 4);
	$mounth = substr ($date, 5, 2);
	$day = substr ($date, 8, 2);
	$date = $day.".".$mounth.".".$year;
	return $date;
	}
//Функція форматування дати

//Список контрагентів
function kontragent_list($selected, $k)
	{
	$sql = mysql_query ("SELECT `id`,`short_name` FROM `kontragent`");
	while ($kontragent[] = mysql_fetch_array ($sql, MYSQL_ASSOC));
	$n = count($kontragent)-1;
	unset($kontragent[$n]);
	echo "<select name = 'kontragent' onchange =\"document.forms.form.action = '?k=".$k."'; document.form.submit();\">";
	echo "<option value = '0'";
	if ($selected == 0) {echo " selected";}
	echo "> ...вибрати покупця</option>";	
		for ($i = 0; $i < $n; $i++)
			{
			echo "<option value = '".$kontragent[$i]['id']."'";
				if ($selected == $kontragent[$i]['id']) {echo " selected";}
			echo ">".$kontragent[$i]['short_name']."</option>";
			}
	echo "</select>";
	}
//Список контрагентів

//Функція виводу списку товарів
function tovary_list($selected, $num, $k)
	{
	$sql = mysql_query ("SELECT `id`,`name` FROM `nomenklatura` WHERE `type` = 0");
	$n = mysql_num_rows ($sql);
	while ($tovar[] = mysql_fetch_array ($sql, MYSQL_ASSOC));
	echo "<select name = 'tovar[$num]' onchange = \"document.forms.form.action = '?k=".$k."'; document.form.submit();\">";
	echo "<option value = '0'";
	if ($selected == 0) {echo " selected";}
	echo "> ...вибрати товар</option>";
		for ($i = 0; $i < $n; $i++)
			{
			echo "<option value = '".$tovar[$i]['id']."'";
				if ($selected == $tovar[$i]['id']) {echo " selected";}
			echo ">".$tovar[$i]['name']."</option>";
			}
	echo "</select>";
	}
//Функція виводу списку товарів

//Функція виводу списку партій	
function partia_list($selected, $selected_tovar, $num, $k)
	{
	if ($selected_tovar == 0)
		{
		echo "<select name = 'partia[$num]'><option value = '0' selected> ...вибрати партію</option></select>";
		}
	else
		{
		$sql = mysql_query ("SELECT DISTINCT `number`,`date` FROM `nakladna` WHERE `document` = 0 AND `tovar` = $selected_tovar");
		$n = mysql_num_rows ($sql);
		while ($partia[] = mysql_fetch_array ($sql, MYSQL_ASSOC));
		echo "<select name = 'partia[$num]' onchange = \"document.forms.form.action = '?k=".$k."'; document.form.submit();\">";
		echo "<option value = '0'";
		if ($selected == 0) {echo " selected";}
		echo "> ...вибрати партію</option>";
			for ($i = 0; $i < $n; $i++)
				{
				echo "<option value = '".$partia[$i]['number']."'";
					if ($selected == $partia[$i]['number']) {echo " selected";}
				echo ">ПН-";
				printf ("%04d", $partia[$i]['number']);
				echo " від ".my_date_format($partia[$i]['date']);
				echo "</option>";
				}
		echo "</select>";
		}
	}
//Функція виводу списку партій
	
//Функція виведення залишків	
function ostatok($partia, $tovar)
	{
	return 0 + mysql_result (mysql_query ("SELECT `kkst` FROM `nakladna` 
													WHERE `document` = 0 
													AND `number` = ".$partia." 
													AND `tovar` = ".$tovar.""), 0)
			- mysql_result (mysql_query ("SELECT SUM(`kkst`) FROM `nakladna` 
													WHERE `document` = 1 
													AND `partia` = ".$partia." 
													AND `tovar` = ".$tovar.""), 0);
	}
//Функція виведення залишків

//Функція виведення собівартості
function vartist($tovar, $partia)
	{
	$cost = mysql_result (mysql_query ("SELECT `cost` FROM `nakladna` 
													WHERE `document` = 0 
													AND `tovar` = ".$tovar." 
													AND `number` = ".$partia.""), 0);
	return $cost;
	}
//Функція виведення собівартості
	
//Функція видалення строки
function element_del($j)
	{
	for ($i = $j; $i < $_GET['k']; $i++)
		{
		$_POST['kkst'][$i] = $_POST['kkst'][$i + 1];
		$_POST['cost'][$i] = $_POST['cost'][$i + 1];
		$_POST['tovar'][$i] = $_POST['tovar'][$i+1];
		$_POST['partia'][$i] = $_POST['partia'][$i+1];
		}
	unset($_POST['kkst'][$_GET['k']]);
	unset($_POST['cost'][$_GET['k']]);
	unset($_POST['tovar'][$_GET['k']]);
	unset($_POST['partia'][$_GET['k']]);
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
function get_units($tovar)
	{
	if ($tovar == 0) 
		{ $unit = null; }
	else
		{ $unit = " ".mysql_result (mysql_query ("SELECT `name` FROM `units` WHERE `id` = (SELECT `units` FROM `nomenklatura` WHERE `id` = ".$tovar.")"), 0); }
	return $unit;
	}
//Отримуємо одиниці виміру

//Отримуємо номер строки для видалення
if (isset($_GET['i'])) { element_del($_GET['i']); }
//Отримуємо номер строки для видалення

//Підключаємо шаблон форми
require_once "nakladna_rashod_form.html";
//Підключаємо шаблон форми

//Массив даних
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";
//Массив даних
?>
