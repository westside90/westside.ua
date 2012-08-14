<?php
//Шапка сайту і меню, підключення модулів
require_once "PHP/header.php";
require_once "PHP/menu.php";
//Шапка сайту і меню, підключення модулів

//Отримуємо код сторінки
if (isset($_GET['page'])) { $page = $_GET['page']; } else { $page = 0; }
//Отримуємо код сторінки

//Основний блок
echo "<table width='100%'>
		<tr>
			<td align='center' valign='top'>";
			
				//Список накладних
				if ($page == 0)
					{echo "<h2>".$language[$lang]['nakladna_list']."</h2>";
					require_once "PHP/nakladna/nakladna_list.php";}
				//Додати прихідну накладну
				if ($page == 1)
					{echo "<h2>".$language[$lang]['nakladna_prihod']."</h2>";
					require_once "php/nakladna/nakladna_prihod_form.php";}
				//Додати розхідну накладну
				if ($page == 2)
					{echo "<h2>".$language[$lang]['nakladna_rashod']."</h2>";
					require_once "php/nakladna/nakladna_rashod_form.php";}
				//Додати рахунок на оплату
				if ($page == 3)
					{echo "<h2>".$language[$lang]['rno']."</h2>";
					require_once "php/nakladna/nakladna_rno_form.php";}
				//Внесення залишків
				if ($page == 4)
					{echo "<h2>".$language[$lang]['ost']."</h2>";
					require_once "php/nakladna/nakladna_ost_form.php";}
				//Переглянути прихідну накладну
				if ($page == 5)
					{echo "<h2>".$language[$lang]['view'].$language[$lang]['nakladna_prihod_v']."</h2>";
					require_once "php/nakladna/nakladna_prihod_edit.php";}
				//Переглянути розхідну накладну
				if ($page == 6)
					{echo "<h2>".$language[$lang]['view'].$language[$lang]['nakladna_rashod_v']."</h2>";
					require_once "php/nakladna/nakladna_rashod_edit.php";}
				//Переглянути рахунок на оплату
				if ($page == 7)
					{echo "<h2>".$language[$lang]['view'].$language[$lang]['rno_v']."</h2>";
					require_once "php/nakladna/nakladna_rno_edit.php";}
				//Переглянути внесені залишки
				if ($page == 8)
					{echo "<h2>".$language[$lang]['view'].$language[$lang]['ost_v']."</h2>";
					require_once "php/nakladna/nakladna_ost_edit.php";}
				//Звіт про рух товарів згорнутий
				if ($page == 9)
					{echo "<h2>".$language[$lang]['zvit_short']."</h2>";
					require_once "php/nakladna/zvit_short.php";}
				//Звіт про рух товарів розгорнутий
				if ($page == 10)
					{echo "<h2>".$language[$lang]['zvit_full']."</h2>";
					require_once "php/nakladna/zvit_full.php";}
					
echo "			</td>
			<td width='250' align='right' valign='top'>";
//Основний блок

//Правий блок			
require_once "PHP/block.php";
//Правий блок	

echo "			</td>
			</tr>
		</table>";

//Нижній блок
require_once "PHP/footer.php";
//Нижній блок
?>