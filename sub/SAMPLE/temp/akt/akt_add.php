<?
//Налаштування сторінки і коннект з БД
error_reporting(0);
require_once "../../PHP/dbconnect2.php";
//Налаштування сторінки і коннект з БД

//Отримуємо массив даних
$k = $_GET['k'];
$akt = $_POST;
$akt['document'] = $_GET['document'];
$bv['status'] = $_GET['status'];

for ($i = 0; $i < $k; $i++)
	{
	$akt['posluga'][$i] = 0 + str_replace(" ","",$akt['posluga'][$i]);
	$akt['kkst'][$i] = 0 + str_replace(" ","",$akt['kkst'][$i]);
	$akt['cost'][$i] = 0 + str_replace(" ","",$akt['cost'][$i]);
	$akt['summa'][$i] = 0 + ($akt['kkst'][$i]*$akt['cost'][$i]);
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
	NOW(), NOW(), ".$akt['document'].", ".$akt['status'].", ".$akt['number'].", 
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
?>
<script>
window.close();
</script>