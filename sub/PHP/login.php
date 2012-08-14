<?
if (isset($_GET['logout']) AND $_GET['logout'] = 1)
	{
	header ("location: /index.php");
	unset($_SESSION['login']);
	unset($_SESSION['pass']);
	$logkey = false;
	}
if (isset($_SESSION['login']))
	{
	if ($logkey)
		{
		echo "Успішний вхід в систему.<br>Користувач  - ".$_SESSION['login'].",<br>Пароль - ".$_SESSION['pass'];
		echo "<a href = 'index.php?logout=1'><br>ВИЙТИ</a>";
		}
	else
		{
		echo "Невірний логін або пароль";
		echo "<a href = 'index.php?logout=1'><br>НАЗАД</a>";
		}
	}
else
	{
	if(isset($_POST['login']))
		{
		header ("location: /index.php");
		$login = $_POST['login'];
		$pass = $_POST['pass'];
		$_SESSION['login'] = $_POST['login'];
		$_SESSION['pass'] = $_POST['pass'];
		}
	else
		{
		echo "<form ACTION = 'index.php' METHOD = 'POST'>
			Логін<br><input type = 'text' name = 'login'>
			<br>
			Пароль<br><input type = 'password' name = 'pass'>
			<br>
			<input type = 'submit' value = 'Вхід'>
			<br>
			<a href = 'index.php?page=1'>Зареєструватись</a>
		</form>";
		}
	}
?>