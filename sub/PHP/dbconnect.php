<?php
header("Content-type: text/html; charset=windows-1251");
session_start();
//��������� �'������� � ��
$host = "localhost";
$user = $_SESSION['login'];
$pwd = $_SESSION['pass'];
//��������� �'������� � ��

//��������� ���� �� ��
$db = mysql_connect ($host,$user,$pwd);
//��������� ���� �� ��

//�������� �'������� � ��
if (!$db) 
	{
	echo "���� �� ���� �� ��������";
	$logkey = false;
	}
else 
	{
//	echo "�� ������ ��� ������";
	$logkey = true;
	}
//�������� �'������� � ��

//��������� �����������
$user_db = $user."_db";
mysql_select_db ($user_db, $db);
//��������� �����������

//��������� �'������� � ��
mysql_query ("SET character_set_client = 'cp1251'");
mysql_query ("SET character_set_results = 'cp1251'");
mysql_query ("SET collation_connection = 'cp1251_general_ci'");
mysql_query ('SET NAMES cp1251');
//��������� �'������� � ��
 ?>