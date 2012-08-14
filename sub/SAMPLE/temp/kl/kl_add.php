<?
//Налаштування сторінки і коннект з БД
error_reporting(0);
require_once "../../PHP/dbconnect2.php";
//Налаштування сторінки і коннект з БД

//Отримуємо массив даних
$k = $_GET['k'];
$kassa = $_POST;
$kassa['document'] = 1;
$kassa['status'] = $_GET['status'];

for ($i = 0; $i < $k; $i++)
	{
	$kassa['summa'][$i] = 0 + str_replace(" ","",$kassa['summa'][$i]);
	}
//Отримуємо массив даних

//Записуємо данні в БД
for ($i = 0; $i < $k; $i++)
	{
	mysql_query ("INSERT INTO $user_db.`kassa`
	(
	`created`,	`modified`,	`document`,	`status`, 
	`date`, `type`, `make_type`, 
	`make`,	`summa`, `description` 
	)
	VALUES
	(
	NOW(), NOW(), ".$kassa['document'].", ".$kassa['status'].", 
	'".$kassa['date']."', ".$kassa['type'][$i].", ".$kassa['make_type'][$i].", 
	".$kassa['make'][$i].", ".$kassa['summa'][$i].", '".$kassa['description'][$i]."'
	)");
	}
//Записуємо данні в БД

//Массив даних
//echo "<pre>";
//print_r($kassa);
//echo "</pre>";
//Массив даних
?>
<script>
window.close();
</script>