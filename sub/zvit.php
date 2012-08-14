<?php
//Шапка сайту і меню
require_once "PHP/header.php";
require_once "PHP/menu.php";
//Шапка сайту і меню

//Отримуємо код сторінки
if (isset($_GET['page'])) { $page = $_GET['page']; } else { $page = 0; }
//Отримуємо код сторінки

//Основний блок
echo "<table width='100%'>
		<tr>
			<td align='center' valign='middle'>
			<h2>Формування звітності до пенсійного фонду<h2>
			</td>
			<td width='250' align='right' valign='top'>";
//Основний блок

//Правий блок			
require_once "PHP/block.php";
echo "		</td>
			</tr>
			</table>";
//Правий блок

//Нижній блок
require_once "PHP/footer.php";
//Нижній блок
?>