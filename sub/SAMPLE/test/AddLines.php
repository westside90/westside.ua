<?php
//������ ��� ��������� � ��������� ����� ����� � �������
//�� ����������� �������� �����
//�������� ������ ����� POST � ��������� ����� GET
//��������� ��������� ��������� � �-���� �����
if (isset($_GET['k']) and $_GET['k'] > 0)
	{$k = $_GET['k'];}
		else
	{$k = 1;}

//�������� ������ ����� ��������
if (isset($_POST['name']))
	{$name = $_POST['name'];
	$number = $_POST['number'];}

//�����  ��������� �����	
echo "<form id = 'add' METHOD = 'POST'>
	<table>
		<tr>
			<td>��'�
				</td>
			<td>�����
				</td>
		</tr>";

//�������� ������ �����
if ($k > 1)
	{ 
	for ($i = 0; $i < $k-1; $i++)
		{
		echo "	<tr>
					<td><input type = 'text' name = 'name[$i]' value = '$name[$i]'>
						</td>
					<td><input type = 'text' name = 'number[$i]' value = '$number[$i]'>
						</td>
				</tr>";
		}
	}

//������� ������ ���� ��������� ���� ������
if ($k > 1 and $k <= count($name))
	{
	$j = $k - 1;
	echo "	<tr>
				<td><input type = 'text' name = 'name[$j]' value = '$name[$j]'>
					</td>
				<td><input type = 'text' name = 'number[$j] value = '$name[$j]'>
					</td>
			</tr>";	
	}

//��������� ������	
if ($k == 1)
	{
	echo "	<tr>
				<td><input type = 'text' name = 'name[0]'>
					</td>
				<td><input type = 'text' name = 'number[0]'>
					</td>
			</tr>";
	}

//���� ������
if ($k > 1 and $k > count($name))
	{
	$j = $k - 1;
	echo "	<tr>
				<td><input type = 'text' name = 'name[$j]'>
					</td>
				<td><input type = 'text' name = 'number[$j]'>
					</td>
			</tr>";
	}

//��������� ��� ������	
$add = $k+1;
$del = $k-1;

//�������� ������ �����
if (count($name) > $k)
	{
	unset($name[$k]);
	unset($number[$k]);
	}

//������ ���������	
echo "	<tr>
			<td><input type = 'submit'
				onclick = \"document.forms.add.action = 'test.php?k=$add'\"
				value = '������ ������'>
				</td>
			<td><input type = 'submit'
				onclick = \"document.forms.add.action = 'test.php?k=$del'\"
				value = '�������� ������'>
				</td>
		</tr>";
	
echo "</table>
	</form>";
?>