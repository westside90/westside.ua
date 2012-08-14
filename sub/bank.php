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
			
				//Список документів
				if ($page == 0)
					{echo "<h2>".$language[$lang]['bank_list']."</h2>";
					require_once "PHP/bank/bank_list.php";}
				//Додати платіжне доручення
				if ($page == 1)
					{echo "<h2>Додати платіжне доручення</h2>";
					require_once "PHP/bank/pld_form.php";}
				//Додати банківську виписку
				if ($page == 2)
					{echo "<h2>Додати банківську виписку</h2>";
					require_once "PHP/bank/pld_edit.php";}
				//Редагувати платіжне доручення
				if ($page == 3)
					{echo "<h2>Додати банківську виписку</h2>";
					require_once "PHP/bank/bv_form.php";}
				//Переглянути банківську виписку
				if ($page == 4)
					{echo "<h2>Банківська виписка</h2>";
					require_once "PHP/bank/bv_edit.php";}
				//Сформувати звіт
				if ($page == 5)
					{echo "<h2>Сформувати звіт</h2>";
					require_once "PHP/bank/bank_zvit.php";}
					
					
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