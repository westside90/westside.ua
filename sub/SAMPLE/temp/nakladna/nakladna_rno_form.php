<?php
//������������ ������� � ������� � ��
header("Content-type: text/html; charset=windows-1251");
error_reporting(0);
require_once "../../PHP/dbconnect2.php";
//������������ ������� � ������� � ��

//��������� ����� �������� � ����
$number = mysql_result (mysql_query ("SELECT MAX(`number`) FROM `nakladna` WHERE `document` = 2"), 0) + 1;
if (!isset($number)) { $number = 1;}
$date = date("Y-m-d");
//��������� ����� �������� � ����

//�������� ����
if (isset($_GET['k'])) { $k = $_GET['k']; } else { $k = 1; }

if (!isset($_POST['number'])) { $_POST['number'] = $number; }
if (!isset($_POST['date'])) { $_POST['date'] = $date; }
if (!isset($_POST['kontragent'])) { $_POST['kontragent'] = 0; }
if (!isset($_POST['rahunok'])) { $_POST['rahunok'] = 0; }
if (!isset($_POST['prymitka'])) { $_POST['prymitka'] = "&nbsp;"; }

if (!isset($_POST['tovar'][$k-1])) { $_POST['tovar'][$k-1] = 0; }
if (!isset($_POST['kkst'][$k-1])) { $_POST['kkst'][$k-1] = 0; }
if (!isset($_POST['cost'][$k-1])) { $_POST['cost'][$k-1] = 0; }
//�������� ����

//������ �����������
function kontragent_list($selected, $k)
	{
	$sql = mysql_query ("SELECT `id`,`short_name` FROM `kontragent`");
	while ($kontragent[] = mysql_fetch_array ($sql, MYSQL_ASSOC));
	$n = count($kontragent)-1;
	unset($kontragent[$n]);
	echo "<select name = 'kontragent' onchange =\"document.forms.form.action = '?k=".$k."'; document.form.submit();\">";
	echo "<option value = '0'";
	if ($selected == 0) {echo " selected";}
	echo "> ...������� �������</option>";	
		for ($i = 0; $i < $n; $i++)
			{
			echo "<option value = '".$kontragent[$i]['id']."'";
				if ($selected == $kontragent[$i]['id']) {echo " selected";}
			echo ">".$kontragent[$i]['short_name']."</option>";
			}
	echo "</select>";
	}
//������ �����������
	
//������ ������� �����������
function rahunki_list($selected, $k)
	{
	$sql = mysql_query ("SELECT `id`,`bank_id`,`mfo`,`bank` FROM `rahunki` WHERE `kontragent` = 0");
	while($rahunki_list[] = mysql_fetch_array($sql, MYSQL_ASSOC));
	$n = count($rahunki_list) - 1;
	unset($rahunki_list[$n]);
	echo "<select name = 'rahunok' onchange = \"document.forms.form.action = '?k=".$k."'; document.form.submit();\">";
	echo "<option value = '0'";
	if ($selected == 0) {echo " selected";}
	echo "> ...������� �������</option>";
		for ($i = 0; $i < $n; $i++)
			{
			$rahunki_list[$i]['name'] = $rahunki_list[$i]['mfo'].", ".$rahunki_list[$i]['bank'].", ".$rahunki_list[$i]['bank_id'];
			echo "<option value = '".$rahunki_list[$i]['id']."'";
				if ($selected == $rahunki_list[$i]['id']) {echo " selected";}
			echo ">".$rahunki_list[$i]['name']."</option>";
			}
	echo "</select>";	
	}
//������ ������� �����������

//������� ������ ������ ������
function tovary_list($selected, $num, $k)
	{
	$sql = mysql_query ("SELECT `id`,`name` FROM `nomenklatura` WHERE `type` = 0");
	$n = mysql_num_rows ($sql);
	while ($tovar[] = mysql_fetch_array ($sql, MYSQL_ASSOC));
	echo "<select name = 'tovar[$num]' onchange = \"document.forms.form.action = '?k=".$k."'; document.form.submit();\">";
	echo "<option value = '0'";
	if ($selected == 0) {echo " selected";}
	echo "> ...������� �����</option>";
		for ($i = 0; $i < $n; $i++)
			{
			echo "<option value = '".$tovar[$i]['id']."'";
				if ($selected == $tovar[$i]['id']) {echo " selected";}
			echo ">".$tovar[$i]['name']."</option>";
			}
	echo "</select>";
	}
//������� ������ ������ ������
	
//������� ��������� ������	
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
//������� ��������� ������
	
//������� ����������� �������� ����	
function summa_all($k)
	{
	$summa_all = 0;
	for ($i = 0; $i < $k; $i++)
		{
		$summa_all += (0 + str_replace(" ","",$_POST['cost'][$i])) * (0 + str_replace(" ","",$_POST['kkst'][$i]));
		}
	return $summa_all;
	}
//������� ����������� �������� ����

//�������� ������� �����
function get_units($tovar)
	{
	if ($tovar == 0) 
		{ $unit = null; }
	else
		{ $unit = " ".mysql_result (mysql_query ("SELECT `name` FROM `units` WHERE `id` = (SELECT `units` FROM `nomenklatura` WHERE `id` = ".$tovar.")"), 0); }
	return $unit;
	}
//�������� ������� �����

//�������� ����� ������ ��� ���������
if (isset($_GET['i'])) { element_del($_GET['i']); }
//�������� ����� ������ ��� ���������

//ϳ�������� ������ �����
require_once "nakladna_rno_form.html";
//ϳ�������� ������ �����

//������ �����
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";
//������ �����
?>