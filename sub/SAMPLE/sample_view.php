<?php
require_once "dbconnect.php";
mysql_query('SET NAMES cp1251');
mysql_select_db('test', $db);

$id = $_GET['id'];

$name = mysql_result(mysql_query("SELECT `name` FROM `sample` WHERE `id` = $id", $db) , 0);
$number = mysql_result(mysql_query("SELECT `number` FROM `sample` WHERE `id` = $id", $db) , 0);
$info = mysql_result(mysql_query("SELECT `info` FROM `sample` WHERE `id` = $id", $db) , 0);
$status = mysql_result(mysql_query("SELECT `status` FROM `sample` WHERE `id` = $id", $db) , 0);

echo "<table align = 'center' border = '1'>
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
			<td>$name
				</td>
		</tr>
		<tr>
			<td>�����
				</td>
			<td>$number
				</td>
		</tr>
		<tr>
			<td>����������
				</td>
			<td>$info
				</td>
		</tr>
		<tr>
			<td>����
				</td>
			<td>";
				if ($status == '0')
					{echo "����������";}
						else
					{echo "��������";}
echo "			</td>
		</tr>
		<tr>
			<td colspan = '2'>
				&nbsp
				</td>
		</tr>
		<tr>
			<td colspan = '2' align = 'center'>
				<a href = 'sample_form.php'>������ �����</a>
				<br>
				<a href = 'sample_edit.php?id=$id'>����������</a>
				<br>
				<a href = 'sample_del.php?id=$id'>��������</a>
				<br><br>
				<a href = 'sample_list.php'>�����������</a>
				</td>
		</tr>
	</table>";
?>

