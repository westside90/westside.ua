<?php
session_start();

if (isset($_GET['page']))
	{$page = $_GET['page'];}
	else
	$page = 0;

switch ($page):
	case 0:
		{
		echo $_SESSION['login'];
	?>
		<br>
		<a href = 'new.php?page=1'>�������� ��'��� ����</a>
		
	<?	} break;
	case 1:
		{
		unset($_SESSION['login']);
		echo '��������';
		} break;
	endswitch;
?>
