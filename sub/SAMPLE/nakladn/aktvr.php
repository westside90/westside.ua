<?php
//��������� �������� � ��
require_once "dbconnect.php";
mysql_query('SET NAMES cp1251');
require_once "html/header.html";
require_once "html/menu.html";

//��������� �����������
$user_db="westside_db";
mysql_select_db($user_db,$db);

//����� ���� �� ������������
$sql = mysql_query("SELECT number FROM akt_poslugi");
$n = mysql_num_rows($sql);
$pn_number = mysql_result($sql,$n-1);
if (isset($pn_number))
	{$pn_number = $pn_number+1;}
	else
	{$pn_number = 1;}

//���� �� ������������	
$pn_date = date("d.m.y");

//������ �����������
$sql = mysql_query("SELECT short_name FROM kontragent");
$n = mysql_num_rows($sql);
for ($i=0; $i<$n; $i++)
	{$pn_receiver[$i] = mysql_result($sql,$i);}

//������ ������	
$sql = mysql_query("SELECT name FROM poslugi");
$n = mysql_num_rows($sql);
for ($i=0; $i<$n; $i++)
	{$pn_add[$i] = mysql_result($sql,$i);}

//����� ���� ��������� ����
echo "<form action='php/poslugi/aktvr.php' method='post' name='aktvr'>
		<table width='482' border='0'>
			<tr>
				<th colspan='4' scope='col'>��� ��������� ���� � 
					<input type='text' name='pn_number' id='pn_number' value='$pn_number' width='50'>
					</th>
			</tr>
			<tr>
				<td>
					</td>
				<td><input type='radio' name='akt' value='0' checked>����� �������<br>
					<input type='radio' name='akt' value='1'>������� �������
					</td>
			</tr>
			<tr>
				<td width='144'>����
					</td>
				<td width='320' colspan='3'>
					<input type='text' name='pn_date' id='pick_date' value='$pn_date'>
					</td>
			</tr>
			<tr>
				<td>������������
					</td>
				<td colspan='3'>";

echo "				<select name='pn_receiver' id='pn_receiver' width='200'>";
for ($i=0; $i<count($pn_receiver); $i++)    
	{echo "			<option value='$i'>$pn_receiver[$i]
						</option>";}
echo "				</select>
					</td>
			</tr>
		</table>";

echo "<span id='table'>
		<table border=0 cellspacing=0 cellpadding=3 halign='center'>
			<caption><br>
				</caption>
			<tr>
				<td>������������
					</td>
				<td>ʳ������
					</td>
				<td>ֳ��
					</td>
				<td>����
					</td>
				<td>
					<a href='#' onclick='return addline();'>������
						</a>
					</td>
			</tr>
			<tr id='newline' nomer='[0]'>";

echo "			<td>
					<select name='pn_add[0]' id='pn_add'>";
for ($i=0; $i<count($pn_add); $i++)    
	{echo "			<option value='$i'>$pn_add[$i]
						</option>";}
echo "				</select>
					</td>";
	
echo "			<td>
					<input type='text' name='kkst[0]'>
					</td>
				<td>
					<input type='text' name='cost[0]'>
						</td>
				<td>
					<input type='text' name='summa[0]' disabled>
					</td>
				<td valign='top'>
					<a href='#' onclick='return rmline(0);'>��������
						</a>
					</td>
			</tr>
		</table>
	</span>
	<br>";

echo "<table width='480' border='0' cellpadding='0' cellspacing='0'>
		<tr>
			<th width='237' align='left' scope='col'>������
				</th>
			<th width='234' align='right' scope='col'>00.00 ���.
				</th>
		</tr>
		<tr>
			<td>
				<br>
				<input type='submit' value='���������� ���'>
					</td>
		</tr>
	</table>
</form>";


//����� ����������
require_once "html/footer.html";
?>