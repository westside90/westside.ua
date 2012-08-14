<?php 
require_once "dbconnect.php";
mysql_query('SET NAMES cp1251');
mysql_select_db('test', $db);
$k = 0;

while ($mass = mysql_fetch_array (mysql_query ("SELECT * FROM `sample` WHERE (`id` > 10 AND `id` < 20)"), MYSQL_ASSOC))
	{
	$output[$k] = $mass;
	$k++;
	}

echo "<pre>";
print_r($output);
echo "</pre>";
?>