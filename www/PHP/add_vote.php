<?php
header ("Location: ".$_SERVER['HTTP_REFERER']);
require_once "dbconnect.php";

try {
$STH = $DBH->prepare("INSERT INTO `vote` (
						`voted`,`data`,`user`,`mark`)
					VALUES
						(NOW(),:data,:user,:mark)"); 
$STH->bindParam(':data', $_POST['id']);
$STH->bindParam(':user', $_SESSION['id']);
$STH->bindParam(':mark', $_POST['mark']);
$STH->execute();  
}
catch(PDOException $error) {  
    echo $error->getMessage();
}
?>