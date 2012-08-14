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
			<td align='center' valign='top'>";
			
				//Список рахунків
				if ($page == 0)
					{echo "<h2>".$language[$lang]['rahunki_list']."</h2>";
					require_once "PHP/nomenklatura/rahunki_list.php";}
				//Додати рахунок
				if ($page == 1)
					{echo "<h2>Додати рахунок</h2>";
					require_once "PHP/nomenklatura/rahunki_form.php";}
				//Редагувати рахунок
				if ($page == 2)
					{echo "<h2>Редагування рахунку</h2>";
					require_once "PHP/nomenklatura/rahunki_edit.php";}

echo "			</td>
			<td width='250' align='right' valign='top'>";
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