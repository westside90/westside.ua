<?
//Параметри переадресації і коннекта з БД
header ("Location: /result.php?page=0"); 
require_once "../dbconnect.php";

$id = $_GET['id'];
mysql_query ("DELETE FROM `result` WHERE `status` = 0 AND `id` = ".$id."")
?>