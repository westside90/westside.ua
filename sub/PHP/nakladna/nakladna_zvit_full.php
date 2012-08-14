<style type = 'text/css'>
#table td{
	border-collapse:collapse;
	font:13px arial;
	color:#000;
	border:1px solid #000;
	}
</style>


<!-- Отримуємо діапазон дат по замовчуванню -->
<?php
$max_date = getvariable ('max_date', mysql_result (mysql_query ("SELECT max(`date`) FROM `nakladna`"), 0));
$min_date = getvariable ('min_date', mysql_result (mysql_query ("SELECT min(`date`) FROM `nakladna`"), 0));	
?>
<!-- Отримуємо діапазон дат по замовчуванню -->

<!-- Форма з вибором діапазону дат -->
<form ACTION = 'nakladna.php?page=10' METHOD = 'POST'>
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
		<td rowspan = '2'><b>Найменування</b>
			</td>
		<td colspan = '3'><b>Залишок на <? echo $min_date ?></b>
			</td>
		<td colspan = '3'><b>Прихід</b>
			</td>
		<td colspan = '4'><b>Розхід</b>
			</td>
		<td colspan = '3'><b>Залишок на <? echo $max_date ?></b>
			</td>
	</tr>
	<tr>
		<td><b>К-сть</b>
			</td>
		<td><b>Ціна</b>
			</td>
		<td><b>Сума</b>
			</td>
		<td><b>К-сть</b>
			</td>
		<td><b>Ціна</b>
			</td>
		<td><b>Сума</b>
			</td>
		<td><b>К-сть</b>
			</td>
		<td><b>Ціна</b>
			</td>
		<td><b>Сума</b>
			</td>
		<td><b>Націнка</b>
			</td>
		<td><b>К-сть</b>
			</td>
		<td><b>Ціна</b>
			</td>
		<td><b>Сума</b>
			</td>
	</tr>
<!-- Шапка таблиці-->

<?php
//Список товару
$sql = mysql_query ("SELECT `id`,`name` as `tovar`,`units` FROM `nomenklatura` WHERE `id` IN (SELECT DISTINCT `tovar` FROM `nakladna` WHERE `status` = 1)");
while ($zvit[] = mysql_fetch_array ($sql, MYSQL_ASSOC));
$k = count($zvit)-1;
unset($zvit[$k]);
for ($i = 0; $i < $k; $i++)
	{
	$sql = "SELECT `name` FROM `units` WHERE `id` = ".$zvit[$i]['units']."";
	$zvit[$i]['units'] = mysql_result (mysql_query ($sql), 0);
	}
//Список товару

//Дані для згорнутого звіту
//Залишок на початкову дату
for ($i = 0; $i < $k; $i++)
	{
	$sql1 = "SELECT SUM(kkst) FROM `nakladna` WHERE `tovar` = ".$zvit[$i]['id']." AND `document` = 0 AND DATE(date) < '$min_date' AND `status` = 1";
	$sql2 = "SELECT SUM(kkst) FROM `nakladna` WHERE `tovar` = ".$zvit[$i]['id']." AND `document` = 1 AND DATE(date) < '$min_date' AND `status` = 1";
	$zvit[$i]['begin_kkst'] = 0 + mysql_result (mysql_query ($sql1), 0) - mysql_result (mysql_query ($sql2), 0);
	}
for ($i = 0; $i < $k; $i++)
	{
	$sql1 = "SELECT SUM(summa) FROM `nakladna` WHERE `tovar` = ".$zvit[$i]['id']." AND `document` = 0 AND DATE(date) < '$min_date' AND `status` = 1";
	$sql2 = "SELECT SUM(summa) FROM `nakladna` WHERE `tovar` = ".$zvit[$i]['id']." AND `document` = 1 AND DATE(date) < '$min_date' AND `status` = 1";
	$zvit[$i]['begin_summa'] = 0 + mysql_result (mysql_query ($sql1), 0) - mysql_result (mysql_query ($sql2), 0);
	}
