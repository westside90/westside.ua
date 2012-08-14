<?php
//Список рахунків
function rahunki_list($selected, $kontragent, $k)
	{
	$sql = mysql_query ("SELECT `id`,`bank_id`,`mfo`,`bank` FROM `rahunki` WHERE `kontragent` = ".$kontragent."");
	while($rahunki_list[] = mysql_fetch_array($sql, MYSQL_ASSOC));
	$n = count($rahunki_list) - 1;
	unset($rahunki_list[$n]);
	echo "<select name = 'rahunok' onchange = \"document.forms.form.action = 'javatest2.php?k=".$k."'; document.form.submit();\">";
	echo "<option value = '0'";
	if ($selected == 0) {echo " selected";}
	echo "> ...вибрати рахунок</option>";
		for ($i = 0; $i < $n; $i++)
			{
			if ($kontragent != 0)
				{
				$rahunki_list[$i]['name'] = $rahunki_list[$i]['mfo'].", ".$rahunki_list[$i]['bank'].", ".$rahunki_list[$i]['bank_id'];
				echo "<option value = '".$rahunki_list[$i]['id']."'";
					if ($selected == $rahunki_list[$i]['id']) {echo " selected";}
				echo ">".$rahunki_list[$i]['name']."</option>";
				}
			}
	echo "</select>";	
	}
//Список рахунків
?>