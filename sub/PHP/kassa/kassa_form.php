<?php
//����� � ���� �������� �� ������������
$n = mysql_num_rows (mysql_query ("SELECT `number` FROM `kassa` WHERE `type` = 1"));
if (isset($n) and $n > 0)
	{$number = mysql_result (mysql_query ("SELECT `number` FROM `kassa` WHERE `type` = 1"), $n - 1) + 1;}
	else
	{$number = 1;}

//��� ������
if (isset($_GET['make_type']))
	{$make_type = $_GET['make_type'];}
		else
	{$make_type = 0;}

echo "<form ACTION = 'php/kassa/kassa_add.php' METHOD = 'POST' id = 'form'>
		<input type = 'hidden' name = 'type' value = '$type'>
		<table>
			<tr>
				<th colspan = '2' scope = 'col'>���� ��        
					<input type = 'date' name = 'date' value = '$date'>
					</th>
			</tr>
			<tr>
				<td>����� ���������
					</td>
				<td><input type = 'text' name = 'number' value = '$number'>
					</td>
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
						<option value = 'kassa.php?page=2&make_type=1'";
							if ($make_type == 1)
								{echo "selected";}
						echo ">����������
							</option>
						<option value = 'kassa.php?page=2&make_type=0'";
							if ($make_type == 0)
								{echo "selected";}
						echo ">�������
							</option>
					</select></br>";
					if ($make_type == 1)
						{kontragent_list(0);}
					if ($make_type == 0)
						{vytraty_list(0);}
echo "				</td>
				<td align = 'center'>
					<input type = 'text' name = 'summa'>
					</td>
				<td align = 'center'>
					<input type = 'text' name = 'description'>
					</td>
			<tr>
				<td colspan = '3' align = 'center'>
					<input type = 'submit' value = '������ �����'>
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