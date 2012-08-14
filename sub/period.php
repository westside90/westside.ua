<?
$date = date("Y-m-d");
if (!isset($_GET['period'])) $_GET['period'] = 0;
?>

<form name = 'form'
	action = ''
	method = 'GET'>
<input type = 'radio' name = 'period' value = '0' onchange = 'document.form.submit();' <? if ($_GET['period'] == 0) echo "checked"; ?>>День: 
	<input type = 'date' name = 'day' value = '<?= $date ?>' <? if ($_GET['period'] != 0) echo "disabled"; ?>>
	<br>
<input type = 'radio' name = 'period' value = '1' onchange = 'document.form.submit();' <? if ($_GET['period'] == 1) echo "checked"; ?>>Місяць: 
	<select name = 'month' <? if ($_GET['period'] != 1) echo "disabled"; ?>>
		<option value = '1'>Січень</option>
		<option value = '2'>Лютий</option>
		<option value = '3'>Березень</option>
		<option value = '4'>Квітень</option>
		<option value = '5'>Травень</option>
		<option value = '6'>Червень</option>
		<option value = '7'>Липень</option>
		<option value = '8'>Серпень</option>
		<option value = '9'>Вересень</option>
		<option value = '10'>Жовтень</option>
		<option value = '11'>Листопад</option>
		<option value = '12'>Грудень</option>
	</select>
	<br>
<input type = 'radio' name = 'period' value = '2' onchange = 'document.form.submit();' <? if ($_GET['period'] == 2) echo "checked"; ?>>Квартал
	<select name = 'kvartal' <? if ($_GET['period'] != 2) echo "disabled"; ?>>
		<option value = '1'>I квартал</option>
		<option value = '2'>II квартал</option>
		<option value = '3'>III квартал</option>
		<option value = '4'>IV квартал</option>
	</select>
	<br>
<input type = 'radio' name = 'period' value = '3' onchange = 'document.form.submit();' <? if ($_GET['period'] == 3) echo "checked"; ?>>Період з 
	<input type = 'date' name = 'start_date' value = '<?= $date ?>' <? if ($_GET['period'] != 3) echo "disabled"; ?>>
	<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; по <input type = 'date' name = 'end_date' value = '<?= $date ?>' <? if ($_GET['period'] != 3) echo "disabled"; ?>>
	<br>
<input type = 'button' value = 'Вибрати період' onclick = 'document.form.submit;'>
</form>