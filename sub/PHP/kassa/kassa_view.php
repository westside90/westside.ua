<?php
//�������� ID �����������
$id = $_GET['id']; 

//�������� ��� �������� ������ �� ID
$sql = mysql_query("SELECT `type`,`number`,`date`,`make_type`,`make`,`summa`,`description` FROM `kassa` WHERE `id` = $id");
$kassa = mysql_fetch_array ($sql, MYSQL_ASSOC);
if ($kassa['make_type'] == 1)
	{ $kassa['value'] = mysql_result (mysql_query ("SELECT `short_name` FROM `kontragent` WHERE `id` = ".$kassa['make'].""), 0); }
if ($kassa['make_type'] == 0)
	{ $kassa['value'] = mysql_result (mysql_query ("SELECT `name` FROM `vytraty` WHERE `id` = ".$kassa['make'].""), 0); }

//��������� ������� � ������ �� �����������
echo "	<table>
			<tr>
				<th colspan = '2' scope = 'col'>���� �� ".$kassa['date']."
					</th>
			</tr>
			<tr>
				<td>����� ���-��
					</td>
				<td>".$kassa['number']."
					</td>
			</tr>
			<tr>
				<td>���
					</td>
				<td>";
					if ($kassa['type'] == 0)
						echo "������";
					if ($kassa['type'] == 1)
						echo "������";					
					echo "</td>
			</tr>
		</table>
		<br>
		<table>
			<tr>
				<td align = 'center'>����������/�������
					</td>
				<td align = 'center'>����
					</td>
				<td align = 'center'>�����������
					</td>
			</tr>
				<td align = 'center'>".$kassa['value']."
					</td>
				<td align = 'center'>".$kassa['summa']."
					</td>
				<td align = 'center'>".$kassa['description']."
					</td>
			<tr>
				<td colspan = '3'>&nbsp;
					</td>
			</tr>
			<tr>
				<td colspan = '3' align = 'center'>
					<a href = 'kassa.php?page=1'>������ ����� (������)</a>
					<br>
					<a href = 'kassa.php?page=2'>������ ����� (������)</a>
					<br>
					<a href = 'kassa.php?page=4&id=$id'>����������</a>
					<br>
					<a href = 'php/kassa/kassa_del.php?id=$id'>��������</a>
					<br><br>
					<a href = 'kassa.php?page=0'>�����������</a>
					</td>
			</tr>
		</table>";
?>