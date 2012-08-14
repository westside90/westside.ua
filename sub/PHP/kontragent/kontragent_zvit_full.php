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
$max_date = getvariable ('max_date', mysql_result (mysql_query ("SELECT max(`date`) FROM `plan`"), 0));
$min_date = getvariable ('min_date', mysql_result (mysql_query ("SELECT min(`date`) FROM `plan`"), 0));	
?>
<!-- Отримуємо діапазон дат по замовчуванню -->

<!-- Форма з вибором діапазону дат -->
<form ACTION = 'kontragent.php?page=4' METHOD = 'POST'>
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
		<td rowspan = '2' colspan = '2'><b>Контрагент</b>
			</td>
		<td colspan = '2'><b>Зашишок на <? echo $min_date ?></b>
			</td>
		<td colspan = '2'><b>Реалізовано покупцю<br>Оплачено постачальнику</b>
			</td>
		<td colspan = '2'><b>Оплачено покупцем<br>Отримано у постачальника</b>
			</td>
		<td colspan = '2'><b>Залишок на <? echo $max_date ?></b>
	</tr>
	<tr>
		<td><b>Мені винні</b>
			</td>
		<td><b>Я винен</b>
			</td>
		<td><b>Товар, послуги</b>
			</td>
		<td><b>Банк, каса</b>
			</td>
		<td><b>Товар, послуги</b>
			</td>
		<td><b>Банк, каса</b>
			</td>
		<td><b>Мені винні</b>
			</td>
		<td><b>Я винен</b>
			</td>
	</tr>
<!-- Шапка таблиці -->

