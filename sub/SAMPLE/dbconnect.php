<?php
//Піключення модулів
header('Content-Type: text/html; charset=cp1251'); 

//Параметри з'єднання з БД
$host="localhost";
$user="root";
$pwd="wtscomp";

//Створення лінка на БД
$db=mysql_connect($host,$user,$pwd);
if (!$db) {die("Спроба невдала".mysql_error());}
	echo "З'єднання встановлено";
	
mysql_query("SET character_set_client='cp1251'");
mysql_query("SET character_set_results='cp1251'");
mysql_query("SET collation_connection='cp1251_general_ci'");
 ?>