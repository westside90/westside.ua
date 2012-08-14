<?php
//Параметри переадресації і коннекта з БД
header ("Location: /nomenklatura.php?page=0"); 
require_once "../dbconnect.php";

//Отримуємо ID контрагента
$id = $_GET['id']; 

//Видаляємо контрагента
mysql_query ("DELETE FROM `nomenklatura` WHERE `id` = $id", $db);
?>