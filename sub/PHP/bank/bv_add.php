<?
//������������ ������� � ������� � ��
error_reporting(0);
require_once "../dbconnect.php";
//������������ ������� � ������� � ��

//�������� ������ �����
$k = $_GET['k'];
$bv = $_POST;
$bv['document'] = 0;
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
	`created`,	`modified`, `document`, `rahunok`,	`status`, 
	`date`, `type`, `make_type`, 
	`make`,	`summa`, `description` 
	)
	VALUES
	(
	NOW(), NOW(), ".$bv['document'].", ".$bv['rahunok'].", ".$bv['status'].", 
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

//��������� ��������� �������
if ($bv['status'] == 1)
	{
	for ($i = 0; $i < $k; $i++)
		{
		if ($bv['type'][$i] == 0)
			{
			if ($bv['make_type'][$i] == 0)
				{
				$bv['debet'][$i] = 311;
				$bv['kredit'][$i] = 41;
				}
			if ($bv['make_type'][$i] == 1)
				{
				$bv['debet'][$i] = 311;
				$bv['kredit'][$i] = 361;			
				}
			}
		if ($bv['type'][$i] == 1)
			{
			if ($bv['make_type'][$i] == 0)
				{
				$bv['debet'][$i] = 92;
				$bv['kredit'][$i] = 311;
				}
			if ($bv['make_type'][$i] == 1)
				{
				$bv['debet'][$i] = 631;
				$bv['kredit'][$i] = 311;
				}
			}
		}
	
	for ($i = 0; $i < $k; $i++)
		{
		mysql_query ("INSERT INTO $user_db.`plan` 
		(
		`created` , `document` , `date` , `number` ,
		`kontragent` , `summa` , `debet` , `kredit`
		)
		VALUES
		(
		NOW(), '4', '".$bv['date']."', '".$bv['rahunok']."', ".$bv['make'][$i].", 
		".$bv['summa'][$i].", ".$bv['debet'][$i].", ".$bv['kredit'][$i]."	
		)"); 
		}	
	}
//��������� ��������� �������
?>
<script>
window.close();
</script>