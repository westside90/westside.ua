<?php
//�������� ID �����������
$id = $_GET['id']; 

//�������� ��� ����������� �� ID
$sql = mysql_query("SELECT `type`,`number`,`date`,`make_type`,`make`,`summa`,`description` FROM `kassa` WHERE `id` = $id");
$kassa = mysql_fetch_array ($sql, MYSQL_ASSOC);

if (isset($_GET['make_type']))
	{$kassa['make_type'] = $_GET['make_type'];}

//��������� ������� � ������ �� �����������
echo "<form ACTION = 'php/kassa/kassa_update.php' METHOD = 'POST' id = 'form'>
		<input type = 'hidden' name = 'id' value = '$id'>
		<table>
			<tr>
				<th colspan = '2' scope = 'col'>���� ��        
					<input type = 'text' name = 'date' value = '".$kassa['date']."'>
					</th>
			</tr>
			<tr>
				<td>����� ���������
					</td>
				<td><input type = 'text' name = 'number' value = '".$kassa['number']."'>
					</td>
			</tr>
			<tr>
				<td>��� ���������
					</td>
				<td>";
					if ($kassa['type'] == 0)
						echo "������";
					if ($kassa['type'] == 1)
						echo "������";					
					echo "</td>
			</tr>
			<tr>
				<td>������� �� �������
					</td>
				<td><input type = 'text' name = 'begin' value = '������� � ����' disabled>
					</td>
			</tr>
			<tr>
				<td>������� �� �����
					</td>
			<td><input type = 'text' name = 'end' value = '������� ���� ��������' disabled>
				</td>
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
				<td align = 'center'>
					<select name = 'make_type' id = 'make_type' 
						onchange = \"self.location.href=this.form.make_type.options[this.form.make_type.selectedIndex].value;\">
						<option value = 'kassa.php?page=4&make_type=1&id=$id'";
							if ($kassa['make_type'] == 1)
								{echo "selected";}
						echo ">����������
							</option>
						<option value = 'kassa.php?page=4&make_type=0&id=$id'";
							if ($kassa['make_type'] == 0)
								{echo "selected";}
						echo ">�������
							</option>
					</select></br>";
					if ($kassa['make_type'] == 1)
						{kontragent_list($kassa['make']);}
					else
						{
						if ($kassa['type'] = 0)
							{ income_list($kassa['make']); }
						if ($kassa['type'] = 1)
							{ vytraty_list($kassa['make']); }
						}
echo "				</td>
				<td align = 'center'>
					<input type = 'text' name = 'summa' value = '".$kassa['summa']."'>
					</td>
				<td align = 'center'>
					<input type = 'text' name = 'description' value = '".$kassa['description']."'>
					</td>
			<tr>
				<td colspan = '3' align = 'center'>
					<input type = 'submit' value = '�������� ����'>
					</td>
			</tr>
			<tr>
				<td colspan = '3'>&nbsp;
					</td>
			</tr>
			<tr>
				<td colspan = '3' align = 'center'>
					<a href = 'kassa.php?page=0'>�����������</a>
					</td>
			</tr>
			</tr>
		</table>
	</form>";
?>