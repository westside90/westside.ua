<?php
//ϳ��������� ������
header('Content-Type: text/html; charset=1251'); 
require_once "dbconnect.php";
mysql_query('SET NAMES cp1251');
require_once "html/header.html";
require_once "html/menu.html";

echo "<table width='100%'>
		<tr>
			<td align='center' valign='middle'>";
require_once "html/choose.html";
echo		"</td>
			<td width='250' align='right' valign='top'>";
require_once "html/right_block.html";
echo "		</td>
			</tr>
			</table>";

//��������� ������ ���������
$login= $_REQUEST['login'];
$user_db= $login."_db";
$password= $_REQUEST['conf_pass'];
$email= $_REQUEST['email'];
$skype= $_REQUEST['skype'];

//��������� ���� ������������, ������ ������
$sql ="CREATE DATABASE IF NOT EXISTS Users DEFAULT CHARACTER SET cp1251 COLLATE cp1251_ukrainian_ci";
if (mysql_query($sql,$db))
	{echo '���� Users �������� ������';} else
	{echo '�������, '.mysql_error();}

mysql_select_db('Users',$db);

//��������� ������� ������������, ������ ������
$sql = "CREATE TABLE IF NOT EXISTS `Users`.`Users` 
(`id` INT NOT NULL AUTO_INCREMENT ,
`login` TEXT NOT NULL ,
`password` TEXT NOT NULL ,
`email` TEXT NOT NULL ,
`skype` TEXT NOT NULL ,
PRIMARY KEY ( `id` ) ) 
ENGINE = InnoDB";

//if (mysql_query($sql,$db))
//	{echo '������� ������������ �������� ������';} else
//	{echo '�������, '.mysql_error();}

//��������� ������ ������ �����������	
$sql ="INSERT INTO `users`.`users` (
`id` ,
`login` ,
`password` ,
`email` ,
`skype` 
)
VALUES (
NULL , '$login', '$password', '$email', '$skype'
)";
if (mysql_query($sql,$db))
	{echo '��� ����������� ����� ������';} else
	{echo '�������, '.mysql_error();}

//��������� �� �����������
$sql ="CREATE DATABASE IF NOT EXISTS $user_db DEFAULT CHARACTER SET cp1251 COLLATE cp1251_ukrainian_ci";
if (mysql_query($sql,$db))
	{echo '���� ',$user_db,' �������� ������';} else
	{echo '�������, '.mysql_error();}

mysql_select_db($user_db,$db);
	
// ��������� ������ ����������� ��	
//$sql ="CREATE USER $login@'%'
//	IDENTIFIED BY $password;
//	GRANT USAGE ON $user_db . * TO $login@'%'
//	IDENTIFIED BY $password
//	WITH MAX_QUERIES_PER_HOUR 0
//	MAX_CONNECTIONS_PER_HOUR 0
//	MAX_UPDATES_PER_HOUR 0
//	MAX_USER_CONNECTIONS 0 ;
//	CREATE DATABASE IF NOT EXISTS `west` ;
//	GRANT ALL PRIVILEGES ON $user_db . * TO $login@'%'";
		
//if (mysql_query($sql,$db))
//	{echo '����������� ������';} else
//	{echo '�������, '.mysql_error();}

require_once "html/footer.html";
?>