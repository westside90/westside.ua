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
				<td>����
					</td>
				<td><input type = 'date' name = 'date' value = '$date'>
					</td>
			</tr>
			<tr>
				<td>�����
					</td>
				<td><input type = 'text' name = 'number' value = '$number'>
					</td>
			</tr>
			<tr>
				<td>�����
					</td>
				<td><input type = 'text' name = 'name'>
					</td>
			</tr>
			<tr>
				<td>����������
					</td>
				<td><input type = 'text' name = 'info'>
					</td>
			</tr>
			<tr>
				<td>����
					</td>
				<td><select name = 'status'>
						<option value = '0'>����������</option>
						<option value = '1'>��������</option>
					</select>
					</td>
			</tr>
			<tr>
				<td colspan = '2'>
					<input type = 'submit' value = '������'>
					</td>
			</tr>
		</table>
	</form>";
?>