<?php
//��������� ������������� � �������� � ��
header ("Location: /kassa.php?page=0"); 
require_once "../dbconnect.php";

//�������� ID �����������
$id = $_REQUEST['id']; 

//������� ��� � �����
$kassa['type'] = $_REQUEST['type'];
$kassa['number'] = $_REQUEST['number'];
$kassa['date'] = $_REQUEST['date'];
$kassa['make_type'] = intval(substr ($_REQUEST['make_type'], 27, 1));
if ($kassa['make_type'] == 1)
	{ $kassa['make'] = $_REQUEST['kontragent']; }
if ($kassa['make_type'] == 0)
	{
	if ($kassa['type'] == 0)
		{ $kassa['make'] = $_REQUEST['income']; }
	if ($kassa['type'] == 1)
		{ $kassa['make'] = $_REQUEST['vytraty']; }
	}
$kassa['summa'] = $_REQUEST['summa'];
$kassa['description'] = $_REQUEST['description'];

//��������� �����
mysql_query ("UPDATE `kassa` SET 
`number` = '".$kassa['number']."' ,
`date` = '".$kassa['date']."' ,
`make_type` = '".$kassa['make_type']."' ,
`make` = '".$kassa['make']."' ,
`summa` = '".$kassa['summa']."' ,
`description` = '".$kassa['description']."'
WHERE `id` = $id");
?>