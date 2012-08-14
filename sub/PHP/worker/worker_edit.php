<?php
//Отримуємо ID контрагента
$id = $_GET['id']; 

//Отримуємо дані контрагента по ID
$sql = mysql_query("SELECT `post`,`first_name`,`second_name`,`third_name`,`start_date`,`end_date`,`salary`,`social`,
							`ident_number`,`passport`,`organ`,`pass_date`,`address`,`tel`,`prymitka` FROM `worker` WHERE `id` = $id");
$worker = mysql_fetch_array ($sql, MYSQL_ASSOC);
$worker['name'] = $worker['second_name']." ".substr($worker['first_name'],0,1).".".substr($worker['third_name'],0,1).".";
?>

<!-- Створюємо таблицю з даними по контрагенту -->

<form ACTION = 'php/worker/worker_update.php' METHOD = 'POST'>
		<input type = 'hidden' name = 'id' value = <?= $id?>'>
		<table>
			<tr>
				<th colspan = '2' scope = 'col'>Редагувати співробітника <?= $worker['name'] ?></th>
			</tr>
			
		<tr>
			<td>Посада
				</td>
			<td>
				<input type = 'text' name = 'post' value = '<?= $worker['post'] ?>'>
				</td>
		</tr>			
		<tr>
			<td>Прізвище
				</td>
			<td>
				<input type = 'text' name = 'second_name' value = '<?= $worker['second_name'] ?>'>
				</td>
		</tr>
		<tr>
			<td>Ім'я
				</td>
			<td>
				<input type = 'text' name = 'first_name' value = '<?= $worker['first_name'] ?>'>
				</td>
		</tr>
		<tr>
			<td>По-батькові
				</td>
			<td>
				<input type = 'text' name = 'third_name' value = '<?= $worker['third_name'] ?>'>
				</td>
		</tr>
		<tr>
			<td>Дата прийому
				</td>
			<td><input type = 'date' name = 'start_date' value = '<?= $worker['start_date'] ?>'>
				</td>
		</tr>
		<tr>
			<td>Дата звільнення
				</td>
			<td><input type = 'date' name = 'end_date' value = '<?= $worker['end_date'] ?>'>
				</td>
		</tr>
		<tr>
			<td>Ставка
				</td>
			<td><input type = 'text' name = 'salary' value = '<?= $worker['salary'] ?>'>
				</td>
		</tr>
		<tr>
			<td>Соціальні внески
				</td>
			<td><input type = 'text' name = 'social' value = '<?= $worker['social'] ?>'>
				</td>
		</tr>
		<tr>
			<td>Ідентифікаційний номер (ДРФО)
				</td>
			<td>
				<input type = 'text' name = 'ident_number' value = '<?= $worker['ident_number'] ?>'>
				</td>
		</tr>
		<tr>
			<td>Паспорт серія і номер
				</td>
			<td><input type = 'text' name = 'passport' value = '<?= $worker['passport'] ?>'>
				</td>
		</tr>
		<tr>
			<td>Ким виданий
				</td>
			<td>
				<input type = 'text' name = 'organ' value = '<?= $worker['organ'] ?>'>
				</td>
		</tr>
		<tr>
			<td>Дата видачі
				</td>
			<td>
				<input type = 'date' name = 'pass_date' value = '<?= $worker['pass_date'] ?>'>
				</td>
		</tr>
		<tr>
			<td>Адреса
				</td>
			<td>
				<input type = 'text' name = 'address' value = '<?= $worker['address'] ?>'>
				</td>
		</tr>
		<tr>
			<td>Телефон
				</td>
			<td>
				<input type = 'text' name = 'tel' value = '<?= $worker['tel'] ?>'>
				</td>
		</tr>
		<tr>
			<td>Примітки
				</td>
			<td>
				<textarea name = 'prymitka' cols = '25' rows = '3'>
					<?= $worker['prymitka'] ?>
					</textarea>
				</td>
		</tr>

			<tr>
				<td colspan = '2' align = 'center'><input type = 'submit' value = 'Зберегти зміни' onclick = "return confirm('Ви дійсно бажаєте зберегти зміни у <?= $worker['name']?>?')">
					</td>
			</tr>
			<tr>
				<td colspan = '2'>&nbsp;
					</td>
			</tr>
			<tr>
				<td colspan = '2' align = 'center'>
					<a href = 'worker.php?page=0'>Повернутись</a>
					</td>
			</tr>
		</table>
	</form>