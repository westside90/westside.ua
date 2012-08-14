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
			
				//Список касових ордерів
				if ($page == 0)
					{echo "<h2>".$language[$lang]['kassa_list']."</h2>";
					require_once "PHP/kassa/kassa_list.php";}
				//Додати прихідний
				if ($page == 1)
					{echo "<h2>".$language[$lang]['kassa_prihod']."</h2>";
					$type = 0;
					require_once "PHP/kassa/kassa_form.php";}
				//Додати розхідний
				if ($page == 2)
					{echo "<h2>".$language[$lang]['kassa_rashod']."</h2>";
					$type = 1;
					require_once "PHP/kassa/kassa_form.php";}
				//Додати касовий лист
				if ($page == 3)
					{echo "<h2>".$language[$lang]['kl']."</h2>";
					require_once "PHP/kassa/kl_form.php";}
				//Внесення залишків
				if ($page == 4)
					{echo "<h2>".$language[$lang]['ost']."</h2>";
					require_once "PHP/kassa/kassa_ost_form.php";}
				//Редагувати касовий ордер
				if ($page == 8)
					{echo "<h2>".$language[$lang]['edit'].$language[$lang]['kassa_v']."</h2>";
					require_once "PHP/kassa/kassa_edit.php";}
				//Редагувати касовий лист
				if ($page == 9)
					{echo "<h2>".$language[$lang]['edit'].$language[$lang]['kl_v']."</h2>";
					require_once "PHP/kassa/kl_edit.php";}					
				//Редагувати внесені залишки
				if ($page == 10)
					{echo "<h2>".$language[$lang]['edit'].$language[$lang]['ost_v']."</h2>";
					require_once "PHP/kassa/kassa_ost_edit.php";}
				//Звіт про рух коштів
				if ($page == 11)
					{echo "<h2>".$language[$lang]['zvit']."</h2>";
					require_once "PHP/kassa/zvit.php";}
				
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