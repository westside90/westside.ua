<?php
//��������� ������������� � �������� � ��
header ("Location: /kontragent.php?page=0"); 
require_once "../dbconnect.php";

//�������� ID �����������
$id = $_GET['id']; 

//��������� �����������
mysql_query ("DELETE FROM `kontragent` WHERE `id` = $id");
mysql_query ("DELETE FROM `rahunki` WHERE `kontragent` = $id");
?>