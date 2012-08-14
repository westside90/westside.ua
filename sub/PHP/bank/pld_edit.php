<?php
//Отримуємо ID контрагента
$id = $_GET['id']; 

//Отримуємо дані контрагента по ID
$status = getting('status','pld',"id = $id");
$number = getting('number','pld',"id = $id");
$date = getting('date','pld',"id = $id");
$rahunok_in = getting('rahunok_in','pld',"id = $id");
$kontragent = getting('kontragent','pld',"id = $id");
$rahunok_out = getting('rahunok_out','pld',"id = $id");
$summa = getting('summa','pld',"id = $id");
$description = getting('description','pld',"id = $id");

//Створюємо таблицю з даними по контрагенту


echo "<form ACTION = 'php/pld/pld_update.php' METHOD = 'POST'>
		<table border = '1'>
			<tr>
				<th colspan = '2' scope = 'col'>Платіжне доручення №
				<input type = 'text' name = 'number' value = '$number'>
					</th>
			</tr>
			<tr>
				<td>Дата
					</td>
				<td><input type = 'text' name = 'date' value = '$date'>
					</td>
			</tr>
			<tr>
				<td>Рахунок
					</td>
				<td><input type = 'text' name = 'rahunok_in' value = '$rahunok_in'>
					</td>
			</tr>
			<tr>
				<td colspan = '2'>&nbsp;
					</td>
			</tr>
			<tr>
				<td>Контрагент
					</td>
				<td><select name = 'kontragent' value = '$kontragent'>
					</select>
					</td>
			</tr>
			<tr>
				<td>Рахунок
					</td>
				<td><select name = 'rahunok_out' value = '$rahunok_out'>
					</select>
					</td>
			</tr>
			<tr>
				<td>Сума
					</td>
				<td><input type = 'text' name = 'summa' value = '$summa'>
					</td>
			</tr>
			<tr>
				<td>Призначення
					</td>
				<td><input type = 'text' name = 'description' value = '$description'>
					</td>
			</tr>
		</table>
	</form>";
?>