//Залишок на початкову дату

//Прихід	
for ($i = 0; $i < $k; $i++)
	{
	$sql = "SELECT SUM(kkst) FROM `nakladna` WHERE `tovar` = ".$zvit[$i]['id']." AND `document` = 0 AND DATE(date) BETWEEN '$min_date' AND '$max_date' AND `status` = 1";
	$zvit[$i]['prihod_kkst'] = 0 + mysql_result (mysql_query ($sql), 0);
	}
for ($i = 0; $i < $k; $i++)
	{
	$sql = "SELECT SUM(summa) FROM `nakladna` WHERE `tovar` = ".$zvit[$i]['id']." AND `document` = 0 AND DATE(date) BETWEEN '$min_date' AND '$max_date' AND `status` = 1";
	$zvit[$i]['prihod_summa'] = 0 + mysql_result (mysql_query ($sql), 0);
	}
//Прихід	

//Розхід	
for ($i = 0; $i < $k; $i++)
	{
	$sql = "SELECT SUM(kkst) FROM `nakladna` WHERE `tovar` = ".$zvit[$i]['id']." AND `document` = 1 AND DATE(date) BETWEEN '$min_date' AND '$max_date' AND `status` = 1";
	$zvit[$i]['rashod_kkst'] = 0 + mysql_result (mysql_query ($sql), 0);
	}
for ($i = 0; $i < $k; $i++)
	{
	$sql = "SELECT SUM(summa) FROM `nakladna` WHERE `tovar` = ".$zvit[$i]['id']." AND `document` = 1 AND DATE(date) BETWEEN '$min_date' AND '$max_date' AND `status` = 1";
	$zvit[$i]['rashod_summa'] = 0 + mysql_result (mysql_query ($sql), 0);
	}
//Розхід
	
//Залишок на кінцеву дату
for ($i = 0; $i < $k; $i++)
	{
	$zvit[$i]['end_kkst'] = $zvit[$i]['begin_kkst'] + $zvit[$i]['prihod_kkst'] - $zvit[$i]['rashod_kkst'];
	}
//Залишок собівартості буде пораховано в кінці, після підрахування собівартостей по усім накладним
//Залишок на кінцеву дату
//Дані для згорнутого звіту	

//Дані для розгорнутого звіту
//Номера накладних
for ($i = 0; $i < $k; $i++)
	{
	$sql = mysql_query ("SELECT DISTINCT `number`,`date` FROM `nakladna` WHERE `tovar` = ".$zvit[$i]['id']." AND `document` = 0");
	while ($zvit[$i]['nakladna'][] = mysql_fetch_array ($sql, MYSQL_ASSOC));
	$zvit[$i]['nakladna']['k'] = count($zvit[$i]['nakladna'])-1;
	unset($zvit[$i]['nakladna'][$zvit[$i]['nakladna']['k']]);
	}
//Номера накладних

//Партії
for ($i = 0; $i < $k; $i++)
	{
	for ($j = 0; $j < $zvit[$i]['nakladna']['k']; $j++)
		{
		$sql = "SELECT `number` FROM `nakladna` WHERE `document` = 1 AND `tovar` = ".$zvit[$i]['id']." AND `partia` = ".$zvit[$i]['nakladna'][$j]['number']."";
		$zvit[$i]['nakladna'][$j]['rashod'] = mysql_result (mysql_query ($sql), 0);
		}
	}
//Партії

