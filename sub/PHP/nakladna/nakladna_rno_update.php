<?
//������������ ������� � ������� � ��
error_reporting(0);
require_once "../../PHP/dbconnect.php";
//������������ ������� � ������� � ��

//��������� �������� ��������
$created = mysql_result (mysql_query ("SELECT `created` FROM `nakladna` WHERE `id` = ".$_GET['old'].""), 0);
$number = mysql_result (mysql_query ("SELECT `number` FROM `nakladna` WHERE `id` = ".$_GET['old'].""), 0);
mysql_query ("DELETE FROM `nakladna` WHERE `number` = ".$number." AND `document` = 2");
//��������� �������� ��������

//�������� ������ �����
$k = $_GET['k'];
$nakladna = $_POST;
$nakladna['document'] = 2;
$nakladna['status'] = 0;

for ($i = 0; $i < $k; $i++)
	{
	$nakladna['kkst'][$i] = 0 + str_replace(" ","",$nakladna['kkst'][$i]);
	$nakladna['cost'][$i] = 0 + str_replace(" ","",$nakladna['cost'][$i]);
	$nakladna['summa'][$i] = 0 + ($nakladna['kkst'][$i]*$nakladna['cost'][$i]);
	}
//�������� ������ �����

//�������� ���� � ��
for ($i = 0; $i < $k; $i++)
	{
	mysql_query ("INSERT INTO $user_db.`nakladna`
	(
	`created`,	`modified`,	`document`,	`status`, `number`, 
	`date`,	`kontragent`, `rahunok`, `tovar`, 
	`kkst`, `cost`, `summa`, `prymitka` 
	)
	VALUES
	(
	'".$created."', NOW(), ".$nakladna['document'].", ".$nakladna['status'].", ".$nakladna['number'].", 
	'".$nakladna['date']."', ".$nakladna['kontragent'].", '".$nakladna['rahunok']."', ".$nakladna['tovar'][$i].", 
	".$nakladna['kkst'][$i].", ".$nakladna['cost'][$i].", ".$nakladna['summa'][$i].", '".$nakladna['prymitka']."'
	)");
	}
//�������� ���� � ��

//������ �����
//echo "<pre>";
//print_r($nakladna);
//echo "</pre>";
//������ �����
?>
<script>
window.close();
</script>