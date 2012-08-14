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
$sheet-> setColumn(0,32,1.5);
for ($i=0;$i<32;$i++ ) {
	$sheet-> setRow($i,12);}

//Функция рамки
function ramka($x1,$y1,$x2,$y2)
		{
		$tl_border=& $xls-> addFormat();
		$tl_border-> setTop(1);
		
		$tr_border=& $xls-> addFormat();
		$tr_border-> setTop(1);
		$r_border-> setRight(1);
		
		$bl_border=& $xls-> addFormat();
		$bl_border-> setBottom(1);
		
		$br_border=& $xls-> addFormat();
		$bl_border-> setBottom(1);
		
		$r_border=& $xls-> addFormat();
		$r_border-> setRight(1);
		
		$l_border=& $xls-> addFormat();
		
		$t_border=& $xls-> addFormat();
		$t_border-> setTop(1);
		
		$b_border=& $xls-> addFormat();
		$bl_border-> setBottom(1);
		
		}
	
//Задаем форматы
$bottom_border_center_it=& $xls-> addFormat();
$bottom_border_center_it-> setBottom(1);
$bottom_border_center_it-> setAlign("center");
$bottom_border_center_it-> setItalic();
$bottom_border_center_it-> setFontFamily('Times New Roman');

$bold_center_bb=& $xls-> addFormat();
$bold_center_bb-> setBottom(1);
$bold_center_bb-> setAlign("center");
$bold_center_bb-> setBold(1);
$bold_center_bb-> setFontFamily('Times New Roman');

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

$text_wrap=& $xls-> addFormat();
$text_wrap-> setFontFamily('Times New Roman');
$text_wrap-> setAlign("left");
$text_wrap-> setBold(1);
$text_wrap-> setTextWrap(1);	

$text_wrap_center=& $xls-> addFormat();
$text_wrap_center-> setFontFamily('Times New Roman');
$text_wrap_center-> setAlign("vcenter");
$text_wrap_center-> setBold(1);
$text_wrap_center-> setTextWrap(1);
	
//Задаем объединение ячеек по формату бланка	

$sheet-> setMerge(0,25,0,32);

$sheet-> write(0,25,"0410001",$center_sided);

$sheet-> setMerge(1,8,1,18);
$sheet-> setMerge(1,19,1,20);
$sheet-> setMerge(1,22,1,32);

for ($i=19; $i<21; $i++) {
	$sheet-> write(1,$i,"",$bottom_border_center_it); }
	
$sheet-> write(1,8,"ПЛАТІЖНЕ ДОРУЧЕННЯ №",$bold_right);
$sheet-> write(1,22,"Одержано банком",$center_sided);

$sheet-> setMerge(2,25,2,28);
$sheet-> setMerge(2,29,2,30);

for ($i=25; $i<29; $i++) {
	$sheet-> write(2,$i,"",$bottom_border_center_it); }

$sheet-> write(2,22,'"');
$sheet-> write(2,23,"",$bottom_border_center_it);
$sheet-> write(2,24,'"');
$sheet-> write(2,29,'200');
$sheet-> write(2,31,'р.');

$sheet-> setMerge(3,8,3,9);
$sheet-> setMerge(3,10,3,21);

for ($i=10; $i<22; $i++) {
	$sheet-> write(3,$i,"",$bottom_border_center_it); }

$sheet-> write(3,8,'від',$right_sided);

$sheet-> setMerge(5,0,5,4);
$sheet-> setMerge(5,5,5,19);

for ($i=5; $i<20; $i++) {
	$sheet-> write(5,$i,"",$bottom_border_center_it); }

$sheet-> write(5,0,"Платник",$bold_left);	
	
$sheet-> setMerge(7,0,8,3);
$sheet-> setMerge(7,4,8,9);

for ($i=4; $i<10; $i++) {
	$sheet-> write(6,$i,"",$bottom_border_center_it); }
for ($i=4; $i<10; $i++) {
	$sheet-> write(8,$i,"",$bottom_border_center_it); }

$sheet-> write(7,0,"Код за ЄДРПОУ",$text_wrap);

$sheet-> setMerge(10,0,10,12);
$sheet-> setMerge(10,13,10,17);
$sheet-> setMerge(10,19,10,25);
$sheet-> setMerge(10,26,10,32);

$sheet-> write(10,0,"Банк платника",$bold_left);	
$sheet-> write(10,13,"код банку",$bold_center_bb);	
$sheet-> write(10,19,"ДЕБЕТ рах.№",$bold_center_bb);	
$sheet-> write(10,26,"СУМА",$bold_center_bb);	

$sheet-> setMerge(11,0,11,12);
$sheet-> setMerge(11,13,11,17);
$sheet-> setMerge(11,19,11,25);

for ($i=13; $i<18; $i++) {
	$sheet-> write(10,$i,"",$bottom_border_center_it); }
