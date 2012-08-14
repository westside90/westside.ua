<?php
header("Location: sample_list.php"); 
require_once "dbconnect.php";
mysql_query('SET NAMES cp1251');
mysql_select_db('test', $db);

$date = $_REQUEST['date'];
$name = $_REQUEST['name'];
$number = $_REQUEST['number'];
$info = $_REQUEST['info'];
$status = $_REQUEST['status'];

mysql_query("CREATE TABLE IF NOT EXISTS `test`.`sample`
(
`id` INT NOT NULL AUTO_INCREMENT ,
`create` DATESTAMP NOT NULL ON UPDATE DEFAULT CURRENT_TIMESTAMP ,
`date` DATE NOT NULL ,
`name` TEXT NOT NULL ,
`number` TEXT NOT NULL ,
`info` TEXT NOT NULL ,
`status` INT NOT NULL ,
PRIMARY_KEY (`id`)
)
ENGINE = INNODB", $db);

mysql_query("INSERT INTO `test`.`sample` 
(
`date` ,
`number` ,
`name` ,
`info` ,
`status`
)
VALUES
(
'$date', '$number', '$name', '$info', '$status'
)", $db);
echo "$date, $number, $name, $info, $status";
?>