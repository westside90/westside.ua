<?php
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
		case 1: $orderby = " ORDER BY `group` ASC "; break;
		case 2: $orderby = " ORDER BY `group` DESC "; break;
		case 3: $orderby = " ORDER BY `name` ASC "; break;
		case 4: $orderby = " ORDER BY `name` DESC "; break;
		case 5: $orderby = " ORDER BY `full_name` ASC "; break;
		case 6: $orderby = " ORDER BY `full_name` DESC "; break;
		}
	}

//��������� ���� 	
$per_page = getvariable ('per_page', 15);
$n = mysql_num_rows(mysql_query("SELECT `id` FROM `nomenklatura`"));
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


?>
		
<!-- �������� ����� ����� -->
<table align = 'center' id = 'table' class = 'drop-shadow lifted'>
	<tr>
		<td align = 'center'>�
			</td>
		<td><? sortheader2('���', $per_page, 1, 2, 'nomenklatura.php?page=0&'); ?>
			</td>
		<td><? sortheader2('������������', $per_page, 3, 4, 'nomenklatura.php?page=0&'); ?>
			</td>
		<td><? sortheader2('����� �����', $per_page, 5, 6, 'nomenklatura.php?page=0&'); ?>
			</td>
		<td align = 'center'>������� �����
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
			<td>";
				if ($nomenklatura[$i]['type'] == 0)
					{ echo "�����"; }
				if ($nomenklatura[$i]['type'] == 1)
					{ echo "�������"; }
	echo "		</td>
			<td>".$nomenklatura[$i]['name']."
				</td>
			<td>".$nomenklatura[$i]['full_name']."
				</td>
			<td>";
				$units = $nomenklatura[$i]['units'];
				echo mysql_result ( mysql_query ("SELECT `name` FROM `units` WHERE `id` = $units"), 0);
	echo " 		</td>
			<td align = 'center'>
				<a href = 'nomenklatura.php?page=2&id=".$nomenklatura[$i]['id']."&per_page=$i'>���.</a>
				</td>
			<td align = 'center'>
				<a href = 'php/nomenklatura/nomenklatura_del.php?id=".$nomenklatura[$i]['id']."' onclick = \"return confirm('�� ����� ������ �������� ������� ".$nomenklatura[$i]['name']."?')\">��������</a>
				</td>
		</tr>";
	}
	
//������������ ��������� �������
echo "<tr>
			<td colspan = 9>�������:";
				for ($i = 1; $i <= $num_pages; $i++)
					{echo "<a href = 'nomenklatura.php?page=0&pages=$i&per_page=$per_page'>$i </a>";}
echo "			</td>
		</tr>
		<tr>
			<td colspan = '9' align = 'center'>
				<a href = 'nomenklatura.php?page=1'>������ �����
					</a>
				</td>
		</tr>
	</table>";

//���� �-���� ����� �� �������	
echo "<form ACTION = 'nomenklatura.php?page=0' METHOD = 'POST'>
		<input type = 'hidden' name = 'per_page' value = '$per_page'>
		<p align = 'center'>³���������:";
		for ($i = 5; $i <= 15; $i = $i + 5)
			{
			echo " <a href = 'nomenklatura.php?page=0&per_page=$i'>$i</a>";
			}
echo "		</p>
	</form>";
?>