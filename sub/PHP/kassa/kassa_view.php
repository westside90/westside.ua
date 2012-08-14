<?php
//Отримуємо ID контрагента
$id = $_GET['id']; 

//Отримуємо дані касового ордеру по ID
$sql = mysql_query("SELECT `type`,`number`,`date`,`make_type`,`make`,`summa`,`description` FROM `kassa` WHERE `id` = $id");
$kassa = mysql_fetch_array ($sql, MYSQL_ASSOC);
if ($kassa['make_type'] == 1)
	{ $kassa['value'] = mysql_result (mysql_query ("SELECT `short_name` FROM `kontragent` WHERE `id` = ".$kassa['make'].""), 0); }
if ($kassa['make_type'] == 0)
	{ $kassa['value'] = mysql_result (mysql_query ("SELECT `name` FROM `vytraty` WHERE `id` = ".$kassa['make'].""), 0); }

//Створюємо таблицю з даними по контрагенту
echo "	<table>
			<tr>
				<th colspan = '2' scope = 'col'>Каса за ".$kassa['date']."
					</th>
			</tr>
			<tr>
				<td>Номер док-ту
					</td>
				<td>".$kassa['number']."
					</td>
			</tr>
			<tr>
				<td>Тип
					</td>
				<td>";
					if ($kassa['type'] == 0)
						echo "Прихід";
					if ($kassa['type'] == 1)
						echo "Розхід";					
					echo "</td>
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
				<td align = 'center'>".$kassa['value']."
					</td>
				<td align = 'center'>".$kassa['summa']."
					</td>
				<td align = 'center'>".$kassa['description']."
					</td>
			<tr>
				<td colspan = '3'>&nbsp;
					</td>
			</tr>
			<tr>
				<td colspan = '3' align = 'center'>
					<a href = 'kassa.php?page=1'>Додати новий (прихід)</a>
					<br>
					<a href = 'kassa.php?page=2'>Додати новий (розхід)</a>
					<br>
					<a href = 'kassa.php?page=4&id=$id'>Редагувати</a>
					<br>
					<a href = 'php/kassa/kassa_del.php?id=$id'>Видалити</a>
					<br><br>
					<a href = 'kassa.php?page=0'>Повернутись</a>
					</td>
			</tr>
		</table>";
?>