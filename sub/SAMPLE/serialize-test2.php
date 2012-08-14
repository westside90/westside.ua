<?php 
$mass = $_GET['mass'];

$mass = str_replace("\\", "", $mass);
$mass = unserialize($mass);

echo "<pre>";
print_r($mass);
echo "</pre>";
?>