<?php
//��������� �������� � ��
header('Content-Type: text/html; charset=1251'); 
require_once "dbconnect.php";
mysql_query('SET NAMES cp1251');

//��������� �����������
$user_db = "westside_db";
mysql_select_db($user_db, $db);

//����� ����� � ����
require_once "html/header.html";
require_once "html/menu.html";

//�������� ��� �������
$page = $_GET['page'];

//������� �������
echo "<table width='100%'>
		<tr>
			<td align='center' valign='top'>";
			
				//������ ������������
				if ($page == 0)
					{echo "<h2>������ �������</h2>";
					require_once "php/rahunki/rahunki_list.php";}
				//������ ������������
				if ($page == 1)
					{echo "<h2>������ �������</h2>";
					require_once "php/rahunki/rahunki_form.php";}
				//���������� ������������
				if ($page == 2)
					{echo "<h2>���������� �������</h2>";
					require_once "php/rahunki/rahunki_edit.php";}				

echo "			</td>
			<td width='250' align='right' valign='top'>";

//������ ����			
require_once "html/right_block.html";

echo "			</td>
			</tr>
		</table>";

//����� ����
require_once "html/footer.html";
?>