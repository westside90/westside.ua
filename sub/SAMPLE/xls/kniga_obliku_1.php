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
$sheet-> setColumn(0,36,1.5);
for ($i=0;$i<25;$i++ ) {
	$sheet-> setRow($i,12);}
$sheet-> setRow(15,80);

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
	
//������ ����������� ����� �� ������� ������	

$sheet-> setMerge(0,22,0,27);
$sheet-> setMerge(1,22,2,36);
$sheet-> setMerge(3,22,3,30);

$sheet-> write(0,22,"������� �10",$left_sided);
$sheet-> write(1,22,"�� ���������� ��� ����������� ������� � ��������, ����������� ������� ����",$text_wrap_left);
$sheet-> write(3,22,"�� 21 ����� 1993�. �12",$left_sided);

$sheet-> setMerge(5,22,5,27);

$sheet-> write(5,22,"����� �10",$bold_left);

$sheet-> setMerge(9,0,9,36);
$sheet-> setMerge(10,0,10,36);
$sheet-> setMerge(11,0,11,36);

$sheet-> write(9,0,"����� ����� ������ � ������,",$bold_center);
$sheet-> write(10,0,"��� ������ ������ ����� - ���'���� ������������ ��������",$bold_center);
$sheet-> write(11,0,"�������� ������������ ����",$bold_center);

$sheet-> setMerge(15,0,15,4);
$sheet-> setMerge(15,5,15,10);
$sheet-> setMerge(15,11,15,16);
$sheet-> setMerge(15,17,15,22);
$sheet-> setMerge(15,23,15,26);
$sheet-> setMerge(15,27,15,31);
$sheet-> setMerge(15,32,15,36);

$sheet-> write(15,0,"����� ����� (����, �������, �����, ��)",$text_wrap_cent);
$sheet-> write(15,5,"ʳ������ ����������� ���������, ������� ������ (� �������� �����)",$text_wrap_cent);
$sheet-> write(15,11,"������� �� ����������� ���������",$text_wrap_cent);
$sheet-> write(15,17,"ʳ������ ������� ��������� (������� ������) (� �������� �����)",$text_wrap_cent);
$sheet-> write(15,23,"ֳ�� ������� ��������� (������) (���.)",$text_wrap_cent);
$sheet-> write(15,27,"���� ������� (������) (���.)",$text_wrap_cent);
$sheet-> write(15,32,"������ ����� (���.)",$text_wrap_cent);

$sheet-> setMerge(16,0,16,4);
$sheet-> setMerge(16,5,16,10);
$sheet-> setMerge(16,11,16,16);
$sheet-> setMerge(16,17,16,22);
$sheet-> setMerge(16,23,16,26);
$sheet-> setMerge(16,27,16,31);
$sheet-> setMerge(16,32,16,36);

$sheet-> write(16,0,"1",$text_wrap_cent);
$sheet-> write(16,5,"2",$text_wrap_cent);
$sheet-> write(16,11,"3",$text_wrap_cent);
$sheet-> write(16,17,"4",$text_wrap_cent);
$sheet-> write(16,23,"5",$text_wrap_cent);
$sheet-> write(16,27,"6",$text_wrap_cent);
$sheet-> write(16,32,"7",$text_wrap_cent);

for ($j=14; $j<17; $j++){
	for ($i=0; $i<37; $i++) {
		$sheet-> write($j,$i,"",$bottom_border_center_it); } }

for ($i=15; $i<17; $i++) {
		$sheet-> write($i,36,"",$right_border); }

$xls-> close();
?>