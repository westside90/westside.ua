<?php
//Отримуємо ID контрагента
$id = $_GET['id']; 

//Отримуємо дані контрагента по ID
$sql = mysql_query("SELECT `type`,`group`,`short_name`,`full_name`,`ident_number`,`first_name`,`second_name`,`third_name`,`mob_tel`,`address`,`location`,`tel`,`prymitka` FROM `kontragent` WHERE `id` = $id");
$kontragent = mysql_fetch_array ($sql, MYSQL_ASSOC);
$sql = mysql_query("SELECT `bank_id`,`mfo`,`bank`,`valuta` FROM `rahunki` WHERE `kontragent` = $id");
$rahunki = mysql_fetch_array ($sql, MYSQL_ASSOC);

//Створюємо таблицю з даними по контрагенту
echo "<table id = 'table'>
		<th colspan = '2'>Картка контрагента ".$kontragent['short_name']."
			</th>
		<tr>
			<td colspan = '2'>&nbsp;
				</td>
		</tr>
		<tr>
			<td>Тип
				</td>
			<td>";
			if ($kontragent['type'] == 0)
				{echo "Фізична особа";}
					else
				{echo "Юридична особа";}
echo "			</td>
		</tr>
		<tr>
			<td>Повна назва
				</td>
			<td>".$kontragent['full_name']."
				</td>
		</tr>
		<tr>
			<td>Група
				</td>
			<td>";
				$group = $kontragent['group'];
				echo mysql_result(mysql_query("SELECT `name` FROM `group_kontr` WHERE id = $group"), 0);
echo "			</td>
		</tr>
		<tr>
			<td>";
				if ($kontragent['type'] == 1)
				{echo "Код ДРФО";}
					else
				{echo "Код ЄДРПОУ";}
echo" 			</td>
			<td>".$kontragent['ident_number']."
				</td>
		</tr>
		<tr>
			<td>Прізвище
				</td>
			<td>".$kontragent['second_name']."
				</td>
		</tr>
		<tr>
			<td>Ім`я
				</td>
			<td>".$kontragent['first_name']."
				</td>
		</tr>
		<tr>
			<td>По-батькові
				</td>
			<td>".$kontragent['third_name']."
				</td>
		</tr>
		<tr>
			<td>Моб. телефон
				</td>
			<td>".$kontragent['mob_tel']."
				</td>
		</tr>
		<tr>
			<td>Юридична адреса
				</td>
			<td>".$kontragent['address']."
				</td>
		</tr>
		<tr>
			<td>Фактична адреса
				</td>
			<td>".$kontragent['location']."
				</td>
		</tr>
		<tr>
			<td>Стац. телефон
				</td>
			<td>".$kontragent['tel']."
				</td>
		</tr>
		<tr>
			<td>№ рахунку
				</td>
			<td>".$rahunki['bank_id']."
				</td>
		</tr>
		<tr>
			<td>Банк
				</td>
			<td>".$rahunki['mfo']." ".$rahunki['bank']."
				</td>
		</tr>
		<tr>
			<td>Валюта розрахунків
				</td>
			<td>";
			if ($rahunki['valuta'] == 0)
				{echo "UAH";}
			if ($rahunki['valuta'] == 1)
				{echo "RUB";}
			if ($rahunki['valuta'] == 2)
				{echo "USD";}
			if ($rahunki['valuta'] == 3)
				{echo "EUR";}
echo "			</td>
		</tr>
		<tr>
			<td>Примітки
				</td>
			<td width = '300px'>".$kontragent['prymitka']."
				</td>
		</tr>
		<tr>
			<td colspan = '2'>
				&nbsp;
				</td>
		</tr>
		<tr>
			<td colspan = '2' align = 'center'>
				<a href = 'kontragent.php?page=1'>Додати новий</a>
				<br>
				<a href = 'kontragent.php?page=3&id=$id'>Редагувати</a>
				<br>
				<a href = 'php/kontragent/kontragent_del.php?id=$id' onclick = \"return confirm('Ви дійсно бажаєте видалити елемент ".$kontragent['short_name']."?')\">Видалити</a>
				<br><br>
				<a href = 'kontragent.php?page=0'>Повернутись</a>
				</td>
		</tr>
		
	</table>";		
?>