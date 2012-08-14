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
		case 1: $orderby = " ORDER BY `name` ASC "; break;
		case 2: $orderby = " ORDER BY `name` DESC "; break;
		}
	}

//Отримуемо змінні 	
$per_page = getvariable ('per_page', 5);
$n = mysql_num_rows(mysql_query("SELECT `id` FROM `units`"));
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


?>
		
<!-- Виводимо шапку таблиі -->
<table align = 'center' id = 'table' class = 'drop-shadow lifted'>
	<tr>
		<td align = 'center'>№
			</td>
		<td><? sortheader2('Назва', $per_page, 1, 2, 'units.php?page=0&'); ?>
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
			<td>".$mass[$i]['name']."
				</td>
			<td align = 'center'>
				<a href = 'units.php?page=2&id=".$mass[$i]['id']."&per_page=$i'>Ред.</a>
				</td>
			<td align = 'center'>
				<a href = 'php/units/units_del.php?id=".$mass[$i]['id']."' onclick = \"return confirm('Ви дійсно бажаєте видалити елемент ".$mass[$i]['name']."?')\">Видалити</a>
				</td>
		</tr>";
	}
	
//Проставляємо нумерацію сторінок
echo "<tr>
			<td colspan = 9>Сторінки:";
				for ($i = 1; $i <= $num_pages; $i++)
					{echo "<a href = 'units.php?page=0&pages=$i&per_page=$per_page'>$i </a>";}
echo "			</td>
		</tr>
		<tr>
			<td colspan = '9' align = 'center'>
				<a href = 'units.php?page=1'>Додати новий
					</a>
				</td>
		</tr>
	</table>";

//Вибір к-кості строк на сторінці	
echo "<form ACTION = 'units.php?page=0' METHOD = 'POST'>
		<input type = 'hidden' name = 'per_page' value = '$per_page'>
		<p align = 'center'>Відображати:";
		for ($i = 5; $i <= 15; $i = $i + 5)
			{
			echo " <a href = 'units.php?page=0&per_page=$i'>$i</a>";
			}
echo "		</p>
	</form>";
?>