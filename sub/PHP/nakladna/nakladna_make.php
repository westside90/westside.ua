<?php
//Параметри переадресації і коннекта з БД
header ("Location: /nakladna.php?page=0"); 
require_once "../dbconnect.php";
//Параметри переадресації і коннекта з БД

//Отримуємо ID накладної і необхідну для проводки інформацію
$provodka = mysql_fetch_array (mysql_query ("SELECT `status`,`document`,`number`,`date`,`kontragent` FROM `nakladna` WHERE `id` = ".$_GET['id'].""), MYSQL_ASSOC);
$provodka['summa'] = mysql_result (mysql_query ("SELECT SUM(summa) FROM `nakladna` WHERE `document` = ".$provodka['document']." AND `number` = ".$provodka['number'].""), 0);

//Рахуємо собівартість для РН
if ($provodka['document'] == 1)
	{
	$sql = mysql_query ("SELECT `partia`,`tovar` FROM `nakladna` WHERE `document` = 1 AND `number` = ".$provodka['number']."");
	while ($provodka['partia'][] = mysql_fetch_array($sql, MYSQL_ASSOC));
	$k = count($provodka['partia'])-1;
	unset($provodka['partia'][$k]);
		for ($i = 0; $i < $k; $i++)
			{
			$sql1 = mysql_query ("SELECT `cost` FROM `nakladna` WHERE `document` = 0 AND `number` = ".$provodka['partia'][$i]['partia']." AND `tovar` = ".$provodka['partia'][$i]['tovar']."");
			$sql2 = mysql_query ("SELECT `kkst` FROM `nakladna` WHERE `number` = ".$provodka['number']." AND `tovar` = ".$provodka['partia'][$i]['tovar']."");
			$provodka['partia'][$i]['vartist'] = 0 + mysql_result ($sql1, 0) * mysql_result ($sql2, 0);
			$provodka['vartist'] += 0 + $provodka['partia'][$i]['vartist'];
			}
	}
//Рахуємо собівартість для РН
	
if ($provodka['document'] == 0)
	{
	$provodka['debet'] = 281;
	$provodka['kredit'] = 631;
	
	if ($provodka['status'] == 0)
		{
		mysql_query ("UPDATE `nakladna` SET `status` = 1 WHERE `document` = ".$provodka['document']." AND `number` = ".$provodka['number']."");
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
		NOW(), '".$provodka['document']."', '".$provodka['date']."', '".$provodka['number']."', 
		'".$provodka['kontragent']."', '".$provodka['summa']."', '".$provodka['debet']."', '".$provodka['kredit']."'	
		)");
		}
		else
		{
		mysql_query ("UPDATE `nakladna` SET `status` = 0 WHERE `document` = ".$provodka['document']." AND `number` = ".$provodka['number']."");
		mysql_query ("DELETE FROM `plan` WHERE `document` = ".$provodka['document']." AND `number` = ".$provodka['number']."");
		}
	}
	
if ($provodka['document'] == 1)
	{
	$provodka['debet'][0] = 361;
	$provodka['debet'][1] = 902;
	$provodka['kredit'][0] = 702;
	$provodka['kredit'][1] = 281;
	
	if ($provodka['status'] == 0)
		{
		mysql_query("UPDATE `nakladna` SET `status` = 1 WHERE `document` = ".$provodka['document']." AND `number` = ".$provodka['number']."");
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
		NOW(), '".$provodka['document']."', '".$provodka['date']."', '".$provodka['number']."', 
		'".$provodka['kontragent']."', '".$provodka['summa']."', '".$provodka['debet'][0]."', '".$provodka['kredit'][0]."'	
		)");
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
		NOW(), '".$provodka['document']."', '".$provodka['date']."', '".$provodka['number']."', 
		'".$provodka['kontragent']."', '".$provodka['vartist']."', '".$provodka['debet'][1]."', '".$provodka['kredit'][1]."'	
		)");
		}
		else
		{
		mysql_query ("UPDATE `nakladna` SET `status` = 0 WHERE `document` = ".$provodka['document']." AND `number` = ".$provodka['number']."");
		mysql_query ("DELETE FROM `plan` WHERE `document` = ".$provodka['document']." AND `number` = ".$provodka['number']."");
		}
	}	
	
if ($provodka['document'] == 3)
	{
	$provodka['debet'] = 281;
	$provodka['kredit'] = 0;
	
	if ($provodka['status'] == 0)
		{
		mysql_query ("UPDATE `nakladna` SET `status` = 1 WHERE `document` = ".$provodka['document']." AND `number` = ".$provodka['number']."");
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
		NOW(), '".$provodka['document']."', '".$provodka['date']."', '".$provodka['number']."', 
		'".$provodka['kontragent']."', '".$provodka['summa']."', '".$provodka['debet']."', '".$provodka['kredit']."'	
		)");
		}
		else
		{
		mysql_query ("UPDATE `nakladna` SET `status` = 0 WHERE `document` = ".$provodka['document']." AND `number` = ".$provodka['number']."");
		mysql_query ("DELETE FROM `plan` WHERE `document` = ".$provodka['document']." AND `number` = ".$provodka['number']."");
		}
	}

//echo "<pre>";
//print_r($provodka);
//echo "</pre>";
?>