<?php
//Отримуємо поточну сторінку
if (isset($_GET['pages']))
	{
	if ($_GET['pages'] == 0)
		{ $pages = 0; }
			else	
		{ $pages = --$_GET['pages']; }
	}
		else $pages = 0;
//Отримуємо поточну сторінку
		
//Отримуємо поточне сортування
$orderby = " ORDER BY `date` DESC ";
if (isset($_GET['order']))
	{ 
	$order = $_GET['order'];
	switch ($order)
		{
		case 1: $orderby = " ORDER BY 2 ASC "; break;
		case 2: $orderby = " ORDER BY 2 DESC "; break;
		case 3: $orderby = " ORDER BY 7 ASC "; break;
		case 4: $orderby = " ORDER BY 7 DESC "; break;
		case 5: $orderby = " ORDER BY 4 ASC "; break;
		case 6: $orderby = " ORDER BY 4 DESC "; break;
		case 9: $orderby = " ORDER BY 5 ASC "; break;
		case 10: $orderby = " ORDER BY 5 DESC "; break;
		}
	}
//Отримуємо поточне сортування
	
//Отримуемо змінні з періодом часу
$per_page = getvariable ('per_page', 10);
$max_date_bv = getvariable ('max_date', mysql_result (mysql_query ("SELECT max(`date`) FROM `bv`"), 0));
$min_date_bv = getvariable ('min_date', mysql_result (mysql_query ("SELECT min(`date`) FROM `bv`"), 0));
$max_date_pld = getvariable ('max_date', mysql_result (mysql_query ("SELECT max(`date`) FROM `pld`"), 0));
$min_date_pld = getvariable ('min_date', mysql_result (mysql_query ("SELECT min(`date`) FROM `pld`"), 0));
if ($max_date_bv > $max_date_pld) $max_date = $max_date_bv; else $max_date = $max_date_pld;
if ($min_date_bv < $min_date_pld) $min_date = $min_date_bv; else $min_date = $min_date_pld;
$n = mysql_num_rows(mysql_query("SELECT `id` FROM `bv` WHERE DATE(`date`) BETWEEN '$min_date' AND '$max_date' GROUP BY `date`"));
$n += mysql_num_rows(mysql_query("SELECT `id` FROM `pld` WHERE DATE(`date`) BETWEEN '$min_date' AND '$max_date'"));
$start = $pages*$per_page;
$num_pages = ceil($n/$per_page);
//Отримуемо змінні з періодом часу

//Отримуємо к-ксть строк на сторінці
if ($pages == $num_pages - 1)
	{
	$finish = $n % $per_page;
	if ($finish == 0)
		{ $finish = $per_page; }
	}
		else
	{ $finish = $per_page; }
if ($n == 0) { $finish = 0; }
//Отримуємо к-ксть строк на сторінці

//Зчитуємо вибіркові дані
$sql = mysql_query("SELECT `id`,`date`,`summa`,`number`,`kontragent`,'-' AS `status`,'0' AS `document` FROM `pld` 
					WHERE DATE(`date`) BETWEEN '$min_date' AND '$max_date' 
						UNION
					SELECT `id`,`date`, '-','-',`rahunok` AS `kontragent`,`status`,'1' AS `document` FROM `bv` 
					WHERE DATE(`date`) BETWEEN '$min_date' AND '$max_date'	
					GROUP BY `date`
						".$orderby."
					LIMIT $start,$finish");
while ($bank[] = mysql_fetch_array ($sql, MYSQL_ASSOC));
//Зчитуємо вибіркові дані

//Підготовка данних для виведення
$bank['add_pld'] = "<a href = 'bank.php?page=1'>Додати платіжне доручення</a>";
$bank['add_bv'] = "<input type = 'button' value = 'Додати банківську виписку'
							onClick = 'WinObj = window.open(\"PHP/bank/bv_form.php\", \"\",
							\"width = 920px, height = 280px, toolbar = 0, status = 0, top = 200px, left = 200px\");'>";
$bank['zvit'] = "<a href = 'bank.php?page=5'>Сформувати звіт</a>";
$action = "bank.php?page=0";

for ($i = 0; $i < $finish; $i++)
	{
	$bank[$i]['date'] = my_date_format($bank[$i]['date']);
	if ($bank[$i]['document'] == 0)
		{ $bank[$i]['document_name'] = "Платіжне доручення"; }
	if ($bank[$i]['document'] == 1)
		{ $bank[$i]['document_name'] = "Банківська виписка"; }
	switch ($bank[$i]['document'])
		{
		case '0': $bank[$i]['number'] = "ПД-".sprintf ("%04d", $bank[$i]['number']); break;
		case '1': $bank[$i]['number'] = "-"; break;
		}
	$bank[$i]['summa'] = number_format ($bank[$i]['summa'], 2, '.', ' ')." грн.";
	if ($bank[$i]['document'] == '1')
		{ $bank[$i]['kontragent'] = mysql_result (mysql_query ("SELECT `name` FROM `rahunki` WHERE `id` = ".$bank[$i]['kontragent'].""), 0); }
	if ($bank[$i]['document'] == '0')
		{ $bank[$i]['kontragent'] = mysql_result (mysql_query ("SELECT `short_name` FROM `kontragent` WHERE `id` = ".$bank[$i]['kontragent'].""), 0); }
	$bank[$i]['open_name'] = "<a href = '#' onClick = 'WinObj = window.open(\"PHP/bank/bv_edit.php?id=".$bank[$i]['id']."\", \"\",
							\"width = 920px, height = 280px, toolbar = 0, status = 0, top = 200px, left = 200px\");'>".$bank[$i]['document_name']."</a>";
	if ($bank[$i]['document'] == '0') 
		{ $bank[$i]['provodka'] = "Не проводиться"; }
	if ($bank[$i]['status'] == 0 AND $bank[$i]['document'] == '1')
		{ $bank[$i]['provodka'] = "<a href = 'php/bank/bank_make.php?id=".$bank[$i]['id']."'>Не проведено</a>"; }
	if ($bank[$i]['status'] == 1 AND $bank[$i]['document'] == '1')
		{ $bank[$i]['provodka'] = "<a href = 'php/bank/bank_make.php?id=".$bank[$i]['id']."'>Проведено</a>"; }
	$bank[$i]['del'] = "<a href = 'php/bank/bank_del.php?id=".$bank[$i]['id']."&document=".$bank[$i]['document']."' 
					onclick = \"return confirm('Ви дійсно бажаєте видалити ".$bank[$i]['document_name']." ".$bank[$i]['number']."?')\"><img src = 'PNG/del.png'></a>";
	}
//Підготовка данних для виведення

//Підключення шаблонів
require_once "HTML/date_form.html";
require_once "HTML/bank/bank_list.html";
//Підключення шаблонів

//Масив даних	
//echo "<pre>";
//print_r($bank);
//echo "</pre>";
//Масив даних	
?>