<!-- Виводимо шапку таблиі -->
<table align = 'center' id = 'table' class = 'drop-shadow lifted'>
	<tr>
		<td align = 'center'>№
			</td>
		<td><? sortheader2('Найменування', $per_page, 3, 4, 'kontragent.php?page=0&'); ?>
			</td>
		<td><? sortheader2('Код ДРФО(ЄДРПОУ)', $per_page, 5, 6, 'kontragent.php?page=0&'); ?>
			</td>
		<td align = 'center'>Повна інформація
			</td>
		<td align = 'center'>Редагувати
			</td>
		<td align = 'center'>Видалити
			</td>
	</tr>
<!-- Виводимо шапку таблиі -->
			

<? for ($i = 0; $i < $finish; $i++):
	$j=$i+1+$pages*$per_page; ?>
		<tr>
			<td align = 'center'><?= $j ?>
				</td>
			<td align = 'center'><?= $mass[$i]['short_name'] ?>
				</td>
			<td><?= $mass[$i]['ident_number'] ?>
				</td>
			<td align = 'center'>
				<a href = 'kontragent.php?page=2&id=<?= $mass[$i]['id']."&per_page=".echo $i; ?>'>Відкрити</a>
				</td>
			<td align = 'center'>
				<a href = 'kontragent.php?page=3&id=<?= $mass[$i]['id']."&per_page=".echo $i; ?>'>Ред.</a>
				</td>
			<td align = 'center'>
				<a href = 'php/kontragent/kontragent_del.php?id=<?= $mass[$i]['id'] ?>' onclick = \"return confirm('Ви дійсно бажаєте видалити елемент <?= $mass[$i]['short_name'] ?>?')\">Видалити</a>
				</td>
		</tr>
<? endfor; ?>
	
//Проставляємо нумерацію сторінок
echo "<tr>
			<td colspan = 8>Сторінки:";
				for ($i = 1; $i <= $num_pages; $i++)
					{echo "<a href = 'kontragent.php?page=0&pages=$i&per_page=$per_page'>$i </a>";}
echo "			</td>
		</tr>
		<tr>
			<td colspan = '8' align = 'center'>
				<a href = 'kontragent.php?page=1'>Додати новий
					</a>
				</td>
		</tr>
	</table>";

//Вибір к-кості строк на сторінці	
echo "<form ACTION = 'kontragent.php?page=0' METHOD = 'POST'>
		<input type = 'hidden' name = 'per_page' value = '$per_page'>
		<p align = 'center'>Відображати:";
		for ($i = 5; $i <= 15; $i = $i + 5)
			{
			echo " <a href = 'kontragent.php?page=0&per_page=$i'>$i</a>";
			}
echo "		</p>
	</form>";
