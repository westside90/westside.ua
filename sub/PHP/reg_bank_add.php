<?php
//������������ ������� � ������� � ��
error_reporting(0);
require_once "dbconnect.php";
//������������ ������� � ������� � ��

//�������� ����� �����
$rahunok = $_POST;
$k = count($rahunok['bank_name']);
//�������� ����� �����

//������ ������� �����������
for ($i = 0; $i < $k; $i++)
	{
	mysql_query ("INSERT INTO $user_db.`rahunki`
	(
	`created` , `modified` , `name` , `kontragent` , 
	`bank_id` , `mfo` , `bank` , `valuta` 
	)
	VALUES
	(
	NOW(), NOW(), '".$rahunok['bank_name'][$i]."', 0, 
	'".$rahunok['bank_id'][$i]."', '".$rahunok['mfo'][$i]."', '".$rahunok['bank'][$i]."', ".$rahunok['valuta'][$i]."
	) ");
	}
//������ ������� �����������

//������ �����
//echo "<pre>";
//print_r($rahunok);
//echo "</pre>";
//������ �����
?>
<script>
window.close();
</script>