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
			<td align='center' valign='middle'>";
			
				//C����� ���������� ����������
				if ($page == 0)
					{echo "<h2>".$language[$lang]['result_list']."</h2>";
					require_once "PHP/result/result_list.php";}
				//����������� ���������� ���������
				if ($page == 1)
					{echo "<h2>".$language[$lang]['result']."</h2>";
					require_once "PHP/result/result_view.php";}
				//��������-�������� �������
				if ($page == 2)
					{echo "<h2>".$language[$lang]['saldo']."</h2>";
					require_once "PHP/result/result_saldo.php";}
				//����� ����� ������
				if ($page == 3)
					{echo "<h2>".$language[$lang]['book']."</h2>";
					require_once "PHP/result/result_book.php";}
					
echo "			</td>
			<td width='250' align='right' valign='top'>";
//�������� ����

//������ ����			
require_once "PHP/block.php";
echo "		</td>
			</tr>
			</table>";
//������ ����

//����� ����
require_once "PHP/footer.php";
//����� ����
?>