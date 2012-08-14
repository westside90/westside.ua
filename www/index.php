<?php
require_once "PHP/dbconnect.php";
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\" \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\"> \n";

require_once "PHP/language.php";
require_once "HTML/header.html";

if ($_SESSION['action'] != '3')  
{
	if (!isset ($_GET['act']))
		{ require_once "HTML/list.html"; }
	else
		{
		if ($_GET['act'] == 'full') require_once "HTML/full_view.html";
	
		if ($_GET['act'] == 'add' AND ($_SESSION['action'] == '0' OR $_SESSION['action'] == '1')) 
			{ require_once "HTML/add_article.html"; }
		else
			{
			if ($_GET['act'] == 'add') 
				{ require_once "HTML/error.html"; }
			}
		
		if ($_GET['act'] == 'edit' AND ($_SESSION['action'] == '0' OR 
			($_SESSION['action'] == '1' AND 
				$_SESSION['id'] == mysql_result (mysql_query ("SELECT `author` 
																FROM `data` WHERE `id` = '".$_GET['id']."'"), 0))))
			{ require_once "HTML/edit_article.html"; }
		else	
			{
			if ($_GET['act'] == 'edit') 
				{ require_once "HTML/error.html"; }
			}
	
		if ($_GET['act'] == 'reg') require_once "HTML/reg.html";
	
		if ($_GET['act'] == 'profile') require_once "HTML/profile.html";

		if ($_GET['act'] == 'edit_profile') require_once "HTML/edit_profile.html";
		
		if ($_GET['act'] == 'view_profile') require_once "HTML/view_profile.html";
		
		if ($_GET['act'] == 'accounts' AND $_SESSION['action'] == '0')
			{ require_once "HTML/accounts.html"; }
		else	
			{
			if ($_GET['act'] == 'accounts') 
				{ require_once "HTML/error.html"; }
			}
	
		if ($_GET['act'] == 'edit_user' AND $_SESSION['action'] == '0')
			{ require_once "HTML/edit_user.html"; }
		else	
			{
			if ($_GET['act'] == 'edit_user') 
				{ require_once "HTML/error.html"; }
			}
		}
	}
else require_once "HTML/error.html";

require_once "HTML/footer.html";
?>