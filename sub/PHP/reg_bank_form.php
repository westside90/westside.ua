<?php
//������������ ������� � ������� � ��
error_reporting(0);
require_once "dbconnect.php";
//������������ ������� � ������� � ��

//���������� ������
if (isset($_GET['k'])) { $k = $_GET['k']; } else { $k = 1; }

if (!isset($_POST['bank_name'][$k - 1])) { $_POST['bank_name'][$k - 1] = null; }
if (!isset($_POST['bank_id'][$k - 1])) { $_POST['bank_id'][$k - 1] = null; }
if (!isset($_POST['mfo'][$k - 1])) { $_POST['mfo'][$k - 1] = null; }
if (!isset($_POST['bank'][$k - 1])) { $_POST['bank'][$k - 1] = null; }
if (!isset($_POST['valuta'][$k - 1])) { $_POST['valuta'][$k - 1] = 4; }
//���������� ������

//������ ������
function valuta_list($selected, $num, $k)
	{
	echo "<select name = 'valuta[$num]'  onchange = \"document.forms.form.action = '?k=".$k."'; document.form.submit();\">";
	echo "<option value = '4'";
	if ($selected == 4) {echo " selected";}
	echo "> ...������� ������</option>";
	echo "<option value = '0'";
	if ($selected == 0) {echo " selected";}
	echo ">UAH</option>";
	
/*	echo "<option value = '1'";
	if ($selected == 1) {echo " selected";}
	echo ">RUB</option>";
	echo "<option value = '2'";
	if ($selected == 2) {echo " selected";}
	echo ">UAH</option>";
	echo "<option value = '3'";
	if ($selected == 3) {echo " selected";}
	echo ">EUR</option>";*/
	
	echo "</select>";
	}
//������ ������

//������� ��������� ������
function element_del($j)
	{
	for ($i = $j; $i < $_GET['k']; $i++)
		{
		$_POST['bank_name'][$i] = $_POST['bank_name'][$i + 1];
		$_POST['bank_id'][$i] = $_POST['bank_id'][$i + 1];
		$_POST['mfo'][$i] = $_POST['mfo'][$i + 1];
		$_POST['bank'][$i] = $_POST['bank'][$i + 1];
		$_POST['valuta'][$i] = $_POST['valuta'][$i + 1];
		}
	unset($_POST['bank_name'][$_GET['k']]);
	unset($_POST['bank_id'][$_GET['k']]);
	unset($_POST['mfo'][$_GET['k']]);
	unset($_POST['bank'][$_GET['k']]);
	unset($_POST['valuta'][$_GET['k']]);
	}
//������� ��������� ������

//�������� ����� ������ ��� ���������
if (isset($_GET['i'])) { element_del($_GET['i']); }
//�������� ����� ������ ��� ���������

//������ �����	
require_once "../HTML/reg_bank_form.html";
//������ �����

//������ �����
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";
//������ �����
?>