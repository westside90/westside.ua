<?php
//Номер і дата накладної по замовчуванню
$n = mysql_num_rows (mysql_query ("SELECT `number` FROM `kassa` WHERE `type` = 1"));
if (isset($n) and $n > 0)
	{$number = mysql_result (mysql_query ("SELECT `number` FROM `kassa` WHERE `type` = 1"), $n - 1) + 1;}
	else
	{$number = 1;}

//Вид витрат
if (isset($_GET['make_type']))
	{$make_type = $_GET['make_type'];}
		else
	{$make_type = 0;}

echo "<form ACTION = 'php/kassa/kassa_add.php' METHOD = 'POST' id = 'form'>
		<input type = 'hidden' name = 'type' value = '$type'>
		<table>
			<tr>
				<th colspan = '2' scope = 'col'>Каса за        
					<input type = 'date' name = 'date' value = '$date'>
					</th>
			</tr>
			<tr>
				<td>Номер документу
					</td>
				<td><input type = 'text' name = 'number' value = '$number'>
					</td>
			</tr>
			<tr>
				<td>Залишок на початок
					</td>
				<td><input type = 'text' name = 'begin' value = 'Залишок в кассі' disabled>
					</td>
			</tr>
			<tr>
				<td>Залишок на кінець
					</td>
			<td><input type = 'text' name = 'end' value = 'Залишок після операції' disabled>
				</td>
			</tr>
		</table>
		<br>
		<table>
			<tr>
				<td align = 'center'>Контрагент/витрати
					</td>
				<td align = 'center'>Сума
					</td>
				<td align = 'center'>Призначення
					</td>
			</tr>
				<td align = 'center'>
					<select name = 'make_type' id = 'make_type' 
						onchange = \"self.location.href=this.form.make_type.options[this.form.make_type.selectedIndex].value;\">
						<option value = 'kassa.php?page=2&make_type=1'";
							if ($make_type == 1)
								{echo "selected";}
						echo ">Контрагент
							</option>
						<option value = 'kassa.php?page=2&make_type=0'";
							if ($make_type == 0)
								{echo "selected";}
						echo ">Витрати
							</option>
					</select></br>";
					if ($make_type == 1)
						{kontragent_list(0);}
					if ($make_type == 0)
						{vytraty_list(0);}
echo "				</td>
				<td align = 'center'>
					<input type = 'text' name = 'summa'>
					</td>
				<td align = 'center'>
					<input type = 'text' name = 'description'>
					</td>
			<tr>
				<td colspan = '3' align = 'center'>
					<input type = 'submit' value = 'Додати запис'>
					</td>
			</tr>
			<tr>
				<td colspan = '3'>&nbsp;
					</td>
			</tr>
			<tr>
				<td colspan = '3' align = 'center'>
					<a href = 'kassa.php?page=0'>Повернутись</a>
					</td>
			</tr>
			</tr>
		</table>
	</form>";
?>