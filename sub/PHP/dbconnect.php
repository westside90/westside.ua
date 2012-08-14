<?php
header("Content-type: text/html; charset=windows-1251");
session_start();
//Параметри з'єднання з БД
$host = "localhost";
$user = $_SESSION['login'];
$pwd = $_SESSION['pass'];
//Параметри з'єднання з БД

//Створення лінка на БД
$db = mysql_connect ($host,$user,$pwd);
//Створення лінка на БД

//Перевірка з'єднання з БД
if (!$db) 
	{
	echo "Вхід на сайт не виконано";
	$logkey = false;
	}
else 
	{
//	echo "БД готова для роботи";
	$logkey = true;
	}
//Перевірка з'єднання з БД

//Параметри користувача
$user_db = $user."_db";
mysql_select_db ($user_db, $db);
//Параметри користувача

//Параметри з'єднання з БД
mysql_query ("SET character_set_client = 'cp1251'");
mysql_query ("SET character_set_results = 'cp1251'");
mysql_query ("SET collation_connection = 'cp1251_general_ci'");
mysql_query ('SET NAMES cp1251');
//Параметри з'єднання з БД
 ?>