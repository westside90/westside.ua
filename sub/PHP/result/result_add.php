<?
//��������� ������������� � �������� � ��
header ("Location: /result.php?page=0"); 
require_once "../dbconnect.php";
//��������� ������������� � �������� � ��

//�������� ���� ��� ����� �����
$min_date = $_REQUEST['min_date'];
$max_date = $_REQUEST['max_date'];
//�������� ���� ��� ����� �����

//������ ����� � ��
mysql_query ("INSERT INTO `result` 
(
`status` ,
`created` ,
`begin_date` ,
`end_date`
)
VALUES
(
'0',NOW(),'".$min_date."','".$max_date."'
)");
//������ ����� � ��
?>