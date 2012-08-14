<?php
//Налаштування сторінки і коннект з БД
error_reporting(0);
require_once "../dbconnect.php";
//Налаштування сторінки і коннект з БД

//Ініціювання змінних
if (!isset($_POST['name'])) { $_POST['name'] = null; }
//Ініціювання змінних

//Шаблон форми	
require_once "../../HTML/nomenklatura/units_form.html";
//Шаблон форми

//Массив даних
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";
//Массив даних
?>