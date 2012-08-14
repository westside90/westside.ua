<?php
//Номер і дата накладної по замовчуванню
$n = mysql_num_rows (mysql_query ("SELECT `number` FROM `pld`"));
if (isset($n) and $n > 0)
	{$number = mysql_result (mysql_query ("SELECT `number` FROM `pld`"), $n - 1) + 1;}
	else
	{$number = 1;}
	
echo "<form ACTION = 'php/bank/pld_add.php' METHOD = 'POST'>
		<table>
			<tr>
				<th colspan = '2' scope = 'col'>Платіжне доручення №
				<input type = 'text' name = 'number' value = '$number'>
					</th>
			</tr>
			<tr>
				<td>Дата
					</td>
				<td><input type = 'date' name = 'date' value = '$date'>
					</td>
			</tr>
			<tr>
				<td>Рахунок
					</td>
				<td>"; rahunki_list(0,0);
					echo "</td>
			</tr>
			<tr>
				<td colspan = '2'>&nbsp;
					</td>
			</tr>
			<tr>
				<td>Контрагент
					</td>
				<td>"; kontragent_list(0);
					echo "</td>
			</tr>
			<tr>
				<td>Рахунок
					</td>
				<td>"; rahunki_list(1,9);
					echo "</td>
			</tr>
			<tr>
				<td>Сума
					</td>
				<td><input type = 'text' name = 'summa'>
					</td>
			</tr>
			<tr>
				<td>Призначення
					</td>
				<td><input type = 'text' name = 'description'>
					</td>
			</tr>
			<tr></tr>
			<tr>
				<td colspan = '2'>
					<input type = 'submit' value = 'Зберегти платіжне доручення'>
					</td>
			</tr>
		</table>
	</form>";
?>