<?php
//������������ ������� � ������� � ��
//error_reporting(0);
require_once "dbconnect.php";
//������������ ������� � ������� � ��

//���������� ������
if (!isset($_POST['name'])) { $_POST['name'] = null; }

//���������� ������


//������ ������� �����
function units_list($selected)
	{
	$sql = mysql_query ("SELECT `id`,`name` FROM `units`");
	$n = mysql_num_rows ($sql);
	while ($units[] = mysql_fetch_array ($sql, MYSQL_ASSOC));
	echo "<select name = 'units'  onchange = \"document.forms.form.action = '#'; document.form.submit();\">";
	echo "<option value = '0'";
	if ($selected == 0) {echo " selected";}
	echo "> ...������� �������</option>";
		for ($i = 0; $i < $n; $i++)
			{
			echo "<option value ='".$units[$i]['id']."'";
				if ($selected == $units[$i]['id']) {echo " selected";}
			echo ">".$units[$i]['name']."</option>";
			}
	echo "</select>";
	}
//������ ������� �����

//������ �����	
require_once "../HTML/registration_form.html";
//������ �����

//������ �����
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";
//������ �����
?>