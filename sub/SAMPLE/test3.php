<?php
require_once "dbconnect.php";
mysql_query('SET NAMES cp1251');
mysql_select_db('test', $db);

$mass = array ('upper' => array ('qwerty' => array ('q', 'w', 'e', 'r', 't', 'y'),'uiop'), 'middle' => array ('asdfg','hjkl'), 'down' => array ('zxcvbnm'));

//for ($i = 0; $i < count($mass); $i++)
//echo " $mass[$i]";

echo "<pre>";
print_r($mass);
echo "</pre>";

echo $mass['upper']['qwerty'][3];
echo "<br>";
echo md5($mass['down'][0]);
echo "<br>";
echo md5('zxcvbnm');
echo md5('wtscomp12345');
echo "<hr>";

$mass2 = array_keys($mass);
echo ($mass2[0]);
?>