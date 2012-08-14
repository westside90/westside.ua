<?
//Налаштування сторінки і коннект з БД
error_reporting(0);
require_once "../../PHP/dbconnect.php";
//Налаштування сторінки і коннект з БД

//Видаляємо існуючий документ
$created = mysql_result (mysql_query ("SELECT `created` FROM `nakladna` WHERE `id` = ".$_GET['old'].""), 0);
$number = mysql_result (mysql_query ("SELECT `number` FROM `nakladna` WHERE `id` = ".$_GET['old'].""), 0);
mysql_query ("DELETE FROM `nakladna` WHERE `number` = ".$number." AND `document` = 1");
//Видаляємо існуючий документ

//Отримуємо массив даних
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
	$nakladna['summa_all'] += 0 + $nakladna['summa'][$i];
	}
//Отримуємо массив даних

//Записуємо данні в БД
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
	'".$created."', NOW(), ".$nakladna['document'].", ".$nakladna['status'].", ".$nakladna['number'].", 
	'".$nakladna['date']."', ".$nakladna['kontragent'].", '".$nakladna['order_number']."', 
	'".$nakladna['order_date']."', '".$nakladna['order_across']."', ".$nakladna['tovar'][$i].", 
	".$nakladna['partia'][$i].", ".$nakladna['kkst'][$i].", ".$nakladna['cost'][$i].", 
	".$nakladna['summa'][$i].", '".$nakladna['prymitka']."'
	)");
	}
//Записуємо данні в БД

//Массив даних
//echo "<pre>";
//print_r($nakladna);
//echo "</pre>";
//Массив даних

//Проводимо документ
if ($nakladna['status'] == 1)
	{
	//Рахуємо собівартість для РН
	for ($i = 0; $i < $k; $i++)
		{
		$sql = mysql_query ("SELECT `cost` FROM `nakladna` WHERE `document` = 0 AND `number` = ".$nakladna['partia'][$i]." AND `tovar` = ".$nakladna['tovar'][$i]."");
		$nakladna['vartist'][$i] = 0 + mysql_result ($sql, 0) * $nakladna['kkst'][$i];
		$nakladna['vartist_all'] += 0 + $nakladna['vartist'][$i];
		}
	//Рахуємо собівартість для РН
	
	$nakladna['debet'][0] = 361;
	$nakladna['debet'][1] = 902;
	$nakladna['kredit'][0] = 702;
	$nakladna['kredit'][1] = 281;
	
	mysql_query("INSERT INTO $user_db.`plan` 
	(
	`created` , `document` , `date` , `number` ,
	`kontragent` , `summa` , `debet` , `kredit`
	)
	VALUES
	(
	NOW(), '".$nakladna['document']."', '".$nakladna['date']."', '".$nakladna['number']."', 
	'".$nakladna['kontragent']."', '".$nakladna['summa_all']."', '".$nakladna['debet'][0]."', '".$nakladna['kredit'][0]."'	
	)");
	
	mysql_query("INSERT INTO $user_db.`plan` 
	(
	`created` , `document` , `date` , `number` ,
	`kontragent` , `summa` , `debet` , `kredit`
	)
	VALUES
	(
	NOW(), '".$nakladna['document']."', '".$nakladna['date']."', '".$nakladna['number']."', 
	'".$nakladna['kontragent']."', '".$nakladna['vartist_all']."', '".$nakladna['debet'][1]."', '".$nakladna['kredit'][1]."'	
	)");
	}
//Проводимо документ
?>
<script>
window.close();
</script>