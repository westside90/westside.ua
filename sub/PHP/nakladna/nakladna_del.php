<?php
//��������� ������������� � �������� � ��
header ("Location: /nakladna.php?page=0"); 
require_once "../dbconnect.php";
//��������� ������������� � �������� � ��

//�������� ��� ���������
$nakladna = mysql_fetch_array (mysql_query ("SELECT `document`,`number`,`status` FROM `nakladna` WHERE `id` = ".$_GET['id'].""), MYSQL_ASSOC);
//�������� ��� ���������

//��������� �������� ���� �� ����������
if ($nakladna['status'] == 0)
	{ mysql_query ("DELETE FROM `nakladna` WHERE `document` = ".$nakladna['document']." AND `number` = ".$nakladna['number'].""); }
//��������� �������� ���� �� ����������
?>