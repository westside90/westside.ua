<?php
header ("Location: ".$_SERVER['HTTP_REFERER']);
require_once "dbconnect.php";

if (mb_strlen ($_POST['thread'] == 0))
	{
	$str = mb_substr($_POST['comment'], 0, 15);
	$_POST['thread'] = substr($str, 0, strrpos($str,' '))."...";
	}

try {
$STH = $DBH->prepare("INSERT INTO `comments` (
						`created`,`lang`,`data`,
						`thread`,`comment`,`user`)
					VALUES
						(NOW(),:lang,:data,:thread,:comment,:user)"); 
$STH->bindParam(':lang', $_SESSION['lang']);
$STH->bindParam(':data', $_POST['id']);
$STH->bindParam(':thread', $_POST['thread']);
$STH->bindParam(':comment', $_POST['comment']);
$STH->bindParam(':user', $_SESSION['id']);
$STH->execute();  
}
catch(PDOException $error) {  
    echo $error->getMessage();
}
?>