<?php
//Знаходимо залишки по рахункам
$sql = mysql_query ("SELECT `id`,`name` FROM `rahunki` WHERE `kontragent` = 0");
while ($info[] = mysql_fetch_array ($sql, MYSQL_ASSOC));
$n_info = count($info) - 1;
unset($info[$n_info]);
for ($i = 0; $i < $n_info; $i++)
	{
	$sql1 = mysql_query ("SELECT SUM(`summa`) FROM `bv` WHERE `type` = 0 AND status = 1 AND DATE(`date`) <= '".$date."' AND `rahunok` = ".$info[$i]['id']."");
	$sql2 = mysql_query ("SELECT SUM(`summa`) FROM `bv` WHERE `type` = 1 AND status = 1 AND DATE(`date`) <= '".$date."' AND `rahunok` = ".$info[$i]['id']."");
	$info[$i]['saldo'] = 0 + mysql_result ($sql1, 0) - mysql_result ($sql2, 0);
	}
//Знаходимо залишки по рахункам

echo "<div align = 'right'>
		<table width = '250px' class = 'drop-shadow lifted'>
			<tr>
				<td align = 'center' valign = 'middle'>
				<strong>Авторизація
					</strong><br>";
					require_once "PHP/login.php";
					echo "</td>
			</tr>
			</tr>
				<td align = 'center'><a href = 'plan.php'>Список проводок</a>
					<input type = 'button' value = 'Дані реєстрації на сайті'
					onClick = 'WinObj = window.open(\"PHP/registration_form.php\", \"\", 
					\"width = 300px, height = 500px, toolbar = 0, status = 0, top = 300px, left = 300px\");'>
					</td>
			<tr>
			<tr>
				<td height = '100' align = 'center' valign = 'middle'>Дані по рахункам:
					<ul>";
						for ($i = 0; $i < $n_info; $i++)
							{
							echo "<li>".$info[$i]['name']." - ".$info[$i]['saldo']." грн.</li>";
							}
						echo "</ul>
					</td>
			</tr>
			<tr>
				<td height = '150' align = 'center' valign = 'middle'>Дані по товарам:
					</td>
			</tr>
			<tr>
				<td height = '100' align = 'center' valign = 'middle'>Звітність
					</td>
			</tr>
		</table>
	</div>";
?>