<?php
//�������� ID �����������
$id = $_GET['id']; 

//�������� ��� ����������� �� ID
$sql = mysql_query("SELECT `post`,`first_name`,`second_name`,`third_name`,`start_date`,`end_date`,`salary`,`social`,
							`ident_number`,`passport`,`organ`,`pass_date`,`address`,`tel`,`prymitka` FROM `worker` WHERE `id` = $id");
$worker = mysql_fetch_array ($sql, MYSQL_ASSOC);
$worker['name'] = $worker['second_name']." ".substr($worker['first_name'],0,1).".".substr($worker['third_name'],0,1).".";
?>

<!-- ��������� ������� � ������ �� ����������� -->

<form ACTION = 'php/worker/worker_update.php' METHOD = 'POST'>
		<input type = 'hidden' name = 'id' value = <?= $id?>'>
		<table>
			<tr>
				<th colspan = '2' scope = 'col'>���������� ����������� <?= $worker['name'] ?></th>
			</tr>
			
		<tr>
			<td>������
				</td>
			<td>
				<input type = 'text' name = 'post' value = '<?= $worker['post'] ?>'>
				</td>
		</tr>			
		<tr>
			<td>�������
				</td>
			<td>
				<input type = 'text' name = 'second_name' value = '<?= $worker['second_name'] ?>'>
				</td>
		</tr>
		<tr>
			<td>��'�
				</td>
			<td>
				<input type = 'text' name = 'first_name' value = '<?= $worker['first_name'] ?>'>
				</td>
		</tr>
		<tr>
			<td>��-�������
				</td>
			<td>
				<input type = 'text' name = 'third_name' value = '<?= $worker['third_name'] ?>'>
				</td>
		</tr>
		<tr>
			<td>���� �������
				</td>
			<td><input type = 'date' name = 'start_date' value = '<?= $worker['start_date'] ?>'>
				</td>
		</tr>
		<tr>
			<td>���� ���������
				</td>
			<td><input type = 'date' name = 'end_date' value = '<?= $worker['end_date'] ?>'>
				</td>
		</tr>
		<tr>
			<td>������
				</td>
			<td><input type = 'text' name = 'salary' value = '<?= $worker['salary'] ?>'>
				</td>
		</tr>
		<tr>
			<td>�������� ������
				</td>
			<td><input type = 'text' name = 'social' value = '<?= $worker['social'] ?>'>
				</td>
		</tr>
		<tr>
			<td>���������������� ����� (����)
				</td>
			<td>
				<input type = 'text' name = 'ident_number' value = '<?= $worker['ident_number'] ?>'>
				</td>
		</tr>
		<tr>
			<td>������� ���� � �����
				</td>
			<td><input type = 'text' name = 'passport' value = '<?= $worker['passport'] ?>'>
				</td>
		</tr>
		<tr>
			<td>��� �������
				</td>
			<td>
				<input type = 'text' name = 'organ' value = '<?= $worker['organ'] ?>'>
				</td>
		</tr>
		<tr>
			<td>���� ������
				</td>
			<td>
				<input type = 'date' name = 'pass_date' value = '<?= $worker['pass_date'] ?>'>
				</td>
		</tr>
		<tr>
			<td>������
				</td>
			<td>
				<input type = 'text' name = 'address' value = '<?= $worker['address'] ?>'>
				</td>
		</tr>
		<tr>
			<td>�������
				</td>
			<td>
				<input type = 'text' name = 'tel' value = '<?= $worker['tel'] ?>'>
				</td>
		</tr>
		<tr>
			<td>�������
				</td>
			<td>
				<textarea name = 'prymitka' cols = '25' rows = '3'>
					<?= $worker['prymitka'] ?>
					</textarea>
				</td>
		</tr>

			<tr>
				<td colspan = '2' align = 'center'><input type = 'submit' value = '�������� ����' onclick = "return confirm('�� ����� ������ �������� ���� � <?= $worker['name']?>?')">
					</td>
			</tr>
			<tr>
				<td colspan = '2'>&nbsp;
					</td>
			</tr>
			<tr>
				<td colspan = '2' align = 'center'>
					<a href = 'worker.php?page=0'>�����������</a>
					</td>
			</tr>
		</table>
	</form>