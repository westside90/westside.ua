<?php
//�������� ID �����������
$id = $_GET['id']; 

//�������� ��� ����������� �� ID
$sql = mysql_query("SELECT `post`,`first_name`,`second_name`,`third_name`,`start_date`,`end_date`,`salary`,`social`,
							`ident_number`,`passport`,`organ`,`pass_date`,`address`,`tel`,`prymitka` FROM `worker` WHERE `id` = $id");
$worker = mysql_fetch_array ($sql, MYSQL_ASSOC);
?>

<!-- ��������� ������� � ������ �� ����������� -->
<table>
	<tr>
		<th colspan = '2' scope = 'col'>���������� �� �����������
			</th>
	</tr>
	<tr>
		<td>������
			</td>
		<td><?= $worker['post'] ?>
			</td>
	</tr>			
	<tr>
		<td>�������
			</td>
		<td><?= $worker['second_name'] ?>
			</td>
	</tr>
	<tr>
		<td>��'�
			</td>
		<td><?= $worker['first_name'] ?>
			</td>
	</tr>
	<tr>
		<td>��-�������
			</td>
		<td><?= $worker['third_name'] ?>
			</td>
	</tr>
	<tr>
		<td>���� �������
			</td>
		<td><?= $worker['start_date'] ?>
			</td>
	</tr>
	<tr>
		<td>���� ���������
			</td>
		<td><?= $worker['end_date'] ?>
			</td>
	</tr>
	<tr>
		<td>������
			</td>
		<td><?= $worker['salary'] ?>
			</td>
	</tr>
	<tr>
		<td>�������� ������
			</td>
		<td><?= $worker['social'] ?>
			</td>
	</tr>
	<tr>
		<td>���������������� ����� (����)
			</td>
		<td><?= $worker['ident_number'] ?>
			</td>
	</tr>
	<tr>
		<td>������� ���� � �����
			</td>
		<td><?= $worker['passport'] ?>
			</td>
	</tr>
	<tr>
		<td>��� �������
			</td>
		<td><?= $worker['organ'] ?>
			</td>
	</tr>
	<tr>
		<td>���� ������
			</td>
		<td><?= $worker['pass_date'] ?>
			</td>
	</tr>
	<tr>
		<td>������
			</td>
		<td><?= $worker['address'] ?>
			</td>
	</tr>
	<tr>
		<td>�������
			</td>
		<td><?= $worker['tel'] ?>
			</td>
	</tr>
	<tr>
		<td>�������
			</td>
		<td><?= $worker['prymitka']; ?>
			</td>
	</tr>
		<td colspan = '2'>
			&nbsp;
			</td>
	</tr>
	<tr>
		<td colspan = '2' align = 'center'>
			<a href = 'worker.php?page=1'>������ �����</a>
			<br>
			<a href = 'worker.php?page=3&id=$id'>����������</a>
			<br>
			<a href = 'php/worker/worker_del.php?id=$id'>��������</a>
			<br><br>
			<a href = 'worker.php?page=0'>�����������</a>
			</td>
	</tr>
</table>