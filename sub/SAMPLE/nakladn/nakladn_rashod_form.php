<?php
//���� ����������� 
$user_db="westside_db";
mysql_select_db($user_db,$db);

if (isset($_GET['k']) and $_GET['k'] > 0)
	{$k = $_GET['k'];}
		else
	{$k = 1;}

if (isset($_GET['selectedTovar']))
	{$selectedTovar = $_GET['selectedTovar'];}
		else
	{$selectedTovar[0] = 0;}
		
//����� ���� ��������
$sql = mysql_query("SELECT number FROM nakladna_tovary WHERE type = 1");
$n = mysql_num_rows($sql);
$rn_number = mysql_result($sql,$n-1);
if (isset($rn_number))
	{$rn_number = $rn_number+1;}
	else
	{$rn_number = 1;}

//���� �� ������������
$rn_date = date("d.m.y");

//������ �����������
$sql = mysql_query("SELECT short_name FROM kontragent");
$n = mysql_num_rows($sql);
for ($i=0; $i<$n; $i++)
	{$rn_receiver[$i] = mysql_result($sql,$i);}

//������ ������
$sql = mysql_query("SELECT name FROM tovary");
$n = mysql_num_rows($sql);
for ($i=0; $i<$n; $i++)
	{$rn_nomenkl[$i] = mysql_result($sql,$i);}
	
//����� �������� ��������	
echo "<form action='/../php/tovary/nakladn_rashod.php' method='post' name='form' id='form'>
		<table width='482' border='0'>
			<tr>
				<th colspan='4' scope='col'>��������� �������� � 
					<input type='text' name='rn_number' id='rn_number' width='50' value='$rn_number'>
					</th>
			</tr>
			<tr>
				<td width='144'>����
					</td>
				<td colspan='3'>
					<input type='text' name='rn_date' id='pick_date' value='$rn_date'>
					</td>
			</tr>
			<tr>
				<td>���������
					</td>
				<td colspan='3'>";

echo "				<select name='rn_receiver' id='rn_receiver' width='200'";
for ($i=0; $i<count($rn_receiver); $i++)    
	{echo "				<option value='$i'>$rn_receiver[$i]
						</option>";}
echo "				</select>
				</td>
			</tr>";
echo "		<tr>
				<td colspan='4' align='left'>�� ����������
					</td>
			</tr>
			<tr>
				<td>����, �
					</td>
				<td width='149'>
					<input type='text' name='rn_zador' id='rn_zador'>
					</td>
				<td width='30'> �� 
					</td>
				<td width='141'>
					<input type='text' name='rn_zador_date' id='pick_date' value='$rn_date'>
					</td>
			</tr>
			<tr>
				<td>�����
					</td>
				<td colspan='3'>
					<input type='text' name='rn_zador_cherez' id='rn_zador_cherez' width='330'>
					</td>
			</tr>
		</table>";

if (isset($_GET['k']) and $_GET['k'] > 0)
	{$k = $_GET['k'];}
		else
	{$k = 1;}

echo "<form>
	<table>
		<tr>
			<td>������������
				<br>�����
				</td>
			<td>ʳ������
				</td>
			<td>ֳ��
				</td>
			<td>����
				</td>
			<td>�������
				</td>
		</tr>";

for ($j = 0; $j < $k; $j++)
	{
	echo "	<tr>
				<td>
					<select name='rn_nomenkl[$j]' id='rn_add$j'
						onchange=\"self.location.href=this.form.rn_add$j.options[this.form.rn_add$j.selectedIndex].value;\">";
						for ($i=0; $i<count($rn_nomenkl); $i++)    
							{echo "<option value = 'tovary_rashod.php?k=$k&selectedTovar[$j]=$i'";
								if ($i == $selectedTovar[$j])
									{echo "selected";}
							echo">$rn_nomenkl[$i]</option>";}
					echo "</select>
						<br>";
					
					$kkstPartia = mysql_num_rows(mysql_query("SELECT number FROM nakladna_tovary WHERE (type=1 AND tovar=$selectedTovar[$j])",$db));
					if ($kkstPartia > 0)
						{
						for ($i = 0; $i < $kkstPartia; $i++)
							{
							$numbPartia[$i] = mysql_result(mysql_query("SELECT number FROM nakladna_tovary WHERE (type=1 AND tovar=$selectedTovar[$j])",$db),$i);
							$datePartia[$i] = mysql_result(mysql_query("SELECT date FROM nakladna_tovary WHERE (type=1 AND tovar=$selectedTovar[$j])",$db),$i);
							}
						echo "<select name='rn_partia[$j]' id='rn_partia'>";
							for ($i=0; $i<$kkstPartia; $i++)    
								{echo "<option value='$i'>��-00$numbPartia[$i] �� $datePartia[$i]
									</option>";}
						echo "</select>";
						}
						else
						{echo "³������";}
echo "				</td>
				<td><input type='text' name = 'kkst[$j]'>
					</td>
				<td><input type = 'text' name = 'cost[$j]'>
					</td>
				<td><input type = 'text' name = 'summa[$j]' disabled>
					</td>
				<td><input type = 'text' name = 'zalyshok[$j]' disabled>
					</td>
			</tr>";
	}

$add = $k+1;
$del = $k-1;

echo "	<tr>
			<td><a href = 'tovary_rashod.php?k=$add'>������ ������</a>
				</td>
			<td><a href = 'tovary_rashod.php?k=$del'>�������� ������</a>
				</td>
		</tr>";
	
echo "</table>";

echo "	<table width='480' border='0' cellpadding='0' cellspacing='0'>
			<tr>
				<th width='237' align='left' scope='col'>������
					</th>
				<th width='234' align='right' scope='col'>00.00 ���.
					</th>
			</tr>
			<tr>
				<td>
					<br>
					<input type='submit' value='���������� ��������'>
					</td>
			</tr>
		</table>
	</form>";
?>