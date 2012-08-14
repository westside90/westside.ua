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
echo "<table border = '1'>
		<tr>
			<th colspan = '2' scope = 'col'>Платіжне доручення № $number
				</th>
		</tr>
		<tr>
			<td>Дата
				</td>
			<td>$date
				</td>
		</tr>
		<tr>
			<td>Рахунок
				</td>
			<td>$rahunok_in
				</td>
		</tr>
		<tr>
			<td colspan = '2'>&nbsp;
				</td>
		</tr>
		<tr>
			<td>Контрагент
				</td>
			<td>$kontragent
				</select>
				</td>
		</tr>
		<tr>
			<td>Рахунок
				</td>
			<td>$rahunok_out
				</select>
				</td>
		</tr>
		<tr>
			<td>Сума
				</td>
			<td>$summa
				</td>
		</tr>
		<tr>
			<td>Призначення
				</td>
			<td>$description
				</td>
		</tr>
	</table>";
?>