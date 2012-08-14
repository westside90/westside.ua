<?php
$start_kvartal = getvariable('start_kvartal', 1);
$start_year = getvariable('start_year', 2012);
$end_kvartal = getvariable('end_kvartal', 4);
$end_year = getvariable('end_year', 2012);

//Створюємо список періодів
$book = array ('n' => 7,
				'0' => array ('n' => 3,
							'name' => $language[$lang]['kvartal_1'],
							'summa' => 0,
							'period' => array ('0' => array ('name' => $language[$lang]['jan'], 
															'period' => "'2012-01-01' AND '2012-01-31'",
															'summa' => 0),
												'1' => array ('name' => $language[$lang]['feb'], 
															'period' => "'2012-02-01' AND '2012-02-31'",
															'summa' => 0),
												'2' => array ('name' => $language[$lang]['mar'], 
															'period' => "'2012-03-01' AND '2012-03-31'",
															'summa' => 0)
												)
								),
				'1' => array ('n' => 3,
							'name' => $language[$lang]['kvartal_2'],
							'summa' => 0,
							'period' => array ('0' => array ('name' => $language[$lang]['apr'], 
															'period' => "'2012-04-01' AND '2012-04-31'",
															'summa' => 0),
												'1' => array ('name' => $language[$lang]['may'], 
															'period' => "'2012-05-01' AND '2012-05-31'",
															'summa' => 0),
												'2' => array ('name' => $language[$lang]['jun'], 
															'period' => "'2012-06-01' AND '2012-06-31'",
															'summa' => 0)
												)
								),
				'2' => array ('n' => 0, 
							'name' => $language[$lang]['2/4'],
							'summa' => 0
								),
				'3' => array ('n' => 3, 
							'name' => $language[$lang]['kvartal_3'], 
							'summa' => 0,
							'period' => array ('0' => array ('name' => $language[$lang]['jul'], 
															'period' => "'2012-07-01' AND '2012-7-31'",
															'summa' => 0),
												'1' => array ('name' => $language[$lang]['aug'], 
															'period' => "'2012-08-01' AND '2012-08-31'",
															'summa' => 0),
												'2' => array ('name' => $language[$lang]['sep'], 
															'period' => "'2012-09-01' AND '2012-09-31'",
															'summa' => 0)
												)
								),
				'4' => array ('n' => 0,
							'name' => $language[$lang]['3/4'],
							'summa' => 0
								),
				'5' => array ('n' => 3,
							'name' => $language[$lang]['kvartal_4'],
							'summa' => 0,
							'period' => array ('0' => array ('name' => $language[$lang]['oct'], 
															'period' => "'2012-10-01' AND '2012-10-31'",
															'summa' => 0),
												'1' => array ('name' => $language[$lang]['nov'], 
															'period' => "'2012-11-01' AND '2012-11-31'",
															'summa' => 0),
												'2' => array ('name' => $language[$lang]['dec'], 
															'period' => "'2012-12-01' AND '2012-12-31'",
															'summa' => 0)
												)
								),
				'6' => array ('n' => 0,
							'name' => $language[$lang]['4/4'],
							'summa' => 0
								)
				);
//Створюємо список періодів

//Вносимо суми по датам				
for ($i = 0; $i < $book['n']; $i++)
	{
	if ($book[$i]['n'] == 3)
		{
		for ($j = 0; $j < $book[$i]['n']; $j++)
			{
			$sql = mysql_query ("SELECT `date`,`summa` FROM `plan` 
									WHERE (`debet` = 301 OR `debet` = 311) 
									AND DATE(`date`) BETWEEN ".$book[$i]['period'][$j]['period']."");
			while ($book[$i]['period'][$j]['book'][] = mysql_fetch_array ($sql, MYSQL_ASSOC));
			$n = count($book[$i]['period'][$j]['book'])-1;
			if ($n == 0)
				{ unset($book[$i]['period'][$j]['book']); }
			else
				{ unset($book[$i]['period'][$j]['book'][$n]); }
			}
		}
	}
//Вносимо суми по датам

//Вносимо суми за місяці і квартали
for ($i = 0; $i < $book['n']; $i++)
	{
	if ($book[$i]['n'] == 3)
		{
		for ($j = 0; $j < $book[$i]['n']; $j++)
			{
			if (isset($book[$i]['period'][$j]['book']))
				{
				$book[$i]['period'][$j]['summa'] = 0 + mysql_result (mysql_query ("SELECT SUM(`summa`) FROM `plan` 
																							WHERE (`debet` = 301 OR `debet` = 311) 
																							AND DATE(`date`) BETWEEN ".$book[$i]['period'][$j]['period'].""), 0);
				$book[$i]['summa'] += $book[$i]['period'][$j]['summa']; 
				}
			}
		}
	}
//Вносимо суми за місяці і квартали

//Підсумки
$book[6]['summa'] = $book[5]['summa'] + $book[4]['summa'] += $book[3]['summa'] + $book[2]['summa'] += $book[1]['summa'] + $book[0]['summa'];
//Підсумки

//Вибір діапазону формування книги
switch ($start_kvartal)
	{
	case 1: $start = 0; break;
	case 2: $start = 1; break;
	case 3: $start = 3; break;
	case 4: $start = 5; break;
	}
switch ($end_kvartal)
	{
	case 1: $end = 1; break;
	case 2: $end = 3; break;
	case 3: $end = 5; break;
	case 4: $end = 7; break;
	}
$action = "result.php?page=3";
require_once "HTML/kvartal_form.html";
//Вибір діапазону формування книги
//Підключаємо шаблон книги
require_once "HTML/result/result_book.html";
//Підключаємо шаблон книги


//Масив даних
//echo "<pre>";
//print_r ($book);
//echo "</pre>";
//Масив даних
?>