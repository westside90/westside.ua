<?php
header ("Location: /index.php?act=accounts"); 
require_once "dbconnect.php";

try {
$DBH->prepare("DELETE FROM `users` WHERE `id` = '".$_GET['id']."'")->execute();
}
catch(PDOException $error) {  
    echo $error->getMessage();
}
?>