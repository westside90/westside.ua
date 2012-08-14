<?php
header("Location: sample_list.php"); 
require_once "dbconnect.php";
mysql_query('SET NAMES cp1251');
mysql_select_db('test', $db);

$id = $_GET['id'];

if (mysql_result(mysql_query("SELECT `status` FROM `sample` WHERE `id` = $id", $db), 0) == '0')
	{mysql_query("UPDATE `sample` SET `status` = '1' WHERE `id` = $id", $db);}
		else
	{mysql_query("UPDATE `sample` SET `status` = '0' WHERE `id` = $id", $db);}
?>