<?php
//ϳ��������� ������
require_once "dbconnect.php";
mysql_query('SET NAMES cp1251');
mysql_select_db('test', $db);
require_once "../function.php";

//�������� ������� �������
if (isset($_GET['pages']))
	{
	if ($_GET['pages'] == 0)
		$pages = 0;
			else	
		$pages = --$_GET['pages'];
	}
		else $pages = 0;
	
//�������� ������� ����������
$orderby = " ORDER BY `id` ASC ";
if (isset($_GET['order']))
	{ 
	$order = $_GET['order'];
	switch ($order)
		{
		case 1: $orderby = " ORDER BY `date` ASC "; break;
		case 2: $orderby = " ORDER BY `date` DESC "; break;
		case 3: $orderby = " ORDER BY `number` ASC "; break;
		case 4: $orderby = " ORDER BY `number` DESC "; break;
		case 5: $orderby = " ORDER BY `name` ASC "; break;
		case 6: $orderby = " ORDER BY `name` DESC "; break;
		}
	}

//��������� ���� � ������� ����, 	
$per_page = getvariable ('per_page', 5);
$n = mysql_num_rows(mysql_query("SELECT `id` FROM `sample`"));
$start = $pages*$per_page;
$num_pages = ceil($n/$per_page);

//�������� �-���� ����� �� �������
if ($pages == $num_pages - 1)
	{$finish = $n % $per_page;
		if ($finish == 0)
			{$finish = $per_page;}
	}
		else
	{$finish = $per_page;}
if ($n == 0) {$finish = 0;}

//������� ������� ���
$i = 0;
$sql = mysql_query("SELECT `id`,`date`,`name`,`number`,`info`,`status` FROM `sample`".$orderby."LIMIT $start,$finish");
while ($sample[$i] = mysql_fetch_array ($sql, MYSQL_ASSOC))	$i++;
?>

<!-- ������� ����� -->
<link rel = 'stylesheet' type = 'text/css' href = '../css/main.css' media = 'all'>
<!-- ������� ����� -->
	
<!-- �������� ����� ����� -->
<table align = 'center' id = 'table'>
	<tr>
		<td align = 'center'>�
			</td>
		<td><? sortheader('����', 0, 0, $per_page, 1, 2, 'sample_list2'); ?>
			</td>
		<td><? sortheader('�����', 0, 0, $per_page, 3, 4, 'sample_list2'); ?>
			</td>
		<td><? sortheader('�����', 0, 0, $per_page, 5, 6, 'sample_list2'); ?>
			</td>
		<td align = 'center'>����������
			</td>
		<td align = 'center'>����
			</td>
		<td align = 'center'>�����������
			</td>
		<td align = 'center'>����������
			</td>
		<td align = 'center'>��������
			</td>
	</tr>
<!-- �������� ����� ����� -->

<?		
//������� ������		
for ($i = 0; $i < $finish; $i++)
	{
	$j=$i+1+$pages*$per_page;

	echo "<tr>
			<td align = 'center'>$j
				</td>
			<td>".$sample[$i]['date']."
				</td>
			<td align = 'left'>��-";
				printf ("%04d", $sample[$i]['number']);
	echo "		</td>
			<td>".$sample[$i]['name']."
				</td>
			<td>".$sample[$i]['info']."
				</td>
			<td align = 'center'>";
				if ($sample[$i]['status'] == 0)
					{echo "<a href = 'sample_make.php?id=".$sample[$i]['id']."'>-</a>";}
				if ($sample[$i]['status'] == 1)
					{echo "<a href = 'sample_make.php?id=".$sample[$i]['id']."'>+</a>";}
	echo "		</td>
			<td align = 'center'>
				<a href = 'sample_view.php?id=".$sample[$i]['id']."&per_page=$i'>³������</a>
				</td>
			<td align = 'center'>
				<a href = 'sample_edit.php?id=".$sample[$i]['id']."&per_page=$i'>���.</a>
				</td>
			<td align = 'center'>
				<a href = 'sample_del.php?id=".$sample[$i]['id']."&per_page=$i' onclick = \"return confirm('�� ����� ������ �������� ������� ".$sample[$i]['name']."?')\">��������</a>
				</td>
		</tr>";
	}

//������������ ��������� �������
echo "<tr>
			<td colspan = 9>�������:";
				for ($i = 1; $i <= $num_pages; $i++)
					{echo "<a href = 'sample_list.php?pages=$i&per_page=$per_page'>$i </a>";}
echo "			</td>
		</tr>
		<tr>
			<td colspan = '9' align = 'center'>
				<a href = 'sample_form.php'>������ �����
					</a>
				</td>
		</tr>
	</table>";

//���� �-���� ����� �� ������� � ������ �������� ��	
echo "<form ACTION = 'sample_list.php' METHOD = 'POST'>
		<input type = 'hidden' name = 'per_page' value = '$per_page'>
		<p align = 'center'>³���������:";
		for ($i = 5; $i <= 15; $i = $i + 5)
			{
			echo " <a href = 'sample_list.php?per_page=$i'>$i</a>";
			}
echo "		</p>
	</form>";
?>