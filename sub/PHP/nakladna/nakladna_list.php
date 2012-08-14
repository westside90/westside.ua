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
		}
	}
//Отримуємо поточне сортування
	
//Отримуемо змінні з періодом часу 	
$per_page = getvariable ('per_page', 10);
$max_date = getvariable ('max_date', mysql_result (mysql_query ("SELECT max(`date`) FROM `nakladna`"), 0));
$min_date = getvariable ('min_date', mysql_result (mysql_query ("SELECT min(`date`) FROM `nakladna`"), 0));	
$n = mysql_num_rows(mysql_query("SELECT `id` FROM `nakladna` WHERE DATE(`date`) BETWEEN '$min_date' AND '$max_date' 
									AND `id` IN (SELECT MIN(id) FROM `nakladna` GROUP BY `number`,`document`)"));
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
$sql = mysql_query("SELECT `id`,`date`,`document`,`number`,`kontragent`,`prymitka`,`status` FROM `nakladna` 
					WHERE DATE(`date`) BETWEEN '$min_date' AND '$max_date' 
					AND `id` IN (SELECT MIN(id) FROM `nakladna` GROUP BY `number`,`document`)".$orderby." 
					LIMIT $start,$finish");
while ($nakladna[] = mysql_fetch_array ($sql, MYSQL_ASSOC));

for ($i = 0; $i < $finish; $i++)
	$nakladna[$i]['summa'] = mysql_result (mysql_query ("SELECT SUM(summa) FROM `nakladna` 
						WHERE `number` = ".$nakladna[$i]['number']." AND `document` = ".$nakladna[$i]['document'].""), 0);
//Зчитуємо вибіркові дані

//Підготовка данних для виведення
$nakladna['add_prihod'] = "<input type = 'button' value = '".$language[$lang]['add_nakladna_prihod']."'
							onClick = 'WinObj = window.open(\"PHP/nakladna/nakladna_prihod_form.php\", \"\",
							\"width = 750px, height = 300px, toolbar = 0, status = 0, top = 200px, left = 200px\");'>";
$nakladna['add_rashod'] = "<input type = 'button' value = '".$language[$lang]['add_nakladna_rashod']."'
							onClick = 'WinObj = window.open(\"PHP/nakladna/nakladna_rashod_form.php\", \"\",
							\"width = 1050px, height = 350px, toolbar = 0, status = 0, top = 200px, left = 200px\");'>";
$nakladna['add_rno'] = "<input type = 'button' value = '".$language[$lang]['add_rno']."'
							onClick = 'WinObj = window.open(\"PHP/nakladna/nakladna_rno_form.php\", \"\",
							\"width = 750px, height = 320px, toolbar = 0, status = 0, top = 200px, left = 200px\");'>";
$nakladna['zvit_short'] = "<a href = 'nakladna.php?page=9'>".$language[$lang]['add_zvit_short']."</a>";
$nakladna['zvit_full'] = "<a href = 'nakladna.php?page=10'>".$language[$lang]['add_zvit_full']."</a>";
$action = "nakladna.php?page=0";

for ($i = 0; $i < $finish; $i++)
	{
	$nakladna[$i]['date'] = my_date_format($nakladna[$i]['date']);
	switch ($nakladna[$i]['document'])
		{
		case 0: $nakladna[$i]['document_name'] = $language[$lang]['nakladna_prihod']; break;
		case 1: $nakladna[$i]['document_name'] = $language[$lang]['nakladna_rashod']; break;
		case 2: $nakladna[$i]['document_name'] = $language[$lang]['rno']; break;
		case 3: $nakladna[$i]['document_name'] = $language[$lang]['ost']; break;
		}
	switch ($nakladna[$i]['document'])
		{
		case 0: $nakladna[$i]['number'] = "ПН-".sprintf ("%04d", $nakladna[$i]['number']); break;
		case 1: $nakladna[$i]['number'] = "РН-".sprintf ("%04d", $nakladna[$i]['number']); break;
		case 2: $nakladna[$i]['number'] = "РНО-".sprintf ("%04d", $nakladna[$i]['number']); break;
		case 3: $nakladna[$i]['number'] = "ВЗ"; break;
		}
	$nakladna[$i]['summa'] = number_format ($nakladna[$i]['summa'], 2, '.', ' ')." грн.";
	if ($nakladna[$i]['document'] == 3)
		{ $nakladna[$i]['kontragent'] = '-'; }
	else
		{ $nakladna[$i]['kontragent'] = mysql_result (mysql_query ("SELECT `short_name` FROM `kontragent` WHERE `id` = ".$nakladna[$i]['kontragent'].""), 0); }
	switch ($nakladna[$i]['document'])
		{
		case 0: $document_page = "PHP/nakladna/nakladna_prihod_edit.php"; break;
		case 1: $document_page = "PHP/nakladna/nakladna_rashod_edit.php"; break;
		case 2: $document_page = "PHP/nakladna/nakladna_rno_edit.php"; break;
		case 3: $document_page = "PHP/nakladna/nakladna_ost_edit.php"; break;
		}
	$nakladna[$i]['open_name'] = "<a href = '#' onClick = 'WinObj = window.open(\"".$document_page."?id=".$nakladna[$i]['id']."\", \"\",
							\"width = 920px, height = 400px, toolbar = 0, status = 0, top = 200px, left = 200px\");'>".$nakladna[$i]['document_name']."</a>";
	if ($nakladna[$i]['document'] == 2) 
		{ $nakladna[$i]['provodka'] = $language[$lang]['status_not']; }
	if ($nakladna[$i]['status'] == 0 AND ($nakladna[$i]['document'] == 0 OR $nakladna[$i]['document'] == 1  OR $nakladna[$i]['document'] == 3))
		{ $nakladna[$i]['provodka'] = "<a href = 'php/nakladna/nakladna_make.php?id=".$nakladna[$i]['id']."'>".$language[$lang]['status_off']."</a>"; }
	if ($nakladna[$i]['status'] == 1 AND ($nakladna[$i]['document'] == 0 OR $nakladna[$i]['document'] == 1  OR $nakladna[$i]['document'] == 3))
		{ $nakladna[$i]['provodka'] = "<a href = 'php/nakladna/nakladna_make.php?id=".$nakladna[$i]['id']."'>".$language[$lang]['status_on']."</a>"; }
	$nakladna[$i]['del'] = "<a href = 'php/nakladna/nakladna_del.php?id=".$nakladna[$i]['id']."' 
					onclick = \"return confirm('".$language[$lang]['alert_del'].$nakladna[$i]['document_name']." ".$nakladna[$i]['number']."?')\"><img src = 'PNG/del.png'></a>";
	}
//Підготовка данних для виведення

//Підключення шаблонів
require_once "HTML/date_form.html";
require_once "HTML/nakladna/nakladna_list.html";
//Підключення шаблонів

//Масив даних	
//echo "<pre>";
//print_r($nakladna);
//echo "</pre>";
//Масив даних	
?>