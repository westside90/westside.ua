<?
//������������ ������� � ������� � ��
error_reporting(0);
require_once "../dbconnect.php";
//������������ ������� � ������� � ��

//�������� ������ �����
$k = $_GET['k'];
$nakladna = $_POST;
$nakladna['document'] = 0;
$nakladna['status'] = $_GET['status'];

for ($i = 0; $i < $k; $i++)
	{
	$nakladna['tovar'][$i] = 0 + str_replace(" ","",$nakladna['tovar'][$i]);
	$nakladna['kkst'][$i] = 0 + str_replace(" ","",$nakladna['kkst'][$i]);
	$nakladna['cost'][$i] = 0 + str_replace(" ","",$nakladna['cost'][$i]);
	$nakladna['summa'][$i] = 0 + ($nakladna['kkst'][$i]*$nakladna['cost'][$i]);
	$nakladna['summa_all'] += 0 + $nakladna['summa'][$i];
	}
//�������� ������ �����

//�������� ���� � ��
for ($i = 0; $i < $k; $i++)
	{
	mysql_query ("INSERT INTO $user_db.`nakladna`
	(
	`created`,	`modified`,	`document`,	`status`, `number`, 
	`date`, `kontragent`, `tovar`, `kkst`, `cost`, `summa`, `prymitka` 
	)
	VALUES
	(
	NOW(), NOW(), ".$nakladna['document'].", ".$nakladna['status'].", ".$nakladna['number'].", 
	'".$nakladna['date']."', ".$nakladna['kontragent'].", ".$nakladna['tovar'][$i].", ".$nakladna['kkst'][$i].", 
	".$nakladna['cost'][$i].", ".$nakladna['summa'][$i].", '".$nakladna['prymitka']."'
	)");
	}
//�������� ���� � ��

//������ �����
//echo "<pre>";
//print_r($nakladna);
//echo "</pre>";
//������ �����

//��������� ��������
if ($nakladna['status'] == 1)
	{
	$nakladna['debet'] = 281;
	$nakladna['kredit'] = 631;
	
	mysql_query ("INSERT INTO $user_db.`plan` 
	(
	`created` ,	`document` , `date` , `number` ,
	`kontragent` , `summa` , `debet` , `kredit`
	)
	VALUES
	(
	NOW(), '".$nakladna['document']."', '".$nakladna['date']."', '".$nakladna['number']."', 
	'".$nakladna['kontragent']."', '".$nakladna['summa_all']."', '".$nakladna['debet']."', '".$nakladna['kredit']."'	
	)");
	}
//��������� ��������
?>
<script>
window.close();
</script>