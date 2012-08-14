<?php
//Параметри переадресації і коннекта з БД
header ("Location: /kontragent.php?page=0"); 
require_once "../dbconnect.php";

//Отримуємо ID контрагента
$id = $_REQUEST['id']; 

//Отримуємо нові дані контрагента
$type = $_REQUEST['type'];
$short_name = $_REQUEST['short_name'];
$full_name = $_REQUEST['full_name'];
$ident_number = $_REQUEST['ident_number'];
$first_name = $_REQUEST['first_name'];
$second_name = $_REQUEST['second_name'];
$third_name = $_REQUEST['third_name'];
$mob_tel = $_REQUEST['mob_tel'];
$address = $_REQUEST['address'];
$location = $_REQUEST['location'];
$tel = $_REQUEST['tel'];
$bank_id = $_REQUEST['bank_id'];
$mfo = $_REQUEST['mfo'];
$bank = $_REQUEST['bank'];
$valuta = $_REQUEST['valuta'];
$prymitka = $_REQUEST['prymitka'];

//Оновлюємо запис
mysql_query ("UPDATE `kontragent` SET 
`type` = '$type',
`short_name` = '$short_name',
`full_name` = '$full_name',
`ident_number` = '$ident_number',
`first_name` = '$first_name',
`second_name` = '$second_name',
`third_name` = '$third_name',
`mob_tel` = '$mob_tel',
`address` = '$address',
`tel` = '$tel',
`prymitka` = '$prymitka'
WHERE `id` = $id");

mysql_query ("UPDATE `rahunki` SET
`bank_id` = '$bank_id',
`mfo` = '$mfo',
`bank` = '$bank',
`valuta` = '$valuta'
WHERE `kontragent` = $id");
?>