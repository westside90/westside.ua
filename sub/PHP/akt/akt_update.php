<?
//Налаштування сторінки і коннект з БД
error_reporting(0);
require_once "../dbconnect.php";
//Налаштування сторінки і коннект з БД

//Видаляємо існуючий документ
$created = mysql_result (mysql_query ("SELECT `created` FROM `nakladna` WHERE `id` = ".$_GET['old'].""), 0);
mysql_query ("DELETE FROM `nakladna` WHERE `number` = (SELECT `number` FROM `nakladna` WHERE `id` = ".$_GET['old'].") 
									AND `document` = ".$_GET['document']."");
//Видаляємо існуючий документ

//Отримуємо массив даних
$k = $_GET['k'];
$akt = $_POST;
$akt['document'] = $_GET['document'];
$akt['status'] = $_GET['status'];

for ($i = 0; $i < $k; $i++)
	{
	$akt['posluga'][$i] = 0 + str_replace(" ","",$akt['posluga'][$i]);
	$akt['kkst'][$i] = 0 + str_replace(" ","",$akt['kkst'][$i]);
	$akt['cost'][$i] = 0 + str_replace(" ","",$akt['cost'][$i]);
	$akt['summa'][$i] = 0 + ($akt['kkst'][$i]*$akt['cost'][$i]);
	$akt['summa_all'] += 0 + $akt['summa'][$i];
	}
//Отримуємо массив даних

//Записуємо данні в БД
for ($i = 0; $i < $k; $i++)
	{
	mysql_query ("INSERT INTO $user_db.`akt`
	(
	`created`,	`modified`,	`document`,	`status`,	`number`, 
	`date`, `kontragent`, `posluga`, `kkst`, `cost`, `summa`, `prymitka` 
	)
	VALUES
	(
	'".$created."', NOW(), ".$akt['document'].", ".$akt['status'].", ".$akt['number'].", 
	'".$akt['date']."', ".$akt['kontragent'].", ".$akt['posluga'][$i].", ".$akt['kkst'][$i].", 
	".$akt['cost'][$i].", ".$akt['summa'][$i].", '".$akt['prymitka']."'
	)");
	}
//Записуємо данні в БД

//Массив даних
//echo "<pre>";
//print_r($akt);
//echo "</pre>";
//Массив даних

//Проводимо документ
if ($akt['status'] == 1)
	{
	if ($akt['document'] == 1)
		{
		$akt['debet'] = 92;
		$akt['kredit'] = 631;
	
		mysql_query ("INSERT INTO $user_db.`plan` 
		(
		`created` , `document` , `date` , `number` ,
		`kontragent` , `summa` , `debet` , `kredit`
		)
		VALUES
		(
		NOW(), '3', '".$akt['date']."', '".$akt['number']."', '".$akt['kontragent']."', 
		'".$akt['summa_all']."', '".$akt['debet']."', '".$akt['kredit']."'	
		)");
		}
	
	if ($akt['document'] == 0)
		{
		$akt['debet'] = 361;
		$akt['kredit'] = 703;
		
		mysql_query("INSERT INTO $user_db.`plan` 
		(
		`created` , `document` , `date` , `number` , 
		`kontragent` , `summa` , `debet` , `kredit`
		)
		VALUES
		(
		NOW(), '2', '".$akt['date']."', '".$akt['number']."', '".$akt['kontragent']."', 
		'".$akt['summa_all']."', '".$akt['debet']."', '".$akt['kredit']."'	
		)");
		}	
	}
//Проводимо документ
?>
<script>
window.close();
</script>
