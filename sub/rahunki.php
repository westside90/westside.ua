<?php
//����� ����� � ����
require_once "PHP/header.php";
require_once "PHP/menu.php";
//����� ����� � ����

//�������� ��� �������
if (isset($_GET['page'])) { $page = $_GET['page']; } else { $page = 0; }
//�������� ��� �������

//�������� ����
echo "<table width='100%'>
		<tr>
			<td align='center' valign='top'>";
			
				//������ �������
				if ($page == 0)
					{echo "<h2>".$language[$lang]['rahunki_list']."</h2>";
					require_once "PHP/nomenklatura/rahunki_list.php";}
				//������ �������
				if ($page == 1)
					{echo "<h2>������ �������</h2>";
					require_once "PHP/nomenklatura/rahunki_form.php";}
				//���������� �������
				if ($page == 2)
					{echo "<h2>����������� �������</h2>";
					require_once "PHP/nomenklatura/rahunki_edit.php";}

echo "			</td>
			<td width='250' align='right' valign='top'>";
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