<?
//Початкова дата
if (isset($_REQUEST['min_date']))
	{
	$min_date = $_REQUEST['min_date'];
	$max_date = $_REQUEST['max_date'];
	}
else
	{
	$min_date = "0000-00-00";
	$max_date = $date;
	}
//Початкова дата

//Форма вибору дати
$list = "result.php?page=2";
require_once "HTML/date_form.html";
//Форма вибору дати

//Список рахунків
$result['rahunki'] = array ('0' => 281, 
							'1' => 301, 
							'2' => 311,
							'3' => 361,
							'4' => 41, 
							'5' => 631,
							'6' => 702,
							'7' => 703,
							'8' => 902,
							'9' => 92,
							'10' =>791);
//Список рахунків
							
//Початкове сальдо
for ($i = 0; $i < count($result['rahunki']); $i++)
	{
	$result[$result['rahunki'][$i].'_begin_debet'] = 0 + mysql_result (mysql_query ("SELECT SUM(`summa`) FROM `plan` 
																						WHERE `debet` = ".$result['rahunki'][$i]." 
																						AND DATE(`date`) < '".$min_date."'"), 0);
	$result[$result['rahunki'][$i].'_begin_kredit'] = 0 + mysql_result (mysql_query ("SELECT SUM(`summa`) FROM `plan` 
																						WHERE `kredit` = ".$result['rahunki'][$i]." 
																						AND DATE(`date`) < '".$min_date."'"), 0);
	if ($result[$result['rahunki'][$i].'_begin_debet'] > $result[$result['rahunki'][$i].'_begin_kredit'])
		{
		$result[$result['rahunki'][$i].'_begin_debet'] -= $result[$result['rahunki'][$i].'_begin_kredit'];
		$result[$result['rahunki'][$i].'_begin_kredit'] = "&nbsp";
		}
	else
		{
		$result[$result['rahunki'][$i].'_begin_kredit'] -= $result[$result['rahunki'][$i].'_begin_debet'];
		$result[$result['rahunki'][$i].'_begin_debet'] = "&nbsp";
		}
	}
//Початкове сальдо

//Знаходимо обороти рахунків за період
for ($i = 0; $i < count($result['rahunki']); $i++)
	{
	$result[$result['rahunki'][$i].'_debet'] = 0 + mysql_result (mysql_query ("SELECT SUM(`summa`) FROM `plan` 
																				WHERE `debet` = ".$result['rahunki'][$i]." 
																				AND DATE(`date`) BETWEEN '".$min_date."' AND '".$max_date."'"), 0);
	$result[$result['rahunki'][$i].'_kredit'] = 0 + mysql_result (mysql_query ("SELECT SUM(`summa`) FROM `plan` WHERE `kredit` = ".$result['rahunki'][$i]." 
																				AND DATE(`date`) BETWEEN '".$min_date."' AND '".$max_date."'"), 0);
	}
//Знаходимо обороти рахунків за період

//Кінцеве сальдо
for ($i = 0; $i < count($result['rahunki']); $i++)
	{
	$result[$result['rahunki'][$i].'_end_debet'] = 0 + mysql_result (mysql_query ("SELECT SUM(`summa`) FROM `plan` 
																					WHERE `debet` = ".$result['rahunki'][$i]." 
																					AND DATE(`date`) <= '".$max_date."'"), 0);
	$result[$result['rahunki'][$i].'_end_kredit'] = 0 + mysql_result (mysql_query ("SELECT SUM(`summa`) FROM `plan` 
																					WHERE `kredit` = ".$result['rahunki'][$i]." 
																					AND DATE(`date`) <= '".$max_date."'"), 0);
	if ($result[$result['rahunki'][$i].'_end_debet'] > $result[$result['rahunki'][$i].'_end_kredit'])
		{
		$result[$result['rahunki'][$i].'_end_debet'] -= $result[$result['rahunki'][$i].'_end_kredit'];
		$result[$result['rahunki'][$i].'_end_kredit'] = "&nbsp";
		}
	else
		{
		$result[$result['rahunki'][$i].'_end_kredit'] -= $result[$result['rahunki'][$i].'_end_debet'];
		$result[$result['rahunki'][$i].'_end_debet'] = "&nbsp";
		}
	}
//Кінцеве сальдо

//Баланс
for ($i = 0; $i < count($result['rahunki']); $i++)
	{
	$result['begin_debet'] += 0 + $result[$result['rahunki'][$i].'_begin_debet'];
	$result['begin_kredit'] += 0 + $result[$result['rahunki'][$i].'_begin_debet'];
	$result['debet'] += 0 + $result[$result['rahunki'][$i].'_debet'];
	$result['kredit'] += 0 + $result[$result['rahunki'][$i].'_kredit'];
	$result['end_debet'] += 0 + $result[$result['rahunki'][$i].'_end_debet'];
	$result['end_kredit'] += 0 + $result[$result['rahunki'][$i].'_end_kredit'];
	}
//Баланс

//Шаблон оборотки
$min_date = my_date_format($min_date);
$max_date = my_date_format($max_date);
require_once "HTML/result/result_saldo.html";
//Шаблон оборотки

//Масив даних	
//echo "<pre>";
//print_r ($result);
//echo "</pre>";
//Масив даних
?>