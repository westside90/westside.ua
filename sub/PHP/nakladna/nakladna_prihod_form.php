<?php
//������������ ������� � ������� � ��
error_reporting(0);
require_once "../../PHP/dbconnect.php";
//������������ ������� � ������� � ��

//��������� ����� �������� � ����
$number = mysql_result (mysql_query ("SELECT MAX(`number`) FROM `nakladna` WHERE `document` = 0"), 0) + 1;
if (!isset($number)) { $number = 1; }
$date = date("Y-m-d");
//��������� ����� �������� � ����

//�������� ����
if (isset($_GET['k'])) { $k = $_GET['k']; } else { $k = 1; }

if (!isset($_POST['number'])) { $_POST['number'] = $number; }
if (!isset($_POST['date'])) { $_POST['date'] = $date; }
if (!isset($_POST['kontragent'])) { $_POST['kontragent'] = 0; }
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
	echo "> ...������� �������������</option>";	
		for ($i = 0; $i < $n; $i++)
			{
			echo "<option value = '".$kontragent[$i]['id']."'";
				if ($selected == $kontragent[$i]['id']) {echo " selected";}
			echo ">".$kontragent[$i]['short_name']."</option>";
			}
	echo "</select>";
	}
//������ �����������

//������� ������ ������ ������
function tovary_list($selected, $num, $k)
	{
	$sql = mysql_query ("SELECT `id`,`name` FROM `nomenklatura` WHERE `type` = 0");
	while ($tovar[] = mysql_fetch_array ($sql, MYSQL_ASSOC));
	$n = count($tovar)-1;
	unset($tovar[$n]);
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
		$_POST['tovar'][$i] = $_POST['tovar'][$i + 1];
		}
	unset($_POST['kkst'][$_GET['k']]);
	unset($_POST['cost'][$_GET['k']]);
	unset($_POST['tovar'][$_GET['k']]);
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

//�������
$sql = mysql_query ("SELECT `number` FROM `nakladna` WHERE `document` = 0 AND `number` = ".$_POST['number']."");
if (mysql_num_rows($sql) > 0) $number_error = "<font color = 'red'> *����� ����� ��� ����</font>";
	else $number_error = null;
//�������
	
//������
$form['add_tovar'] = "<input type = 'button'
			value = '����� �����'
			onClick = 'WinObj = window.open(\"../nomenklatura/nomenklatura_form.php\", \"\",
			\"width = 300px, height = 310px, toolbar = 0, status = 0, top = 300px, left = 300px\");'>";
$form['add_kontragent'] = "<input type = 'button'
			value = '����� ����������'
			onClick = 'WinObj = window.open(\"../kontragent/kontragent_form.php\", \"\",
			\"width = 400px, height = 720px, toolbar = 0, status = 0, top = 250px, left = 300px\");'>";
$form['save'] = "<input type = 'button'
				value = '�������� ��������'
				onClick = \"if (confirm('�������� ��������?'))
						{
						if (confirm('�������� ��������?'))
							{ document.forms.form.action='nakladna_prihod_add.php?k=".$k."&status=1'; }
						else
							{ document.forms.form.action='nakladna_prihod_add.php?k=".$k."&status=0'; }
						document.form.submit();
						opener.location.reload();
						}\">";
$form['close'] = "<input type = 'button'
					value = '�������'
					onclick = \"if (confirm('������� �� ���������?')) { window.close(); opener.location.reload(); }\">";
$form['add_line'] = "<input type = 'button'
					value = '������ ���� ������'
					onclick = \"document.forms.form.action='?k=".($k + 1)."'; document.form.submit(); window.outerHeight=(window.outerHeight+30);\">";
$form['onblur'] = "onBlur = \"document.forms.form.action = '?k=".$k."'; document.form.submit();\"";
//������

//ϳ�������� ������ �����
require_once "../../HTML/nakladna/nakladna_prihod_form.html";
//ϳ�������� ������ �����

//������ �����
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";
//������ �����
?>
