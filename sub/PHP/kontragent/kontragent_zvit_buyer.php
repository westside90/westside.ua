<style type = 'text/css'>
#table td{
	border-collapse:collapse;
	font:15px arial;
	color:#000;
	border:1px solid #000;
	}
</style>


<!-- �������� ������� ��� �� ������������ -->
<?php
$max_date = getvariable ('max_date', mysql_result (mysql_query ("SELECT max(`date`) FROM `plan`"), 0));
$min_date = getvariable ('min_date', mysql_result (mysql_query ("SELECT min(`date`) FROM `plan`"), 0));	
?>
<!-- �������� ������� ��� �� ������������ -->

<!-- ����� � ������� �������� ��� -->
<form ACTION = 'kontragent.php?page=6' METHOD = 'POST'>
	<p align = 'center'>
		<input type = 'date'  name = 'min_date' value = '<?= $min_date ?>' id = 'text'>
		<input type = 'submit' value = '��������' id = 'button'>
		<input type = 'date'  name = 'max_date' value = '<?= $max_date ?>' id = 'text'>
		</p>
	</form>
<!-- ����� � ������� �������� ��� -->

<!-- ����� ������� -->
<table id = 'table' cellpadding = '3' cellspacing = '0'>
	<tr>
		<td rowspan = '2'><b>��������</b>
			</td>
		<td colspan = '2'><b>������� �� <? echo $min_date ?></b>
			</td>
		<td colspan = '2'><b>���������� �������</b>
			</td>
		<td colspan = '2'><b>�������� ��������</b>
			</td>
		<td colspan = '2'><b>������� �� <? echo $max_date ?></b>
	</tr>
	<tr>
		<td><b>��� ����</b>
			</td>
		<td><b>� �����</b>
			</td>
		<td><b>������</b>
			</td>
		<td><b>����, ������</b>
			</td>
		<td><b>����</b>
			</td>
		<td><b>�����</b>
			</td>
		<td><b>��� ����</b>
			</td>
		<td><b>� �����</b>
			</td>
	</tr>
<!-- ����� ������� -->

<?php
error_reporting(0);
//������ ��������
$sql = mysql_query ("SELECT `id`,`short_name` FROM `kontragent` WHERE `id` IN (SELECT DISTINCT `kontragent` FROM `plan` WHERE `document` = 1 OR `document` = 3)");
while($zvit[] = mysql_fetch_array ($sql, MYSQL_ASSOC));
$k = count($zvit)-1;
unset($zvit[$k]);
//������ ��������

