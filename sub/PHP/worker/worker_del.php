<?php
//��������� ������������� � �������� � ��
header ("Location: /worker.php?page=0"); 
require_once "../dbconnect.php";

//�������� ID �����������
$id = $_GET['id']; 

//��������� �����������
mysql_query ("DELETE FROM `worker` WHERE `id` = $id");
?>