//Залишок на початкову дату
for ($i = 0; $i < $k; $i++)
	{
	for ($j = 0; $j < $zvit[$i]['nakladna']['k']; $j++)
		{
		$sql = "SELECT `kkst` FROM `nakladna` WHERE `tovar` = ".$zvit[$i]['id']." AND `number` = ".$zvit[$i]['nakladna'][$j]['number']." AND `document` = 0 AND DATE(date) < '$min_date' AND `status` = 1";
		$zvit[$i]['nakladna'][$j]['begin_kkst'] = 0 + mysql_result (mysql_query ($sql), 0);
		}
	for ($j = 0; $j < $zvit[$i]['nakladna']['k']; $j++)
		{
		$sql = "SELECT `summa` FROM `nakladna` WHERE `tovar` = ".$zvit[$i]['id']." AND `number` = ".$zvit[$i]['nakladna'][$j]['number']." AND `document` = 0 AND DATE(date) < '$min_date' AND `status` = 1";
		$zvit[$i]['nakladna'][$j]['begin_summa'] = 0 + mysql_result (mysql_query ($sql), 0);
		}
	}
//Залишок на початкову дату

//Прихід
for ($i = 0; $i < $k; $i++)
	{
	for ($j = 0; $j < $zvit[$i]['nakladna']['k']; $j++)
		{
		$sql = "SELECT `kkst` FROM `nakladna` WHERE `tovar` = ".$zvit[$i]['id']." AND `number` = ".$zvit[$i]['nakladna'][$j]['number']." AND `document` = 0 AND DATE(date) BETWEEN '$min_date' AND '$max_date' AND `status` = 1";
		$zvit[$i]['nakladna'][$j]['prihod_kkst'] = 0 + mysql_result (mysql_query ($sql), 0);
		}
	for ($j = 0; $j < $zvit[$i]['nakladna']['k']; $j++)
		{
		$sql = "SELECT `summa` FROM `nakladna` WHERE `tovar` = ".$zvit[$i]['id']." AND `number` = ".$zvit[$i]['nakladna'][$j]['number']." AND `document` = 0 AND DATE(date) BETWEEN '$min_date' AND '$max_date' AND `status` = 1";
		$zvit[$i]['nakladna'][$j]['prihod_summa'] = 0 + mysql_result (mysql_query ($sql), 0);
		}
	}
//Прихід

//Розхід
for ($i = 0; $i < $k; $i++)
	{
	for ($j = 0; $j < $zvit[$i]['nakladna']['k']; $j++)
		{
		$sql = "SELECT `kkst` FROM `nakladna` WHERE `tovar` = ".$zvit[$i]['id']." AND `number` = ".$zvit[$i]['nakladna'][$j]['rashod']." AND `document` = 1 AND DATE(date) BETWEEN '$min_date' AND '$max_date' AND `status` = 1";
		$zvit[$i]['nakladna'][$j]['rashod_kkst'] = 0 + mysql_result (mysql_query ($sql), 0);
		}
	for ($j = 0; $j < $zvit[$i]['nakladna']['k']; $j++)
		{
		$sql = "SELECT `summa` FROM `nakladna` WHERE `tovar` = ".$zvit[$i]['id']." AND `number` = ".$zvit[$i]['nakladna'][$j]['rashod']." AND `document` = 1 AND DATE(date) BETWEEN '$min_date' AND '$max_date' AND `status` = 1";
		$zvit[$i]['nakladna'][$j]['rashod_summa'] = 0 + mysql_result (mysql_query ($sql), 0);
		}
	}
//Розхід
//Залишок на кінцеву дату
for ($i = 0; $i < $k; $i++)
	{
	for ($j = 0; $j < $zvit[$i]['nakladna']['k']; $j++)
		{
		$sql1 = "SELECT `kkst` FROM `nakladna` WHERE `tovar` = ".$zvit[$i]['id']." AND `number` = ".$zvit[$i]['nakladna'][$j]['number']." AND `document` = 0 AND DATE(date) BETWEEN '$min_date' AND '$max_date' AND `status` = 1";
		$sql2 = "SELECT `kkst` FROM `nakladna` WHERE `tovar` = ".$zvit[$i]['id']." AND `number` = ".$zvit[$i]['nakladna'][$j]['rashod']." AND `document` = 1 AND DATE(date) BETWEEN '$min_date' AND '$max_date' AND `status` = 1";
		$zvit[$i]['nakladna'][$j]['end_kkst'] = $zvit[$i]['nakladna'][$j]['begin_kkst'] + mysql_result (mysql_query ($sql1), 0) - mysql_result (mysql_query ($sql2), 0);
		}
	}
