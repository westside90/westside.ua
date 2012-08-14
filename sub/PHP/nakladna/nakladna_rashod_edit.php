<?php
//Налаштування сторінки і коннект з БД
error_reporting(0);
require_once "../../PHP/dbconnect.php";
//Налаштування сторінки і коннект з БД

//Отримуємо дані існуючої виписки
if (isset($_GET['id']))
	{
	$_GET['old'] = $_GET['id'];
	$sql = mysql_query ("SELECT `number`,`date`,`kontragent`,`prymitka`,`order_number`,`order_date`,`order_across`,`tovar`,`partia`,`kkst`,`cost` FROM `nakladna` 
						WHERE `document` = 1 
						AND `number` = (SELECT `number` FROM `nakladna` WHERE `id` = ".$_GET['old'].")");
	$k = mysql_num_rows ($sql);
	while ($nakladna[] = mysql_fetch_array ($sql, MYSQL_ASSOC));
	unset($nakladna[$k]);

	//Перетворюємо масив
	$nakladna['number'] = $nakladna[0]['number'];
	$nakladna['date'] = $nakladna[0]['date'];
	$nakladna['kontragent'] = $nakladna[0]['kontragent'];
	$nakladna['prymitka'] = $nakladna[0]['prymitka'];
	$nakladna['order_date'] = $nakladna[0]['order_date'];
	$nakladna['order_number'] = $nakladna[0]['order_number'];
	$nakladna['order_across'] = $nakladna[0]['order_across'];
	for ($i = 0; $i < $k; $i++)
		{
		$nakladna['tovar'][$i] = $nakladna[$i]['tovar'];
		$nakladna['partia'][$i] = $nakladna[$i]['partia'];
		$nakladna['kkst'][$i] = $nakladna[$i]['kkst'];
		$nakladna['cost'][$i] = $nakladna[$i]['cost'];
		unset($nakladna[$i]);
		}
	//Перетворюємо масив

	//Масив даних
	//echo "<pre>";
	//print_r($nakladna);
	//echo "</pre>";
	//Масив даних

	$_POST = $nakladna;
	}
//Отримуємо дані існуючої виписки

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
	echo "<select name = 'kontragent' onchange =\"document.forms.form.action = '?page=2&k=".$k."&old=".$_GET['old']."'; document.form.submit();\">";
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
	echo "<select name = 'tovar[$num]' onchange = \"document.forms.form.action = '?page=2&k=".$k."&old=".$_GET['old']."'; document.form.submit();\">";
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
function partia_list($selected, $selected_tovar, $date, $num, $k)
	{
	if ($selected_tovar == 0)
		{
		echo "<select name = 'partia[$num]'><option value = '0' selected> ...вибрати партію</option></select>";
		}
	else
		{
		$sql = mysql_query ("SELECT DISTINCT `number`,`date`,`document` FROM `nakladna` 
								WHERE (`document` = 0 OR `document` = 3) 
								AND `status` = 1 
								AND `tovar` = ".$selected_tovar." 
								AND DATE(`date`) <= '".$date."'");
		$n = mysql_num_rows ($sql);
		while ($partia[] = mysql_fetch_array ($sql, MYSQL_ASSOC));
		echo "<select name = 'partia[$num]' onchange = \"document.forms.form.action = '?page=2&k=".$k."&old=".$_GET['old']."'; document.form.submit();\">";
		echo "<option value = '0'";
		if ($selected == 0) {echo " selected";}
		echo "> ...вибрати партію</option>";
			for ($i = 0; $i < $n; $i++)
				{
				echo "<option value = '".$partia[$i]['number']."'";
					if ($selected == $partia[$i]['number']) {echo " selected";}
				if ($partia[$i]['document'] == 3)
					{
					echo ">ВЗ";
					}
				else
					{
					echo ">ПН-";
					printf ("%04d", $partia[$i]['number']);
					}
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
													WHERE `number` = ".$partia." 
													AND `tovar` = ".$tovar.""), 0)
			- mysql_result (mysql_query ("SELECT SUM(`kkst`) FROM `nakladna` 
													WHERE `partia` = ".$partia." 
													AND `tovar` = ".$tovar.""), 0);
	}
//Функція виведення залишків

//Функція виведення собівартості
function vartist($tovar, $partia)
	{
	$cost = mysql_result (mysql_query ("SELECT `cost` FROM `nakladna` 
													WHERE `tovar` = ".$tovar." 
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

//Кнопки
$form['add_kontragent'] = "<input type = 'button'
			value = 'Новий контрагент'
			onClick = 'WinObj = window.open(\"../kontragent/kontragent_form.php\", \"\",
			\"width = 400px, height = 720px, toolbar = 0, status = 0, top = 250px, left = 300px\");'>";
$form['save'] = "<input type = 'button'
				value = 'Зберегти документ'
				onClick = \"if (confirm('Зберегти документ?'))
						{
						if (confirm('Провести документ?'))
							{ document.forms.form.action='nakladna_rashod_update.php?k=".$k."&status=1&old=".$_GET['old']."'; }
						else
							{ document.forms.form.action='nakladna_rashod_update.php?k=".$k."&status=0&old=".$_GET['old']."'; }
						document.form.submit();
						opener.location.reload();
						}\">";
$form['close'] = "<input type = 'button'
					value = 'Закрити'
					onclick = \"if (confirm('Закрити не зберігаючи?')) { window.close(); opener.location.reload(); }\">";
$form['add_line'] = "<input type = 'button'
					value = 'Додати нову строку'
					onclick = \"document.forms.form.action='?k=".($k + 1)."&old=".$_GET['old']."'; document.form.submit(); window.outerHeight=(window.outerHeight+30);\">";
$form['onblur'] = "onBlur = \"document.forms.form.action = '?k=".$k."&old=".$_GET['old']."'; document.form.submit();\"";
//Кнопки

//Отримуємо номер строки для видалення
if (isset($_GET['i'])) { element_del($_GET['i']); }
//Отримуємо номер строки для видалення

//Підключаємо шаблон форми
require_once "../../HTML/nakladna/nakladna_rashod_form.html";
//Підключаємо шаблон форми

//Массив даних
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";
//Массив даних
?>
