<?php
header ("Location: ".$_SERVER['HTTP_REFERER']);
require_once "dbconnect.php";

try {
$DBH->prepare("DELETE FROM `vote` WHERE `id` = '".$_GET['id']."'")->execute();
}
catch(PDOException $error) {  
    echo $error->getMessage();
}
?>