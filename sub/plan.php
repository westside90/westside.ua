<?php
//Шапка сайту і меню
require_once "PHP/header.php";
if ($logkey) { require_once "PHP/menu.php"; }
//Шапка сайту і меню

//Основний блок
echo "<table width='100%'>
		<tr>
			<td align = 'center' valign = 'top'>";
			
			$sql = mysql_query ("SELECT `document`,`date`,`number`,`kontragent`,`summa`,`debet`,`kredit` FROM `plan`");
			$n = mysql_num_rows($sql);
			while ($plan[] = mysql_fetch_array($sql, MYSQL_ASSOC));
			unset($plan['$n']);
			
			for ($i = 0; $i < $n; $i++)
				{
				switch ($plan[$i]['document'])
					{
					case 0: $plan[$i]['document_name'] = "Прихідна накладна"; break;
					case 1: $plan[$i]['document_name'] = "Розхідна накладна"; break;
					case 2: $plan[$i]['document_name'] = "Акт наданих послуг"; break;
					case 3: $plan[$i]['document_name'] = "Акт отриманих послуг"; break;
					case 4: $plan[$i]['document_name'] = "Банківська виписка"; break;
					case 5: $plan[$i]['document_name'] = "Касовий лист"; break;
					case 6: $plan[$i]['document_name'] = "Фінансові результати"; break;
					}
				if ($plan[$i]['document'] == 0 OR $plan[$i]['document'] == 1 OR $plan[$i]['document'] == 2 OR $plan[$i]['document'] == 3)
					{
					$plan[$i]['kontragent_name'] = mysql_result (mysql_query ("SELECT `short_name` FROM `kontragent` WHERE `id` = ".$plan[$i]['kontragent'].""), 0);
					}
				if ($plan[$i]['document'] == 4)
					{
					if ($plan[$i]['debet'] == 92 OR $plan[$i]['kredit'] == 41)
						{ $plan[$i]['kontragent_name'] = mysql_result (mysql_query ("SELECT `name` FROM `vytraty` WHERE `id` = ".$plan[$i]['kontragent'].""), 0); }
					if ($plan[$i]['debet'] == 631 OR $plan[$i]['kredit'] == 361)
						{ $plan[$i]['kontragent_name'] = mysql_result (mysql_query ("SELECT `short_name` FROM `kontragent` WHERE `id` = ".$plan[$i]['kontragent'].""), 0); }
						
					$plan[$i]['kontragent_name'] .= " по рах. ".mysql_result (mysql_query ("SELECT `name` FROM `rahunki` WHERE `id` = ".$plan[$i]['number'].""), 0);
					}
				if ($plan[$i]['document'] == 5)
					{
					if ($plan[$i]['debet'] == 92 OR $plan[$i]['kredit'] == 41)
						{ $plan[$i]['kontragent_name'] = mysql_result (mysql_query ("SELECT `name` FROM `vytraty` WHERE `id` = ".$plan[$i]['kontragent'].""), 0); }
					if ($plan[$i]['debet'] == 631 OR $plan[$i]['kredit'] == 361)
						{ $plan[$i]['kontragent_name'] = mysql_result (mysql_query ("SELECT `short_name` FROM `kontragent` WHERE `id` = ".$plan[$i]['kontragent'].""), 0); }
					}
				if ($plan[$i]['document'] == 6)
					{
					$plan[$i]['kontragent_name'] = "-";
					}
				if ($plan[$i]['document'] == 4 OR $plan[$i]['document'] == 5 OR $plan[$i]['document'] == 6)
					{
					$plan[$i]['number'] = "-";
					}
				$plan[$i]['summa'] = number_format($plan[$i]['summa'], 2, '.', ' ')." грн.";
				}
			
			echo "<table border = '1'>";
			echo "<tr>
					<td><b>№</b>
						</td>
					<td><b>Документ</b>
						</td>
					<td><b>Дата</b>
						</td>
					<td><b>Номер</b>
						</td>
					<td><b>Контрагент</b>
						</td>
					<td><b>Сума</b>
						</td>
					<td><b>Дебет</b>
						</td>
					<td><b>Кредит</b>
						</td>
				</tr>
				<tr>
					<td colspan = '8'>&nbsp;
						</td>
				</tr>";
			
			for ($i = 0; $i < $n; $i++)
				{
				echo "<tr>
					<td>".($i+1)."
						</td>
					<td>".$plan[$i]['document_name']."
						</td>
					<td>".$plan[$i]['date']."
						</td>
					<td>".$plan[$i]['number']."
						</td>
					<td>".$plan[$i]['kontragent_name']."
						</td>
					<td>".$plan[$i]['summa']."
						</td>
					<td>".$plan[$i]['debet']."
						</td>
					<td>".$plan[$i]['kredit']."
						</td>
				</tr>";
				}
			
			echo "</table>";
				
			//echo "<pre>";
			//print_r($plan);
			//echo "</pre>";
			
echo "			</td>
			<td width = '250' align = 'right' valign = 'top'>";
//Основний блок
			
//Правий блок	
require_once "PHP/block.php";
echo "			</td>
		</tr>
	</table>";
//Правий блок

//Нижній блок
require_once "PHP/footer.php";
//Нижній блок
?>