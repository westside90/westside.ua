<?
function getting($col,$table,$condition)
	{
	$res = mysql_result (mysql_query ("SELECT $col FROM $table WHERE $condition"), 0);
	return $res;
	}

function getvariable($var,$def)
	{
	if (isset($_REQUEST[$var]))
	{$var = $_REQUEST[$var];}
		else
	{$var = $def;}
	return $var;
	}

function sortheader($name,$min_date,$max_date,$per_page,$s1,$s2,$list)
	{
echo "
	<table width = '100%'>
		<tr>
			<td rowspan = '2'>
				$name
				</td>
			<td align = 'right'>
				<a href = '".$list."per_page=$per_page&order=$s1&min_date=$min_date&max_date=$max_date'>
					<img src = '../../PNG/up.png'>
					</a>
				</td>
		</tr>
		<tr>
			<td align = 'right'>
				<a href = '".$list."per_page=$per_page&order=$s2&min_date=$min_date&max_date=$max_date'>
					<img src = '../../PNG/down.png'>
					</a>
				</td>
		</tr>
	</table>";
	}
	
function sortheader2($name,$per_page,$s1,$s2,$list)
	{
echo "
	<table width = '100%' id = 'intable'>
		<tr>
			<td rowspan = '2'>
				$name
				</td>
			<td align = 'right'>
				<a href = '".$list."per_page=$per_page&order=$s1'>
					<img src = '../../PNG/up.png'>
					</a>
				</td>
		</tr>
		<tr>
			<td align = 'right'>
				<a href = '".$list."per_page=$per_page&order=$s2'>
					<img src = '../../PNG/down.png'>
					</a>
				</td>
		</tr>
	</table>";
	}

	
//Функція форматування дати
function my_date_format($date)
	{
	$year = substr ($date, 0, 4);
	$mounth = substr ($date, 5, 2);
	$day = substr ($date, 8, 2);
	$date = $day.".".$mounth.".".$year;
	return $date;
	}
//Функція форматування дати

//+1 календарний день до дати	
function add_day($date)
	{
	$year = intval (substr ($date, 0, 4));
	$month = intval (substr ($date, 5, 2));
	$day = intval (substr ($date, 8, 2)) + 1;
	
	if ($month == 2 AND $day > 28 AND $year%4 != 0)
		{
		$day = 1;
		$month = $month + 1;
		}
	if ($month == 2 AND $day > 29 AND $year%4 == 0)
		{
		$day = 1;
		$month = $month + 1;
		}
	if (($month == 1 OR $month == 3 OR $month == 5 OR $month == 7 OR $month == 8 OR $month == 10) AND $day > 31)
		{
		$day = 1;
		$month = $month + 1;
		}
	if (($month == 4 OR $month == 6 OR $month == 9 OR $month == 11) AND $day > 30)
		{
		$day = 1;
		$month = $month + 1;
		}
	if ($month == 12 AND $day > 31)
		{
		$day = 1;
		$month = 1;
		$year = $year + 1;
		}
		
	$day = sprintf('%02d',$day);
	$month = sprintf('%02d',$month);
	$year = sprintf('%04d',$year);
	$date = $year.'-'.$month.'-'.$day;
	return $date;
	}
//+1 календарний день до дати

	
	
	
	
	
	
?>