//Залишок собівартості буде пораховано в кінці, після підрахування собівартостей по усім накладним
//Залишок на кінцеву дату

//Ціни
for ($i = 0; $i < $k; $i++)
	{
	for ($j = 0; $j < $zvit[$i]['nakladna']['k']; $j++)
		{
		$zvit[$i]['nakladna'][$j]['begin_cost'] = 0 + $zvit[$i]['nakladna'][$j]['begin_summa']/$zvit[$i]['nakladna'][$j]['begin_kkst'];
		$zvit[$i]['nakladna'][$j]['prihod_cost'] = 0 + $zvit[$i]['nakladna'][$j]['prihod_summa']/$zvit[$i]['nakladna'][$j]['prihod_kkst'];
		$zvit[$i]['nakladna'][$j]['rashod_cost'] = 0 + $zvit[$i]['nakladna'][$j]['rashod_summa']/$zvit[$i]['nakladna'][$j]['rashod_kkst'];
		}
	}
//Ціни

//Собівартість і націнка
for ($i = 0; $i < $k; $i++)
	{
	for ($j = 0; $j < $zvit[$i]['nakladna']['k']; $j++)
		{
		$zvit[$i]['nakladna'][$j]['vartist'] = 0 + $zvit[$i]['nakladna'][$j]['rashod_kkst']*$zvit[$i]['nakladna'][$j]['begin_cost'] + $zvit[$i]['nakladna'][$j]['rashod_kkst']*$zvit[$i]['nakladna'][$j]['prihod_cost'];
		$zvit[$i]['nakladna'][$j]['income'] = 0 + $zvit[$i]['nakladna'][$j]['rashod_summa'] - $zvit[$i]['nakladna'][$j]['vartist'];
		}
	}
//Собівартість
//Дані для розгорнутого звіту

//Залишок собівартості на кінцеву дату
for ($i = 0; $i < $k; $i++)
	{
	for ($j = 0; $j < $zvit[$i]['nakladna']['k']; $j++)
		{
		$zvit[$i]['nakladna'][$j]['end_summa'] = $zvit[$i]['nakladna'][$j]['begin_summa'] + $zvit[$i]['nakladna'][$j]['prihod_summa'] - $zvit[$i]['nakladna'][$j]['vartist'];
		$zvit[$i]['nakladna'][$j]['end_cost'] = 0 + $zvit[$i]['nakladna'][$j]['end_summa']/$zvit[$i]['nakladna'][$j]['end_kkst'];
		$zvit[$i]['end_summa'] += 0 + $zvit[$i]['nakladna'][$j]['end_summa'];
		$zvit[$i]['income'] += 0 + $zvit[$i]['nakladna'][$j]['income'];	
		}
	}
//Залишок собівартості на кінцеву дату

