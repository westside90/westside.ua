<?
//Налаштування сторінки і коннект з БД
error_reporting(0);
require_once "../../PHP/dbconnect2.php";
//Налаштування сторінки і коннект з БД

//Отримуємо массив даних
$k = $_GET['k'];
$nakladna = $_POST;
$nakladna['document'] = 3;
$nakladna['status'] = 0;
$nakladna['number'] = 0;
//Залишки вносимо одним днем раніше від початку роботи
$nakladna['date'] = '0000-00-00';
$nakladna['kontragent'] = 0;

for ($i = 0; $i < $k; $i++)
	{
	$nakladna['kkst'][$i] = 0 + str_replace(" ","",$nakladna['kkst'][$i]);
	$nakladna['cost'][$i] = 0 + str_replace(" ","",$nakladna['cost'][$i]);
	$nakladna['summa'][$i] = 0 + ($nakladna['kkst'][$i]*$nakladna['cost'][$i]);
	}
//Отримуємо массив даних

//Записуємо данні в БД
for ($i = 0; $i < $k; $i++)
	{
	mysql_query ("INSERT INTO $user_db.`nakladna`
	(
	`created`,	`modified`,	`document`, `number`, `date`, 
	`kontragent`, `tovar`, `kkst`, 
	`cost`, `summa`, `prymitka` 
	)
	VALUES
	(
	NOW(), NOW(), ".$nakladna['document'].", ".$nakladna['number'].", '".$nakladna['date']."', 
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
?>
<script>
window.close();
</script>