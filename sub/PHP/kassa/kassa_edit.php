<?php
//Отримуємо ID контрагента
$id = $_GET['id']; 

//Отримуємо дані контрагента по ID
$sql = mysql_query("SELECT `type`,`number`,`date`,`make_type`,`make`,`summa`,`description` FROM `kassa` WHERE `id` = $id");
$kassa = mysql_fetch_array ($sql, MYSQL_ASSOC);

if (isset($_GET['make_type']))
	{$kassa['make_type'] = $_GET['make_type'];}

//Створюємо таблицю з даними по контрагенту
echo "<form ACTION = 'php/kassa/kassa_update.php' METHOD = 'POST' id = 'form'>
		<input type = 'hidden' name = 'id' value = '$id'>
		<table>
			<tr>
				<th colspan = '2' scope = 'col'>Каса за        
					<input type = 'text' name = 'date' value = '".$kassa['date']."'>
					</th>
			</tr>
			<tr>
				<td>Номер документу
					</td>
				<td><input type = 'text' name = 'number' value = '".$kassa['number']."'>
					</td>
			</tr>
			<tr>
				<td>Тип документу
					</td>
				<td>";
					if ($kassa['type'] == 0)
						echo "Прихід";
					if ($kassa['type'] == 1)
						echo "Розхід";					
					echo "</td>
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
						<option value = 'kassa.php?page=4&make_type=1&id=$id'";
							if ($kassa['make_type'] == 1)
								{echo "selected";}
						echo ">Контрагент
							</option>
						<option value = 'kassa.php?page=4&make_type=0&id=$id'";
							if ($kassa['make_type'] == 0)
								{echo "selected";}
						echo ">Витрати
							</option>
					</select></br>";
					if ($kassa['make_type'] == 1)
						{kontragent_list($kassa['make']);}
					else
						{
						if ($kassa['type'] = 0)
							{ income_list($kassa['make']); }
						if ($kassa['type'] = 1)
							{ vytraty_list($kassa['make']); }
						}
echo "				</td>
				<td align = 'center'>
					<input type = 'text' name = 'summa' value = '".$kassa['summa']."'>
					</td>
				<td align = 'center'>
					<input type = 'text' name = 'description' value = '".$kassa['description']."'>
					</td>
			<tr>
				<td colspan = '3' align = 'center'>
					<input type = 'submit' value = 'Зберегти зміни'>
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