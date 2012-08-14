<?php
//Параметри переадресації і коннекта з БД
header ("Location: /nakladna.php?page=0"); 
require_once "../dbconnect.php";
//Параметри переадресації і коннекта з БД

//Отримуємо дані документа
$nakladna = mysql_fetch_array (mysql_query ("SELECT `document`,`number`,`status` FROM `nakladna` WHERE `id` = ".$_GET['id'].""), MYSQL_ASSOC);
//Отримуємо дані документа

//Видаляємо документ якщо не проведений
if ($nakladna['status'] == 0)
	{ mysql_query ("DELETE FROM `nakladna` WHERE `document` = ".$nakladna['document']." AND `number` = ".$nakladna['number'].""); }
//Видаляємо документ якщо не проведений
?>