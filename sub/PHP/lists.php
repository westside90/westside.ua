<?
//Опції виборок з БД
$per_page = 15;
//Опції виборок з БД

//Виборка номенклатури
function get_nomenklatura($order, $filter, $pages)
	{
	global $per_page;
	
	//Вибір сортування
	switch ($order)
		{
		case 'type_ASC': $order = " ORDER BY `type` ASC "; break;
		case 'type_DESC': $order = " ORDER BY `type` DESC "; break;
		case 'name_ASC': $order = " ORDER BY `name` ASC "; break;
		case 'name_DESC': $order = " ORDER BY `name` DESC "; break;
		case 'full_name_ASC': $order = " ORDER BY `full_name` ASC "; break;
		case 'full_name_DESC': $order = " ORDER BY `full_name` DESC "; break;
		}
	//Вибір сортування
	
	//Вибір фільтра	
	switch ($filter)
		{
		case 'all': $filter = " WHERE `deleted` = 0 "; break;
		case 'tovar': $filter = " WHERE `type` = 0 AND `deleted` = 0 "; break;
		case 'poslugi': $filter = " WHERE `type` = 1 AND `deleted` = 0 "; break;
		case 'deleted': $filter = " WHERE `deleted` = 1 "; break;
		}
	//Вибір фільтра
	
	//Запит до БД і вибірка даних
	$sql = mysql_query ("SELECT `id`,`type`,`name`,`full_name`,`units`,`prymitka` 
							FROM `nomenklatura` 
							".$filter.$order."LIMIT ".($pages*$per_page).",".($pages*$per_page+$per_page)."");
	
	while ($nomenklatura[] = mysql_fetch_array ($sql, MYSQL_ASSOC));
	//echo mysql_error();
	//Запит до БД і вибірка даних
	
	return $nomenklatura;
	}
//Виборка номенклатури

//Виборка одиниць виміру
function get_units($order, $pages)
	{
	global $per_page;
	
	//Вибір сортування
	switch ($order)
		{
		case 'name_ASC': $order = " ORDER BY `name` ASC "; break;
		case 'name_DESC': $order = " ORDER BY `name` DESC "; break;
		}
	//Вибір сортування
	
	//Запит до БД і вибірка даних
	$sql = mysql_query ("SELECT `id`,`name` 
							FROM `units` 
							".$order."LIMIT ".($pages*$per_page).",".($pages*$per_page+$per_page)."");
	
	while ($units[] = mysql_fetch_array ($sql, MYSQL_ASSOC));
	echo mysql_error();
	//Запит до БД і вибірка даних
	
	return $units;
	}
//виборка одиниць виміру

//Вибірка контрагентів
function get_kontragent($order, $filter, $pages)
	{
	global $per_page;
	
	//Вибір сортування
	switch ($order)
		{
		case 'type_ASC': $order = " ORDER BY `type` ASC "; break;
		case 'type_DESC': $order = " ORDER BY `type` DESC "; break;
		case 'name_ASC': $order = " ORDER BY `name` ASC "; break;
		case 'name_DESC': $order = " ORDER BY `name` DESC "; break;
		case 'full_name_ASC': $order = " ORDER BY `full_name` ASC "; break;
		case 'full_name_DESC': $order = " ORDER BY `full_name` DESC "; break;
		}
	//Вибір сортування
	
	//Вибір фільтра	
	switch ($filter)
		{
		case 'all': $filter = " WHERE `deleted` = 0 "; break;
		case 'tovar': $filter = " WHERE `type` = 0 AND `deleted` = 0 "; break;
		case 'poslugi': $filter = " WHERE `type` = 1 AND `deleted` = 0 "; break;
		case 'deleted': $filter = " WHERE `deleted` = 1 "; break;
		}
	//Вибір фільтра
	
	//Запит до БД і вибірка даних
	$sql = mysql_query ("SELECT `id`,`type`,`name`,`full_name`,`units`,`prymitka` 
							FROM `nomenklatura` 
							".$filter.$order."LIMIT ".($pages*$per_page).",".($pages*$per_page+$per_page)."");
	
	while ($nomenklatura[] = mysql_fetch_array ($sql, MYSQL_ASSOC));
	//echo mysql_error();
	//Запит до БД і вибірка даних
	
	return $nomenklatura;
	}









$sql = mysql_query("SELECT `id`,`short_name`,`ident_number` FROM `kontragent`".$orderby."LIMIT $start,$finish");
while ($mass[$i] = mysql_fetch_array ($sql, MYSQL_ASSOC))	$i++;
//Вибірка контрагентів
?>