for ($i=19; $i<33; $i++) {
	$sheet-> write(10,$i,"",$bottom_border_center_it); }
for ($i=0; $i<18; $i++) {
	$sheet-> write(11,$i,"",$bottom_border_center_it); }
for ($i=19; $i<26; $i++) {
	$sheet-> write(11,$i,"",$bottom_border_center_it); }

$sheet-> setMerge(13,0,13,4);
$sheet-> setMerge(13,5,13,24);

for ($i=5; $i<25; $i++) {
	$sheet-> write(13,$i,"",$bottom_border_center_it); }

$sheet-> write(13,0,"Отримувач",$bold_left);	
	
$sheet-> setMerge(15,0,16,3);
$sheet-> setMerge(15,4,16,9);

for ($i=4; $i<10; $i++) {
	$sheet-> write(14,$i,"",$bottom_border_center_it); }
for ($i=4; $i<10; $i++) {
	$sheet-> write(16,$i,"",$bottom_border_center_it); }

$sheet-> write(15,0,"Код за ЄДРПОУ",$text_wrap);

$sheet-> setMerge(17,19,17,25);

for ($i=19; $i<26; $i++) {
	$sheet-> write(17,$i,"",$bottom_border_center_it); }

$sheet-> write(17,19,"КРЕДИТ рах.№",$bold_center_bb);

$sheet-> setMerge(18,0,18,12);
$sheet-> setMerge(18,13,18,17);
$sheet-> setMerge(18,19,18,25);

for ($i=13; $i<18; $i++) {
	$sheet-> write(18,$i,"",$bold_center_bb); }
for ($i=19; $i<26; $i++) {
	$sheet-> write(18,$i,"",$bottom_border_center_it); }

$sheet-> write(18,0,"Банк отримувача",$bold_left);
$sheet-> write(18,13,"код банку",$bold_center_bb);	
	
$sheet-> setMerge(19,0,19,12);
$sheet-> setMerge(19,13,19,17);
$sheet-> setMerge(19,19,19,25);

for ($i=0; $i<18; $i++) {
	$sheet-> write(19,$i,"",$bottom_border_center_it); }
for ($i=19; $i<33; $i++) {
	$sheet-> write(19,$i,"",$bottom_border_center_it); }

$sheet-> setMerge(11,26,19,32);

$sheet-> setMerge(20,0,20,6);
$sheet-> setMerge(21,0,21,18);
$sheet-> setMerge(22,0,22,18);
$sheet-> setMerge(23,0,23,24);
$sheet-> setMerge(24,0,24,24);
$sheet-> setMerge(22,26,23,32);

for ($i=0; $i<19; $i++) {
	$sheet-> write(21,$i,"",$bottom_border_center_it); }
for ($i=26; $i<33; $i++) {
	$sheet-> write(21,$i,"",$bottom_border_center_it); }
for ($i=26; $i<33; $i++) {
	$sheet-> write(23,$i,"",$bottom_border_center_it); }

$sheet-> write(20,0,"Сума словами",$bold_left);
$sheet-> write(22,0,"Призначення платежу",$bold_left);
$sheet-> write(24,0,"Без ПДВ",$left_sided);
	

$sheet-> setMerge(25,0,26,2);
$sheet-> setMerge(25,4,26,9);

for ($i=4; $i<10; $i++) {
	$sheet-> write(24,$i,"",$bottom_border_center_it); }
for ($i=4; $i<10; $i++) {
	$sheet-> write(26,$i,"",$bottom_border_center_it); }

$sheet-> write(25,0,"ДР",$text_wrap_center);

$sheet-> setMerge(28,0,29,3);
$sheet-> setMerge(29,5,29,11);
$sheet-> setMerge(28,12,28,16);
$sheet-> setMerge(29,12,29,16);
$sheet-> setMerge(28,23,28,32);
$sheet-> setMerge(29,25,29,28);
$sheet-> setMerge(29,29,29,30);
$sheet-> setMerge(30,23,30,32);

for ($i=12; $i<17; $i++) {
	$sheet-> write(28,$i,"",$bottom_border_center_it); }
for ($i=12; $i<17; $i++) {
	$sheet-> write(29,$i,"",$bottom_border_center_it); }
for ($i=24; $i<29; $i++) {
	$sheet-> write(29,$i,"",$bottom_border_center_it); }

$sheet-> write(28,0,"М.П.",$text_wrap_center);
$sheet-> write(29,5,"Підписи платника",$bold_right);
$sheet-> write(28,23,"Проведено банком",$center_sided);
$sheet-> write(29,22,'"',$center_sided);
$sheet-> write(29,23,"",$bottom_border_center_it);
$sheet-> write(29,24,'"',$center_sided);
$sheet-> write(29,29,"200",$right_sided);
$sheet-> write(29,31,"",$bottom_border_center_it);
$sheet-> write(29,32,"р.",$center_sided);
$sheet-> write(30,23,"підпис банку",$center_sided);

$xls-> close();
?>