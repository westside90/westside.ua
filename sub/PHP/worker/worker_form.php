<form ACTION = 'php/worker/worker_add.php' METHOD = 'POST'>
	<table border = '1'>
		<tr>
			<th colspan = '2' scope = 'col'>Новий співробітник</th>
		</tr>
		<tr>
			<td>Посада
				</td>
			<td>
				<input type = 'text' name = 'post'>
				</td>
		</tr>			
		<tr>
			<td>Прізвище
				</td>
			<td>
				<input type = 'text' name = 'second_name'>
				</td>
		</tr>
		<tr>
			<td>Ім'я
				</td>
			<td>
				<input type = 'text' name = 'first_name'>
				</td>
		</tr>
		<tr>
			<td>По-батькові
				</td>
			<td>
				<input type = 'text' name = 'third_name'>
				</td>
		</tr>
		<tr>
			<td>Дата прийому
				</td>
			<td><input type = 'date' name = 'start_date'>
				</td>
		</tr>
		<tr>
			<td>Дата звільнення
				</td>
			<td><input type = 'date' name = 'end_date'>
				</td>
		</tr>
		<tr>
			<td>Ставка
				</td>
			<td><input type = 'text' name = 'salary'>
				</td>
		</tr>
		<tr>
			<td>Соціальні внески
				</td>
			<td><input type = 'text' name = 'social'>
				</td>
		</tr>
		<tr>
			<td>Ідентифікаційний номер (ДРФО)
				</td>
			<td>
				<input type = 'text' name = 'ident_number'>
				</td>
		</tr>
		<tr>
			<td>Паспорт серія і номер
				</td>
			<td><input type = 'text' name = 'passport'>
				</td>
		</tr>
		<tr>
			<td>Ким виданий
				</td>
			<td>
				<input type = 'text' name = 'organ'>
				</td>
		</tr>
		<tr>
			<td>Дата видачі
				</td>
			<td>
				<input type = 'date' name = 'pass_date'>
				</td>
		</tr>
		<tr>
			<td>Адреса
				</td>
			<td>
				<input type = 'text' name = 'address'>
				</td>
		</tr>
		<tr>
			<td>Телефон
				</td>
			<td>
				<input type = 'text' name = 'tel'>
				</td>
		</tr>
		<tr>
			<td>Примітки
				</td>
			<td>
				<textarea name = 'prymitka' cols = '25' rows = '3'>
					</textarea>
				</td>
		</tr>
		<tr>
			<td colspan = '2' align = 'center'>
				<input type = 'submit' value = 'Додати співробітника'>
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