<?php
session_start();

if (isset($_GET['page']))
	{$page = $_GET['page'];}
	else
	{$page = 0;}
	
if (isset($_SESSION['login']))
	{$page = 1;}

switch ($page):
	case 0:
		{ ?>

		<form action = 'cookiestest.php?page=1' method = 'POST'>
			<input type = 'text' name = 'login'>
		</form>
			
	<?	} break;
	
	case 1:
		{
		if (isset($_POST['login']))
			{
			$_SESSION['login'] = $_POST['login'];
			}
		echo $_SESSION['login']; ?>

		<br>	
		<a href = 'cookiestest.php?page=0'>Удалить</a>
		
	<?	} break;
	endswitch;
?>