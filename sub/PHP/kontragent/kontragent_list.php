<?php
//�������� ������� �������
if (isset($_GET['pages']))
	{
	if ($_GET['pages'] == 0)
		$pages = 0;
			else	
		$pages = --$_GET['pages'];
	}
		else $pages = 0;
	
//�������� ������� ����������
$orderby = " ORDER BY `id` ASC ";
if (isset($_GET['order']))
	{ 
	$order = $_GET['order'];
	switch ($order)
		{
		case 3: $orderby = " ORDER BY `short_name` ASC "; break;
		case 4: $orderby = " ORDER BY `short_name` DESC "; break;
		case 5: $orderby = " ORDER BY `ident_number` ASC "; break;
		case 6: $orderby = " ORDER BY `ident_number` DESC "; break;
		}
	}

//��������� ���� 	
$per_page = getvariable ('per_page', 15);
$n = mysql_num_rows(mysql_query("SELECT `id` FROM `kontragent`"));
$start = $pages*$per_page;
$num_pages = ceil($n/$per_page);

//�������� �-���� ����� �� �������
if ($pages == $num_pages - 1)
	{$finish = $n % $per_page;
		if ($finish == 0)
			{$finish = $per_page;}
	}
		else
	{$finish = $per_page;}
if ($n == 0) {$finish = 0;}

//������� ������� ���
$i = 0;



require_once "HTML/kontragent/kontragent_list.html";
?>