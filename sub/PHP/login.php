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
		echo "������� ���� � �������.<br>����������  - ".$_SESSION['login'].",<br>������ - ".$_SESSION['pass'];
		echo "<a href = 'index.php?logout=1'><br>�����</a>";
		}
	else
		{
		echo "������� ���� ��� ������";
		echo "<a href = 'index.php?logout=1'><br>�����</a>";
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
			����<br><input type = 'text' name = 'login'>
			<br>
			������<br><input type = 'password' name = 'pass'>
			<br>
			<input type = 'submit' value = '����'>
			<br>
			<a href = 'index.php?page=1'>��������������</a>
		</form>";
		}
	}
?>