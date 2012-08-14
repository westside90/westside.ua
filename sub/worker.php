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
			
				//Cписок співробітників
				if ($page == 0)
					{echo "<h2>".$language[$lang]['worker_list']."</h2>";
					require_once "PHP/worker/worker_list.php";}
				//Додати співробітника
				if ($page == 1)
					{echo "<h2>Додати співробітника</h2>";
					require_once "PHP/worker/worker_form.php";}
				//Переглянути співробітника
				if ($page == 2)
					{echo "<h2>Переглянути співробітника</h2>";
					require_once "PHP/worker/worker_view.php";}
				//Редагувати співробітника
				if ($page == 3)
					{echo "<h2>Редагувати співробітника</h2>";
					require_once "PHP/worker/worker_edit.php";}
				//Нарахування заробітної плати
				if ($page == 4)
					{echo "<h2>Нарахування заробітної плати</h2>";
					require_once "PHP/worker/worker_zarplata.php";}						

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
