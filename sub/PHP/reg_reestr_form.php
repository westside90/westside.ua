<?php
//Налаштування сторінки і коннект з БД
//error_reporting(0);
require_once "dbconnect.php";
//Налаштування сторінки і коннект з БД

$sql = mysql_query ("SELECT * FROM `users`.`reestr` WHERE `user` = 0");
if (mysql_num_rows ($sql) > 0) $_POST = mysql_fetch_array ($sql, MYSQL_ASSOC);

//Ініціювання змінних
if (!isset($_POST['derzh_date'])) { $_POST['derzh_date'] = null; }
if (!isset($_POST['derzh_number'])) { $_POST['derzh_number'] = null; }
if (!isset($_POST['derzh_organ'])) { $_POST['derzh_organ'] = null; }
if (!isset($_POST['dpi_date'])) { $_POST['dpi_date'] = null; }
if (!isset($_POST['dpi_kod'])) { $_POST['dpi_kod'] = null; }
if (!isset($_POST['dpi_organ'])) { $_POST['dpi_organ'] = null; }
if (!isset($_POST['dpi_ident'])) { $_POST['dpi_ident'] = null; }
if (!isset($_POST['pfu_date'])) { $_POST['pfu_date'] = null; }
if (!isset($_POST['pfu_ident'])) { $_POST['pfu_ident'] = null; }
if (!isset($_POST['pfu_kod'])) { $_POST['pfu_kod'] = null; }
if (!isset($_POST['pfu_organ'])) { $_POST['pfu_organ'] = null; }
//Ініціювання змінних



//Шаблон форми	
require_once "../HTML/reg_reestr_form.html";
//Шаблон форми

//Массив даних
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";
//Массив даних
?>