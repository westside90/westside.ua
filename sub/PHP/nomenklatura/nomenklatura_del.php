<?php
//��������� ������������� � �������� � ��
header ("Location: /nomenklatura.php?page=0"); 
require_once "../dbconnect.php";

//�������� ID �����������
$id = $_GET['id']; 

//��������� �����������
mysql_query ("DELETE FROM `nomenklatura` WHERE `id` = $id", $db);
?>