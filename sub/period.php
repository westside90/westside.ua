<?
$date = date("Y-m-d");
if (!isset($_GET['period'])) $_GET['period'] = 0;
?>

<form name = 'form'
	action = ''
	method = 'GET'>
<input type = 'radio' name = 'period' value = '0' onchange = 'document.form.submit();' <? if ($_GET['period'] == 0) echo "checked"; ?>>����: 
	<input type = 'date' name = 'day' value = '<?= $date ?>' <? if ($_GET['period'] != 0) echo "disabled"; ?>>
	<br>
<input type = 'radio' name = 'period' value = '1' onchange = 'document.form.submit();' <? if ($_GET['period'] == 1) echo "checked"; ?>>̳����: 
	<select name = 'month' <? if ($_GET['period'] != 1) echo "disabled"; ?>>
		<option value = '1'>ѳ����</option>
		<option value = '2'>�����</option>
		<option value = '3'>��������</option>
		<option value = '4'>������</option>
		<option value = '5'>�������</option>
		<option value = '6'>�������</option>
		<option value = '7'>������</option>
		<option value = '8'>�������</option>
		<option value = '9'>��������</option>
		<option value = '10'>�������</option>
		<option value = '11'>��������</option>
		<option value = '12'>�������</option>
	</select>
	<br>
<input type = 'radio' name = 'period' value = '2' onchange = 'document.form.submit();' <? if ($_GET['period'] == 2) echo "checked"; ?>>�������
	<select name = 'kvartal' <? if ($_GET['period'] != 2) echo "disabled"; ?>>
		<option value = '1'>I �������</option>
		<option value = '2'>II �������</option>
		<option value = '3'>III �������</option>
		<option value = '4'>IV �������</option>
	</select>
	<br>
<input type = 'radio' name = 'period' value = '3' onchange = 'document.form.submit();' <? if ($_GET['period'] == 3) echo "checked"; ?>>����� � 
	<input type = 'date' name = 'start_date' value = '<?= $date ?>' <? if ($_GET['period'] != 3) echo "disabled"; ?>>
	<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; �� <input type = 'date' name = 'end_date' value = '<?= $date ?>' <? if ($_GET['period'] != 3) echo "disabled"; ?>>
	<br>
<input type = 'button' value = '������� �����' onclick = 'document.form.submit;'>
</form>