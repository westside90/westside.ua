<?php
//Параметри переадресації і коннекта з БД
header ("Location: /nakladna.php?page=0"); 
require_once "../dbconnect.php";
//Параметри переадресації і коннекта з БД

//Отримуємо дані документа
$akt = mysql_fetch_array (mysql_query ("SELECT `document`,`number`,`status` FROM `akt` WHERE `id` = ".$_GET['id'].""), MYSQL_ASSOC);
//Отримуємо дані документа

//Видаляємо документ, якщо не проведений
if ($akt['status'] == 0)
	{ mysql_query ("DELETE FROM `akt` WHERE `document` = ".$akt['document']." AND `number` = ".$akt['number'].""); }
//Видаляємо документ, якщо не проведений
?>