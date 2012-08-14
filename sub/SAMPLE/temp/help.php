WinObj = window.open("", "", "width = 300px, height = 310px, toolbar = 0, status = 0, top = 300px, left = 300px"); - создание дочернего окна;
window.outerHeight=(window.outerHeight+20); - изменения размера окна;
document.form.submit(); - оправка формы;
opener.location.reload(); - перезагрузка родителя;
document.forms.form.action='#'; - изменение action формы;

********************************************************

if (confirm('Закрити не зберігаючи?')) { window.close(); opener.location.reload(); }

********************************************************

if (confirm('Зберегти документ?'))
	{
	if (confirm('Провести документ?'))
		{ document.forms.form.action='nakladna_prihod_add.php?k=<?= $k ?>&status=1'; }
	else
		{ document.forms.form.action='nakladna_prihod_add.php?k=<?= $k ?>&status=0'; }
	document.form.submit();
	opener.location.reload();
	}

********************************************************	

if (confirm('Зберегти документ?')) { document.form.submit(); opener.location.reload(); }

********************************************************

WinObj = window.open("../nomenklatura/nomenklatura_form.php", "", "width = 300px, height = 310px, toolbar = 0, status = 0, top = 300px, left = 300px");
WinObj = window.open("../kontragent/kontragent_form.php", "", "width = 300px, height = 310px, toolbar = 0, status = 0, top = 300px, left = 300px");