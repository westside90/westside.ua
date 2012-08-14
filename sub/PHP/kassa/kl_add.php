<?
//Налаштування сторінки і коннект з БД
error_reporting(0);
require_once "../dbconnect.php";
//Налаштування сторінки і коннект з БД

//Отримуємо массив даних
$k = $_GET['k'];
$kassa = $_POST;
$kassa['document'] = 2;
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

//Проводимо касовий лист
if ($kassa['status'] == 1)
	{
	for ($i = 0; $i < $k; $i++)
		{
		if ($kassa['type'][$i] == 0)
			{
			if ($kassa['make_type'][$i] == 0)
				{
				$kassa['debet'][$i] = 301;
				$kassa['kredit'][$i] = 41;
				}
			if ($kassa['make_type'][$i] == 1)
				{
				$kassa['debet'][$i] = 301;
				$kassa['kredit'][$i] = 361;			
				}
			}
		if ($kassa['type'][$i] == 1)
			{
			if ($kassa['make_type'][$i] == 0)
				{
				$kassa['debet'][$i] = 92;
				$kassa['kredit'][$i] = 301;
				}
			if ($kassa['make_type'][$i] == 1)
				{
				$kassa['debet'][$i] = 631;
				$kassa['kredit'][$i] = 301;
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
		NOW(), '5', '".$kassa['date']."', '0', ".$kassa['make'][$i].", 
		".$kassa['summa'][$i].", ".$kassa['debet'][$i].", ".$kassa['kredit'][$i]."	
		)"); 
		}	
	}
//Проводимо касовий лист
?>
<script>
window.close();
</script>