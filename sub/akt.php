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
			
				//������ ����
				if ($page == 0)
					{echo "<h2>".$language[$lang]['akt_list']."</h2>";
					require_once "PHP/akt/akt_list.php";}
				//������ ��� ������� ������
				if ($page == 1)
					{echo "<h2>".$language[$lang]['akt_prihod']."</h2>";
					$document = 0;
					require_once "PHP/akt/akt_form.php";}
				//������ ��� ��������� ������
				if ($page == 2)
					{echo "<h2>".$language[$lang]['akt_rashod']."</h2>";
					$document = 1;
					require_once "PHP/akt/akt_form.php";}
				//������ ������� �� ������
				if ($page == 3)
					{echo "<h2>".$language[$lang]['rno']."</h2>";
					$document = 2;
					require_once "PHP/akt/akt_rno_form.php";}
				//���������� ���
				if ($page == 4)
					{echo "<h2>".$language[$lang]['edit'].$language[$lang]['akt_prihod_v']."</h2>";
					require_once "PHP/akt/akt_edit.php";}
				//���������� ������� �� ������
				if ($page == 5)
					{echo "<h2>".$language[$lang]['edit'].$language[$lang]['rno_v']."</h2>";
					require_once "PHP/akt/akt_rno_edit.php";}
					
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