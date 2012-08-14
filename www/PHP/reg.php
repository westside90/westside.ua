<?
header ("Location: /index.php"); 
require_once "dbconnect.php";

//users: adm - 0, editor - 1, user - 2, banned - 3
$group = 2;

try {
$STH = $DBH->prepare("INSERT INTO `users` (
						`visited`,`registered`,`login`,
						`pass`,`group`,`email`)
					VALUES
						(NOW(),NOW(),:login,:pass,:group,:email)"); 
$STH->bindParam(':login', $_POST['login']);
$STH->bindParam(':pass', md5($_POST['pass2']));
$STH->bindParam(':group', $group);
$STH->bindParam(':email', $_POST['email']);
$STH->execute();  

$STH2 = $DBH->query("SELECT `id` FROM `users` WHERE `login` = '".$_POST['login']."'");
$STH2->setFetchMode(PDO::FETCH_ASSOC);
while ($id[] = $STH2->fetch());
}
catch(PDOException $error) {  
    echo $error->getMessage();
}

$_SESSION['log'] = true;
$_SESSION['id'] = $id[0]['id'];
$_SESSION['login'] = $_POST['login'];
$_SESSION['action'] = 2;
?>