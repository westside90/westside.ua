<?php
//Параметри переадресації і коннекта з БД
header ("Location: /worker.php?page=0"); 
require_once "../dbconnect.php";

//Отримуєо дані з форми
$post = $_REQUEST['post'];
$first_name = $_REQUEST['first_name'];
$second_name = $_REQUEST['second_name'];
$third_name = $_REQUEST['third_name'];
$start_date = $_REQUEST['start_date'];
$end_date = $_REQUEST['end_date'];
$salary = $_REQUEST['salary'];
$social = $_REQUEST['social'];
$ident_number = $_REQUEST['ident_number'];
$passport = $_REQUEST['passport'];
$organ = $_REQUEST['organ'];
$pass_date = $_REQUEST['pass_date'];
$address = $_REQUEST['address'];
$tel = $_REQUEST['tel'];
$prymitka = $_REQUEST['prymitka'];

//Записуємо дані
mysql_query ("INSERT INTO $user_db.`worker`
(
`created` ,
`post` ,
`first_name` ,
`second_name` ,
`third_name` ,
`start_date` ,
`end_date` ,
`salary` ,
`social` ,
`ident_number` ,
`passport` ,
`organ` ,
`pass_date` ,
`address` ,
`tel` ,
`prymitka` 
)
VALUES
(
NOW(), '$post', '$first_name', '$second_name', '$third_name', '$start_date', '$end_date', '$salary', 
'$social', '$ident_number', '$passport', '$organ', '$pass_date', '$address', '$tel', '$prymitka'
)");
?>