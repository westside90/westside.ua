<?php
//��������� ������������� � �������� � ��
header ("Location: /index.php");
require_once "dbconnect.php";

//��������� �������
mysql_query ("DELETE FROM `rahunki` WHERE `id` = ".$_GET['id']."");
?>