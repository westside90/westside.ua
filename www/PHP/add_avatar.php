<?php
header ("Location: /index.php?act=edit_profile"); 
require_once "dbconnect.php";

$uploadfile = "../IMG/".basename($_FILES['avatar']['name']);

require_once "img_resize.php";
img_resize($_FILES['avatar']['tmp_name'], $uploadfile, 150, 150, $rgb=0xFFFFFF, $quality=100);

try {
$STH = $DBH->prepare("UPDATE `users` SET 
							`avatar`=:file WHERE `id` = :id"); 
$STH->bindParam(':file', $uploadfile);
$STH->bindParam(':id', $_SESSION['id']);
$STH->execute();  
}
catch(PDOException $error) {  
    echo $error->getMessage();
}
?>