<?php
//Параметри переадресації і коннекта з БД
header ("Location: /kontragent.php?page=0"); 
require_once "../dbconnect.php";

//Отримуємо ID контрагента
$id = $_GET['id']; 

//Видаляємо контрагента
mysql_query ("DELETE FROM `kontragent` WHERE `id` = $id");
mysql_query ("DELETE FROM `rahunki` WHERE `kontragent` = $id");
?>