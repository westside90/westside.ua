<?php
//Параметри переадресації і коннекта з БД
header ("Location: /bank.php?page=0"); 
require_once "../dbconnect.php";
//Параметри переадресації і коннекта з БД

//Отримуємо ID банківської виписки
$provodka = mysql_fetch_array (mysql_query ("SELECT `date`,`rahunok` FROM `bv` WHERE `id` = ".$_GET['id'].""), MYSQL_ASSOC);
$sql = mysql_query ("SELECT `status`,`rahunok`,`type`,`date`,`make_type`,`make`,`summa` FROM `bv` 
					WHERE DATE(`date`) = '".$provodka['date']."' 
					AND `rahunok` = ".$provodka['rahunok']."");
while($provodka[] = mysql_fetch_array ($sql, MYSQL_ASSOC));
$n = count($provodka)-1;
unset($provodka[$n]);

for ($i = 0; $i < $n; $i++)
	{
	if ($provodka[$i]['type'] == 0)
		{
		if ($provodka[$i]['make_type'] == 0)
			{
			$provodka[$i]['debet'] = 311;
			$provodka[$i]['kredit'] = 41;
			}
		if ($provodka[$i]['make_type'] == 1)
			{
			$provodka[$i]['debet'] = 311;
			$provodka[$i]['kredit'] = 361;			
			}
		}
	if ($provodka[$i]['type'] == 1)
		{
		if ($provodka[$i]['make_type'] == 0)
			{
			$provodka[$i]['debet'] = 92;
			$provodka[$i]['kredit'] = 311;
			}
		if ($provodka[$i]['make_type'] == 1)
			{
			$provodka[$i]['debet'] = 631;
			$provodka[$i]['kredit'] = 311;
			}
		}
	}
	
if ($provodka[0]['status'] == 0) 
	{
	mysql_query ("UPDATE `bv` SET `status` = 1 WHERE DATE(`date`) = '".$provodka['date']."' AND `rahunok` = ".$provodka['rahunok']."");
	for ($i = 0; $i < $n; $i++)
		{
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
		NOW(), '4', '".$provodka[$i]['date']."', '".$provodka['rahunok']."', '".$provodka[$i]['make']."', 
		'".$provodka[$i]['summa']."', '".$provodka[$i]['debet']."', '".$provodka[$i]['kredit']."'	
		)"); 
		}
	}
else
	{
	mysql_query ("UPDATE `bv` SET `status` = 0 WHERE DATE(`date`) = '".$provodka['date']."' AND `rahunok` = ".$provodka['rahunok']."");
	mysql_query ("DELETE FROM `plan` WHERE `document` = 4 AND DATE(`date`) = '".$provodka['date']."' AND `number` = ".$provodka['rahunok']."");
	}

//echo "<pre>";
//print_r($provodka);
//echo "</pre>";
?>