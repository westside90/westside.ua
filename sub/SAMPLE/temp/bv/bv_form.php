<?php
//Налаштування сторінки і коннект з БД
//error_reporting(0);
require_once "../../PHP/dbconnect2.php";
//Налаштування сторінки і коннект з БД

//Визначаємо дату накладної
$date = date("Y-m-d");
//Визначаємо дату накладної

//Ініціюємо змінні
if (isset($_GET['k'])) { $k = $_GET['k']; } else { $k = 1; }

if (!isset($_POST['date'])) { $_POST['date'] = $date; }
if (!isset($_POST['rahunok'])) { $_POST['rahunok'] = 0; }

if (!isset($_POST['type'][$k-1])) { $_POST['type'][$k-1] = 0; }
if (!isset($_POST['make_type'][$k-1])) { $_POST['make_type'][$k-1] = 0; }
if (!isset($_POST['make'][$k-1])) { $_POST['make'][$k-1] = 0; }
if (!isset($_POST['summa'][$k-1])) { $_POST['summa'][$k-1] = 0; }
if (!isset($_POST['description'][$k-1])) { $_POST['description'][$k-1] = "&nbsp"; }
//Ініціюємо змінні

//Прихід/розхід
function type_list($type, $num, $k)
	{
	echo "<select name = 'type[$num]' onchange = \"document.forms.form.action = '?k=".$k."'; document.form.submit();\">";
	echo "<option value = '0'"; 
		if ($type == 0) { echo " selected"; }
		echo">Прихід</option>";
	echo "<option value = '1'"; 
		if ($type == 1) { echo " selected"; }
		echo">Розхід</option>";
	echo "</select>";
	}
//Прихід/розхід
	
//Список типу витрат	
function make_type_list($make_type, $type, $num, $k)
	{
	echo "<select name = 'make_type[$num]' onchange = \"document.forms.form.action = '?k=".$k."'; document.form.submit();\">";
	echo "<option value = '0'"; 
		if ($make_type == 0) { echo " selected"; }
		if ($type == 0)	{ echo">Надходження</option>"; }
		if ($type == 1)	{ echo">Витрати</option>"; }
	echo "<option value = '1'"; 
		if ($make_type == 1) { echo " selected"; }
		echo">Контрагент</option>";
	echo "</select>";
	}
//Список типу витрат
	
//Список контрагентів/витрат/надходжень 	
function make_list($make, $make_type, $type, $num, $k)
	{
	if ($make_type == 0)
		{
		if ($type == 0)
			{ $sql = mysql_query ("SELECT `id`,`name` FROM `vytraty` WHERE `type` = 1"); }
		if ($type == 1)
			{ $sql = mysql_query ("SELECT `id`,`name` FROM `vytraty` WHERE `type` = 0"); }
		}
	if ($make_type == 1)
		{ $sql = mysql_query ("SELECT `id`,`short_name` AS 'name' FROM `kontragent`"); }
	while ($list[] = mysql_fetch_array ($sql, MYSQL_ASSOC));
	$n = count($list)-1;
	unset($list[$n]);

	echo "<select name = 'make[$num]' onchange = \"document.forms.form.action = '?k=".$k."'; document.form.submit();\">";
		for ($i = 0; $i < $n; $i++)
			{
			echo "<option value = '".$list[$i]['id']."'";
				if ($make == $list[$i]['id']) {echo " selected";}
			echo ">".$list[$i]['name']."</option>";
			}
	echo "</select>";
	}
//Список контрагентів/витрат/надходжень 

//Список рахунків користувача
function rahunki_list($selected, $k)
	{
	$sql = mysql_query ("SELECT `id`,`bank_id`,`mfo`,`bank` FROM `rahunki` WHERE `kontragent` = 0");
	while($rahunki_list[] = mysql_fetch_array($sql, MYSQL_ASSOC));
	$n = count($rahunki_list) - 1;
	unset($rahunki_list[$n]);
	echo "<select name = 'rahunok' onchange = \"document.forms.form.action = '?k=".$k."'; document.form.submit();\">";
	echo "<option value = '0'";
	if ($selected == 0) {echo " selected";}
	echo "> ...вибрати рахунок</option>";
		for ($i = 0; $i < $n; $i++)
			{
			$rahunki_list[$i]['name'] = $rahunki_list[$i]['mfo'].", ".$rahunki_list[$i]['bank'].", ".$rahunki_list[$i]['bank_id'];
			echo "<option value = '".$rahunki_list[$i]['id']."'";
				if ($selected == $rahunki_list[$i]['id']) {echo " selected";}
			echo ">".$rahunki_list[$i]['name']."</option>";
			}
	echo "</select>";	
	}
//Список рахунків користувача

//Функція видалення елементу
function element_del($j)
	{
	for ($i = $j; $i < $_GET['k']; $i++)
		{
		$_POST['type'][$i] = $_POST['type'][$i + 1];
		$_POST['make_type'][$i] = $_POST['make_type'][$i + 1];
		$_POST['make'][$i] = $_POST['make'][$i+1];
		$_POST['summa'][$i] = $_POST['summa'][$i+1];
		$_POST['description'][$i] = $_POST['description'][$i+1];		
		}
	unset($_POST['type'][$_GET['k']]);
	unset($_POST['cost'][$_GET['k']]);
	unset($_POST['tovar'][$_GET['k']]);
	unset($_POST['summa'][$_GET['k']]);
	unset($_POST['description'][$_GET['k']]);
	}
//Функція видалення елементу
	
//Фукнкція знаходження суми	
function summa_prihod($k)
	{
	$summa_prihod = 0;
	for ($i = 0; $i < $k; $i++)
		{
		if ($_POST['type'][$i] == 0)
			{ $summa_prihod += str_replace(" ","",$_POST['summa'][$i]);}
		}
	return $summa_prihod;
	}
//Фукнкція знаходження суми

//Фукнкція знаходження суми	
function summa_rashod($k)
	{
	$summa_rashod = 0;
	for ($i = 0; $i < $k; $i++)
		{
		if ($_POST['type'][$i] == 1)
			{ $summa_rashod += str_replace(" ","",$_POST['summa'][$i]);}
		}
	return $summa_rashod;
	}
//Фукнкція знаходження суми

//Функція знаходження залишків
function ost_start($date, $rahunok)
	{
	$sql1 = mysql_query ("SELECT SUM(`summa`) FROM `bv` WHERE `document` = 0 AND `status` = 1 AND `type` = 0 AND `rahunok` = ".$rahunok." AND DATE(`date`) <= '".$date."'");
	$sql2 = mysql_query ("SELECT SUM(`summa`) FROM `bv` WHERE `document` = 0 AND `status` = 1 AND `type` = 1 AND `rahunok` = ".$rahunok." AND DATE(`date`) <= '".$date."'");
	$ost = 0 + mysql_result ($sql1, 0) - mysql_result ($sql2, 0);
	return $ost;
	}
//Функція знаходження залишків
	
//Отримуємо номер строки для видалення
if (isset($_GET['i'])) { element_del($_GET['i']); }
//Отримуємо номер строки для видалення

//Підключаємо шаблон банківської виписки
require_once "bv_form.html";
//Підключаємо шаблон банківської виписки

//Масив даних
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";
//Масив даних
?>
