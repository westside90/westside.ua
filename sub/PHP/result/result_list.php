<?php
//error_reporting(0);

//Отримуємо поточну сторінку
if (isset($_GET['pages']))
	{
	if ($_GET['pages'] == 0)
		$pages = 0;
			else	
		$pages = --$_GET['pages'];
	}
		else $pages = 0;
	
//Отримуемо змінні 	
$per_page = getvariable ('per_page', 10);
$n = mysql_num_rows(mysql_query("SELECT `id` FROM `result`"));
$start = $pages*$per_page;
$num_pages = ceil($n/$per_page);
//Отримуемо змінні 	

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
$sql = mysql_query("SELECT `id`,`status`,`begin_date`,`end_date` FROM `result` ORDER BY `begin_date` LIMIT ".$start.",".$finish."");
while ($result[] = mysql_fetch_array ($sql, MYSQL_ASSOC));
//Зчитуємо вибіркові дані

//Підготовка данних для виведення
$start_date = add_day (mysql_result (mysql_query ("SELECT `end_date` FROM `result` ORDER BY `end_date` DESC"), 0));
$result['add_result'] = "<form ACTION = 'PHP/result/result_add.php' METHOD = 'POST'>
						<input type = 'submit' value = '".$language[$lang]['add_result']."'>
						<br>
						з <input type = 'date' name = 'min_date' value = '".$start_date."'>
						 по <input type = 'date' name = 'max_date' value = '".$date."'>";

for ($i = 0; $i < $finish; $i++)
{
$result[$i]['begin_date'] = my_date_format($result[$i]['begin_date']);
$result[$i]['end_date'] = my_date_format($result[$i]['end_date']);
$result[$i]['open_name'] = "<a href = 'result.php?page=1&id=".$result[$i]['id']."'>".$language[$lang]['result']."</a>";
if ($result[$i]['status'] == 0)
	{ $result[$i]['provodka'] = "<a href = 'PHP/result/result_make.php?id=".$result[$i]['id']."'>".$language[$lang]['status_off']."</a>"; }
if ($result[$i]['status'] == 1)
	{ $result[$i]['provodka'] = "<a href = 'PHP/result/result_make.php?id=".$result[$i]['id']."'>".$language[$lang]['status_on']."</a>"; }
$result[$i]['del'] = "<a href = 'PHP/result/result_del.php?id=".$result[$i]['id']."' 
					onclick = \"return confirm('".$language[$lang]['alert_del'].$language[$lang]['result']." з ".$result[$i]['begin_date']." по ".$result[$i]['end_date']."?')\"><img src = 'PNG/del.png'></a>";
}
//Підготовка данних для виведення

//Підключення шаблонів
require_once "HTML/result/result_list.html";
//Підключення шаблонів

//Масив даних	
//echo "<pre>";
//print_r($result);
//echo "</pre>";
//Масив даних	
?>