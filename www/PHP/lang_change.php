<?php
header ("Location: ".$_SERVER['HTTP_REFERER']);
require_once "dbconnect.php";

$_SESSION['lang'] = $_GET['lang'];
?>