<?php
//������������ ������� � ������� � ��
error_reporting(0);
require_once "../dbconnect.php";
//������������ ������� � ������� � ��

//���������� ������
if (!isset($_POST['name'])) { $_POST['name'] = null; }
if (!isset($_POST['type'])) { $_POST['type'] = 2; }
//���������� ������

//�������/�����������
function type_list($selected)
	{
	echo "<select name = 'type'  onchange = \"document.forms.form.action = '#'; document.form.submit();\">";
	echo "<option value = '2'";
	if ($selected == 2) {echo " selected";}
	echo "> ...������� ���</option>";
	echo "<option value = '0'";
	if ($selected == 0) {echo " selected";}
	echo ">�������</option>";
	echo "<option value = '1'";
	if ($selected == 1) {echo " selected";}
	echo ">�����������</option>";
	echo "</select>";
	}
//�������/�����������

//������ �����	
require_once "../../HTML/nomenklatura/vytraty_form.html";
//������ �����

//������ �����
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";
//������ �����
?>