<?
//������������ ������� � ������� � ��
error_reporting(0);
require_once "../dbconnect.php";
//������������ ������� � ������� � ��

//��������� �������� ��������
$created = mysql_result (mysql_query ("SELECT `created` FROM `nakladna` WHERE `id` = ".$_GET['old'].""), 0);
mysql_query ("DELETE FROM `nakladna` WHERE `number` = (SELECT `number` FROM `nakladna` WHERE `id` = ".$_GET['old'].") 
									AND `document` = 2");
//��������� �������� ��������

//�������� ������ �����
$k = $_GET['k'];
$akt = $_POST;
$akt['document'] = 2;
$akt['status'] = 0;

for ($i = 0; $i < $k; $i++)
	{
	$akt['posluga'][$i] = 0 + str_replace(" ","",$akt['posluga'][$i]);
	$akt['kkst'][$i] = 0 + str_replace(" ","",$akt['kkst'][$i]);
	$akt['cost'][$i] = 0 + str_replace(" ","",$akt['cost'][$i]);
	$akt['summa'][$i] = 0 + ($akt['kkst'][$i]*$akt['cost'][$i]);
	}
//�������� ������ �����

//�������� ���� � ��
for ($i = 0; $i < $k; $i++)
	{
	mysql_query ("INSERT INTO $user_db.`akt`
	(
	`created`,	`modified`,	`document`,	`status`,	`number`, 
	`date`, `kontragent`, `rahunok`, `posluga`, 
	`kkst`, `cost`, `summa`, `prymitka` 
	)
	VALUES
	(
	'".$created."', NOW(), ".$akt['document'].", ".$akt['status'].", ".$akt['number'].", 
	'".$akt['date']."', ".$akt['kontragent'].", '".$akt['rahunok']."', ".$akt['posluga'][$i].", 
	".$akt['kkst'][$i].", ".$akt['cost'][$i].", ".$akt['summa'][$i].", '".$akt['prymitka']."'
	)");
	}
//�������� ���� � ��

//������ �����
//echo "<pre>";
//print_r($akt);
//echo "</pre>";
//������ �����
?>
<script>
window.close();
</script>