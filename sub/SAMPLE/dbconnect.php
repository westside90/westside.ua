<?php
//ϳ�������� ������
header('Content-Type: text/html; charset=cp1251'); 

//��������� �'������� � ��
$host="localhost";
$user="root";
$pwd="wtscomp";

//��������� ���� �� ��
$db=mysql_connect($host,$user,$pwd);
if (!$db) {die("������ �������".mysql_error());}
	echo "�'������� �����������";
	
mysql_query("SET character_set_client='cp1251'");
mysql_query("SET character_set_results='cp1251'");
mysql_query("SET collation_connection='cp1251_general_ci'");
 ?>