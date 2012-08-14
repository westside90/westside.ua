<?
//Параметри переадресації і коннекта з БД
header ("Location: /result.php?page=0"); 
require_once "../dbconnect.php";
//Параметри переадресації і коннекта з БД

//Отримуємо данні про новий період
$min_date = $_REQUEST['min_date'];
$max_date = $_REQUEST['max_date'];
//Отримуємо данні про новий період

//Додаємо запис в БД
mysql_query ("INSERT INTO `result` 
(
`status` ,
`created` ,
`begin_date` ,
`end_date`
)
VALUES
(
'0',NOW(),'".$min_date."','".$max_date."'
)");
//Додаємо запис в БД
?>