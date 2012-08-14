<style type = 'text/css'>
#table td{
	border-collapse:collapse;
	font:15px arial;
	color:#000;
	border:1px solid #000;
	}
</style>


<!-- Отримуємо діапазон дат по замовчуванню -->
<?php
$max_date = getvariable ('max_date', mysql_result (mysql_query ("SELECT max(`date`) FROM `plan` WHERE `document` = 5 OR `document` = 6"), 0));
$min_date = getvariable ('min_date', mysql_result (mysql_query ("SELECT min(`date`) FROM `plan` WHERE `document` = 5 OR `document` = 6"), 0));	
?>
<!-- Отримуємо діапазон дат по замовчуванню -->

<!-- Форма з вибором діапазону дат -->
<form ACTION = 'kassa.php?page=5' METHOD = 'POST'>
	<p align = 'center'>
		<input type = 'date'  name = 'min_date' value = '<?= $min_date ?>' id = 'text'>
		<input type = 'submit' value = 'Показати' id = 'button'>
		<input type = 'date'  name = 'max_date' value = '<?= $max_date ?>' id = 'text'>
		</p>
	</form>
<!-- Форма з вибором діапазону дат -->

<!-- Шапка таблиці -->
<table id = 'table' cellpadding = '3' cellspacing = '0'>
	<tr>
		<td rowspan = '2'><b>Дата</b>
			</td>
		<td rowspan = '2'><b>Контрагент</b>
			</td>
		<td colspan = '2' align = 'center'><B>Сума</b>
			</td>
		<td rowspan = '2'><b>Призначення</b>
			</td>
	</tr>
	<tr>
		<td><b>Прихід</b>
			</td>
		<td><b>Розхід</b>
			</td>
	</tr>
<!-- Шапка таблиці -->

<?php
//error_reporting(0);
//Список проведених касових ордерів
$sql = mysql_query ("SELECT DISTINCT `date` FROM `kassa` WHERE `status` = 1 AND DATE(date) BETWEEN '$min_date' AND '$max_date' ORDER BY `date`");
while($zvit[] = mysql_fetch_array ($sql, MYSQL_ASSOC));
$k = count($zvit)-1;
unset($zvit[$k]);

for ($i = 0; $i < $k; $i++)
	{
	$sql = mysql_query ("SELECT `type`,`date`,`make_type`,`make`,`summa`,`description` FROM `kassa` WHERE `status` = 1 AND DATE(date) = '".$zvit[$i]['date']."'");
	while ($zvit[$i]['orders'][] = mysql_fetch_array ($sql, MYSQL_ASSOC));
	$n[$i] = count($zvit[$i]['orders'])-1;
	unset ($zvit[$i]['orders'][$n[$i]]);
	}
//Список проведених касових ордерів

//Дані для звіту
//Початковий залишок
$sql1 = mysql_query ("SELECT SUM(summa) FROM `kassa` WHERE `status` = 1 AND `type` = 0 AND DATE(date) < '$min_date'");
$sql2 = mysql_query ("SELECT SUM(summa) FROM `kassa` WHERE `status` = 1 AND `type` = 1 AND DATE(date) < '$min_date'");
$zvit['begin_summa'] = 0 + mysql_result ($sql1, 0) - mysql_result ($sql2, 0);
//Початковий залишок

//Залишки по дням
for ($i = 0; $i < $k; $i++)
	{
	$sql1 = mysql_query ("SELECT SUM(summa) FROM `kassa` WHERE `status` = 1 AND `type` = 0 AND DATE(date) = '".$zvit[$i]['date']."'");
	$sql2 = mysql_query ("SELECT SUM(summa) FROM `kassa` WHERE `status` = 1 AND `type` = 1 AND DATE(date) = '".$zvit[$i]['date']."'");
	$zvit[$i]['end_summa'] = 0 + mysql_result ($sql1, 0) - mysql_result ($sql2, 0);
	}
	
$zvit[0]['end_summa'] += $zvit['begin_summa'];
for ($i = 1; $i < $k; $i++)
	{ $zvit[$i]['end_summa'] += $zvit[$i-1]['end_summa']; }
//Залишки по дням
//Дані для звіту

//Виведення строк звіту
//Початковий залишок
echo "<tr>
	<td><b>".$min_date."</b>
		</td>
	<td><b>Залишок</b>
		</td>
	<td colspan = '2' align = 'center'><b>";	
		echo number_format ($zvit['begin_summa'], 2, '.', ' ');
		echo "</b>
		</td>
	<td>&nbsp;
		</td>
</tr>";
//Початковий залишок

for ($i = 0; $i < $k; $i++)
	{
	for ($j = 0; $j < $n[$i]; $j++)
		{
		echo "<tr>
		<td>".$zvit[$i]['orders'][$j]['date']."
			</td>
		<td>";
			if ($zvit[$i]['orders'][$j]['make_type'] == 0)
				{ echo mysql_result (mysql_query ("SELECT `name` FROM `vytraty` WHERE `id` = ".$zvit[$i]['orders'][$j]['make'].""), 0); }
			if ($zvit[$i]['orders'][$j]['make_type'] == 1)
				{ echo mysql_result (mysql_query ("SELECT `short_name` FROM `kontragent` WHERE `id` = ".$zvit[$i]['orders'][$j]['make'].""), 0); }
			echo "</td>
		<td>";
			if ($zvit[$i]['orders'][$j]['type'] == 0)
				{ echo number_format ($zvit[$i]['orders'][$j]['summa'], 2, '.', ' '); }
			else
				echo "&nbsp";
			echo "</td>
		<td>";
			if ($zvit[$i]['orders'][$j]['type'] == 1)
				{ echo number_format ($zvit[$i]['orders'][$j]['summa'], 2, '.', ' '); }
			else
				echo "&nbsp";
			echo "
			</td>
		<td>".$zvit[$i]['orders'][$j]['description']."&nbsp;
			</td>
		</tr>";
		}
		
	echo "<tr>
	<td><b>".$zvit[$i]['date']."</b>
		</td>
	<td><b>Залишок</b>
		</td>
	<td colspan = '2' align = 'center'><b>";
		echo number_format ($zvit[$i]['end_summa'], 2, '.', ' ');
		echo "</b>
		</td>
	<td>&nbsp;
		</td>
	</tr>";
	}
//Виведення строк звіту
echo "</table>";

//echo "<pre>";
//print_r($zvit);
//echo "</pre>";
?>