<?php
//������������ ������� � ������� � ��
error_reporting(0);
require_once "dbconnect.php";
//������������ ������� � ������� � ��

mysql_query ("DELETE FROM `users`.`personal` WHERE `user` = 0");

//�������� ����� �����
$personal = $_POST;
//�������� ����� �����

//������ ������� �����������
mysql_query ("INSERT INTO `users`.`personal` 
(
`created` , `modified` , `user` , `first_name` , `second_name` , `third_name` , 
`birth_date` , `ident_number` , `indeks`, `oblast`, `misto`, `address` , `tel` , `start_date`
)
VALUES
(
NOW(), NOW(), 0, '".$personal['first_name']."', '".$personal['second_name']."', '".$personal['third_name']."', 
'".$personal['birth_date']."', '".$personal['ident_number']."', '".$personal['indeks']."', '".$personal['oblast']."', '".$personal['misto']."', '".$personal['address']."', '".$personal['tel']."', '".$personal['start_date']."'
) ");
//������ ������� �����������

//������ �����
//echo "<pre>";
//print_r($personal);
//echo "</pre>";
//������ �����
?>
<script>
window.close();
</script>