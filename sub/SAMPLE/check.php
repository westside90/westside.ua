<?php
if (!isset ($_SESSION)) session_start ();
header ('Cache-control:no-cache');

if (!isset ($_POST['captcha']))
	{
	echo "<img src = 'code.php'>
		<form action = 'check.php' method = 'POST'>
			<input type = 'text' name = 'captcha'>
			<input type = 'submit' value = '������'>
		</form>";
	}
else
	{
	if ($_SESSION['code'] == $_POST['captcha'])
		{ echo "�� ����� ���������"; }
	else
		{ echo "������"; }
	unset ($_SESSION['code']);
	echo "<a href = 'check.php'> �����������</a>";
	}
?>