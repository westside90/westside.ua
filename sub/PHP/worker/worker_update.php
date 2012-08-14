<?php
//Параметри переадресації і коннекта з БД
//header ("Location: /worker.php?page=0"); 
require_once "../dbconnect.php";

//Отримуємо ID контрагента
$id = intval($_REQUEST['id']); 

//Отримуємо нові дані контрагента
$post = $_REQUEST['post'];
$first_name = $_REQUEST['first_name'];
$second_name = $_REQUEST['second_name'];
$third_name = $_REQUEST['third_name'];
$start_date = $_REQUEST['start_date'];
$end_date = $_REQUEST['end_date'];
$ident_number = $_REQUEST['ident_number'];
$passport = $_REQUEST['passport'];
$organ = $_REQUEST['organ'];
$pass_date = $_REQUEST['pass_date'];
$address = $_REQUEST['address'];
$tel = $_REQUEST['tel'];
$prymitka = $_REQUEST['prymitka'];

//Оновлюємо запис
mysql_query ("UPDATE `worker` SET 
`post` = '$post',
`first_name` = '$first_name',
`second_name` = '$second_name',
`third_name` = '$third_name',
`start_date` = '$start_date',
`end_date` = '$end_date',
`ident_number` = '$ident_number',
`passport` = '$passport',
`organ` = '$organ',
`pass_date` = '$pass_date',
`address` = '$address',
`tel` = '$tel',
`prymitka` = '$prymitka' 
WHERE `id` = $id");
?>