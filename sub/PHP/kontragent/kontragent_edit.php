<?php
//�������� ID �����������
$id = $_GET['id']; 

//�������� ��� ����������� �� ID
$sql = mysql_query("SELECT `type`,`group`,`short_name`,`full_name`,`ident_number`,`first_name`,`second_name`,`third_name`,`mob_tel`,`address`,`location`,`tel`,`prymitka` FROM `kontragent` WHERE `id` = $id");
$kontragent = mysql_fetch_array ($sql, MYSQL_ASSOC);
$sql = mysql_query("SELECT `bank_id`,`mfo`,`bank`,`valuta` FROM `rahunki` WHERE `kontragent` = $id");
$rahunki = mysql_fetch_array ($sql, MYSQL_ASSOC);

//��������� ������� � ������ �� �����������
echo "<form ACTION = 'php/kontragent/kontragent_update.php' METHOD = 'POST'>
	<input type = 'hidden' name = 'id' value = '$id'>";
echo "<table id = 'table'>
		<th colspan = '2'>������ ����������� ".$kontragent['short_name']."
			</th>
		<tr>
			<td colspan = '2'>&nbsp;
				</td>
		</tr>
		<tr>
			<td>���
				</td>
			<td>
				<select name = 'type'>
					<option value = '0'";
						if ($kontragent['type'] == 0) {echo " selected";}
					echo ">Գ����� �����</option>
					<option value = '1'";
						if ($kontragent['type'] == 1) {echo " selected";}
					echo ">�������� �����</option>
					</select>";
echo "			</td>
		</tr>
		<tr>
			<td>��������� �����
				</td>
			<td><input type = 'text' name = 'short_name' value = '".$kontragent['short_name']."'>
				</td>
		</tr>
		<tr>
			<td>����� �����
				</td>
			<td><input type = 'text' name = 'full_name' value = '".$kontragent['full_name']."'>
				</td>
		</tr>
		<tr>
			<td>";
				if ($kontragent['type'] = 1)
				{echo "��� ����";}
					else
				{echo "��� ������";}
echo" 			</td>
			<td><input type = 'text' name = 'ident_number' value = '".$kontragent['ident_number']."'>
				</td>
		</tr>
		<tr>
			<td>�������
				</td>
			<td><input type = 'text' name = 'second_name' value = '".$kontragent['second_name']."'>
				</td>
		</tr>
		<tr>
			<td>��`�
				</td>
			<td><input type = 'text' name = 'first_name' value = '".$kontragent['first_name']."'>
				</td>
		</tr>
		<tr>
			<td>��-�������
				</td>
			<td><input type = 'text' name = 'third_name' value = '".$kontragent['third_name']."'>
				</td>
		</tr>
		<tr>
			<td>���. �������
				</td>
			<td><input type = 'text' name = 'mob_tel' value = '".$kontragent['mob_tel']."'>
				</td>
		</tr>
		<tr>
			<td>�������� ������
				</td>
			<td><input type = 'text' name = 'address' value = '".$kontragent['address']."'>
				</td>
		</tr>
		<tr>
			<td>�������� ������
				</td>
			<td><input type = 'text' name = 'location' value = '".$kontragent['location']."'>
				</td>
		</tr>
		<tr>
			<td>����. �������
				</td>
			<td><input type = 'text' name = 'tel' value = '".$kontragent['tel']."'>
				</td>
		</tr>
		<tr>
			<td>� �������
				</td>
			<td><input type = 'text' name = 'bank_id' value = '".$rahunki['bank_id']."'>
				</td>
		</tr>
		<tr>
			<td>���
				</td>
			<td><input type = 'text' name = 'mfo' value = '".$rahunki['mfo']."'>
				</td>
		</tr>
		<tr>
			<td>����
				</td>
			<td><input type = 'text' name = 'bank' value = '".$rahunki['bank']."'>
				</td>
		</tr>
		<tr>
			<td>������ ����������
				</td>
			<td>";
			echo "<select name = 'valuta'>
					<option value = '0'";
						if ($rahunki['valuta'] == 0) {echo " selected";}
					echo ">UAH</option>
					<option value = '1'";
						if ($rahunki['valuta'] == 1) {echo " selected";}
					echo ">RUB</option>
					<option value = '1'";
						if ($rahunki['valuta'] == 2) {echo " selected";}
					echo ">USD</option>
					<option value = '1'";
						if ($rahunki['valuta'] == 3) {echo " selected";}
					echo ">EUR</option>
					</select>";
echo "			</td>
		</tr>
		<tr>
			<td>�������
				</td>
			<td width = '300px'>
				<textarea name = 'prymitka' cols = '32' rows = '3'>".$kontragent['prymitka']."
					</textarea>
				</td>
		</tr>
		<tr>
			<td colspan = '2' align = 'center'>
				<input type = 'submit' value = '��������' onclick = \"return confirm('�� ����� ������ �������� ���� � ".$kontragent['short_name']."?')\">
				</td>
		</tr>
		<tr>
			<td colspan = '2' align = 'center'>
				<a href = 'kontragent.php?page=1'>������ �����</a>
				<br>
				<a href = 'kontragent.php?page=3&id=$id'>����������</a>
				<br>
				<a href = 'php/kontragent/kontragent_del.php?id=$id' onclick = \"return confirm('�� ����� ������ �������� ������� ".$kontragent['short_name']."?')\">��������</a>
				<br><br>
				<a href = 'kontragent.php?page=0'>�����������</a>
				</td>
		</tr>
		
	</table>";
?>