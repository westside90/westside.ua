<?
//������������ ������� � ������� � ��
error_reporting(0);
require_once "../../PHP/dbconnect2.php";
//������������ ������� � ������� � ��

//�������� ������ �����
$k = $_GET['k'];
$bv = $_POST;
$bv['document'] = 1;
$bv['status'] = $_GET['status'];

for ($i = 0; $i < $k; $i++)
	{
	$bv['summa'][$i] = 0 + str_replace(" ","",$bv['summa'][$i]);
	}
//�������� ������ �����

//�������� ���� � ��
for ($i = 0; $i < $k; $i++)
	{
	mysql_query ("INSERT INTO $user_db.`bv`
	(
	`created`,	`modified`,	`document`,	`status`, 
	`date`, `type`, `make_type`, 
	`make`,	`summa`, `description` 
	)
	VALUES
	(
	NOW(), NOW(), ".$bv['document'].", ".$bv['status'].", 
	'".$bv['date']."', ".$bv['type'][$i].", ".$bv['make_type'][$i].", 
	".$bv['make'][$i].", ".$bv['summa'][$i].", '".$bv['description'][$i]."'
	)");
	}
//�������� ���� � ��

//������ �����
//echo "<pre>";
//print_r($bv);
//echo "</pre>";
//������ �����
?>
<script>
window.close();
</script>