//��� ��� ����
//������� �� ��������� ����
for ($i = 0; $i < $k; $i++)
	{
	$sql = mysql_query ("SELECT SUM(summa) FROM `plan` WHERE `debet` = '361' AND `kontragent` = ".$zvit[$i]['id']." AND DATE(date) < '$min_date'");
	$zvit[$i]['begin_debet'] = 0 + mysql_result ($sql, 0);
	$sql = mysql_query ("SELECT SUM(summa) FROM `plan` WHERE `kredit` = '361' AND `kontragent` = ".$zvit[$i]['id']." AND DATE(date) < '$min_date'");
	$zvit[$i]['begin_kredit'] = 0 + mysql_result ($sql, 0);
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
//������� �� ��������� ����

//������� ������
for ($i = 0; $i <$k; $i++)
	{
	$sql = mysql_query ("SELECT SUM(summa) FROM `plan` WHERE `kredit` = '702' AND `kontragent` = ".$zvit[$i]['id']." AND DATE(date) BETWEEN '$min_date' AND '$max_date'");
	$zvit[$i]['give_tovar'] = 0 + mysql_result ($sql, 0);
	$sql = mysql_query ("SELECT SUM(summa) FROM `plan` WHERE `kredit` = '703' AND `kontragent` = ".$zvit[$i]['id']." AND DATE(date) BETWEEN '$min_date' AND '$max_date'");
	$zvit[$i]['give_posluga'] = 0 + mysql_result ($sql, 0);
	$sql = mysql_query ("SELECT SUM(summa) FROM `plan` WHERE `debet` = '301' AND `kontragent` = ".$zvit[$i]['id']." AND DATE(date) BETWEEN '$min_date' AND '$max_date'");
	$zvit[$i]['get_bank'] = 0 + mysql_result ($sql, 0);
	$sql = mysql_query ("SELECT SUM(summa) FROM `plan` WHERE `debet` = '311' AND `kontragent` = ".$zvit[$i]['id']." AND DATE(date) BETWEEN '$min_date' AND '$max_date'");
	$zvit[$i]['get_kassa'] = 0 + mysql_result ($sql, 0);
	}
//������� ������

//������� �� ������ ����
for ($i = 0; $i < $k; $i++)
	{
	$sql = mysql_query ("SELECT SUM(summa) FROM `plan` WHERE `debet` = '361' AND `kontragent` = ".$zvit[$i]['id']." AND DATE(date) <= '$max_date'");
	$zvit[$i]['end_debet'] = 0 + mysql_result ($sql, 0);
	$sql = mysql_query ("SELECT SUM(summa) FROM `plan` WHERE `kredit` = '361' AND `kontragent` = ".$zvit[$i]['id']." AND DATE(date) <= '$max_date'");
	$zvit[$i]['end_kredit'] = 0 + mysql_result ($sql, 0);
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
//������� �� ������ ����
//��� ��� ����

//��������� ����� ����
for ($i = 0; $i < $k; $i++)
	{
	echo "<tr>
	<td>".$zvit[$i]['short_name']."
		</td>
	<td>";
		echo number_format ($zvit[$i]['begin_debet'], 2, '.', ' ');
		echo "
		</td>
	<td>";
		echo number_format ($zvit[$i]['begin_kredit'], 2, '.', ' ');
		echo "</td>
	<td>";
		echo number_format ($zvit[$i]['give_tovar'], 2, '.', ' ');
		echo "</td>
	<td>";
		echo number_format ($zvit[$i]['give_posluga'], 2, '.', ' ');
		echo "
		</td>
	<td>";
		echo number_format ($zvit[$i]['get_bank'], 2, '.', ' ');
		echo "
		</td>
	<td>";
		echo number_format ($zvit[$i]['get_kassa'], 2, '.', ' ');
		echo "
		</td>
	<td>";
		echo number_format ($zvit[$i]['end_debet'], 2, '.', ' ');
		echo "
		</td>
	<td>";
		echo number_format ($zvit[$i]['end_kredit'], 2, '.', ' ');
		echo "</td>
	</tr>";
	}
//��������� ����� ����

//������
for ($i = 0; $i < $k; $i++)
	{
	$zvit['begin_debet'] += 0 + $zvit[$i]['begin_debet'];
	$zvit['begin_kredit'] += 0 + $zvit[$i]['begin_kredit'];
	$zvit['give_tovar'] += 0 + $zvit[$i]['give_tovar'];
	$zvit['give_posluga'] += 0 + $zvit[$i]['give_posluga'];
	$zvit['get_bank'] += 0 + $zvit[$i]['get_bank'];
	$zvit['get_kassa'] += 0 + $zvit[$i]['get_kassa'];
	$zvit['end_debet'] += 0 + $zvit[$i]['end_debet'];
	$zvit['end_kredit'] += 0 + $zvit[$i]['end_kredit'];
	}
echo "<tr>
		<td><b>������</b>
			</td>
		<td><b>";
			echo number_format ($zvit['begin_debet'], 2, '.', ' ');
			echo "</b>
			</td>
		<td><b>";
			echo number_format ($zvit['begin_kredit'], 2, '.', ' ');
			echo "</b>
			</td>
		<td><b>";
			echo number_format ($zvit['give_tovar'], 2, '.', ' ');
			echo "</b>
			</td>
		<td><b>";
			echo number_format ($zvit['give_posluga'], 2, '.', ' ');
			echo "</b>
			</td>
		<td><b>";
			echo number_format ($zvit['get_bank'], 2, '.', ' ');
			echo "</b>
			</td>
		<td><b>";
			echo number_format ($zvit['get_kassa'], 2, '.', ' ');
			echo "</b>
			</td>
		<td><b>";
			echo number_format ($zvit['end_debet'], 2, '.', ' ');
			echo "</b>
			</td>
		<td><b>";
			echo number_format ($zvit['end_kredit'], 2, '.', ' ');
			echo "</b>
			</td>
	</tr>
	</table>";
//������

//echo "<pre>";
//print_r($zvit);
//echo "</pre>";
?>