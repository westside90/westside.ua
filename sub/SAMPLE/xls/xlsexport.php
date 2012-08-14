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
$sheet-> setColumn(0,55,1.5);
for ($i=0;$i<27;$i++ ) {
	$sheet-> setRow($i,12);}
$sheet-> setRow(22,80);

//������ �������
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

$text_wrap_left=& $xls-> addFormat();
$text_wrap_left-> setFontFamily('Times New Roman');
$text_wrap_left-> setAlign("left");
$text_wrap_left-> setTextWrap(1);

$text_wrap_cent=& $xls-> addFormat();
$text_wrap_cent-> setFontFamily('Times New Roman');
$text_wrap_cent-> setHAlign("center");
$text_wrap_cent-> setVAlign("vcenter");
$text_wrap_cent-> setTextWrap(1);
$text_wrap_cent-> setLeft(1);
$text_wrap_cent-> setBottom(1);

$center_top=& $xls-> addFormat();
$center_top-> setFontFamily('Times New Roman');
$center_top-> setHAlign("center");
$center_top-> setVAlign("top");
	
//������ ����������� ����� �� ������� ������	

$sheet-> setMerge(0,34,0,55);
$sheet-> setMerge(1,34,1,55);
$sheet-> setMerge(2,34,2,55);
$sheet-> setMerge(3,34,3,55);
$sheet-> setMerge(4,34,4,55);
$sheet-> setMerge(5,34,5,55);

$sheet-> write(0,34,"�����������",$left_sided);
$sheet-> write(1,34,"������� �������� ��������� ����������� ������",$left_sided);
$sheet-> write(2,34,"�� 13 ������ 1998�. �477",$left_sided);
$sheet-> write(3,34,"(� �������� ������ �������� ���������",$left_sided);
$sheet-> write(4,34,"����������� ������",$left_sided);
$sheet-> write(5,34,"�� 12 ������ 1999�. �554",$left_sided);

$sheet-> setMerge(6,0,6,55);
$sheet-> setMerge(7,0,7,55);
$sheet-> setMerge(8,0,8,55);
$sheet-> setMerge(9,21,9,33);

$sheet-> write(6,0,"�����",$bold_center);
$sheet-> write(7,0,"����� ������ � ������ ���'���� ������ ������������ - �������� �����,",$bold_center);
$sheet-> write(8,0,"��� ��������� �������� ������� �������������, ����� �� �������",$bold_center);
$sheet-> write(9,21,"�� 201__/201__��",$center_sided);

$sheet-> setMerge(10,0,10,16);
$sheet-> setMerge(11,0,11,4);
$sheet-> setMerge(11,5,11,16);
$sheet-> setMerge(12,0,12,6);
$sheet-> setMerge(13,0,13,16);
$sheet-> setMerge(14,0,14,16);
$sheet-> setMerge(15,0,15,16);
$sheet-> setMerge(16,0,16,16);
$sheet-> setMerge(17,0,17,16);

for ($i=5; $i<17; $i++) {
	$sheet-> write(11,$i,"",$bottom_border_center_it); }
for ($i=0; $i<17; $i++) {
	$sheet-> write(14,$i,"",$bottom_border_center_it); }
for ($i=0; $i<17; $i++) {
	$sheet-> write(16,$i,"",$bottom_border_center_it); }

$sheet-> write(10,0,"�������� ��������� �����������",$left_sided);
$sheet-> write(11,0,"(���������)",$left_sided);
$sheet-> write(12,0,"���'��� ������",$left_sided);
$sheet-> write(13,0,"������������ - �������� �����",$left_sided);
$sheet-> write(15,0,"(�����)",$center_top);
$sheet-> write(17,0,"(������, �������)",$center_top);

$sheet-> setMerge(19,0,19,32);
$sheet-> setMerge(19,33,19,52);
$sheet-> setMerge(20,0,20,52);

for ($i=33; $i<53; $i++) {
	$sheet-> write(19,$i,"",$bottom_border_center_it); }
for ($i=0; $i<53; $i++) {
	$sheet-> write(20,$i,"",$bottom_border_center_it); }

$sheet-> write(19,0,"������ ������������� (��������) �� ����� �������, �������� � ��������� �����",$left_sided);

for ($i=22; $i<24; $i++) {
	$sheet-> setMerge($i,3,$i,5);
	$sheet-> setMerge($i,6,$i,13);
	$sheet-> setMerge($i,14,$i,21);
	$sheet-> setMerge($i,22,$i,29);
	$sheet-> setMerge($i,30,$i,37);
	$sheet-> setMerge($i,38,$i,44);
	$sheet-> setMerge($i,45,$i,52); }

$sheet-> write(22,3,"� �/�",$text_wrap_cent);
$sheet-> write(22,6,"���� �� ����� ����������� ��� �������� ���������",$text_wrap_cent);
$sheet-> write(22,14,"���� ������� �� ��������� ��������� (������, ����, ������), ���.",$text_wrap_cent);
$sheet-> write(22,22,"���� ������� �� ��������� �������� �����, ���.",$text_wrap_cent);
$sheet-> write(22,30,"�������������� ������ �� ������� �� ���� ���������, ���.",$text_wrap_cent);
$sheet-> write(22,38,"�������� ���� ������� �� �������������� ������, ���. (��.3+4+5)",$text_wrap_cent);
$sheet-> write(22,45,"�������� ���� ������, ��������� � ��'���� � �������� ������������ ��������, ���.",$text_wrap_cent);

$sheet-> write(23,3,"1",$text_wrap_cent);
$sheet-> write(23,6,"2",$text_wrap_cent);
$sheet-> write(23,14,"3",$text_wrap_cent);
$sheet-> write(23,22,"4",$text_wrap_cent);
$sheet-> write(23,30,"5",$text_wrap_cent);
$sheet-> write(23,38,"6",$text_wrap_cent);
$sheet-> write(23,45,"7",$text_wrap_cent);

for ($j=21; $j<24; $j++) {
	for ($i=3; $i<53; $i++) {
		$sheet->write($j,$i,"",$bottom_border_center_it); } }

for ($i=22; $i<24; $i++) {
		$sheet-> write($i,52,"",$right_border); }

$xls-> close();
?>