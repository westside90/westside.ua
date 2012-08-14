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
			
				//Список контрагентів
				if ($page == 0)
					{echo "<h2>".$language[$lang]['kontragent_list']."</h2>";
					require_once "PHP/kontragent/kontragent_list.php";}
				//Додати контрагента
				if ($page == 1)
					{echo "<h2>Додати контрагента</h2>";
					require_once "PHP/kontragent/kontragent_form.php";}
				//Переглянути контрагента
				if ($page == 2)
					{echo "<h2>Інформація по контрагенту</h2>";
					require_once "PHP/kontragent/kontragent_view.php";}
				//Редагувати контрагента
				if ($page == 3)
					{echo "<h2>Редагування контрагента</h2>";
					require_once "PHP/kontragent/kontragent_edit.php";}
				//Звіт по контрагентам
				if ($page == 4)
					{echo "<h2>Загальні розрахунки з контрагентами</h2>";
					require_once "PHP/kontragent/kontragent_zvit_full.php";}
				//Звіт по постачальникам
				if ($page == 5)
					{echo "<h2>Розрахунки з постачальниками</h2>";
					require_once "PHP/kontragent/kontragent_zvit_seller.php";}
				//Звіт по покупцям
				if ($page == 6)
					{echo "<h2>Розрахунки з покупцями</h2>";
					require_once "PHP/kontragent/kontragent_zvit_buyer.php";}
				//Акт звірки
				if ($page == 7)
					{echo "<h2>Акт звірки взаєморозрахунків</h2>";
					require_once "PHP/kontragent/kontragent_akt.php";}					

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