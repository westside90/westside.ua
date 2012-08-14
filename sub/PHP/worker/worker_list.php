<?php
//Отримуємо поточну сторінку
if (isset($_GET['pages']))
	{
	if ($_GET['pages'] == 0)
		$pages = 0;
			else	
		$pages = --$_GET['pages'];
	}
		else $pages = 0;
	
//Отримуємо поточне сортування
$orderby = " ORDER BY `id` ASC ";
if (isset($_GET['order']))
	{ 
	$order = $_GET['order'];
	switch ($order)
		{
		case 1: $orderby = " ORDER BY `second_name` ASC "; break;
		case 2: $orderby = " ORDER BY `second_name` DESC "; break;
		case 3: $orderby = " ORDER BY `post` ASC "; break;
		case 4: $orderby = " ORDER BY `post` DESC "; break;
		case 5: $orderby = " ORDER BY `ident_number` ASC "; break;
		case 6: $orderby = " ORDER BY `ident_number` DESC "; break;
		case 7: $orderby = " ORDER BY `start_date` ASC "; break;
		case 8: $orderby = " ORDER BY `start_date` DESC "; break;
		case 9: $orderby = " ORDER BY `end_date` ASC "; break;
		case 10: $orderby = " ORDER BY `end_date` DESC "; break;
		
		}
	}

//Отримуемо змінні 	
$per_page = getvariable ('per_page', 5);
$n = mysql_num_rows(mysql_query("SELECT `id` FROM `worker`"));
$start = $pages*$per_page;
$num_pages = ceil($n/$per_page);

//Отримуємо к-ксть строк на сторінці
if ($pages == $num_pages - 1)
	{$finish = $n % $per_page;
		if ($finish == 0)
			{$finish = $per_page;}
	}
		else
	{$finish = $per_page;}
if ($n == 0) {$finish = 0;}

//Зчитуємо вибіркові дані
$i = 0;
$sql = mysql_query("SELECT `id`,`first_name`,`second_name`,`third_name`,`post`,`ident_number`,`start_date`,`end_date` FROM `worker`".$orderby."LIMIT $start,$finish");
while ($mass[$i] = mysql_fetch_array ($sql, MYSQL_ASSOC))	
	{
	$mass[$i]['name'] = $mass[$i]['second_name']." ".substr($mass[$i]['first_name'],0,1).".".substr($mass[$i]['third_name'],0,1).".";
	$i++;
	}
?>
		
<!-- Виводимо шапку таблиі -->
<table align = 'center' id = 'table' class = 'drop-shadow lifted'>
	<tr>
		<td align = 'center'>№
			</td>
		<td><? sortheader2('П.І.Б.', $per_page, 1, 2, 'worker.php?page=0&'); ?>
			</td>
		<td><? sortheader2('Посада', $per_page, 3, 4, 'worker.php?page=0&'); ?>
			</td>
		<td><? sortheader2('Код ДРФО', $per_page, 5, 6, 'worker.php?page=0&'); ?>
			</td>
		<td><? sortheader2('Дата прийому', $per_page, 7, 8, 'worker.php?page=0&'); ?>
			</td>
		<td><? sortheader2('Дата звільнення', $per_page, 9, 10, 'worker.php?page=0&'); ?>
			</td>
		<td align = 'center'>Повна інформація
			</td>
		<td align = 'center'>Редагувати
			</td>
		<td align = 'center'>Видалити
			</td>
	</tr>
<!-- Виводимо шапку таблиі -->
			
<?		
//Виводим строки		
for ($i = 0; $i < $finish; $i++)
	{
	$j=$i+1+$pages*$per_page;

	echo "<tr>
			<td align = 'center'>$j
				</td>
			<td align = 'center'>".$mass[$i]['name']."
				</td>
			<td>".$mass[$i]['post']."
				</td>
			<td>".$mass[$i]['ident_number']."
				</td>
			<td>".$mass[$i]['start_date']."
				</td>
			<td>".$mass[$i]['end_date']."
				</td>
			<td align = 'center'>
				<a href = 'worker.php?page=2&id=".$mass[$i]['id']."&per_page=$i'>Відкрити</a>
				</td>
			<td align = 'center'>
				<a href = 'worker.php?page=3&id=".$mass[$i]['id']."&per_page=$i'>Ред.</a>
				</td>
			<td align = 'center'>
				<a href = 'php/worker/worker_del.php?id=".$mass[$i]['id']."' onclick = \"return confirm('Ви дійсно бажаєте видалити елемент ".$mass[$i]['name']."?')\">Видалити</a>
				</td>
		</tr>";
	}
	
//Проставляємо нумерацію сторінок
echo "<tr>
			<td colspan = 9>Сторінки:";
				for ($i = 1; $i <= $num_pages; $i++)
					{echo "<a href = 'worker.php?page=0&pages=$i&per_page=$per_page'>$i </a>";}
echo "			</td>
		</tr>
		<tr>
			<td colspan = '9' align = 'center'>
				<a href = 'worker.php?page=1'>Додати новий
					</a>
				</td>
		</tr>
	</table>";

//Вибір к-кості строк на сторінці	
echo "<form ACTION = 'worker.php?page=0' METHOD = 'POST'>
		<input type = 'hidden' name = 'per_page' value = '$per_page'>
		<p align = 'center'>Відображати:";
		for ($i = 5; $i <= 15; $i = $i + 5)
			{
			echo " <a href = 'worker.php?page=0&per_page=$i'>$i</a>";
			}
echo "		</p>
	</form>";
?>