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
			<td align='center' valign='middle'>";
			
				//Cписок фінансових результатів
				if ($page == 0)
					{echo "<h2>".$language[$lang]['result_list']."</h2>";
					require_once "PHP/result/result_list.php";}
				//Переглянути фінансовий результат
				if ($page == 1)
					{echo "<h2>".$language[$lang]['result']."</h2>";
					require_once "PHP/result/result_view.php";}
				//Оборотно-сальдова відомість
				if ($page == 2)
					{echo "<h2>".$language[$lang]['saldo']."</h2>";
					require_once "PHP/result/result_saldo.php";}
				//Книга обліку доходів
				if ($page == 3)
					{echo "<h2>".$language[$lang]['book']."</h2>";
					require_once "PHP/result/result_book.php";}
					
echo "			</td>
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