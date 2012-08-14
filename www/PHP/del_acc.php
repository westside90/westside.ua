<?php
header ("Location: /index.php"); 
require_once "dbconnect.php";

try {
$DBH->prepare("DELETE FROM `users` WHERE `id` = '".$_SESSION['id']."'")->execute();
}
catch(PDOException $error) {  
    echo $error->getMessage();
}
session_destroy();
?>