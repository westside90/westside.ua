<?php
//������������ ������� � ������� � ��
//error_reporting(0);
require_once "../dbconnect.php";
//������������ ������� � ������� � ��

//�������� ����� �����
$k = $_GET['k'];
$kontragent = $_POST;
//�������� ����� �����

//�������� ��� �����������
mysql_query ("INSERT INTO $user_db.`kontragent`
(
`created` , `modified` , `type` , `short_name` , `full_name` ,
`ident_number` , `first_name` , `second_name` , `third_name` ,
`mob_tel` , `address` , `location` , `tel` , `prymitka` 
)
VALUES
(
NOW(), NOW(), ".$kontragent['type'].", '".$kontragent['short_name']."', '".$kontragent['full_name']."', 
'".$kontragent['ident_number']."', '".$kontragent['first_name']."', '".$kontragent['second_name']."', '".$kontragent['third_name']."', 
'".$kontragent['mob_tel']."', '".$kontragent['address']."', '".$kontragent['location']."', '".$kontragent['tel']."', '".$kontragent['prymitka']."'
)");
//�������� ��� �����������

//��������� id �����������
$kontragent['id'] = mysql_result (mysql_query("SELECT `id` FROM `kontragent` WHERE `short_name` = '".$kontragent['short_name']."'"), 0);
//��������� id �����������

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
	NOW(), NOW(), '".$kontragent['bank_name'][$i]."', ".$kontragent['id'].", 
	'".$kontragent['bank_id'][$i]."', '".$kontragent['mfo'][$i]."', '".$kontragent['bank'][$i]."', ".$kontragent['valuta'][$i]."
	) ");
	}
//������ ������� �����������

//������ �����
//echo "<pre>";
//print_r($kotragent);
//echo "</pre>";
//������ �����
?>
<script>
window.close();
</script>