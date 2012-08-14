<?php
//Параметри переадресації і коннекта з БД
header ("Location: /akt.php?page=0"); 
require_once "../dbconnect.php";
//Параметри переадресації і коннекта з БД

//Отримуємо ID накладної і необхідну для проводки інформацію
$provodka = mysql_fetch_array (mysql_query ("SELECT `status`,`document`,`number`,`date`,`kontragent` FROM `akt` WHERE `id` = ".$_GET['id'].""), MYSQL_ASSOC);
$provodka['summa'] = mysql_result (mysql_query ("SELECT SUM(summa) FROM `akt` WHERE `document` = ".$provodka['document']." AND `number` = ".$provodka['number'].""), 0);

if ($provodka['document'] == 1)
	{
	$provodka['debet'] = 92;
	$provodka['kredit'] = 631;
	
	if ($provodka['status'] == 0)
		{
		mysql_query ("UPDATE `akt` SET `status` = 1 WHERE `document` = ".$provodka['document']." AND `number` = ".$provodka['number']."");
		mysql_query ("INSERT INTO $user_db.`plan` 
		(
		`created` ,
		`document` ,
		`date` ,
		`number` ,
		`kontragent` ,
		`summa` ,
		`debet` ,
		`kredit`
		)
		VALUES
		(
		NOW(), '3', '".$provodka['date']."', '".$provodka['number']."', 
		'".$provodka['kontragent']."', '".$provodka['summa']."', '".$provodka['debet']."', '".$provodka['kredit']."'	
		)");
		}
		else
		{
		mysql_query ("UPDATE `akt` SET `status` = 0 WHERE `document` = ".$provodka['document']." AND `number` = ".$provodka['number']."");
		mysql_query ("DELETE FROM `plan` WHERE `document` = ".$provodka['document']." AND `number` = ".$provodka['number']."");
		}
	}
	
if ($provodka['document'] == 0)
	{
	$provodka['debet'] = 361;
	$provodka['kredit'] = 703;
	
	if ($provodka['status'] == 0)
		{
		mysql_query("UPDATE `akt` SET `status` = 1 WHERE `document` = ".$provodka['document']." AND `number` = ".$provodka['number']."");
		mysql_query("INSERT INTO $user_db.`plan` 
		(
		`created` ,
		`document` ,
		`date` ,
		`number` ,
		`kontragent` ,
		`summa` ,
		`debet` ,
		`kredit`
		)
		VALUES
		(
		NOW(), '2', '".$provodka['date']."', '".$provodka['number']."', 
		'".$provodka['kontragent']."', '".$provodka['summa']."', '".$provodka['debet']."', '".$provodka['kredit']."'	
		)");
		}
		else
		{
		mysql_query ("UPDATE `akt` SET `status` = 0 WHERE `document` = ".$provodka['document']." AND `number` = ".$provodka['number']."");
		mysql_query ("DELETE FROM `plan` WHERE `document` = ".$provodka['document']." AND `number` = ".$provodka['number']."");
		}
	}	

//echo "<pre>";
//print_r($provodka);
//echo "</pre>";
?>