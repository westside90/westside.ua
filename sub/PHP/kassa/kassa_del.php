<?php
//Параметри переадресації і коннекта з БД
header ("Location: /kassa.php?page=0"); 
require_once "../dbconnect.php";
//Параметри переадресації і коннекта з БД

//Отримуємо дані документа
$kassa = mysql_fetch_array (mysql_query ("SELECT `document`, `number`, `status` FROM `kassa` WHERE `id` = ".$_GET['id'].""), MYSQL_ASSOC);
//Отримуємо дані документа

//Видаляємо документ, якщо не проведений
if ($kassa['status'] == 0)
	{ mysql_query ("DELETE FROM `kassa` WHERE `document` = ".$kassa['document']." AND `number` = ".$kassa['number'].""); }
//Видаляємо документ, якщо не проведений
?>