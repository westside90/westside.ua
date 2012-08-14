<?php
//Параметри коннекта з БД
require_once "dbconnect.php";
mysql_query('SET NAMES cp1251');
require_once "html/header.html";
require_once "html/menu.html";

//Параметри користувача
$user_db="westside_db";
mysql_select_db($user_db,$db);

//Номер накладної по замовчуванню
$sql = mysql_query("SELECT number FROM nakladna_tovary WHERE type = 0");
$n = mysql_num_rows($sql);
$pn_number = mysql_result($sql,$n-1);
if (isset($pn_number))
	{$pn_number = $pn_number+1;}
	else
	{$pn_number = 1;}

//Дата по замовчуванню	
$pn_date = date("d.m.y");

//Список контрагентів
$sql = mysql_query("SELECT short_name FROM kontragent");
$n = mysql_num_rows($sql);
for ($i=0; $i<$n; $i++)
	{$pn_receiver[$i] = mysql_result($sql,$i);}

//Список товарів	
$sql = mysql_query("SELECT name FROM tovary");
$n = mysql_num_rows($sql);
for ($i=0; $i<$n; $i++)
	{$pn_add[$i] = mysql_result($sql,$i);}

//Форма прихідної накладної	
echo "<form action='/php/tovary/nakladn_prihod.php' method='post' id = 'add'>
		<table width='482' border='0'>
			<tr>
				<th colspan='4' scope='col'>Прибуткова накладна № 
					<input type='text' name='pn_number' id='pn_number' value='$pn_number' width='50'>
					</th>
			</tr>
			<tr>
				<td width='144'>Дата
					</td>
				<td width='320' colspan='3'>
					<input type='text' name='pn_date' id='pick_date' value='$pn_date'>
					</td>
			</tr>
			<tr>
				<td>Постачальник
					</td>
				<td colspan='3'>";

echo "				<select name='receiver' id='pn_receiver' width='200'>";
for ($i=0; $i<count($pn_receiver); $i++)    
	{echo "			<option value='$i'>$pn_receiver[$i]
						</option>";}
echo "				</select>
					</td>
			</tr>
		</table>";

//Перевіряєм існування параметра з к-кстю строк		
if (isset($_GET['k']) and $_GET['k'] > 0)
	{$k = $_GET['k'];}
		else
	{$k = 1;}
	
//Отримуємо введені раніше значення
if (isset($_POST['add']))
	{$add = $_POST['add'];
	$kkst = $_POST['kkst'];
	$cost = $_POST['cost'];}

//Форма  додавання строк	
echo "<table>
		<tr>
			<td>Найменування
				</td>
			<td>Кількість
				</td>
			<td>Ціна
				</td>
			<td>Сума
				</td>
		</tr>";

//Основний массив строк
if ($k > 1)
	{ 
	for ($j = 0; $j < $k-1; $j++)
		{
	echo "	<tr>
				<td>
					<select name='add[$j]' id='pn_add'>";
					for ($i=0; $i<count($pn_add); $i++)    
	{echo "			<option value='$i' ";
	if ($add[$j] == $i) {echo "selected";}
	echo ">$pn_add[$i]
						</option>";}
echo "				</select>
					</td>";
	
echo "			<td>
					<input type='text' name='kkst[$j]' value = '$kkst[$j]'>
					</td>
				<td>
					<input type='text' name='cost[$j]' value = '$cost[$j]'>
						</td>
				<td>
					<input type='text' name='summa[$j]' disabled>
					</td>
			</tr>";
		}
	}

//Остання строка після видалення нової строки
if ($k > 1 and $k <= count($add))
	{
	$j = $k - 1;
	echo "	<tr>
				<td>
					<select name='add[$j]' id='pn_add'>";
					for ($i=0; $i<count($pn_add); $i++)    
	{echo "			<option value='$i' ";
	if ($add[$j] == $i) {echo "selected";}
	echo ">$pn_add[$i]
						</option>";}
echo "				</select>
					</td>";
	
echo "			<td>
					<input type='text' name='kkst[$j]' value = '$kkst[$j]'>
					</td>
				<td>
					<input type='text' name='cost[$j]' value = '$kkst[$j]'>
						</td>
				<td>
					<input type='text' name='summa[$j]' disabled>
					</td>
			</tr>";
	}

//Початкова строка	
if ($k == 1)
	{
	echo "	<tr>
				<td>
					<select name='add[0]' id='pn_add'>";
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
			</tr>";
	}

//Нова строка
if ($k > 1 and $k > count($add))
	{
	$j = $k - 1;
	echo "	<tr>
				<td>
					<select name='add[$j]' id='pn_add'>";
					for ($i=0; $i<count($pn_add); $i++)    
	{echo "			<option value='$i'>$pn_add[$i]
						</option>";}
echo "				</select>
					</td>";
	
echo "			<td>
					<input type='text' name='kkst[$j]'>
					</td>
				<td>
					<input type='text' name='cost[$j]'>
						</td>
				<td>
					<input type='text' name='summa[$j]' disabled>
					</td>
			</tr>";
	}
	
//Параметри для кнопок	
$add = $k+1;
$del = $k-1;

//Знищення зайвих даних
if (count($add) > $k)
	{
	unset($add[$k]);
	unset($kkst[$k]);
	unset($cost[$k]);
	}

//Кнопки управління	
echo "	<tr>
			<td><input type = 'submit'
				onclick = \"document.forms.add.action = 'tovary_prihod.php?k=$add'\"
				value = 'Додати строку'>
				</td>
			<td><input type = 'submit'
				onclick = \"document.forms.add.action = 'tovary_prihod.php?k=$del'\"
				value = 'Видалити строку'>
				</td>
		</tr>";
	
echo "</table>";

echo "<table width='480' border='0' cellpadding='0' cellspacing='0'>
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

//Нижній колонтитул
require_once "html/footer.html";
?>