//Виведення строк звіту
for ($i = 0; $i < $k; $i++)
	{
	echo "<tr>
	<td><b>".$zvit[$i]['tovar'].", ".$zvit[$i]['units']."</b>
		</td>
	<td><b>".$zvit[$i]['begin_kkst']."</b>
		</td>
	<td>&nbsp;
		</td>
	<td><b>";
		echo number_format ($zvit[$i]['begin_summa'], 2, '.', ' ');
		echo "</b></td>
	<td><b>".$zvit[$i]['prihod_kkst']."</b>
		</td>
	<td>&nbsp;
		</td>
	<td><b>";
		echo number_format ($zvit[$i]['prihod_summa'], 2, '.', ' ');
		echo "</b></td>
	<td><b>".$zvit[$i]['rashod_kkst']."</b>
		</td>
	<td>&nbsp;
		</td>
	<td><b>";
		echo number_format ($zvit[$i]['rashod_summa'], 2, '.', ' ');
		echo "</b></td>
	<td><b>";
		echo number_format ($zvit[$i]['income'], 2, '.', ' ');
		echo "</b></td>
	<td><b>".$zvit[$i]['end_kkst']."</b>
		</td>
	<td>&nbsp;
		</td>
	<td><b>";
		echo number_format ($zvit[$i]['end_summa'], 2, '.', ' ');
		echo "</b></td>
	</tr>";
	
	for ($j = 0; $j < $zvit[$i]['nakladna']['k']; $j++)
		{
		echo "<tr>
		<td>ПН-";
			printf ("%04d", $zvit[$i]['nakladna'][$j]['number']);
			echo " від ".$zvit[$i]['nakladna'][$j]['date']." 
			</td>
		<td>".$zvit[$i]['nakladna'][$j]['begin_kkst']."
			</td>
		<td>";
			echo number_format ($zvit[$i]['nakladna'][$j]['begin_cost'], 2, '.', ' ');
			echo "</td>
		<td>";
			echo number_format ($zvit[$i]['nakladna'][$j]['begin_summa'], 2, '.', ' ');
			echo "</td>
		<td>".$zvit[$i]['nakladna'][$j]['prihod_kkst']."
			</td>
		<td>";
			echo number_format ($zvit[$i]['nakladna'][$j]['prihod_cost'], 2, '.', ' ');
			echo "</td>
		<td>";
			echo number_format ($zvit[$i]['nakladna'][$j]['prihod_summa'], 2, '.', ' ');
			echo "</td>
		<td>".$zvit[$i]['nakladna'][$j]['rashod_kkst']."
			</td>
		<td>";
			echo number_format ($zvit[$i]['nakladna'][$j]['rashod_cost'], 2, '.', ' ');
			echo "</td>
		<td>";
			echo number_format ($zvit[$i]['nakladna'][$j]['rashod_summa'], 2, '.', ' ');
			echo "</td>
		<td>";
			echo number_format ($zvit[$i]['nakladna'][$j]['income'], 2, '.', ' ');
			echo "</td>
		<td>".$zvit[$i]['nakladna'][$j]['end_kkst']."
			</td>
		<td>";
			echo number_format ($zvit[$i]['nakladna'][$j]['end_cost'], 2, '.', ' ');
			echo "</td>
		<td>";
			echo number_format ($zvit[$i]['nakladna'][$j]['end_summa'], 2, '.', ' ');
			echo "</td>
		</tr>";
		}
	}
//Виведення строк звіту

//Всього
for ($i = 0; $i < $k; $i++)
	{
	$zvit['begin_summa'] += 0 + $zvit[$i]['begin_summa'];
	$zvit['prihod_summa'] += 0 + $zvit[$i]['prihod_summa'];
	$zvit['rashod_summa'] += 0 + $zvit[$i]['rashod_summa'];
	$zvit['end_summa'] += 0 + $zvit[$i]['end_summa'];
	$zvit['income'] += 0 + $zvit[$i]['income'];
	}

echo "<tr>
	<td><b>Всього</b>
		</td>
	<td>&nbsp;
		</td>
	<td>&nbsp;
		</td>
	<td><b>";
		echo number_format ($zvit['begin_summa'], 2, '.', ' ');
		echo "</b></td>
	<td>&nbsp;
		</td>
	<td>&nbsp;
		</td>
	<td><b>";
		echo number_format ($zvit['prihod_summa'], 2, '.', ' ');
		echo "</b></td>
	<td>&nbsp;
		</td>
	<td>&nbsp;
		</td>
	<td><b>";
		echo number_format ($zvit['rashod_summa'], 2, '.', ' ');
		echo "</b></td>
	<td><b>";
		echo number_format ($zvit['income'], 2, '.', ' ');
		echo "</b></td>
	<td>&nbsp;
		</td>
	<td>&nbsp;
		</td>
	<td><b>";
		echo number_format ($zvit['end_summa'], 2, '.', ' ');
		echo "</b></td>
	</tr>
</table>";
//Всього

echo "<pre>";
print_r($zvit);
echo "</pre>";
?>