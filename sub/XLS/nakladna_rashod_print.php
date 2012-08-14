<?php
require_once "../PHP/dbconnect.php";
require_once "../PHP/function.php";

$nakladna['number'] = $_GET['number'];
$sql = mysql_query("SELECT `number`,`date`,`kontragent`,`order_number`,`order_date`,`order_across`,SUM(`summa`) AS `summa` 
					FROM `nakladna` WHERE `type` = 1 AND `number` = ".$nakladna['number']."");
$nakladna = mysql_fetch_array ($sql, MYSQL_ASSOC);
$nakladna['date'] = my_date_format($nakladna['date']);
$nakladna['order_date'] = my_date_format($nakladna['order_date']);
$nakladna['words'] = stripslashes(urldecode($_GET['words']));
$nakladna['summa'] = number_format($nakladna['summa'], 2, '.',' ')." грн.";

//$sql = mysql_query("SELECT `full_name`,`address`,`ident_number` FROM `kontragent` WHERE `id` = ".$nakladna['kontragent']."");
//$nakladna['user_info'] = mysql_fetch_array ($sql, MYSQL_ASSOC);
$sql = mysql_query("SELECT `bank_id`,`mfo`,`bank` FROM `rahunki` WHERE `kontragent` = 0");
$nakladna['user_rahunok'] = mysql_fetch_array ($sql, MYSQL_ASSOC);

$sql = mysql_query("SELECT `full_name`,`address`,`ident_number` FROM `kontragent` WHERE `id` = ".$nakladna['kontragent']."");
$nakladna['kontragent_info'] = mysql_fetch_array ($sql, MYSQL_ASSOC);
$sql = mysql_query("SELECT `bank_id`,`mfo`,`bank` FROM `rahunki` WHERE `kontragent` = ".$nakladna['kontragent']."");
$nakladna['kontragent_rahunok'] = mysql_fetch_array ($sql, MYSQL_ASSOC);

$sql = mysql_query("SELECT `tovar`,`kkst`,`cost`,`summa` FROM `nakladna` WHERE `type` = 1 AND `number` = ".$nakladna['number']."");
while ($nakladna['rows'][] = mysql_fetch_array ($sql, MYSQL_ASSOC));
$n = count($nakladna['rows'])-1;
unset($nakladna['rows'][$n]);
for ($i = 0; $i < $n; $i++)
	{
	$sql = mysql_query("SELECT `name` FROM `units` WHERE `id` = (SELECT `units` FROM `nomenklatura` WHERE `id` = ".$nakladna['rows'][$i]['tovar'].")");
	$nakladna['rows'][$i]['units'] = mysql_result($sql, 0);
	$sql = mysql_query("SELECT `full_name` FROM `nomenklatura` WHERE `id` = ".$nakladna['rows'][$i]['tovar']."");
	$nakladna['rows'][$i]['tovar'] = mysql_result($sql, 0);
	$nakladna['rows'][$i]['cost'] = number_format($nakladna['rows'][$i]['cost'], 2, '.',' ')." грн.";
	$nakladna['rows'][$i]['summa'] = number_format($nakladna['rows'][$i]['summa'], 2, '.',' ')." грн.";
	}

//Поключаем класс
require_once "Spreadsheet/Excel/Writer.php";

//Создаем новый объект и получаем указатель на него
$xls =& new Spreadsheet_Excel_Writer();
//Заголовок файла
$xls-> send("nakladna.xls");
//Создаем новый лист
$sheet =& $xls-> addWorksheet('nakladna');

//Убираем сетку
$sheet-> hideScreenGridlines ('nakladna');

//Разметка страници, задаем размеры ячеек
$sheet-> setColumn(0,31,1.8);
for ($i=0;$i<25;$i++ ) {
	$sheet-> setRow($i,14);}

//Задаем форматы
$bottom_border_center_it=& $xls-> addFormat();
$bottom_border_center_it-> setBottom(1);
$bottom_border_center_it-> setAlign("center");
$bottom_border_center_it-> setItalic();
$bottom_border_center_it-> setFontFamily('Times New Roman');

$left_border=& $xls-> addFormat();
$left_border-> setLeft(1);
$left_border-> setBottom(1);

$right_border=& $xls-> addFormat();
$right_border-> setRight(1);
$right_border-> setBottom(1);

$bold_center_border=& $xls-> addFormat();
$bold_center_border-> setLeft(1);
$bold_center_border-> setBottom(1);
$bold_center_border-> setAlign("center");
$bold_center_border-> setBold(1);
$bold_center_border-> setFontFamily('Times New Roman');

$bold_center=& $xls-> addFormat();
$bold_center-> setBold(1);
$bold_center-> setAlign("center");
$bold_center-> setFontFamily('Times New Roman');

$bold_left=& $xls-> addFormat();
$bold_left-> setBold(1);
$bold_left-> setAlign("left");
$bold_left-> setFontFamily('Times New Roman');

$bold_right=& $xls-> addFormat();
$bold_right-> setBold(1);
$bold_right-> setAlign("right");
$bold_right-> setFontFamily('Times New Roman');

$center_sided=& $xls-> addFormat();
$center_sided-> setAlign("center");
$center_sided-> setFontFamily('Times New Roman');
$center_sided-> setNumFormat('#');
$center_sided-> setBottom(1);

$center_sided_it=& $xls-> addFormat();
$center_sided_it-> setAlign("center");
$center_sided_it-> setItalic();
$center_sided_it-> setFontFamily('Times New Roman');

$left_sided=& $xls-> addFormat();
$left_sided-> setAlign("left");
$left_sided-> setFontFamily('Times New Roman');

$right_sided=& $xls-> addFormat();
$right_sided-> setAlign("right");
$right_sided-> setFontFamily('Times New Roman');

$center_sided_table=& $xls-> addFormat();
$center_sided_table-> setAlign("center");
$center_sided_table-> setFontFamily('Times New Roman');
$center_sided_table-> setNumFormat('#');
$center_sided_table-> setLeft(1);
$center_sided_table-> setBottom(1);

$left_sided_table=& $xls-> addFormat();
$left_sided_table-> setAlign("center");
$left_sided_table-> setFontFamily('Times New Roman');
$left_sided_table-> setNumFormat('#');
$left_sided_table-> setLeft(1);
$left_sided_table-> setBottom(1);
	
//Задаем объединение ячеек по формату бланка	

$sheet-> setMerge(0,0,0,11);
$sheet-> setMerge(0,12,0,16);
$sheet-> setMerge(0,18,0,19);
$sheet-> setMerge(0,20,0,31);

for ($i=12; $i<17; $i++) {
	$sheet-> write(0,$i,"",$bottom_border_center_it); }
for ($i=20; $i<32; $i++) {
	$sheet-> write(0,$i,"",$bottom_border_center_it); }

$sheet-> write(0,0,"ВИДАТКОВА НАКЛАДНА №",$bold_right);
$sheet-> write(0,12,$nakladna['number'],$bold_center);
$sheet-> write(0,18,"від",$right_sided);
$sheet-> write(0,20,$nakladna['date'],$center_sided);

$sheet-> setMerge(2,0,2,9);
$sheet-> setMerge(2,10,2,31);

for ($i=10; $i<32; $i++) {
	$sheet-> write(2,$i,"",$bottom_border_center_it); }

$sheet-> write(2,0,"Постачальник",$bold_left);	

$sheet-> setMerge(3,0,3,3);
$sheet-> setMerge(3,4,3,31);

for ($i=4; $i<32; $i++) {
	$sheet-> write(3,$i,"",$bottom_border_center_it); }

$sheet-> write(3,0,"Адреса",$right_sided);	
	
$sheet-> setMerge(4,0,4,9);
$sheet-> setMerge(4,10,4,17);
$sheet-> setMerge(4,18,4,23);
$sheet-> setMerge(4,24,4,31);

for ($i=10; $i<18; $i++) {
	$sheet-> write(4,$i,"",$bottom_border_center_it); }
for ($i=24; $i<32; $i++) {
	$sheet-> write(4,$i,"",$bottom_border_center_it); }

$sheet-> write(4,0,"код ЄДРПОУ (ДРФО)",$right_sided);	
$sheet-> write(4,18,"рахунок №",$right_sided);
$sheet-> write(4,24,$nakladna['user_rahunok']['bank_id'],$center_sided);		
	
$sheet-> setMerge(5,0,5,3);
$sheet-> setMerge(5,4,5,22);
$sheet-> setMerge(5,23,5,26);
$sheet-> setMerge(5,27,5,31);

for ($i=4; $i<23; $i++) {
	$sheet-> write(5,$i,"",$bottom_border_center_it); }
for ($i=27; $i<32; $i++) {
	$sheet-> write(5,$i,"",$bottom_border_center_it); }
	
$sheet-> write(5,0,"банк",$right_sided);
$sheet-> write(5,4,$nakladna['user_rahunok']['bank'],$center_sided);
$sheet-> write(5,23,"МФО",$right_sided);	
$sheet-> write(5,27,$nakladna['user_rahunok']['mfo'],$center_sided);

$sheet-> setMerge(7,0,7,9);
$sheet-> setMerge(7,10,7,31);

for ($i=10; $i<32; $i++) {
	$sheet-> write(7,$i,"",$bottom_border_center_it); }

$sheet-> write(7,0,"Одержувач",$bold_left);
$sheet-> write(7,10,$nakladna['kontragent_info']['full_name'], $center_sided);		
	
$sheet-> setMerge(8,0,8,3);
$sheet-> setMerge(8,4,8,31);

for ($i=4; $i<32; $i++) {
	$sheet-> write(8,$i,"",$bottom_border_center_it); }
	
$sheet-> write(8,0,"Адреса",$right_sided);
$sheet-> write(8,4,$nakladna['kontragent_info']['address'], $center_sided);

$sheet-> setMerge(9,0,9,9);
$sheet-> setMerge(9,10,9,17);
$sheet-> setMerge(9,18,9,23);
$sheet-> setMerge(9,24,9,31);

for ($i=10; $i<18; $i++) {
	$sheet-> write(9,$i,"",$bottom_border_center_it); }
for ($i=24; $i<32; $i++) {
	$sheet-> write(9,$i,"",$bottom_border_center_it); }

$sheet-> write(9,0,"код ЄДРПОУ (ДРФО)",$right_sided);
$sheet-> write(9,10,$nakladna['kontragent_info']['ident_number'], $center_sided);	
$sheet-> write(9,18,"рахунок №",$right_sided);
$sheet-> write(9,24,$nakladna['kontragent_rahunok']['bank_id'], $center_sided);		

$sheet-> setMerge(10,0,10,3);
$sheet-> setMerge(10,4,10,22);
$sheet-> setMerge(10,23,10,26);
$sheet-> setMerge(10,27,10,31);

for ($i=4; $i<23; $i++) {
	$sheet-> write(10,$i,"",$bottom_border_center_it); }
for ($i=27; $i<32; $i++) {
	$sheet-> write(10,$i,"",$bottom_border_center_it); }
	
$sheet-> write(10,0,"банк",$right_sided);
$sheet-> write(10,4,$nakladna['kontragent_rahunok']['bank'], $center_sided);
$sheet-> write(10,23,"МФО",$right_sided);	
$sheet-> write(10,27,$nakladna['kontragent_rahunok']['mfo'], $center_sided);
	
$sheet-> setMerge(11,0,11,4);
$sheet-> setMerge(11,5,11,14);
$sheet-> setMerge(11,15,11,16);
$sheet-> setMerge(11,17,11,28);

for ($i=5; $i<15; $i++) {
	$sheet-> write(11,$i,"",$bottom_border_center_it); }
for ($i=17; $i<32; $i++) {
	$sheet-> write(11,$i,"",$bottom_border_center_it); }
	
$sheet-> write(11,0,"Довіреність",$bold_left);
$sheet-> write(11,5,$nakladna['order_number'],$center_sided);
$sheet-> write(11,15,"від",$left_sided);
$sheet-> write(11,17,$nakladna['order_date'],$center_sided);

$sheet-> setMerge(12,0,12,2);
$sheet-> setMerge(12,3,12,31);

for ($i=3; $i<32; $i++) {
	$sheet-> write(12,$i,"",$bottom_border_center_it); }

$sheet-> write(12,0,"Через",$bold_left);
$sheet-> write(12,3,$nakladna['order_across'],$center_sided);	
	
$sheet-> setMerge(14,0,14,1);
$sheet-> setMerge(14,2,14,12);
$sheet-> setMerge(14,13,14,17);
$sheet-> setMerge(14,18,14,21);
$sheet-> setMerge(14,22,14,25);
$sheet-> setMerge(14,26,14,31);

for ($i=15; $i<15+$n; $i++)
{
$sheet-> setMerge($i,0,$i,1);
$sheet-> setMerge($i,2,$i,12);
$sheet-> setMerge($i,13,$i,17);
$sheet-> setMerge($i,18,$i,21);
$sheet-> setMerge($i,22,$i,25);
$sheet-> setMerge($i,26,$i,31);
}

$sheet-> setMerge(15+$n,19,15+$n,25);
$sheet-> setMerge(15+$n,26,15+$n,31);

$sheet-> setMerge(16+$n,19,16+$n,25);
$sheet-> setMerge(16+$n,26,16+$n,31);

$sheet-> setMerge(17+$n,19,17+$n,25);
$sheet-> setMerge(17+$n,26,17+$n,31);

for ($i=0; $i<32; $i++) {
	$sheet-> write(13,$i,"",$bottom_border_center_it); }
for ($i=0; $i<32; $i++) {
	$sheet-> write(14,$i,"",$bottom_border_center_it); }
for ($j=15; $j<15+$n; $j++)
	{
for ($i=0; $i<32; $i++) {
	$sheet-> write($j,$i,"",$bottom_border_center_it); }
	}
for ($i=26; $i<32; $i++) {
	$sheet-> write(15+$n,$i,"",$bottom_border_center_it); }
for ($i=26; $i<32; $i++) {
	$sheet-> write(16+$n,$i,"",$bottom_border_center_it); }
for ($i=26; $i<32; $i++) {
	$sheet-> write(17+$n,$i,"",$bottom_border_center_it); }

for ($i=14; $i<15+$n; $i++) {
	$sheet-> write($i,0,"",$left_border);
	$sheet-> write($i,2,"",$left_border);
	$sheet-> write($i,13,"",$left_border);
	$sheet-> write($i,18,"",$left_border);
	$sheet-> write($i,22,"",$left_border); }
for ($i=14; $i<18+$n; $i++) {
	$sheet-> write($i,26,"",$left_border);
	$sheet-> write($i,31,"",$right_border); }
	
$sheet-> write(14,0,"№",$bold_center_border);
$sheet-> write(14,2,"Найменування",$bold_center_border);
$sheet-> write(14,13,"Од. виміру",$bold_center_border);
$sheet-> write(14,18,"К-сть",$bold_center_border);
$sheet-> write(14,22,"Ціна",$bold_center_border);
$sheet-> write(14,26,"Сума",$bold_center_border);

for ($i=0; $i<$n; $i++)
	{
	$sheet-> write(15+$i,0,$i+1,$center_sided_table);
	$sheet-> write(15+$i,2,$nakladna['rows'][$i]['tovar'],$left_sided_table);
	$sheet-> write(15+$i,13,$nakladna['rows'][$i]['units'],$center_sided_table);
	$sheet-> write(15+$i,18,$nakladna['rows'][$i]['kkst'],$center_sided_table);
	$sheet-> write(15+$i,22,$nakladna['rows'][$i]['cost'],$center_sided_table);
	$sheet-> write(15+$i,26,$nakladna['rows'][$i]['summa'],$center_sided_table);
	}

$sheet-> write(15+$n,19,"Разом без ПДВ",$bold_right);
$sheet-> write(15+$n,26,$nakladna['summa'],$center_sided_table);
$sheet-> write(16+$n,19,"ПДВ",$bold_right);
$sheet-> write(16+$n,26,"0.00 грн.",$center_sided_table);
$sheet-> write(17+$n,19,"Всього з ПДВ",$bold_right);
$sheet-> write(17+$n,26,$nakladna['summa'],$center_sided_table);

$sheet-> setMerge(19+$n,0,19+$n,5);
$sheet-> setMerge(19+$n,6,19+$n,31);

for ($i=6; $i<32; $i++) {
	$sheet-> write(19+$n,$i,"",$bottom_border_center_it); }
	
$sheet-> write(19+$n,0,"Всього на суму",$bold_left);
$sheet-> write(19+$n,6,$nakladna['words'],$center_sided);

$sheet-> setMerge(21+$n,0,21+$n,4);
$sheet-> setMerge(21+$n,5,21+$n,11);
$sheet-> setMerge(21+$n,19,21+$n,24);
$sheet-> setMerge(21+$n,25,21+$n,31);

for ($i=5; $i<12; $i++) {
	$sheet-> write(21+$n,$i,"",$bottom_border_center_it); }
for ($i=25; $i<32; $i++) {
	$sheet-> write(21+$n,$i,"",$bottom_border_center_it); }
	
$sheet-> write(21+$n,0,"Відвантажив",$bold_left);
$sheet-> write(21+$n,19,"Отримав",$bold_left);

$xls-> close();
?>