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
		case 1: $orderby = " ORDER BY `date` ASC "; break;
		case 2: $orderby = " ORDER BY `date` DESC "; break;
		case 3: $orderby = " ORDER BY `type` ASC "; break;
		case 4: $orderby = " ORDER BY `type` DESC "; break;
		case 5: $orderby = " ORDER BY `number` ASC "; break;
		case 6: $orderby = " ORDER BY `number` DESC "; break;
		case 7: $orderby = " ORDER BY `summa` ASC "; break;
		case 8: $orderby = " ORDER BY `summa` DESC "; break;
		case 9: $orderby = " ORDER BY `make` ASC "; break;
		case 10: $orderby = " ORDER BY `make` DESC "; break;
		}
	}
//Отримуємо поточне сортування
	
//Отримуемо змінні з періодом часу	
$per_page = getvariable ('per_page', 10);
$max_date = getvariable ('max_date', mysql_result (mysql_query ("SELECT max(`date`) FROM `kassa`"), 0));
$min_date = getvariable ('min_date', mysql_result (mysql_query ("SELECT min(`date`) FROM `kassa`"), 0));	
$n = mysql_num_rows(mysql_query("SELECT `id` FROM `kassa` WHERE DATE(`date`) BETWEEN '$min_date' AND '$max_date' AND `document` != 2"));
$n += mysql_num_rows(mysql_query("SELECT `id` FROM `kassa` WHERE DATE(`date`) BETWEEN '$min_date' AND '$max_date' AND `document` = 2 GROUP BY `date`"));
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
$sql = mysql_query("SELECT `id`,`date`,`document`,`status`,`number`,`type`,`make_type`,`make`,`summa` FROM `kassa` 
					WHERE DATE(`date`) BETWEEN '$min_date' AND '$max_date' AND (`document` = 0 OR `document` = 1)
						UNION
					SELECT `id`,`date`,`document`,`status`,'-','-','-','-','-' FROM `kassa` 
					WHERE DATE(`date`) BETWEEN '$min_date' AND '$max_date' AND `document` = 2 
					GROUP BY `date`
						".$orderby."
					LIMIT $start,$finish");
while ($kassa[] = mysql_fetch_array ($sql, MYSQL_ASSOC));
//Зчитуємо вибіркові дані

//Підготовка данних для виведення
$kassa['add_prihod'] = "<a href = 'kassa.php?page=1'>".$language[$lang]['add_kassa_prihod']."</a>";
$kassa['add_rashod'] = "<a href = 'kassa.php?page=2'>".$language[$lang]['add_kassa_rashod']."</a>";
$kassa['add_kl'] = "<input type = 'button' value = 'Додати касовий лист'
							onClick = 'WinObj = window.open(\"PHP/kassa/kl_form.php\", \"\",
							\"width = 920px, height = 280px, toolbar = 0, status = 0, top = 200px, left = 200px\");'>";
$kassa['zvit'] = "<a href = 'kassa.php?page=11'>".$language[$lang]['add_zvit']."</a>";
$action = "kassa.php?page=0";

for ($i = 0; $i < $finish; $i++)
	{
	$kassa[$i]['date'] = my_date_format($kassa[$i]['date']);
	switch ($kassa[$i]['document'])
		{
		case 0: $kassa[$i]['document_name'] = $language[$lang]['kassa_prihod']; break;
		case 1: $kassa[$i]['document_name'] = $language[$lang]['kassa_rashod']; break;
		case 2: $kassa[$i]['document_name'] = $language[$lang]['kl']; break;
		case 3: $kassa[$i]['document_name'] = $language[$lang]['ost']; break;
		}
	switch ($kassa[$i]['document'])
		{
		case 0: $kassa[$i]['number'] = "ПКО-".sprintf ("%04d", $kassa[$i]['number']); break;
		case 1: $kassa[$i]['number'] = "РКО-".sprintf ("%04d", $kassa[$i]['number']); break;
		case 2: $kassa[$i]['number'] = "-"; break;
		case 3: $kassa[$i]['number'] = "-"; break;
		}
	if ($kassa[$i]['document'] == 0 OR $kassa[$i]['document'] == 1)
		{ $kassa[$i]['summa'] = number_format ($kassa[$i]['summa'], 2, '.', ' ')." грн."; }
	if ($kassa[$i]['make_type'] == '-')
		{ $kassa[$i]['kontragent'] = "-"; }
	if ($kassa[$i]['make_type'] == '0')
		{ $kassa[$i]['kontragent'] = mysql_result (mysql_query ("SELECT `name` FROM `vytraty` WHERE `id` = ".$kassa[$i]['make'].""), 0); }
	if ($kassa[$i]['make_type'] == '1')
		{ $kassa[$i]['kontragent'] = mysql_result (mysql_query ("SELECT `short_name` FROM `kontragent` WHERE `id` = ".$kassa[$i]['make'].""), 0); }
	$kassa[$i]['open_name'] = "<a href = '#' onClick = 'WinObj = window.open(\"PHP/kassa/kl_edit.php?id=".$kassa[$i]['id']."\", \"\",
							\"width = 920px, height = 280px, toolbar = 0, status = 0, top = 200px, left = 200px\");'>".$kassa[$i]['document_name']."</a>";
	if ($kassa[$i]['document'] == 0 OR $kassa[$i]['document'] == 1) 
		{ $kassa[$i]['provodka'] = $language[$lang]['status_not']; }
	if ($kassa[$i]['status'] == 0 AND ($kassa[$i]['document'] == 2 OR $kassa[$i]['document'] == 3))
		{ $kassa[$i]['provodka'] = "<a href = 'php/kassa/kassa_make.php?id=".$kassa[$i]['id']."'>".$language[$lang]['status_off']."</a>"; }
	if ($kassa[$i]['status'] == 1 AND ($kassa[$i]['document'] == 2 OR $kassa[$i]['document'] == 3))
		{ $kassa[$i]['provodka'] = "<a href = 'php/kassa/kassa_make.php?id=".$kassa[$i]['id']."'>".$language[$lang]['status_on']."</a>"; }
	$kassa[$i]['del'] = "<a href = 'php/kassa/kassa_del.php?id=".$kassa[$i]['id']."' 
					onclick = \"return confirm('".$language[$lang]['alert_del'].$kassa[$i]['document_name']." ".$kassa[$i]['number']."?')\"><img src = 'PNG/del.png'></a>";
	}
//Підготовка данних для виведення

//Підключення шаблонів
require_once "HTML/date_form.html";
require_once "HTML/kassa/kassa_list.html";
//Підключення шаблонів

//Масив даних	
//echo "<pre>";
//print_r($kassa);
//echo "</pre>";
//Масив даних	
?>