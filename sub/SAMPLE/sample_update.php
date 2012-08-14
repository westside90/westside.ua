<?php
header("Location: sample_list.php"); 
require_once "dbconnect.php";
mysql_query('SET NAMES cp1251');
mysql_select_db('test', $db);

$id = $_REQUEST['id'];
$name = $_REQUEST['name'];
$number = $_REQUEST['number'];
$info = $_REQUEST['info'];
$status = $_REQUEST['status'];

mysql_query("UPDATE `sample` SET `name` = '$name', `number` = '$number', `info` = '$info', `status` = '$status' WHERE `id` = $id", $db);
?>