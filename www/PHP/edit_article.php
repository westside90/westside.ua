<?php
header ("Location: /index.php"); 
require_once "dbconnect.php";

try {
$STH = $DBH->prepare("UPDATE `data` SET 
						`edited`=NOW(),`header_en`=:head_en,`header_ua`=:head_ua,
						`text_en`=:text_en,`text_ua`=:text_ua 
						WHERE `id` = :id"); 
$STH->bindParam(':head_en', $title_en);
$STH->bindParam(':head_ua', $title_ua);
$STH->bindParam(':text_en', $text_en);
$STH->bindParam(':text_ua', $text_ua);
$STH->bindParam(':id', $_POST['id']);
$STH->execute();  
}
catch(PDOException $error) {  
    echo $error->getMessage();
}
?>