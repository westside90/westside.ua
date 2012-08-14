<?php
session_start();
header('Content-Type: text/html; charset=1251'); 
require_once "dbconnect.php";
mysql_query('SET NAMES cp1251');
mysql_select_db('test', $db);

if (isset($_GET['page']))
	{$page = $_GET['page'];}
	else $page = 0;
	
echo $page;
	
if ($page == 0)
{
if (!isset($_SESSION['status']) OR $_SESSION['status'] == 'out')
	{ ?>
	
	<form action = 'login.php?page=1' method = 'POST'>
		<table>
			<tr colspan = '2'>
				<td>јвторизац≥€
					</td>
			</tr>
			<tr>
				<td>Ћог≥н
					</td>
				<td><input type = 'text' name = 'login'>
					</td>
			</tr>
			<tr>
				<td>ѕароль
					</td>
				<td><input type = 'text' name = 'pass'>
					</td>
			</tr>
			<tr colspan = '2'>
				<td><input type = 'submit' value = '¬в≥йти'>
					</td>
			</td>
		</table>
	</form>
	
<?	}

if ($_SESSION['status'] == 'in')
	{
	echo '¬х≥д зд≥йснено';
	}

}

if ($page == 1)
	{
	$login = $_POST['login'];
	$pass = md5($_POST['pass']);
		
	if (mysql_result (mysql_query ("SELECT COUNT(`login`) FROM `users` WHERE `login` = $login"), 0) > 0)
		{
		$password = mysql_result (mysql_query ("SELECT `pass` FROM `users` WHERE `login` = $login"), 0);
		$salt = mysql_result (mysql_query ("SELECT `salt` FROM `users` WHERE `login` = $login"), 0);
		}
		
	$pass = md5($pass.$salt);
	
	if ($pass == $password)
		echo "авторизаци€ успешна";
	else
		echo "неверный пароль";
	}
		
		
		
		
		
		
		
		
		
		
		
		
?>