<?
//������������ ������� � ������� � ��
error_reporting(0);
require_once "../../PHP/dbconnect2.php";
//������������ ������� � ������� � ��

//�������� ������ �����
$k = $_GET['k'];
$nakladna = $_POST;
$nakladna['document'] = 1;
$nakladna['status'] = $_GET['status'];
if ($nakladna['order_date'] == null) { $nakladna['order_date'] = "0000-00-00"; }

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
	`date`,	`kontragent`, `order_number`, 
	`order_date`, `order_across`, `tovar`, 
	`partia`, `kkst`, `cost`, 
	`summa`, `prymitka` 
	)
	VALUES
	(
	NOW(), NOW(), ".$nakladna['document'].", ".$nakladna['status'].", ".$nakladna['number'].", 
	'".$nakladna['date']."', ".$nakladna['kontragent'].", '".$nakladna['order_number']."', 
	'".$nakladna['order_date']."', '".$nakladna['order_across']."', ".$nakladna['tovar'][$i].", 
	".$nakladna['partia'][$i].", ".$nakladna['kkst'][$i].", ".$nakladna['cost'][$i].", 
	".$nakladna['summa'][$i].", '".$nakladna['prymitka']."'
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