<?php
//������������ ������� � ������� � ��
//error_reporting(0);
require_once "../dbconnect.php";
//������������ ������� � ������� � ��

//�������� ���� ������� �������
if (isset($_GET['id']))
	{
	$_GET['old'] = $_GET['id'];
	$sql = mysql_query ("SELECT `date`,`type`,`make_type`,`make`,`summa`,`description` FROM `kassa` 
						WHERE `document` = 2 
						AND DATE(`date`) = (SELECT `date` FROM `kassa` WHERE `id` = ".$_GET['old'].")");
	$k = mysql_num_rows ($sql);
	while ($kl[] = mysql_fetch_array ($sql, MYSQL_ASSOC));
	unset($kl[$k]);

	//������������ �����
	$kl['date'] = $kl[0]['date'];
	for ($i = 0; $i < $k; $i++)
		{
		$kl['type'][$i] = $kl[$i]['type'];
		$kl['make_type'][$i] = $kl[$i]['make_type'];
		$kl['make'][$i] = $kl[$i]['make'];
		$kl['summa'][$i] = $kl[$i]['summa'];
		$kl['description'][$i] = $kl[$i]['description'];
		unset($kl[$i]);
		}
	//������������ �����

	//����� �����
	//echo "<pre>";
	//print_r($kl);
	//echo "</pre>";
	//����� �����

	$_POST = $kl;
	}
//�������� ���� ������� �������

//��������� �����
if (isset($_GET['k'])) { $k = $_GET['k']; }

if (!isset($_POST['type'][$k-1])) { $_POST['type'][$k-1] = 0; }
if (!isset($_POST['make_type'][$k-1])) { $_POST['make_type'][$k-1] = 0; }
if (!isset($_POST['make'][$k-1])) { $_POST['make'][$k-1] = 0; }
if (!isset($_POST['summa'][$k-1])) { $_POST['summa'][$k-1] = 0; }
if (!isset($_POST['description'][$k-1])) { $_POST['description'][$k-1] = "&nbsp"; }
//��������� �����

//������/������
function type_list($type, $num, $k)
	{
	echo "<select name = 'type[$num]' onchange = \"document.forms.form.action = '?k=".$k."&old=".$_GET['old']."'; document.form.submit();\">";
	echo "<option value = '0'"; 
		if ($type == 0) { echo " selected"; }
		echo">������</option>";
	echo "<option value = '1'"; 
		if ($type == 1) { echo " selected"; }
		echo">������</option>";
	echo "</select>";
	}
//������/������
	
//������ ���� ������	
function make_type_list($make_type, $type, $num, $k)
	{
	echo "<select name = 'make_type[$num]' onchange = \"document.forms.form.action = '?k=".$k."&old=".$_GET['old']."'; document.form.submit();\">";
	echo "<option value = '0'"; 
		if ($make_type == 0) { echo " selected"; }
		if ($type == 0)	{ echo">�����������</option>"; }
		if ($type == 1)	{ echo">�������</option>"; }
	echo "<option value = '1'"; 
		if ($make_type == 1) { echo " selected"; }
		echo">����������</option>";
	echo "</select>";
	}
//������ ���� ������
	
//������ �����������/������/���������� 	
function make_list($make, $make_type, $type, $num, $k)
	{
	if ($make_type == 0)
		{
		if ($type == 0)
			{ $sql = mysql_query ("SELECT `id`,`name` FROM `vytraty` WHERE `type` = 1"); }
		if ($type == 1)
			{ $sql = mysql_query ("SELECT `id`,`name` FROM `vytraty` WHERE `type` = 0"); }
		}
	if ($make_type == 1)
		{ $sql = mysql_query ("SELECT `id`,`short_name` AS 'name' FROM `kontragent`"); }
	while ($list[] = mysql_fetch_array ($sql, MYSQL_ASSOC));
	$n = count($list)-1;
	unset($list[$n]);

	echo "<select name = 'make[$num]' onchange = \"document.forms.form.action = '?k=".$k."&old=".$_GET['old']."'; document.form.submit();\">";
		for ($i = 0; $i < $n; $i++)
			{
			echo "<option value = '".$list[$i]['id']."'";
				if ($make == $list[$i]['id']) {echo " selected";}
			echo ">".$list[$i]['name']."</option>";
			}
	echo "</select>";
	}
//������ �����������/������/���������� 

//������ ������� �����������
function rahunki_list($selected, $k)
	{
	$sql = mysql_query ("SELECT `id`,`bank_id`,`mfo`,`bank` FROM `rahunki` WHERE `kontragent` = 0");
	while($rahunki_list[] = mysql_fetch_array($sql, MYSQL_ASSOC));
	$n = count($rahunki_list) - 1;
	unset($rahunki_list[$n]);
	echo "<select name = 'rahunok' onchange = \"document.forms.form.action = '?k=".$k."&old=".$_GET['old']."'; document.form.submit();\">";
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

//������� ��������� ��������
function element_del($j)
	{
	for ($i = $j; $i < $_GET['k']; $i++)
		{
		$_POST['type'][$i] = $_POST['type'][$i + 1];
		$_POST['make_type'][$i] = $_POST['make_type'][$i + 1];
		$_POST['make'][$i] = $_POST['make'][$i+1];
		$_POST['summa'][$i] = $_POST['summa'][$i+1];
		$_POST['description'][$i] = $_POST['description'][$i+1];		
		}
	unset($_POST['type'][$_GET['k']]);
	unset($_POST['cost'][$_GET['k']]);
	unset($_POST['tovar'][$_GET['k']]);
	unset($_POST['summa'][$_GET['k']]);
	unset($_POST['description'][$_GET['k']]);
	}
//������� ��������� ��������
	
//�������� ����������� ����	
function summa_prihod($k)
	{
	$summa_prihod = 0;
	for ($i = 0; $i < $k; $i++)
		{
		if ($_POST['type'][$i] == 0)
			{ $summa_prihod += str_replace(" ","",$_POST['summa'][$i]);}
		}
	return $summa_prihod;
	}
//�������� ����������� ����

//�������� ����������� ����	
function summa_rashod($k)
	{
	$summa_rashod = 0;
	for ($i = 0; $i < $k; $i++)
		{
		if ($_POST['type'][$i] == 1)
			{ $summa_rashod += str_replace(" ","",$_POST['summa'][$i]);}
		}
	return $summa_rashod;
	}
//�������� ����������� ����

//������� ����������� �������
function ost_start($date)
	{
	$sql1 = mysql_query ("SELECT SUM(`summa`) FROM `kassa` WHERE `document` = 2 AND `status` = 1 AND `type` = 0 AND DATE(`date`) <= '".$date."'");
	$sql2 = mysql_query ("SELECT SUM(`summa`) FROM `kassa` WHERE `document` = 2 AND `status` = 1 AND `type` = 1 AND DATE(`date`) <= '".$date."'");
	$ost = 0 + mysql_result ($sql1, 0) - mysql_result ($sql2, 0);
	return $ost;
	}
//������� ����������� �������
	
//�������� ����� ������ ��� ���������
if (isset($_GET['i'])) { element_del($_GET['i']); }
//�������� ����� ������ ��� ���������

//������
$form['add_vytraty'] = "<input type = 'button'
			value = '��� �������'
			onClick = 'WinObj = window.open(\"../nomenklatura/vytraty_form.php\", \"\",
			\"width = 300px, height = 310px, toolbar = 0, status = 0, top = 300px, left = 300px\");'>";
$form['add_income'] = "<input type = 'button'
			value = '��� �����������'
			onClick = 'WinObj = window.open(\"../nomenklatura/vytraty_form.php\", \"\",
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
							{ document.forms.form.action='kl_update.php?k=".$k."&status=1&old=".$_GET['old']."'; }
						else
							{ document.forms.form.action='kl_update.php?k=".$k."&status=0&old=".$_GET['old']."'; }
						document.form.submit();
						opener.location.reload();
						}\">";
$form['close'] = "<input type = 'button'
					value = '�������'
					onclick = \"if (confirm('������� �� ���������?')) { window.close(); opener.location.reload(); }\">";
$form['add_line'] = "<input type = 'button'
					value = '������ ���� ������'
					onclick = \"document.forms.form.action='?k=".($k + 1)."&old=".$_GET['old']."'; document.form.submit(); window.outerHeight=(window.outerHeight+30);\">";
$form['onblur'] = "onBlur = \"document.forms.form.action = '?k=".$k."&old=".$_GET['old']."'; document.form.submit();\"";
//������

//ϳ�������� ������ ��������� �������
require_once "../../HTML/kassa/kl_form.html";
//ϳ�������� ������ ��������� �������

//����� �����
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";
//����� �����
?>
