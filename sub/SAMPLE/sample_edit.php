<?php
require_once "dbconnect.php";
mysql_query('SET NAMES cp1251');
mysql_select_db('test', $db);

$id = $_GET['id'];

$name = mysql_result(mysql_query("SELECT `name` FROM `sample` WHERE `id` = $id", $db) , 0);
$number = mysql_result(mysql_query("SELECT `number` FROM `sample` WHERE `id` = $id", $db) , 0);
$info = mysql_result(mysql_query("SELECT `info` FROM `sample` WHERE `id` = $id", $db) , 0);
$status = mysql_result(mysql_query("SELECT `status` FROM `sample` WHERE `id` = $id", $db) , 0);

echo "<form ACTION = 'sample_update.php' METHOD = 'POST'>
		<table align = 'center' border = '1'>
			<tr>
				<td colspan = '2' align = 'center'>
					³������ �� '$name'
					</td>
			</tr>
			<tr>
				<td colspan = '2'>
					&nbsp
					</td>
			</tr>
			<tr>
				<td>�����
					</td>
				<td><input type = 'text' name = 'name' value = '$name'>
					</td>
			</tr>
			<tr>
				<td>�����
					</td>
				<td><input type = 'text' name = 'number' value = '$number'>
					</td>
			</tr>
			<tr>
				<td>����������
					</td>
				<td><input type = 'text' name = 'info' value = '$info'>
					</td>
			</tr>
			<tr>
				<td>����
					</td>
				<td>
					<select name = 'status'>
						<option value = '0' ";
							if ($status == '0')
								{echo "cheked";}
echo "						>����������
							</option>
						<option value = '1' ";
							if ($status == '1')
								{echo "cheked";}
echo "						>��������
							</option>
					</select>";
echo "				</td>
			</tr>
			<tr>
				<td colspan = '2'>
					&nbsp
					</td>
			</tr>
			<tr>
				<td colspan = '2' align = 'center'>
					<input type = 'hidden' name = 'id' value = '$id'>
					<input type = 'submit' value = '�������� ����'>
					<br><br>
					<a href = 'sample_list.php'>�����������</a>
					</td>
			</tr>
		</table>
	</form>";
?>