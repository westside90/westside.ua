<?php
//Підключення модулів
require_once "dbconnect.php";
mysql_query('SET NAMES cp1251');
mysql_select_db('test', $db);
require_once "../function.php";

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
		case 1: $orderby = " ORDER BY `date` ASC "; break;
		case 2: $orderby = " ORDER BY `date` DESC "; break;
		case 3: $orderby = " ORDER BY `number` ASC "; break;
		case 4: $orderby = " ORDER BY `number` DESC "; break;
		case 5: $orderby = " ORDER BY `name` ASC "; break;
		case 6: $orderby = " ORDER BY `name` DESC "; break;
		}
	}

//Отримуемо змінні з періодом часу, 	
$per_page = getvariable ('per_page', 5);
$max_date = getvariable ('max_date', mysql_result (mysql_query ("SELECT max(`date`) FROM `sample`"), 0));
$min_date = getvariable ('min_date', mysql_result (mysql_query ("SELECT min(`date`) FROM `sample`"), 0));	
$n = mysql_num_rows(mysql_query("SELECT `id` FROM `sample` WHERE DATE(`date`) BETWEEN '$min_date' AND '$max_date'"));
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
$sql = mysql_query("SELECT `id`,`date`,`name`,`number`,`info`,`status` FROM `sample` 
					WHERE DATE(`date`) BETWEEN '$min_date' AND '$max_date'".$orderby."
					LIMIT $start,$finish");
while ($sample[$i] = mysql_fetch_array ($sql, MYSQL_ASSOC))	$i++;
?>

<!-- Таблиця стилів -->
<link rel = 'stylesheet' type = 'text/css' href = '../css/main.css' media = 'all'>
<!-- Таблиця стилів -->

<!-- Форма з вибором діапазону дат -->
<form ACTION = 'sample_list.php' METHOD = 'POST'>
	<p align = 'center'>
		<input type = 'hidden' name = 'pages' value = '<?= $pages ?>'>
		<input type = 'hidden' name = 'per_page' value = '<?= $per_page ?>'>
		<input type = 'date'  name = 'min_date' value = '<?= $min_date ?>' id = 'text'>
		<input type = 'submit' value = 'Показати' id = 'button'>
		<input type = 'date'  name = 'max_date' value = '<?= $max_date ?>' id = 'text'>
		</p>
	</form>
<!-- Форма з вибором діапазону дат -->
	
<!-- Виводимо шапку таблиі -->
<table align = 'center' id = 'table'>
	<tr>
		<td align = 'center'>№
			</td>
		<td><? sortheader('Дата', $min_date, $max_date, $per_page, 1, 2, 'sample_list'); ?>
			</td>
		<td><? sortheader('Номер', $min_date, $max_date, $per_page, 3, 4, 'sample_list'); ?>
			</td>
		<td><? sortheader('Назва', $min_date, $max_date, $per_page, 5, 6, 'sample_list'); ?>
			</td>
		<td align = 'center'>Інформація
			</td>
		<td align = 'center'>Стан
			</td>
		<td align = 'center'>Переглянути
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
			<td>".$sample[$i]['date']."
				</td>
			<td align = 'left'>РН-";
				printf ("%04d", $sample[$i]['number']);
	echo "		</td>
			<td>".$sample[$i]['name']."
				</td>
			<td>".$sample[$i]['info']."
				</td>
			<td align = 'center'>";
				if ($sample[$i]['status'] == 0)
					{echo "<a href = 'sample_make.php?id=".$sample[$i]['id']."'>-</a>";}
				if ($sample[$i]['status'] == 1)
					{echo "<a href = 'sample_make.php?id=".$sample[$i]['id']."'>+</a>";}
	echo "		</td>
			<td align = 'center'>
				<a href = 'sample_view.php?id=".$sample[$i]['id']."&per_page=$i&min_date=$min_date&max_date=$max_date'>Відкрити</a>
				</td>
			<td align = 'center'>
				<a href = 'sample_edit.php?id=".$sample[$i]['id']."&per_page=$i&min_date=$min_date&max_date=$max_date'>Ред.</a>
				</td>
			<td align = 'center'>
				<a href = 'sample_del.php?id=".$sample[$i]['id']."&per_page=$i&min_date=$min_date&max_date=$max_date' onclick = \"return confirm('Ви дійсно бажаєте видалити елемент ".$sample[$i]['name']."?')\">Видалити</a>
				</td>
		</tr>";
	}

//Проставляємо нумерацію сторінок
echo "<tr>
			<td colspan = 9>Сторінки:";
				for ($i = 1; $i <= $num_pages; $i++)
					{echo "<a href = 'sample_list.php?pages=$i&per_page=$per_page&min_date=$min_date&max_date=$max_date'>$i </a>";}
echo "			</td>
		</tr>
		<tr>
			<td colspan = '9' align = 'center'>
				<a href = 'sample_form.php'>Додати новий
					</a>
				</td>
		</tr>
	</table>";

//Вибір к-кості строк на сторінці і кнопку Показати всі	
echo "<form ACTION = 'sample_list.php' METHOD = 'POST'>
		<input type = 'hidden' name = 'per_page' value = '$per_page'>
		<p align = 'center'>Відображати:";
		for ($i = 5; $i <= 15; $i = $i + 5)
			{
			echo " <a href = 'sample_list.php?per_page=$i&min_date=$min_date&max_date=$max_date'>$i</a>";
			}
echo "		<br>";
			$min_date = mysql_result (mysql_query ("SELECT min(`date`) FROM `sample`", $db), 0);
			$max_date = mysql_result (mysql_query ("SELECT max(`date`) FROM `sample`", $db), 0);
echo "		<input type = 'submit' value = 'Показати всі' id = 'button'>
			</p>
	</form>";
?>