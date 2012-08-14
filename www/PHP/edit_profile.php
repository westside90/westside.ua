<?php
header ("Location: /index.php?act=profile"); 
require_once "dbconnect.php";

try {
$STH = $DBH->query("SELECT `pass` FROM `users` WHERE `id` = '".$_SESSION['id']."'");
$STH->setFetchMode(PDO::FETCH_ASSOC);
$pass[] = $STH->fetch();
}
catch(PDOException $error) {  
    echo $error->getMessage();
}

$_POST['pass2'] != null ? $_POST['pass2'] = md5($_POST['pass2']) : $_POST['pass2'] = $pass[0]['pass'];

try {
$STH = $DBH->prepare("UPDATE `users` SET 
						`pass`=:pass,`email`=:email,
						`first_name`=:first_name,`second_name`=:second_name 
					WHERE `id` = :id"); 
$STH->bindParam(':pass', $_POST['pass2']);
$STH->bindParam(':email', $_POST['email']);
$STH->bindParam(':first_name', $_POST['first_name']);
$STH->bindParam(':second_name', $_POST['second_name']);
$STH->bindParam(':id', $_SESSION['id');
$STH->execute();  
}
catch(PDOException $error) {  
    echo $error->getMessage();
}	
?>