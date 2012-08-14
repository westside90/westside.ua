<?
header ("Location: /index.php?act=accounts"); 
require_once "dbconnect.php";

try {
$STH = $DBH->prepare("UPDATE `users` SET `group`=:group WHERE `id` = :id"); 
$STH->bindParam(':group', $_POST['group']);
$STH->bindParam(':id', $_POST['id']);
$STH->execute();  
}
catch(PDOException $error) {  
    echo $error->getMessage();
}
?>