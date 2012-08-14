<?php
//Параметри переадресації і коннекта з БД
header ("Location: /kassa.php?page=0"); 
require_once "../dbconnect.php";

//Отримуємо ID касового ордеру і необхідну для проводки інформацію
$provodka = mysql_fetch_array (mysql_query ("SELECT `date` FROM `kassa` WHERE `id` = ".$_GET['id'].""), MYSQL_ASSOC);
$sql = mysql_query ("SELECT `status`,`type`,`number`,`date`,`make_type`,`make`,`summa` FROM `kassa` 
					WHERE (`document` = 2 OR `document` = 3)
					AND DATE(`date`) = '".$provodka['date']."'");
while ($provodka[] = mysql_fetch_array ($sql, MYSQL_ASSOC));
$n = count($provodka)-1;
unset($provodka[$n]);

for ($i = 0; $i < $n; $i++)
	{
	if ($provodka[$i]['type'] == 0)
		{
		if ($provodka[$i]['make_type'] == 1)
			{
			$provodka[$i]['debet'] = 301;
			$provodka[$i]['kredit'] = 361;
			}
			else
			{
			$provodka[$i]['debet'] = 301;
			$provodka[$i]['kredit'] = 41;
			}
		}
	
	if ($provodka[$i]['type'] == 1)
		{
		if ($provodka[$i]['make_type'] == 1)
			{
			$provodka[$i]['debet'] = 631;
			$provodka[$i]['kredit'] = 301;
			}
		else
			{
			$provodka[$i]['debet'] = 92;
			$provodka[$i]['kredit'] = 301;
			}
		}
	}
	
if ($provodka[0]['status'] == 0) 
	{
	mysql_query ("UPDATE `kassa` SET `status` = 1 WHERE DATE(`date`) = '".$provodka[0]['date']."' AND (`document` = 2 OR `document` = 3)");
	for ($i = 0; $i < $n; $i++)
		{
		mysql_query ("INSERT INTO $user_db.`plan` 
		(
		`created` , `document` , `date` ,  `number` , `kontragent` ,  
		`summa` , `debet` , `kredit`
		)
		VALUES
		(
		NOW(), '5', '".$provodka[$i]['date']."', '0', '".$provodka[$i]['make']."', 
		'".$provodka[$i]['summa']."', '".$provodka[$i]['debet']."', '".$provodka[$i]['kredit']."'	
		)"); 
		}
	}
else
	{
	mysql_query ("UPDATE `kassa` SET `status` = 0 WHERE DATE(`date`) = '".$provodka[0]['date']."' AND (`document` = 2 OR `document` = 3)");
	mysql_query ("DELETE FROM `plan` WHERE `document` = 5 AND DATE(`date`) = '".$provodka['date']."'");
	}

//echo "<pre>";
//print_r($provodka);
//echo "</pre>";
?>