<?php
//��� �������-��������
//������ ������ �� ��


//��������� �����
require_once "Spreadsheet/Excel/Writer.php";

//������� ����� ������ � �������� ��������� �� ����
$xls =& new Spreadsheet_Excel_Writer();
//��������� �����
$xls-> send("test.xls");
//������� ����� ����
$sheet =& $xls-> addWorksheet('test');

//�������� ��������, ������ ������� �����
$sheet-> setColumn(0,31,1.5);
for ($i=0;$i<25;$i++ ) {
	$sheet-> setRow($i,12);}

//������ �������
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
	
//������ ����������� ����� �� ������� ������	

$sheet-> setMerge(0,0,0,11);
$sheet-> setMerge(0,12,0,16);
$sheet-> setMerge(0,18,0,19);
$sheet-> setMerge(0,20,0,31);

for ($i=12; $i<17; $i++) {
	$sheet-> write(0,$i,"",$bottom_border_center_it); }
for ($i=20; $i<32; $i++) {
	$sheet-> write(0,$i,"",$bottom_border_center_it); }

$sheet-> write(0,0,"��������� �������� �",$bold_right);
$sheet-> write(0,18,"��",$right_sided);

$sheet-> setMerge(2,0,2,9);
$sheet-> setMerge(2,10,2,31);

for ($i=10; $i<32; $i++) {
	$sheet-> write(2,$i,"",$bottom_border_center_it); }

$sheet-> write(2,0,"������������",$bold_left);	

$sheet-> setMerge(3,0,3,3);
$sheet-> setMerge(3,4,3,31);

for ($i=4; $i<32; $i++) {
	$sheet-> write(3,$i,"",$bottom_border_center_it); }

$sheet-> write(3,0,"������",$right_sided);	
	
$sheet-> setMerge(4,0,4,9);
$sheet-> setMerge(4,10,4,17);
$sheet-> setMerge(4,18,4,23);
$sheet-> setMerge(4,24,4,31);

for ($i=10; $i<18; $i++) {
	$sheet-> write(4,$i,"",$bottom_border_center_it); }
for ($i=24; $i<32; $i++) {
	$sheet-> write(4,$i,"",$bottom_border_center_it); }

$sheet-> write(4,0,"��� ������ (����)",$right_sided);	
$sheet-> write(4,18,"������� �",$right_sided);		
	
$sheet-> setMerge(5,0,5,3);
$sheet-> setMerge(5,4,5,22);
$sheet-> setMerge(5,23,5,26);
$sheet-> setMerge(5,27,5,31);

for ($i=4; $i<23; $i++) {
	$sheet-> write(5,$i,"",$bottom_border_center_it); }
for ($i=27; $i<32; $i++) {
	$sheet-> write(5,$i,"",$bottom_border_center_it); }
	
$sheet-> write(5,0,"����",$right_sided);
$sheet-> write(5,23,"���",$right_sided);	

$sheet-> setMerge(7,0,7,9);
$sheet-> setMerge(7,10,7,31);

for ($i=10; $i<32; $i++) {
	$sheet-> write(7,$i,"",$bottom_border_center_it); }

$sheet-> write(7,0,"���������",$bold_left);		
	
$sheet-> setMerge(9,0,9,1);
$sheet-> setMerge(9,2,9,12);
$sheet-> setMerge(9,13,9,17);
$sheet-> setMerge(9,18,9,21);
$sheet-> setMerge(9,22,9,25);
$sheet-> setMerge(9,26,9,31);

$sheet-> setMerge(10,0,10,1);
$sheet-> setMerge(10,2,10,12);
$sheet-> setMerge(10,13,10,17);
$sheet-> setMerge(10,18,10,21);
$sheet-> setMerge(10,22,10,25);
$sheet-> setMerge(10,26,10,31);

$sheet-> setMerge(11,19,11,25);
$sheet-> setMerge(11,26,11,31);

$sheet-> setMerge(12,19,12,25);
$sheet-> setMerge(12,26,12,31);

$sheet-> setMerge(13,19,13,25);
$sheet-> setMerge(13,26,13,31);

for ($i=0; $i<32; $i++) {
	$sheet-> write(8,$i,"",$bottom_border_center_it); }
for ($i=0; $i<32; $i++) {
	$sheet-> write(9,$i,"",$bottom_border_center_it); }
for ($i=0; $i<32; $i++) {
	$sheet-> write(10,$i,"",$bottom_border_center_it); }
for ($i=26; $i<32; $i++) {
	$sheet-> write(11,$i,"",$bottom_border_center_it); }
for ($i=26; $i<32; $i++) {
	$sheet-> write(12,$i,"",$bottom_border_center_it); }
for ($i=26; $i<32; $i++) {
	$sheet-> write(13,$i,"",$bottom_border_center_it); }

for ($i=9; $i<11; $i++) {
	$sheet-> write($i,0,"",$left_border);
	$sheet-> write($i,2,"",$left_border);
	$sheet-> write($i,13,"",$left_border);
	$sheet-> write($i,18,"",$left_border);
	$sheet-> write($i,22,"",$left_border); }
for ($i=9; $i<14; $i++) {
	$sheet-> write($i,26,"",$left_border);
	$sheet-> write($i,31,"",$right_border); }
	
$sheet-> write(9,0,"�",$bold_center_border);
$sheet-> write(9,2,"������������",$bold_center_border);
$sheet-> write(9,13,"��. �����",$bold_center_border);
$sheet-> write(9,18,"�-���",$bold_center_border);
$sheet-> write(9,22,"ֳ��",$bold_center_border);
$sheet-> write(9,26,"����",$bold_center_border);
$sheet-> write(11,19,"����� ��� ���",$bold_right);
$sheet-> write(12,19,"���",$bold_right);
$sheet-> write(13,19,"������ � ���",$bold_right);

$sheet-> setMerge(15,0,15,5);
$sheet-> setMerge(15,6,15,31);

for ($i=6; $i<32; $i++) {
	$sheet-> write(15,$i,"",$bottom_border_center_it); }
	
$sheet-> write(15,0,"������ �� ����",$bold_left);

$sheet-> setMerge(17,0,17,4);
$sheet-> setMerge(17,5,17,11);
$sheet-> setMerge(17,19,17,24);
$sheet-> setMerge(17,25,17,31);

for ($i=5; $i<12; $i++) {
	$sheet-> write(17,$i,"",$bottom_border_center_it); }
for ($i=25; $i<32; $i++) {
	$sheet-> write(17,$i,"",$bottom_border_center_it); }
	
$sheet-> write(17,0,"³���������",$bold_left);
$sheet-> write(17,19,"�������",$bold_left);

$xls-> close();
?>