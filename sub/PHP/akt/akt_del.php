<?php
//��������� ������������� � �������� � ��
header ("Location: /nakladna.php?page=0"); 
require_once "../dbconnect.php";
//��������� ������������� � �������� � ��

//�������� ��� ���������
$akt = mysql_fetch_array (mysql_query ("SELECT `document`,`number`,`status` FROM `akt` WHERE `id` = ".$_GET['id'].""), MYSQL_ASSOC);
//�������� ��� ���������

//��������� ��������, ���� �� ����������
if ($akt['status'] == 0)
	{ mysql_query ("DELETE FROM `akt` WHERE `document` = ".$akt['document']." AND `number` = ".$akt['number'].""); }
//��������� ��������, ���� �� ����������
?>