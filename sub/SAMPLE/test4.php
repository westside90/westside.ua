<?php
$sel = $_GET['sel'];
$mass = array ('один', 'два', 'три', 'чотрири', 'п`ять', 'шість', 'сім', 'вісім');
?>
<form name = 'form'>
<select name = 'sel' onchange = "self.location.href=this.form.sel.options[this.form.sel.selectedIndex].value;">
	<?php for ($i = 0; $i < count($mass); $i++)
		{
		echo "<option value = 'test4.php?sel=$i'";
			if ($sel == $i) {echo " selected";}
		echo ">$mass[$i]</option>?>";
		} ?>
</select>
</form>