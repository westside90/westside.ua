WinObj = window.open("", "", "width = 300px, height = 310px, toolbar = 0, status = 0, top = 300px, left = 300px"); - �������� ��������� ����;
window.outerHeight=(window.outerHeight+20); - ��������� ������� ����;
document.form.submit(); - ������� �����;
opener.location.reload(); - ������������ ��������;
document.forms.form.action='#'; - ��������� action �����;

********************************************************

if (confirm('������� �� ���������?')) { window.close(); opener.location.reload(); }

********************************************************

if (confirm('�������� ��������?'))
	{
	if (confirm('�������� ��������?'))
		{ document.forms.form.action='nakladna_prihod_add.php?k=<?= $k ?>&status=1'; }
	else
		{ document.forms.form.action='nakladna_prihod_add.php?k=<?= $k ?>&status=0'; }
	document.form.submit();
	opener.location.reload();
	}

********************************************************	

if (confirm('�������� ��������?')) { document.form.submit(); opener.location.reload(); }

********************************************************

WinObj = window.open("../nomenklatura/nomenklatura_form.php", "", "width = 300px, height = 310px, toolbar = 0, status = 0, top = 300px, left = 300px");
WinObj = window.open("../kontragent/kontragent_form.php", "", "width = 300px, height = 310px, toolbar = 0, status = 0, top = 300px, left = 300px");