<?php
//�������� ID �����������
$id = $_GET['id']; 

//�������� ��� ����������� �� ID
$sql = mysql_query("SELECT `type`,`group`,`short_name`,`full_name`,`ident_number`,`first_name`,`second_name`,`third_name`,`mob_tel`,`address`,`location`,`tel`,`prymitka` FROM `kontragent` WHERE `id` = $id");
$kontragent = mysql_fetch_array ($sql, MYSQL_ASSOC);
$sql = mysql_query("SELECT `bank_id`,`mfo`,`bank`,`valuta` FROM `rahunki` WHERE `kontragent` = $id");
$rahunki = mysql_fetch_array ($sql, MYSQL_ASSOC);

//��������� ������� � ������ �� �����������
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
			<td>";
			if ($kontragent['type'] == 0)
				{echo "Գ����� �����";}
					else
				{echo "�������� �����";}
echo "			</td>
		</tr>
		<tr>
			<td>����� �����
				</td>
			<td>".$kontragent['full_name']."
				</td>
		</tr>
		<tr>
			<td>�����
				</td>
			<td>";
				$group = $kontragent['group'];
				echo mysql_result(mysql_query("SELECT `name` FROM `group_kontr` WHERE id = $group"), 0);
echo "			</td>
		</tr>
		<tr>
			<td>";
				if ($kontragent['type'] == 1)
				{echo "��� ����";}
					else
				{echo "��� ������";}
echo" 			</td>
			<td>".$kontragent['ident_number']."
				</td>
		</tr>
		<tr>
			<td>�������
				</td>
			<td>".$kontragent['second_name']."
				</td>
		</tr>
		<tr>
			<td>��`�
				</td>
			<td>".$kontragent['first_name']."
				</td>
		</tr>
		<tr>
			<td>��-�������
				</td>
			<td>".$kontragent['third_name']."
				</td>
		</tr>
		<tr>
			<td>���. �������
				</td>
			<td>".$kontragent['mob_tel']."
				</td>
		</tr>
		<tr>
			<td>�������� ������
				</td>
			<td>".$kontragent['address']."
				</td>
		</tr>
		<tr>
			<td>�������� ������
				</td>
			<td>".$kontragent['location']."
				</td>
		</tr>
		<tr>
			<td>����. �������
				</td>
			<td>".$kontragent['tel']."
				</td>
		</tr>
		<tr>
			<td>� �������
				</td>
			<td>".$rahunki['bank_id']."
				</td>
		</tr>
		<tr>
			<td>����
				</td>
			<td>".$rahunki['mfo']." ".$rahunki['bank']."
				</td>
		</tr>
		<tr>
			<td>������ ����������
				</td>
			<td>";
			if ($rahunki['valuta'] == 0)
				{echo "UAH";}
			if ($rahunki['valuta'] == 1)
				{echo "RUB";}
			if ($rahunki['valuta'] == 2)
				{echo "USD";}
			if ($rahunki['valuta'] == 3)
				{echo "EUR";}
echo "			</td>
		</tr>
		<tr>
			<td>�������
				</td>
			<td width = '300px'>".$kontragent['prymitka']."
				</td>
		</tr>
		<tr>
			<td colspan = '2'>
				&nbsp;
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