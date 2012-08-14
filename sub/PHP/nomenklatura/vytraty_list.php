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
		case 1: $orderby = " ORDER BY `type` ASC "; break;
		case 2: $orderby = " ORDER BY `type` DESC "; break;
		case 3: $orderby = " ORDER BY `name` ASC "; break;
		case 4: $orderby = " ORDER BY `name` DESC "; break;
		}
	}

//Отримуемо змінні 	
$per_page = getvariable ('per_page', 5);
$n = mysql_num_rows(mysql_query("SELECT `id` FROM `vytraty`"));
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
$sql = mysql_query("SELECT `id`,`type`,`name` FROM `vytraty`".$orderby."LIMIT $start,$finish");
while ($mass[$i] = mysql_fetch_array ($sql, MYSQL_ASSOC))	$i++;
?>
		
<!-- Виводимо шапку таблиі -->
<table align = 'center' id = 'table' class = 'drop-shadow lifted'>
	<tr>
		<td align = 'center'>№
			</td>
		<td><? sortheader2('Тип', $per_page, 1, 2, 'vytraty.php?page=0&'); ?>
			</td>
		<td><? sortheader2('Опис', $per_page, 3, 4, 'vytraty.php?page=0&'); ?>
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
			<td>";
				if ($mass[$i]['type'] == 0) echo "Витрата";
					else echo "Надходження";
	echo "		</td>
			<td>".$mass[$i]['name']."
				</td>
			<td align = 'center'>
				<a href = 'vytraty.php?page=3&id=".$mass[$i]['id']."&per_page=$i'>Ред.</a>
				</td>
			<td align = 'center'>
				<a href = 'php/vytraty/vytraty_del.php?id=".$mass[$i]['id']."' onclick = \"return confirm('Ви дійсно бажаєте видалити елемент ".$mass[$i]['name']."?')\">Видалити</a>
				</td>
		</tr>";
	}
	
//Проставляємо нумерацію сторінок
echo "<tr>
			<td colspan = 9>Сторінки:";
				for ($i = 1; $i <= $num_pages; $i++)
					{echo "<a href = 'vytraty.php?page=0&pages=$i&per_page=$per_page'>$i </a>";}
echo "			</td>
		</tr>
		<tr>
			<td colspan = '9' align = 'center'>
				<a href = 'vytraty.php?page=1'>Додати новий
					</a>
				</td>
		</tr>
	</table>";

//Вибір к-кості строк на сторінці	
echo "<form ACTION = 'vytraty.php?page=0' METHOD = 'POST'>
		<input type = 'hidden' name = 'per_page' value = '$per_page'>
		<p align = 'center'>Відображати:";
		for ($i = 5; $i <= 15; $i = $i + 5)
			{
			echo " <a href = 'vytraty.php?page=0&per_page=$i'>$i</a>";
			}
echo "		</p>
	</form>";
?>