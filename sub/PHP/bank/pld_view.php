<?php
//�������� ID �����������
$id = $_GET['id']; 

//�������� ��� ����������� �� ID
$status = getting('status','pld',"id = $id");
$number = getting('number','pld',"id = $id");
$date = getting('date','pld',"id = $id");
$rahunok_in = getting('rahunok_in','pld',"id = $id");
$kontragent = getting('kontragent','pld',"id = $id");
$rahunok_out = getting('rahunok_out','pld',"id = $id");
$summa = getting('summa','pld',"id = $id");
$description = getting('description','pld',"id = $id");

//��������� ������� � ������ �� �����������
echo "<table border = '1'>
		<tr>
			<th colspan = '2' scope = 'col'>������� ��������� � $number
				</th>
		</tr>
		<tr>
			<td>����
				</td>
			<td>$date
				</td>
		</tr>
		<tr>
			<td>�������
				</td>
			<td>$rahunok_in
				</td>
		</tr>
		<tr>
			<td colspan = '2'>&nbsp;
				</td>
		</tr>
		<tr>
			<td>����������
				</td>
			<td>$kontragent
				</select>
				</td>
		</tr>
		<tr>
			<td>�������
				</td>
			<td>$rahunok_out
				</select>
				</td>
		</tr>
		<tr>
			<td>����
				</td>
			<td>$summa
				</td>
		</tr>
		<tr>
			<td>�����������
				</td>
			<td>$description
				</td>
		</tr>
	</table>";
?>