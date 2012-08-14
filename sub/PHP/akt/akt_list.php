<?php
//Отримуємо поточну сторінку
if (isset($_GET['pages']))
	{
	if ($_GET['pages'] == 0)
		$pages = 0;
			else	
		$pages = --$_GET['pages'];
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
		case 1: $orderby = " ORDER BY `kontragent` ASC "; break;
		case 2: $orderby = " ORDER BY `kontragent` DESC "; break;
		case 3: $orderby = " ORDER BY `type` ASC "; break;
		case 4: $orderby = " ORDER BY `type` DESC "; break;
		case 5: $orderby = " ORDER BY `number` ASC "; break;
		case 6: $orderby = " ORDER BY `number` DESC "; break;
		case 7: $orderby = " ORDER BY `date` ASC "; break;
		case 8: $orderby = " ORDER BY `date` DESC "; break;
		case 9: $orderby = " ORDER BY `summa` ASC "; break;
		case 10: $orderby = " ORDER BY `summa` DESC "; break;
		}
	}
//Отримуємо поточне сортування
	
//Отримуемо змінні з періодом часу	
$per_page = getvariable ('per_page', 10);
$max_date = getvariable ('max_date', mysql_result (mysql_query ("SELECT max(`date`) FROM `akt`"), 0));
$min_date = getvariable ('min_date', mysql_result (mysql_query ("SELECT min(`date`) FROM `akt`"), 0));	
$n = mysql_num_rows(mysql_query("SELECT `id` FROM `akt` WHERE DATE(`date`) BETWEEN '$min_date' AND '$max_date' GROUP BY `document`,`number`"));
$start = $pages*$per_page;
$num_pages = ceil($n/$per_page);
//Отримуемо змінні з періодом часу	

//Отримуємо к-ксть строк на сторінці
if ($pages == $num_pages - 1)
	{$finish = $n % $per_page;
		if ($finish == 0)
			{$finish = $per_page;}
	}
		else
	{$finish = $per_page;}
if ($n == 0) {$finish = 0;}
//Отримуємо к-ксть строк на сторінці

//Зчитуємо вибіркові дані
$sql = mysql_query("SELECT `id`,`date`,`document`,`number`,SUM(`summa`) AS `summa`,`kontragent`,`prymitka`,`status` FROM `akt` 
					WHERE DATE(`date`) BETWEEN '$min_date' AND '$max_date' GROUP BY `document`,`number` ".$orderby."
					LIMIT $start,$finish");
while ($akt[] = mysql_fetch_array ($sql, MYSQL_ASSOC));
//Зчитуємо вибіркові дані

//Підготовка данних для виведення
$akt['add_prihod'] = "<input type = 'button' value = '".$language[$lang]['add_akt_prihod']."'
							onClick = 'WinObj = window.open(\"PHP/akt/akt_form.php?document=0\", \"\",
							\"width = 750px, height = 300px, toolbar = 0, status = 0, top = 200px, left = 200px\");'>";
$akt['add_rashod'] = "<input type = 'button' value = '".$language[$lang]['add_akt_rashod']."'
							onClick = 'WinObj = window.open(\"PHP/akt/akt_form.php?document=1\", \"\",
							\"width = 750px, height = 300px, toolbar = 0, status = 0, top = 200px, left = 200px\");'>";
$akt['add_rno'] = "<input type = 'button' value = '".$language[$lang]['add_rno']."'
							onClick = 'WinObj = window.open(\"PHP/akt/akt_rno_form.php\", \"\",
							\"width = 750px, height = 350px, toolbar = 0, status = 0, top = 200px, left = 200px\");'>";
$action = "akt.php?page=0";

for ($i = 0; $i < $finish; $i++)
	{
	$akt[$i]['date'] = my_date_format($akt[$i]['date']);
	switch ($akt[$i]['document'])
		{
		case 0: $akt[$i]['document_name'] = $language[$lang]['akt_prihod']; break;
		case 1: $akt[$i]['document_name'] = $language[$lang]['akt_rashod']; break;
		case 2: $akt[$i]['document_name'] = $language[$lang]['rno']; break;
		}
	switch ($akt[$i]['document'])
		{
		case 0: $akt[$i]['number'] = "НП-".sprintf ("%04d", $akt[$i]['number']); break;
		case 1: $akt[$i]['number'] = "ОП-".sprintf ("%04d", $akt[$i]['number']); break;
		case 2: $akt[$i]['number'] = "РНО-".sprintf ("%04d", $akt[$i]['number']); break;
		}
	$akt[$i]['summa'] = number_format ($akt[$i]['summa'], 2, '.', ' ')." грн.";
	$akt[$i]['kontragent'] = mysql_result (mysql_query ("SELECT `short_name` FROM `kontragent` WHERE `id` = ".$akt[$i]['kontragent'].""), 0);
	switch ($akt[$i]['document'])
		{
		case 0: $type_page = 4; break;
		case 1: $type_page = 4; break;
		case 2: $type_page = 5; break;
		}
	$akt[$i]['open_name'] = "<a href = 'akt.php?page=".$type_page."&id=".$akt[$i]['id']."'>".$akt[$i]['document_name']."</a>";
	if ($akt[$i]['document'] == 2) 
		{ $akt[$i]['provodka'] = $language[$lang]['status_not']; }
	if ($akt[$i]['status'] == 0 AND ($akt[$i]['document'] == 0 OR $akt[$i]['document'] == 1 ))
		{ $akt[$i]['provodka'] = "<a href = 'php/akt/akt_make.php?id=".$akt[$i]['id']."'>".$language[$lang]['status_off']."</a>"; }
	if ($akt[$i]['status'] == 1 AND ($akt[$i]['document'] == 0 OR $akt[$i]['document'] == 1))
		{ $akt[$i]['provodka'] = "<a href = 'php/akt/akt_make.php?id=".$akt[$i]['id']."'>".$language[$lang]['status_on']."</a>"; }
	$akt[$i]['del'] = "<a href = 'php/akt/akt_del.php?id=".$akt[$i]['id']."' 
					onclick = \"return confirm('".$language[$lang]['alert_del'].$akt[$i]['document_name']." ".$akt[$i]['number']."?')\"><img src = 'PNG/del.png'></a>";
	}
//Підготовка данних для виведення

//Підключення шаблонів
require_once "HTML/date_form.html";
require_once "HTML/akt/akt_list.html";
//Підключення шаблонів

//Масив даних	
//echo "<pre>";
//print_r($akt);
//echo "</pre>";
//Масив даних	
?>