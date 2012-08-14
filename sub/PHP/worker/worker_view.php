<?php
//Отримуємо ID контрагента
$id = $_GET['id']; 

//Отримуємо дані контрагента по ID
$sql = mysql_query("SELECT `post`,`first_name`,`second_name`,`third_name`,`start_date`,`end_date`,`salary`,`social`,
							`ident_number`,`passport`,`organ`,`pass_date`,`address`,`tel`,`prymitka` FROM `worker` WHERE `id` = $id");
$worker = mysql_fetch_array ($sql, MYSQL_ASSOC);
?>

<!-- Створюємо таблицю з даними по контрагенту -->
<table>
	<tr>
		<th colspan = '2' scope = 'col'>Інформація по співробітнику
			</th>
	</tr>
	<tr>
		<td>Посада
			</td>
		<td><?= $worker['post'] ?>
			</td>
	</tr>			
	<tr>
		<td>Прізвище
			</td>
		<td><?= $worker['second_name'] ?>
			</td>
	</tr>
	<tr>
		<td>Ім'я
			</td>
		<td><?= $worker['first_name'] ?>
			</td>
	</tr>
	<tr>
		<td>По-батькові
			</td>
		<td><?= $worker['third_name'] ?>
			</td>
	</tr>
	<tr>
		<td>Дата прийому
			</td>
		<td><?= $worker['start_date'] ?>
			</td>
	</tr>
	<tr>
		<td>Дата звільнення
			</td>
		<td><?= $worker['end_date'] ?>
			</td>
	</tr>
	<tr>
		<td>Ставка
			</td>
		<td><?= $worker['salary'] ?>
			</td>
	</tr>
	<tr>
		<td>Соціальні внески
			</td>
		<td><?= $worker['social'] ?>
			</td>
	</tr>
	<tr>
		<td>Ідентифікаційний номер (ДРФО)
			</td>
		<td><?= $worker['ident_number'] ?>
			</td>
	</tr>
	<tr>
		<td>Паспорт серія і номер
			</td>
		<td><?= $worker['passport'] ?>
			</td>
	</tr>
	<tr>
		<td>Ким виданий
			</td>
		<td><?= $worker['organ'] ?>
			</td>
	</tr>
	<tr>
		<td>Дата видачі
			</td>
		<td><?= $worker['pass_date'] ?>
			</td>
	</tr>
	<tr>
		<td>Адреса
			</td>
		<td><?= $worker['address'] ?>
			</td>
	</tr>
	<tr>
		<td>Телефон
			</td>
		<td><?= $worker['tel'] ?>
			</td>
	</tr>
	<tr>
		<td>Примітки
			</td>
		<td><?= $worker['prymitka']; ?>
			</td>
	</tr>
		<td colspan = '2'>
			&nbsp;
			</td>
	</tr>
	<tr>
		<td colspan = '2' align = 'center'>
			<a href = 'worker.php?page=1'>Додати новий</a>
			<br>
			<a href = 'worker.php?page=3&id=$id'>Редагувати</a>
			<br>
			<a href = 'php/worker/worker_del.php?id=$id'>Видалити</a>
			<br><br>
			<a href = 'worker.php?page=0'>Повернутись</a>
			</td>
	</tr>
</table>