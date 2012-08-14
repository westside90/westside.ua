<?php
header ("Location: /index.php"); 
require_once "dbconnect.php";

try {
$STH = $DBH->prepare("INSERT INTO `data` (
						`edited`,`created`,`header_en`,
						`header_ua`,`text_en`,`text_ua`,`author`)
					VALUES
						(NOW(),NOW(),:title_en,:title_ua,:text_en,:text_ua,:author)"); 
$STH->bindParam(':title_en', $title_en);
$STH->bindParam(':title_ua', $title_ua);
$STH->bindParam(':text_en', $text_en);
$STH->bindParam(':text_ua', $text_ua);
$STH->bindParam(':author', $_SESSION['id']);
$STH->execute();  
}
catch(PDOException $error) {  
    echo $error->getMessage();
}
?>