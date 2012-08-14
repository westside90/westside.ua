<?php
require_once "dbconnect.php";
mysql_query('SET NAMES cp1251');
mysql_select_db('test', $db);

$sql = mysql_query ("SELECT `number` FROM `sample`");
if (mysql_num_rows ($sql) > 0)
	{$number = mysql_result ($sql, mysql_num_rows ($sql)-1);
	$number++;}
else
	{$number = 1;}

$date = date("Y-m-d");


echo "<form ACTION = 'sample_add.php' METHOD = 'POST' id='add'>
		<table align = 'center' border = '1'>
			<tr>	
				<td>Дата
					</td>
				<td><input type = 'date' name = 'date' value = '$date'>
					</td>
			</tr>
			<tr>
				<td>Номер
					</td>
				<td><input type = 'text' name = 'number' value = '$number'>
					</td>
			</tr>
			<tr>
				<td>Назва
					</td>
				<td><input type = 'text' name = 'name'>
					</td>
			</tr>
			<tr>
				<td>Інформація
					</td>
				<td><input type = 'text' name = 'info'>
					</td>
			</tr>
			<tr>
				<td>Стан
					</td>
				<td><select name = 'status'>
						<option value = '0'>Неактивний</option>
						<option value = '1'>Активний</option>
					</select>
					</td>
			</tr>
			<tr>
				<td colspan = '2'>
					<input type = 'submit' value = 'Додати'>
					</td>
			</tr>
		</table>
	</form>";
?>