<?php
error_reporting(0);
//Список контрагентів
$sql = mysql_query ("SELECT `id`,`short_name` FROM `kontragent` WHERE `id` IN 
					(SELECT DISTINCT `kontragent` FROM `plan` WHERE `kredit` = 631 OR `debet` = 361)");
while($zvit[] = mysql_fetch_array ($sql, MYSQL_ASSOC));
$k = count($zvit)-1;
unset($zvit[$k]);
for ($i = 0; $i < $k; $i++)
	{
	$sql1 = mysql_query ("SELECT `document` FROM `plan` WHERE (`kontragent` = ".$zvit[$i]['id'].") AND `debet` = 361");
	$sql2 = mysql_query ("SELECT `document` FROM `plan` WHERE (`kontragent` = ".$zvit[$i]['id'].") AND `kredit` = 631");
	if (mysql_num_rows ($sql1) > 0) $type = 0;
	if (mysql_num_rows ($sql2) > 0) $type = 1;
	if (mysql_num_rows ($sql1) > 0 AND mysql_num_rows ($sql2) > 0) $type = 2;
	$zvit[$i]['type'] = $type;
	}
//Список контрагентів

//Дані для звіту
//Залишок на початкову дату
for ($i = 0; $i < $k; $i++)
	{
	$sql1 = mysql_query ("SELECT SUM(summa) FROM `plan` WHERE `kredit` = '631' AND `kontragent` = ".$zvit[$i]['id']." AND DATE(date) < '$min_date'");
	$sql2 = mysql_query ("SELECT SUM(summa) FROM `plan` WHERE `kredit` = '361' AND `kontragent` = ".$zvit[$i]['id']." AND DATE(date) < '$min_date'");
	$zvit[$i]['begin_kredit'] = 0 + mysql_result ($sql1, 0) + mysql_result ($sql2, 0);
	$sql1 = mysql_query ("SELECT SUM(summa) FROM `plan` WHERE `debet` = '631' AND `kontragent` = ".$zvit[$i]['id']." AND DATE(date) < '$min_date'");
	$sql2 = mysql_query ("SELECT SUM(summa) FROM `plan` WHERE `debet` = '361' AND `kontragent` = ".$zvit[$i]['id']." AND DATE(date) < '$min_date'");
	$zvit[$i]['begin_debet'] = 0 + mysql_result ($sql1, 0) + mysql_result ($sql2,0);
	if ($zvit[$i]['begin_kredit'] >= $zvit[$i]['begin_debet'])
		{
		$zvit[$i]['begin_kredit'] -= $zvit[$i]['begin_debet'];
		$zvit[$i]['begin_debet'] = 0;
		}
	else
		{
		$zvit[$i]['begin_debet'] -= $zvit[$i]['begin_kredit'];
		$zvit[$i]['begin_kredit'] = 0;
		}
	}
//Залишок на початкову дату

//Отримані товари
for ($i = 0; $i <$k; $i++)
	{
	$sql = mysql_query ("SELECT SUM(summa) FROM `plan` WHERE `kredit` = '631' AND `kontragent` = ".$zvit[$i]['id']." AND DATE(date) BETWEEN '$min_date' AND '$max_date'");
	$zvit[$i]['get'] = 0 + mysql_result ($sql, 0);
	$sql = mysql_query ("SELECT SUM(summa) FROM `plan` WHERE `debet` = '631' AND `kontragent` = ".$zvit[$i]['id']." AND DATE(date) BETWEEN '$min_date' AND '$max_date'");
	$zvit[$i]['debet'] = 0 + mysql_result ($sql, 0);
	}
//Отримані товари

//Надані товари
for ($i = 0; $i <$k; $i++)
	{
	$sql = mysql_query ("SELECT SUM(summa) FROM `plan` WHERE `debet` = '361' AND `kontragent` = ".$zvit[$i]['id']." AND DATE(date) BETWEEN '$min_date' AND '$max_date'");
	$zvit[$i]['give'] = 0 + mysql_result ($sql, 0);
	$sql = mysql_query ("SELECT SUM(summa) FROM `plan` WHERE `kredit` = '361' AND `kontragent` = ".$zvit[$i]['id']." AND DATE(date) BETWEEN '$min_date' AND '$max_date'");
	$zvit[$i]['kredit'] = 0 + mysql_result ($sql, 0);
	}
//Надані товари

//Залишок на кінцеву дату
for ($i = 0; $i < $k; $i++)
	{
	$sql1 = mysql_query ("SELECT SUM(summa) FROM `plan` WHERE `kredit` = '631' AND `kontragent` = ".$zvit[$i]['id']." AND DATE(date) <= '$max_date'");
	$sql2 = mysql_query ("SELECT SUM(summa) FROM `plan` WHERE `kredit` = '361' AND `kontragent` = ".$zvit[$i]['id']." AND DATE(date) <= '$max_date'");
	$zvit[$i]['end_kredit'] = 0 + mysql_result ($sql1, 0) + mysql_result ($sql2,0);
	$sql1 = mysql_query ("SELECT SUM(summa) FROM `plan` WHERE `debet` = '631' AND `kontragent` = ".$zvit[$i]['id']." AND DATE(date) <= '$max_date'");
	$sql2 = mysql_query ("SELECT SUM(summa) FROM `plan` WHERE `debet` = '361' AND `kontragent` = ".$zvit[$i]['id']." AND DATE(date) <= '$max_date'");
	$zvit[$i]['end_debet'] = 0 + mysql_result ($sql1, 0) + mysql_result ($sql2,0);
	if ($zvit[$i]['end_kredit'] >= $zvit[$i]['end_debet'])
		{
		$zvit[$i]['end_kredit'] -= $zvit[$i]['end_debet'];
		$zvit[$i]['end_debet'] = 0;
		}
	else
		{
		$zvit[$i]['end_debet'] -= $zvit[$i]['end_kredit'];
		$zvit[$i]['end_kredit'] = 0;
		}
	}
//Залишок на кінцеву дату
//Дані для звіту

//Виведення строк звіту
for ($i = 0; $i < $k; $i++)
	{
	echo "<tr>
	<td>";
		if ($zvit[$i]['type'] == 0)
			{echo "Покупець";}
		if ($zvit[$i]['type'] == 1)
			{echo "Постачальник";}
		if ($zvit[$i]['type'] == 2)
			{echo "Покуп./Пост.";}
		echo "</td>
	<td><b>".$zvit[$i]['short_name']."
		</b></td>
	<td>";
		echo number_format ($zvit[$i]['begin_debet'], 2, '.', ' ');
		echo "</td>
	<td>";
		echo number_format ($zvit[$i]['begin_kredit'], 2, '.', ' ');
		echo "</td>
	<td>";
		echo number_format ($zvit[$i]['give'], 2, '.', ' ');
		echo "</td>
	<td>";
		echo number_format ($zvit[$i]['debet'], 2, '.', ' ');
		echo "</td>
	<td>";
		echo number_format ($zvit[$i]['get'], 2, '.', ' ');
		echo "</td>
	<td>";
		echo number_format ($zvit[$i]['kredit'], 2, '.', ' ');
		echo "</td>
	<td>";
		echo number_format ($zvit[$i]['end_debet'], 2, '.', ' ');
		echo "</td>
	<td>";
		echo number_format ($zvit[$i]['end_kredit'], 2, '.', ' ');
		echo "</td>
	</tr>";
	}
//Виведення строк звіту

//Всього
for ($i = 0; $i < $k; $i++)
	{
	$zvit['begin_debet'] += 0 + $zvit[$i]['begin_debet'];
	$zvit['begin_kredit'] += 0 + $zvit[$i]['begin_kredit'];
	$zvit['give'] += 0 + $zvit[$i]['give'];
	$zvit['debet'] += 0 + $zvit[$i]['debet'];
	$zvit['get'] += 0 + $zvit[$i]['get'];
	$zvit['kredit'] += 0 + $zvit[$i]['kredit'];
	$zvit['end_debet'] += 0 + $zvit[$i]['end_debet'];
	$zvit['end_kredit'] += 0 + $zvit[$i]['end_kredit'];
	}
echo "<tr>
		<td colspan = '2'><b>Всього</b>
			</td>
		<td><b>";
			echo number_format ($zvit['begin_kredit'], 2, '.', ' ');
			echo "</b>
			</td>
		<td><b>";
			echo number_format ($zvit['begin_debet'], 2, '.', ' ');
			echo "</b>
			</td>
		<td><b>";
			echo number_format ($zvit['give'], 2, '.', ' ');
			echo "</b>
			</td>
		<td><b>";
			echo number_format ($zvit['debet'], 2, '.', ' ');
			echo "</b>
			</td>
		<td><b>";
			echo number_format ($zvit['get'], 2, '.', ' ');
			echo "</b>
			</td>
		<td><b>";
			echo number_format ($zvit['kredit'], 2, '.', ' ');
			echo "</b>
			</td>
		<td><b>";
			echo number_format ($zvit['end_kredit'], 2, '.', ' ');
			echo "</b>
			</td>
		<td><b>";
			echo number_format ($zvit['end_debet'], 2, '.', ' ');
			echo "</b>
			</td>
	</tr>
	</table>";
//Всього

//echo "<pre>";
//print_r($zvit);
//echo "</pre>";
?>