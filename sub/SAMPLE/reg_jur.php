<?php
//Підключення модулів
header('Content-Type: text/html; charset=1251'); 
require_once "dbconnect.php";
mysql_query('SET NAMES cp1251');
require_once "html/header.html";
require_once "html/menu.html";

echo "<table width='100%'>
		<tr>
			<td align='center' valign='middle'>";
require_once "register/register_jur.html";
echo		"</td>
			<td width='250' align='right' valign='top'>";
require_once "html/right_block.html";
echo "		</td>
			</tr>
			</table>";

require_once "html/footer.html";
?>
