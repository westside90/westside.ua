<?php
//Параметри з'єднання з БД
$db = mysql_connect ('localhost','root','wtscomp');
mysql_query ("SET character_set_client = 'cp1251'");
mysql_query ("SET character_set_results = 'cp1251'");
mysql_query ("SET collation_connection = 'cp1251_general_ci'");
mysql_query ('SET NAMES cp1251');
mysql_select_db ('westside_db', $db);
//Параметри з'єднання з БД

function getvariable($var,$def)
	{
	if (isset($_REQUEST[$var]))
	{$var = $_REQUEST[$var];}
		else
	{$var = $def;}
	return $var;
	}

require_once "PHP/lists.php";

$test = get_units (	getvariable ('order','name_ASC'),
									getvariable ('pages',0)
									);

echo "<pre>";
print_r($test);
echo "</pre>";
?>