<?
if (!isset($_POST['log']))
	{ header ("Location: /index.php?log=try"); }
else
	{ header ("Location: ".$_SERVER['HTTP_REFERER']); }
	
require_once "dbconnect.php";

if (isset($_POST['log']))
	{
	$_SESSION['log'] = false;
	unset ($_SESSION['login']);
	unset ($_SESSION['id']);
	unset ($_SESSION['action']);
	}
else
	{
	try {
	$STH = $DBH->query("SELECT `id`,`pass`,`group` FROM `users` WHERE `login` = '".$_POST['login']."'");
	$STH->setFetchMode(PDO::FETCH_ASSOC);
	while ($data[] = $STH->fetch());
	}
	catch(PDOException $error) {  
		echo $error->getMessage();
	}
		
	if (count($data) > 0 AND (md5($_POST['pass']) == $data[0]['pass']))
		{
		$_SESSION['log'] = true;
		$_SESSION['login'] = $_POST['login'];
		$_SESSION['id'] = $data[0]['id'];
		$_SESSION['action'] = $data[0]['group'];
		
		try {
		$STH = $DBH->prepare("UPDATE `users` SET `visited`=NOW() WHERE `id` = :id"); 
		$STH->bindParam(':id', $_SESSION['id']);
		$STH->execute();  
		}
		catch(PDOException $error) {  
		echo $error->getMessage();
		}

		}
	else 
		{
		$_SESSION['log'] = false;
		}
	}
?>