<?php
session_start();
header("Content-type: text/html; charset=windows-1251");

if (!isset($_SESSION['lang'])) $_SESSION['lang'] = 'ua';
if (isset($_GET['lang']))
	{
	if ($_GET['lang'] == 'ua') $_SESSION['lang'] = 'ua';
	if ($_GET['lang'] == 'en') $_SESSION['lang'] = 'en';
	}

if (!isset($_SESSION['log'])) $_SESSION['log'] = false;

try {
$DBH = new PDO("mysql:host=localhost;dbname=westside",'root','');
$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
$DBH->query("SET character_set_client = 'cp1251'");
$DBH->query("SET character_set_results = 'cp1251'");
$DBH->query("SET collation_connection = 'cp1251_general_ci'");
$DBH->query("SET NAMES cp1251");
}
catch(PDOException $error) {  
    echo $error->getMessage();
}
?>