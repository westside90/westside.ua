<?
//Налаштування сторінки і коннект з БД
error_reporting(0);
require_once "../../PHP/dbconnect.php";
//Налаштування сторінки і коннект з БД

//Видаляємо існуючий документ
$created = mysql_result (mysql_query ("SELECT `created` FROM `nakladna` WHERE `id` = ".$_GET['old'].""), 0);
$number = mysql_result (mysql_query ("SELECT `number` FROM `nakladna` WHERE `id` = ".$_GET['old'].""), 0);
mysql_query ("DELETE FROM `nakladna` WHERE `number` = ".$number." AND `document` = 3");
//Видаляємо існуючий документ

//Отримуємо массив даних
$k = $_GET['k'];
$nakladna = $_POST;
$nakladna['document'] = 3;
$nakladna['status'] = $_GET['status'];
$nakladna['number'] = 2000000000;
//Залишки вносимо одним днем раніше від початку роботи
$nakladna['date'] = '2012-01-01';
$nakladna['kontragent'] = 0;

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
	`created`,	`modified`,	`document`, `status`, `number`, `date`, 
	`kontragent`, `tovar`, `kkst`, 
	`cost`, `summa`, `prymitka` 
	)
	VALUES
	(
	'".$created."', NOW(), ".$nakladna['document'].", ".$nakladna['status'].", ".$nakladna['number'].", '".$nakladna['date']."', 
	".$nakladna['kontragent'].", ".$nakladna['tovar'][$i].", ".$nakladna['kkst'][$i].", 
	".$nakladna['cost'][$i].", ".$nakladna['summa'][$i].", '".$nakladna['prymitka']."'
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
	$nakladna['debet'] = 281;
	$nakladna['kredit'] = 0;
	
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
//Проводимо документ
?>
<script>
window.close();
</script>