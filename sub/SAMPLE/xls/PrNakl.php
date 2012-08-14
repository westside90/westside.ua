<?php
//Поключаем класс
require_once "Spreadsheet/Excel/Writer.php";

//Создаем новый объект и получаем указатель на него
$xls =& new Spreadsheet_Excel_Writer();
//Заголовок файла
$xls-> send("nakladna.xls");
//Создаем новый лист
$sheet =& $xls-> addWorksheet('nakladna');

//Разметка страници, задаем размеры ячеек
$sheet-> setColumn(0,31,1.5);
for ($i=0;$i<25;$i++ ) {
	$sheet-> setRow($i,12);}

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
$sheet-> write(0,18,"від",$right_sided);

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
	
$sheet-> setMerge(5,0,5,3);
$sheet-> setMerge(5,4,5,22);
$sheet-> setMerge(5,23,5,26);
$sheet-> setMerge(5,27,5,31);

for ($i=4; $i<23; $i++) {
	$sheet-> write(5,$i,"",$bottom_border_center_it); }
for ($i=27; $i<32; $i++) {
	$sheet-> write(5,$i,"",$bottom_border_center_it); }
	
$sheet-> write(5,0,"банк",$right_sided);
$sheet-> write(5,23,"МФО",$right_sided);	

$sheet-> setMerge(7,0,7,9);
$sheet-> setMerge(7,10,7,31);

for ($i=10; $i<32; $i++) {
	$sheet-> write(7,$i,"",$bottom_border_center_it); }

$sheet-> write(7,0,"Одержувач",$bold_left);		
	
$sheet-> setMerge(8,0,8,3);
$sheet-> setMerge(8,4,8,31);

for ($i=4; $i<32; $i++) {
	$sheet-> write(8,$i,"",$bottom_border_center_it); }
	
$sheet-> write(8,0,"Адреса",$right_sided);

$sheet-> setMerge(9,0,9,9);
$sheet-> setMerge(9,10,9,17);
$sheet-> setMerge(9,18,9,23);
$sheet-> setMerge(9,24,9,31);

for ($i=10; $i<18; $i++) {
	$sheet-> write(9,$i,"",$bottom_border_center_it); }
for ($i=24; $i<32; $i++) {
	$sheet-> write(9,$i,"",$bottom_border_center_it); }

$sheet-> write(9,0,"код ЄДРПОУ (ДРФО)",$right_sided);	
$sheet-> write(9,18,"рахунок №",$right_sided);		

$sheet-> setMerge(10,0,10,3);
$sheet-> setMerge(10,4,10,22);
$sheet-> setMerge(10,23,10,26);
$sheet-> setMerge(10,27,10,31);

for ($i=4; $i<23; $i++) {
	$sheet-> write(10,$i,"",$bottom_border_center_it); }
for ($i=27; $i<32; $i++) {
	$sheet-> write(10,$i,"",$bottom_border_center_it); }
	
$sheet-> write(10,0,"банк",$right_sided);
$sheet-> write(10,23,"МФО",$right_sided);	
	
$sheet-> setMerge(11,0,11,4);
$sheet-> setMerge(11,5,11,14);
$sheet-> setMerge(11,15,11,16);
$sheet-> setMerge(11,17,11,28);

for ($i=5; $i<15; $i++) {
	$sheet-> write(11,$i,"",$bottom_border_center_it); }
for ($i=17; $i<32; $i++) {
	$sheet-> write(11,$i,"",$bottom_border_center_it); }
	
$sheet-> write(11,0,"Довіреність",$bold_left);
$sheet-> write(11,15,"від",$center_sided);

$sheet-> setMerge(12,0,12,2);
$sheet-> setMerge(12,3,12,31);

for ($i=3; $i<32; $i++) {
	$sheet-> write(12,$i,"",$bottom_border_center_it); }

$sheet-> write(12,0,"Через",$bold_left);	
	
$sheet-> setMerge(14,0,14,1);
$sheet-> setMerge(14,2,14,12);
$sheet-> setMerge(14,13,14,17);
$sheet-> setMerge(14,18,14,21);
$sheet-> setMerge(14,22,14,25);
$sheet-> setMerge(14,26,14,31);

$sheet-> setMerge(15,0,15,1);
$sheet-> setMerge(15,2,15,12);
$sheet-> setMerge(15,13,15,17);
$sheet-> setMerge(15,18,15,21);
$sheet-> setMerge(15,22,15,25);
$sheet-> setMerge(15,26,15,31);

$sheet-> setMerge(16,19,16,25);
$sheet-> setMerge(16,26,16,31);

$sheet-> setMerge(17,19,17,25);
$sheet-> setMerge(17,26,17,31);

$sheet-> setMerge(18,19,18,25);
$sheet-> setMerge(18,26,18,31);

for ($i=0; $i<32; $i++) {
	$sheet-> write(13,$i,"",$bottom_border_center_it); }
for ($i=0; $i<32; $i++) {
	$sheet-> write(14,$i,"",$bottom_border_center_it); }
for ($i=0; $i<32; $i++) {
	$sheet-> write(15,$i,"",$bottom_border_center_it); }
for ($i=26; $i<32; $i++) {
	$sheet-> write(16,$i,"",$bottom_border_center_it); }
for ($i=26; $i<32; $i++) {
	$sheet-> write(17,$i,"",$bottom_border_center_it); }
for ($i=26; $i<32; $i++) {
	$sheet-> write(18,$i,"",$bottom_border_center_it); }

for ($i=14; $i<16; $i++) {
	$sheet-> write($i,0,"",$left_border);
	$sheet-> write($i,2,"",$left_border);
	$sheet-> write($i,13,"",$left_border);
	$sheet-> write($i,18,"",$left_border);
	$sheet-> write($i,22,"",$left_border); }
for ($i=14; $i<19; $i++) {
	$sheet-> write($i,26,"",$left_border);
	$sheet-> write($i,31,"",$right_border); }
	
$sheet-> write(14,0,"№",$bold_center_border);
$sheet-> write(14,2,"Найменування",$bold_center_border);
$sheet-> write(14,13,"Од. виміру",$bold_center_border);
$sheet-> write(14,18,"К-сть",$bold_center_border);
$sheet-> write(14,22,"Ціна",$bold_center_border);
$sheet-> write(14,26,"Сума",$bold_center_border);
$sheet-> write(16,19,"Разом без ПДВ",$bold_right);
$sheet-> write(17,19,"ПДВ",$bold_right);
$sheet-> write(18,19,"Всього з ПДВ",$bold_right);

$sheet-> setMerge(20,0,20,5);
$sheet-> setMerge(20,6,20,31);

for ($i=6; $i<32; $i++) {
	$sheet-> write(20,$i,"",$bottom_border_center_it); }
	
$sheet-> write(20,0,"Всього на суму",$bold_left);

$sheet-> setMerge(22,0,22,4);
$sheet-> setMerge(22,5,22,11);
$sheet-> setMerge(22,19,22,24);
$sheet-> setMerge(22,25,22,31);

for ($i=5; $i<12; $i++) {
	$sheet-> write(22,$i,"",$bottom_border_center_it); }
for ($i=25; $i<32; $i++) {
	$sheet-> write(22,$i,"",$bottom_border_center_it); }
	
$sheet-> write(22,0,"Відвантажив",$bold_left);
$sheet-> write(22,19,"Отримав",$bold_left);

$xls-> close();
?>