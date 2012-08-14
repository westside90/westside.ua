<?php
//Параметри переадресації і коннекта з БД
header ("Location: /index.php");
require_once "dbconnect.php";

//Видаляємо рахунок
mysql_query ("DELETE FROM `rahunki` WHERE `id` = ".$_GET['id']."");
?>