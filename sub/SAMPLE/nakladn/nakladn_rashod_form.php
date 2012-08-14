<?php
//Вибір користувача 
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
		
//Номер нової накладної
$sql = mysql_query("SELECT number FROM nakladna_tovary WHERE type = 1");
$n = mysql_num_rows($sql);
$rn_number = mysql_result($sql,$n-1);
if (isset($rn_number))
	{$rn_number = $rn_number+1;}
	else
	{$rn_number = 1;}

//Дата по замовчуванню
$rn_date = date("d.m.y");

//Список контрагентів
$sql = mysql_query("SELECT short_name FROM kontragent");
$n = mysql_num_rows($sql);
for ($i=0; $i<$n; $i++)
	{$rn_receiver[$i] = mysql_result($sql,$i);}

//Список товарів
$sql = mysql_query("SELECT name FROM tovary");
$n = mysql_num_rows($sql);
for ($i=0; $i<$n; $i++)
	{$rn_nomenkl[$i] = mysql_result($sql,$i);}
	
//Форма розхідної накладної	
echo "<form action='/../php/tovary/nakladn_rashod.php' method='post' name='form' id='form'>
		<table width='482' border='0'>
			<tr>
				<th colspan='4' scope='col'>Видаткова накладна № 
					<input type='text' name='rn_number' id='rn_number' width='50' value='$rn_number'>
					</th>
			</tr>
			<tr>
				<td width='144'>Дата
					</td>
				<td colspan='3'>
					<input type='text' name='rn_date' id='pick_date' value='$rn_date'>
					</td>
			</tr>
			<tr>
				<td>Отримувач
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
				<td colspan='4' align='left'>За дорученням
					</td>
			</tr>
			<tr>
				<td>Серія, №
					</td>
				<td width='149'>
					<input type='text' name='rn_zador' id='rn_zador'>
					</td>
				<td width='30'> від 
					</td>
				<td width='141'>
					<input type='text' name='rn_zador_date' id='pick_date' value='$rn_date'>
					</td>
			</tr>
			<tr>
				<td>Через
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
			<td>Найменування
				<br>Партія
				</td>
			<td>Кількість
				</td>
			<td>Ціна
				</td>
			<td>Сума
				</td>
			<td>Залишок
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
								{echo "<option value='$i'>ПН-00$numbPartia[$i] від $datePartia[$i]
									</option>";}
						echo "</select>";
						}
						else
						{echo "Відсутній";}
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
			<td><a href = 'tovary_rashod.php?k=$add'>Додати строку</a>
				</td>
			<td><a href = 'tovary_rashod.php?k=$del'>Видалити строку</a>
				</td>
		</tr>";
	
echo "</table>";

echo "	<table width='480' border='0' cellpadding='0' cellspacing='0'>
			<tr>
				<th width='237' align='left' scope='col'>Всього
					</th>
				<th width='234' align='right' scope='col'>00.00 грн.
					</th>
			</tr>
			<tr>
				<td>
					<br>
					<input type='submit' value='Сформувати накладну'>
					</td>
			</tr>
		</table>
	</form>";
?>