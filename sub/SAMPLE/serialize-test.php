<?php
$mass['a']['first'] = 'first';
$mass['a']['second'] = 'second';
$mass['a']['third'] = 'third';

$mass = serialize($mass);
echo $mass;

echo "
<form action='test2.php' method='GET'>
<input type='hidden' name='mass' value='$mass'>
<input type='submit' value='передати'>
";

$mass = unserialize($mass);

echo "<pre>";
print_r($mass);
echo "</pre>";
?>