<?php
//Акт прийому-передачі
//Задаем данные из БД


//Поключаем класс
require_once "Spreadsheet/Excel/Writer.php";

//Создаем новый объект и получаем указатель на него
$xls =& new Spreadsheet_Excel_Writer();
//Заголовок файла
$xls-> send("test.xls");
//Создаем новый лист
$sheet =& $xls-> addWorksheet('test');

//Разметка страници, задаем размеры ячеек
$sheet-> setColumn(0,37,1.5);
for ($i=0;$i<40;$i++ ) {
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

$sheet-> setMerge(0,0,0,12);
$sheet-> setMerge(1,0,1,12);
$sheet-> setMerge(2,0,2,12);

for ($i=0; $i<13; $i++) {
	$sheet-> write(1,$i,"",$bottom_border_center_it); } 
for ($i=0; $i<13; $i++) {
	$sheet-> write(2,$i,"",$bottom_border_center_it); }
	
$sheet-> write(0,0,"ЗАТВЕРДЖУЮ",$bold_center);

$sheet-> setMerge(0,25,0,37);
$sheet-> setMerge(1,25,1,28);
$sheet-> setMerge(1,29,1,37);
$sheet-> setMerge(2,25,2,37);

for ($i=29; $i<38; $i++) {
	$sheet-> write(1,$i,"",$bottom_border_center_it); } 
for ($i=25; $i<38; $i++) {
	$sheet-> write(2,$i,"",$bottom_border_center_it); }

$sheet-> write(0,25,"ЗАТВЕРДЖУЮ",$bold_center);
$sheet-> write(1,25,"Директор",$left_sided);

$sheet-> setMerge(9,0,9,16);
$sheet-> setMerge(9,17,9,21);
$sheet-> setMerge(10,0,10,37);
$sheet-> setMerge(12,10,12,11);
$sheet-> setMerge(12,12,12,23);

for ($i=17; $i<22; $i++) {
	$sheet-> write(9,$i,"",$bottom_border_center_it); }
for ($i=12; $i<24; $i++) {
	$sheet-> write(12,$i,"",$bottom_border_center_it); } 
	
$sheet-> write(9,0,"АКТ №",$bold_right);
$sheet-> write(10,0,"прийому-передачі робіт (надання послуг)",$bold_center);
$sheet-> write(12,10,"від",$right_sided);

$sheet-> setMerge(15,0,15,11);
$sheet-> setMerge(15,12,15,23);
$sheet-> setMerge(15,24,15,26);
$sheet-> setMerge(15,27,15,37);

for ($i=12; $i<24; $i++) {
	$sheet-> write(15,$i,"",$bottom_border_center_it); }
for ($i=27; $i<38; $i++) {
	$sheet-> write(15,$i,"",$bottom_border_center_it); } 

$sheet-> write(15,0,"Ми, представники Замовника,",$right_sided);
$sheet-> write(15,24,"в особі",$center_sided);	
	
$sheet-> setMerge(16,0,16,14);
$sheet-> setMerge(16,15,16,26);
$sheet-> setMerge(16,27,16,29);
$sheet-> setMerge(16,30,16,37);

for ($i=15; $i<27; $i++) {
	$sheet-> write(16,$i,"",$bottom_border_center_it); } 
for ($i=30; $i<38; $i++) {
	$sheet-> write(16,$i,"",$bottom_border_center_it); } 

$sheet-> write(16,0,"з одного боку, та представники Виконавця",$left_sided);
$sheet-> write(16,27,"в особі",$center_sided);		
	
$sheet-> setMerge(17,0,17,37);

$sheet-> write(17,0,"з іншого боку, склали даний акт про те, що Виконавцем були проведені такі роботи (надані такі послуги) по",$left_sided);

$sheet-> setMerge(18,0,18,7);
$sheet-> setMerge(18,8,18,11);
$sheet-> setMerge(18,12,18,13);
$sheet-> setMerge(18,14,18,22);

$sheet-> write(18,0,"договору (рахунку) №",$left_sided);
$sheet-> write(18,12,"від",$center_sided);

for ($i=8; $i<12; $i++) {
	$sheet-> write(18,$i,"",$bottom_border_center_it); }
for ($i=14; $i<23; $i++) {
	$sheet-> write(18,$i,"",$bottom_border_center_it); } 

$sheet-> setMerge(20,0,20,1);
$sheet-> setMerge(20,2,20,17);
$sheet-> setMerge(20,18,20,22);
$sheet-> setMerge(20,23,20,26);
$sheet-> setMerge(20,27,20,30);
$sheet-> setMerge(20,31,20,36);

for ($i=0; $i<37; $i++) {
	$sheet-> write(19,$i,"",$bottom_border_center_it); }
for ($i=0; $i<37; $i++) {
	$sheet-> write(20,$i,"",$bottom_border_center_it); }

$sheet-> write(20,0,"№",$bold_center_border);
$sheet-> write(20,2,"Найменування",$bold_center_border);
$sheet-> write(20,18,"Од. виміру",$bold_center_border);
$sheet-> write(20,23,"К-сть",$bold_center_border);
$sheet-> write(20,27,"Ціна",$bold_center_border);
$sheet-> write(20,31,"Сума",$bold_center_border);	

$sheet-> setMerge(21,0,21,1);
$sheet-> setMerge(21,2,21,17);
$sheet-> setMerge(21,18,21,22);
$sheet-> setMerge(21,23,21,26);
$sheet-> setMerge(21,27,21,30);
$sheet-> setMerge(21,31,21,36);

for ($i=0; $i<37; $i++) {
	$sheet-> write(21,$i,"",$bottom_border_center_it); }

$sheet-> setMerge(22,25,22,30);
$sheet-> setMerge(22,31,22,36);

for ($i=31; $i<37; $i++) {
	$sheet-> write(22,$i,"",$bottom_border_center_it); }

$sheet-> write(22,25,"Разом без ПДВ",$bold_right);
	
$sheet-> setMerge(23,25,23,30);
$sheet-> setMerge(23,31,23,36);

for ($i=31; $i<37; $i++) {
	$sheet-> write(23,$i,"",$bottom_border_center_it); }

$sheet-> write(23,25,"ПДВ",$bold_right);
	
$sheet-> setMerge(24,0,24,16);
$sheet-> setMerge(24,25,24,30);
$sheet-> setMerge(24,31,24,36);

for ($i=31; $i<37; $i++) {
	$sheet-> write(24,$i,"",$bottom_border_center_it); }

$sheet-> write(24,0,"Сторони претензій одна до одної не мають.",$bold_left);
$sheet-> write(24,25,"Всього з ПДВ",$bold_right);	
	
$sheet-> setMerge(25,0,25,19);
$sheet-> setMerge(25,20,25,36);

for ($i=20; $i<37; $i++) {
	$sheet-> write(25,$i,"",$bottom_border_center_it); }

$sheet-> write(25,0,"Загальна вартість виконаних робіт (послуг) становить",$bold_left);
	
for ($i=20; $i<22; $i++) {
	$sheet-> write($i,0,"",$left_border);
	$sheet-> write($i,2,"",$left_border);
	$sheet-> write($i,18,"",$left_border);
	$sheet-> write($i,23,"",$left_border);
	$sheet-> write($i,27,"",$left_border); }
for ($i=20; $i<25; $i++) {
	$sheet-> write($i,31,"",$left_border);
	$sheet-> write($i,36,"",$right_border); }

$sheet-> setMerge(28,0,28,14);
$sheet-> setMerge(29,0,29,14);
$sheet-> setMerge(30,0,30,2);
$sheet-> setMerge(30,3,30,14);
$sheet-> setMerge(31,0,31,14);
$sheet-> setMerge(32,0,32,7);
$sheet-> setMerge(32,8,32,14);
$sheet-> setMerge(33,0,33,3);
$sheet-> setMerge(33,4,33,14);
$sheet-> setMerge(34,0,34,1);
$sheet-> setMerge(34,2,34,14);
$sheet-> setMerge(35,0,35,6);
$sheet-> setMerge(35,7,35,9);
$sheet-> setMerge(35,10,35,14);
$sheet-> setMerge(37,2,37,12);

for ($i=0; $i<15; $i++) {
	$sheet-> write(29,$i,"",$bottom_border_center_it); }
for ($i=3; $i<15; $i++) {
	$sheet-> write(30,$i,"",$bottom_border_center_it); }
for ($i=0; $i<15; $i++) {
	$sheet-> write(31,$i,"",$bottom_border_center_it); }
for ($i=8; $i<15; $i++) {
	$sheet-> write(32,$i,"",$bottom_border_center_it); }
for ($i=4; $i<15; $i++) {
	$sheet-> write(33,$i,"",$bottom_border_center_it); }
for ($i=2; $i<15; $i++) {
	$sheet-> write(34,$i,"",$bottom_border_center_it); }
for ($i=0; $i<7; $i++) {
	$sheet-> write(35,$i,"",$bottom_border_center_it); }
for ($i=10; $i<15; $i++) {
	$sheet-> write(35,$i,"",$bottom_border_center_it); } 
for ($i=2; $i<13; $i++) {
	$sheet-> write(37,$i,"",$bottom_border_center_it); } 

$sheet-> write(28,0,"Виконавець",$bold_center);
$sheet-> write(30,0,"Адреса",$left_sided);
$sheet-> write(32,0,"код ЄДРПОУ (ДРФО)",$left_sided);
$sheet-> write(33,0,"рахунок №",$left_sided);
$sheet-> write(34,0,"банк",$left_sided);
$sheet-> write(35,7,"МФО",$left_sided);
	
$sheet-> setMerge(28,22,28,36);
$sheet-> setMerge(29,22,29,36);
$sheet-> setMerge(30,22,30,24);
$sheet-> setMerge(30,25,30,36);
$sheet-> setMerge(31,22,31,36);
$sheet-> setMerge(32,22,32,29);
$sheet-> setMerge(32,30,32,36);
$sheet-> setMerge(33,22,33,25);
$sheet-> setMerge(33,26,33,36);
$sheet-> setMerge(34,22,34,23);
$sheet-> setMerge(34,24,34,36);
$sheet-> setMerge(35,22,35,28);
$sheet-> setMerge(35,29,35,31);
$sheet-> setMerge(35,32,35,36);
$sheet-> setMerge(37,24,37,34);

for ($i=22; $i<37; $i++) {
	$sheet-> write(29,$i,"",$bottom_border_center_it); }
for ($i=25; $i<37; $i++) {
	$sheet-> write(30,$i,"",$bottom_border_center_it); }
for ($i=22; $i<37; $i++) {
	$sheet-> write(31,$i,"",$bottom_border_center_it); }
for ($i=30; $i<37; $i++) {
	$sheet-> write(32,$i,"",$bottom_border_center_it); }
for ($i=26; $i<37; $i++) {
	$sheet-> write(33,$i,"",$bottom_border_center_it); }
for ($i=24; $i<37; $i++) {
	$sheet-> write(34,$i,"",$bottom_border_center_it); }
for ($i=22; $i<29; $i++) {
	$sheet-> write(35,$i,"",$bottom_border_center_it); }
for ($i=32; $i<37; $i++) {
	$sheet-> write(35,$i,"",$bottom_border_center_it); } 
for ($i=24; $i<35; $i++) {
	$sheet-> write(37,$i,"",$bottom_border_center_it); }

$sheet-> write(28,22,"Замовник",$bold_center);
$sheet-> write(30,22,"Адреса",$left_sided);
$sheet-> write(32,22,"код ЄДРПОУ (ДРФО)",$left_sided);
$sheet-> write(33,22,"рахунок №",$left_sided);
$sheet-> write(34,22,"банк",$left_sided);
$sheet-> write(35,29,"МФО",$left_sided);	

$xls-> close();
?>