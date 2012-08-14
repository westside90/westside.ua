<?
//Параметри переадресації і коннекта з БД
header ("Location: /bank.php?page=0"); 
require_once "../dbconnect.php";
//Параметри переадресації і коннекта з БД

//Видаляємо платіжне доручення
if ($_GET['document'] == 0)
	{ mysql_query("DELETE FROM `pld` WHERE `id` = ".$_GET['id'].""); }
//Видаляємо платіжне доручення

//Видаляємо банківську виписку
if ($_GET['document'] == 1)
	{
	$bank = mysql_fetch_array (mysql_query ("SELECT `date`,`rahunok`,`status` FROM `bv` WHERE `id` = ".$_GET['id'].""), MYSQL_ASSOC);
	if ($bank['status'] == 0)
		{ mysql_query ("DELETE FROM `bv` WHERE `date` = '".$bank['date']."' AND `rahunok` = ".$bank['rahunok'].""); }
	}
//Видаляємо банківську виписку
?>