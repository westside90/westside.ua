<?php
//��������� ������������� � �������� � ��
header ("Location: /pld.php?page=0"); 
require_once "../dbconnect.php";
mysql_query ('SET NAMES cp1251');

//��������� �����������
$user_db = "westside_db";
mysql_select_db ($user_db, $db);

//������� ��� � �����
$number = $_REQUEST['number'];
$date = $_REQUEST['date'];
$rahunok_in = $_REQUEST['rahunok_in'];
$kontragent = $_REQUEST['kontragent'];
$rahunok_out = $_REQUEST['rahunok_out'];
$summa = $_REQUEST['summa'];
$description = $_REQUEST['description'];

//�������� ���
mysql_query ("INSERT INTO $user_db.`pld`
(
`id` ,
`status` ,
`number` ,
`date` ,
`rahunok_in` ,
`kontragent` ,
`rahunok_out` ,
`summa` ,
`description`
)
VALUES
(
'$id', '$status', '$number', '$date', '$rahunok_in',
'$kontragent', '$rahunok_out', '$summa', '$description'
)", $db);
?>