<?php
//Шаблон для додавання і видалення нових строк в таблицю
//із збереженням введених даних
//Передача данних через POST і параметра через GET
//Перевіряєм існування параметра з к-кстю строк
if (isset($_GET['k']) and $_GET['k'] > 0)
	{$k = $_GET['k'];}
		else
	{$k = 1;}

//Отримуємо введені раніше значення
if (isset($_POST['name']))
	{$name = $_POST['name'];
	$number = $_POST['number'];}

//Форма  додавання строк	
echo "<form id = 'add' METHOD = 'POST'>
	<table>
		<tr>
			<td>Ім'я
				</td>
			<td>Номер
				</td>
		</tr>";

//Основний массив строк
if ($k > 1)
	{ 
	for ($i = 0; $i < $k-1; $i++)
		{
		echo "	<tr>
					<td><input type = 'text' name = 'name[$i]' value = '$name[$i]'>
						</td>
					<td><input type = 'text' name = 'number[$i]' value = '$number[$i]'>
						</td>
				</tr>";
		}
	}

//Остання строка після видалення нової строки
if ($k > 1 and $k <= count($name))
	{
	$j = $k - 1;
	echo "	<tr>
				<td><input type = 'text' name = 'name[$j]' value = '$name[$j]'>
					</td>
				<td><input type = 'text' name = 'number[$j] value = '$name[$j]'>
					</td>
			</tr>";	
	}

//Початкова строка	
if ($k == 1)
	{
	echo "	<tr>
				<td><input type = 'text' name = 'name[0]'>
					</td>
				<td><input type = 'text' name = 'number[0]'>
					</td>
			</tr>";
	}

//Нова строка
if ($k > 1 and $k > count($name))
	{
	$j = $k - 1;
	echo "	<tr>
				<td><input type = 'text' name = 'name[$j]'>
					</td>
				<td><input type = 'text' name = 'number[$j]'>
					</td>
			</tr>";
	}

//Параметри для кнопок	
$add = $k+1;
$del = $k-1;

//Знищення зайвих даних
if (count($name) > $k)
	{
	unset($name[$k]);
	unset($number[$k]);
	}

//Кнопки управління	
echo "	<tr>
			<td><input type = 'submit'
				onclick = \"document.forms.add.action = 'test.php?k=$add'\"
				value = 'Додати строку'>
				</td>
			<td><input type = 'submit'
				onclick = \"document.forms.add.action = 'test.php?k=$del'\"
				value = 'Видалити строку'>
				</td>
		</tr>";
	
echo "</table>
	</form>";
?>