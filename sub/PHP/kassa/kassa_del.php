<?php
//��������� ������������� � �������� � ��
header ("Location: /kassa.php?page=0"); 
require_once "../dbconnect.php";
//��������� ������������� � �������� � ��

//�������� ��� ���������
$kassa = mysql_fetch_array (mysql_query ("SELECT `document`, `number`, `status` FROM `kassa` WHERE `id` = ".$_GET['id'].""), MYSQL_ASSOC);
//�������� ��� ���������

//��������� ��������, ���� �� ����������
if ($kassa['status'] == 0)
	{ mysql_query ("DELETE FROM `kassa` WHERE `document` = ".$kassa['document']." AND `number` = ".$kassa['number'].""); }
//��������� ��������, ���� �� ����������
?>