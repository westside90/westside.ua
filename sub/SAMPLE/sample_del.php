<?php
header("Location: sample_list.php"); 
require_once "dbconnect.php";
mysql_query('SET NAMES cp1251');
mysql_select_db('test', $db);

$id = $_GET['id'];

mysql_query("DELETE FROM `sample` WHERE `id` = $id", $db);
?>