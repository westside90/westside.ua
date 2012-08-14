<?php
//Параметри переадресації і коннекта з БД
header ("Location: /kassa.php?page=0"); 
require_once "../dbconnect.php";

//Отримуєо дані з форми
$kassa['type'] = $_REQUEST['type'];
if ($kassa['type'] <> 0 OR $kassa['type'] <> 1)
	{ $kassa['type'] = substr($kassa['type'], 22, 1); }
$kassa['status'] = 0;
$kassa['lock'] = 0;
$kassa['number'] = $_REQUEST['number'];
$kassa['date'] = $_REQUEST['date'];
$kassa['make_type'] = intval(substr ($_REQUEST['make_type'], 27, 1));
if ($kassa['make_type'] == 1)
	{ $kassa['make'] = $_REQUEST['kontragent']; }
if ($kassa['make_type'] == 0)
	{
	if ($kassa['type'] == 0)
		{ $kassa['make'] = $_REQUEST['income']; }
	if ($kassa['type'] == 1)
		{ $kassa['make'] = $_REQUEST['vytraty']; }
	}
$kassa['summa'] = $_REQUEST['summa'];
$kassa['description'] = $_REQUEST['description'];

//Записуємо дані
mysql_query ("INSERT INTO $user_db.`kassa`
(
`created` ,
`type` ,
`status` ,
`lock` ,
`number` ,
`date` ,
`make_type` ,
`make` ,
`summa` ,
`description` 
)
VALUES
(
NOW(), '".$kassa['type']."', '".$kassa['status']."', '".$kassa['lock']."', '".$kassa['number']."', 
'".$kassa['date']."', '".$kassa['make_type']."', '".$kassa['make']."', '".$kassa['summa']."', '".$kassa['description']."'
)");


echo "<pre>";
print_r($kassa);
echo "</pre>";
?>