<?php
//����� ����� � ����
require_once "PHP/header.php";
if ($logkey) { require_once "PHP/menu.php"; }
//����� ����� � ����

//�������� ��� �������
if (isset($_GET['page'])) { $page = $_GET['page']; } else { $page = 0; }
//�������� ��� �������

//�������� ����
echo "<table width='100%'>
		<tr>
			<td align = 'center' valign = 'top'>";
?>
<table width = '100%'>
	<tr>
		<td valign = 'top'>
			<?
			$sql = mysql_query ("SELECT * FROM `users`.`personal` WHERE `user` = 0");
			if (mysql_num_rows ($sql) > 0) $personal = mysql_fetch_array ($sql, MYSQL_ASSOC);
			$sql = mysql_query ("SELECT * FROM `users`.`reestr` WHERE `user` = 0");
			if (mysql_num_rows ($sql) > 0) $reestr = mysql_fetch_array ($sql, MYSQL_ASSOC);
			?>
			<table width = '100%' border = '1'>
				<tr>
					<td align = 'left' valign = 'top'>
						<b>������� </b><? if (isset($personal)) echo $personal['second_name']; ?>
						<br>
						<b>��'� </b><? if (isset($personal)) echo $personal['first_name']; ?>
						<br>
						<b>��-������� </b><? if (isset($personal)) echo $personal['third_name']; ?>
						<br>
						<b>���� ���������� </b><? if (isset($personal)) echo $personal['birth_date']; ?>
						<br>
						<b>���������������� ����� </b><? if (isset($personal)) echo $personal['ident_number']; ?>
						<br>
						<b>������ </b><? if (isset($personal)) echo $personal['address']; ?>
						<br>
						<b>������� </b><? if (isset($personal)) echo $personal['tel']; ?>
						<br>
						<b>���� ������� ������ </b><? if (isset($personal)) echo $personal['start_date']; ?>
						<br><br>
						<input type = 'button' value = '������ ������� ��� ��������'
								onClick = 'WinObj = window.open("PHP/reg_personal_form.php", "", 
								"width = 300px, height = 500px, toolbar = 0, status = 0, top = 300px, left = 300px");'>
						</td>
				<tr>
				<tr>
					<td align = 'left' valign = 'top'>
						<b>���� �������� ��������� </b><? if (isset($reestr)) echo $reestr['derzh_date']; ?>
						<br>
						<b>����� �������� (�������)</b><? if (isset($reestr)) echo $reestr['derzh_number']; ?>
						<br>
						<b>����� ��������� </b><? if (isset($reestr)) echo $reestr['derzh_organ']; ?>
						<br><br>
						<b>���� ��������� ��������� (����� � 4-���)</b><? if (isset($reestr)) echo $reestr['dpi_date']; ?>
						<br>
						<b>����� ��������� </b><? if (isset($reestr)) echo $reestr['dpi_kod'].", ".$reestr['dpi_organ'].", ".$reestr['dpi_ident']; ?>
						<br><br>
						<b>������� ������� �������:</b>
						<br>
						<b>����� </b><? if (isset($reestr)) echo $reestr['cert_group']; ?>
						<br>
						<b>������ </b><? if (isset($reestr)) echo $reestr['cert_stavka']; ?>
						<br>
						<b>�������� ��� ������ ������� �������:</b>
						<br>
						<b>����</b> <? if (isset($reestr)) echo $reestr['cert_seria']; ?> <b>�����</b> <? if (isset($reestr)) echo $reestr['cert_number']; ?> <b>��</b> <? if (isset($reestr)) echo $reestr['cert_date']; ?>
						<br>
						<b>���� ��������:</b>
						<? for ($i = 0; $i < count($reestr['kved']); $i++): ?>
						<br>
						<? endfor; ?>
						<br>46.39 ��������������� ������ �������
						<br>47.78 �������� �������
						<br><br>
						<b>���� ������ �� ���� � ��� </b><? if (isset($reestr)) echo $reestr['pfu_date']; ?>
						<br>
						<b>������������ ����� </b><? if (isset($reestr)) echo $reestr['pfu_ident']; ?>
						<br>
						<b>��������� ��� </b><? if (isset($reestr)) echo $reestr['pfu_kod'].", ".$reestr['pfu_organ']; ?>
						<br><br>
						<input type = 'button' value = '������ ��� �������� ���������'
								onClick = 'WinObj = window.open("PHP/reg_reestr_form.php", "", 
								"width = 600px, height = 600px, toolbar = 0, status = 0, top = 300px, left = 300px");'>
						</td>
				<tr>
			</table>
			</td>
		<td valign = 'top'>
			<form name = 'form'
				action = ''
				method = 'POST'>
			<table width = '100%' border = '1'>
				<tr>
					<td align = 'left' valign = 'top'>
						<table border = '1' width = '100%'>
							<tr>
								<td>�
									</td>
								<td>�����
									</td>
								<td>����� �������
									</td>
								<td>���, ����
									</td>
								<td>������
									</td>
								<td>��������
									</td>
							</tr>
							<?
							//�������� �������� �������
							$sql = mysql_query("SELECT `id`,`name`,`bank_id`,`mfo`,`bank`,`valuta` FROM `rahunki` WHERE `kontragent` = 0");
							while ($rahunok[] = mysql_fetch_array($sql, MYSQL_ASSOC));
							$k = count($rahunok)-1;
							unset($rahunok[$k]);
							//�������� �������� �������
							for ($i = 0; $i < $k; $i++)
								{
								echo "<tr>
									<td>".($i + 1)."
										</td>
									<td>".$rahunok[$i]['name']."
										</td>
									<td>".$rahunok[$i]['bank_id']."
										</td>
									<td>".$rahunok[$i]['mfo'].", ".$rahunok[$i]['bank']."
										</td>
									<td>���.
										</td>
									<td><input type = 'button' value = '��������'
										onclick = \"if (confirm('�� ����� ������ �������� ".$rahunok[$i]['name']."')) { document.forms.form.action = 'PHP/reg_bank_del.php?id=".$rahunok[$i]['id']."'; document.form.submit(); }\">
										</td>
								</tr>";
								}
							?>
						</table>
						</form>
						<br><br>
						<input type = 'button' value = '������ �������'
								onClick = 'WinObj = window.open("PHP/reg_bank_form.php", "", 
								"width = 300px, height = 500px, toolbar = 0, status = 0, top = 300px, left = 300px");'>
						</td>
				<tr>
				<tr>
					<td align = 'left' valign = 'top'>
						�������� �������
						<br><br>
						<input type = 'button' value = '������ ������� �� ������'
								onClick = 'WinObj = window.open("PHP/nakladna/nakladna_ost_form.php", "", 
								"width = 650, height = 300px, toolbar = 0, status = 0, top = 200px, left = 200px");'>
						<br>
						<input type = 'button' value = '������ ������� �� ���'
								onClick = 'WinObj = window.open("", "", 
								"width = 650, height = 300px, toolbar = 0, status = 0, top = 200px, left = 200px");'>
						<br>
						<input type = 'button' value = '������ ������� �� ���������� ��������'
								onClick = 'WinObj = window.open("", "", 
								"width = 650, height = 300px, toolbar = 0, status = 0, top = 200px, left = 200px");'>
						</td>
				<tr>
			</table>
			</td>
	</tr>
</table>
<?				

echo "			</td>
			<td width = '250' align = 'right' valign = 'top'>";
//�������� ����
			
//������ ����	
require_once "PHP/block.php";
echo "			</td>
		</tr>
	</table>";
//������ ����

//����� ����
require_once "PHP/footer.php";
//����� ����
?>
