<?php
header ("Location: /index.php"); 
require_once "dbconnect.php";

try {
$DBH->prepare("DELETE FROM `data` WHERE `id` = '".$_GET['id']."'")->execute();
}
catch(PDOException $error) {  
    echo $error->getMessage();
}
?>