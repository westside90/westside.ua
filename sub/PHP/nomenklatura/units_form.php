<?php
//������������ ������� � ������� � ��
error_reporting(0);
require_once "../dbconnect.php";
//������������ ������� � ������� � ��

//���������� ������
if (!isset($_POST['name'])) { $_POST['name'] = null; }
//���������� ������

//������ �����	
require_once "../../HTML/nomenklatura/units_form.html";
//������ �����

//������ �����
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";
//������ �����
?>