<?
//Параметри переадресації і коннекта з БД
header ("Location: /result.php?page=0"); 
require_once "../dbconnect.php";
//Параметри переадресації і коннекта з БД

//Отримуємо параметри періоду
$id = $_GET['id'];
$result = mysql_fetch_array (mysql_query ("SELECT `status`,`begin_date`,`end_date` FROM `result` WHERE `id` = ".$id.""), MYSQL_ASSOC);
//Отримуємо параметри періоду

//Проводимо фінансові результати
if ($result['status'] == 0)
	{
	//Отримуємо данні для фінансового результату
	$result['902_debet'] = 0 + mysql_result (mysql_query ("SELECT SUM(`summa`) FROM `plan` WHERE `debet` = 902 
															AND DATE(`date`) BETWEEN '".$result['begin_date']."' AND '".$result['end_date']."'"), 0);
	$result['92_debet'] = 0 + mysql_result (mysql_query ("SELECT SUM(`summa`) FROM `plan` WHERE `debet` = 92  
															AND DATE(`date`) BETWEEN '".$result['begin_date']."' AND '".$result['end_date']."'"), 0);												
	$result['702_kredit'] = 0 + mysql_result (mysql_query ("SELECT SUM(`summa`) FROM `plan` WHERE `kredit` = 702 
															AND DATE(`date`) BETWEEN '".$result['begin_date']."' AND '".$result['end_date']."'"), 0);
	$result['703_kredit'] = 0 + mysql_result (mysql_query ("SELECT SUM(`summa`) FROM `plan` WHERE `kredit` = 703  
															AND DATE(`date`) BETWEEN '".$result['begin_date']."' AND '".$result['end_date']."'"), 0);
	//Отримуємо данні для фінансового результату
	
	//Додаємо проводки по 791-му
	mysql_query ("INSERT INTO $user_db.`plan` 
	(
	`created`,`document`,`date`,`number`,
	`kontragent`,`summa`,`debet`,`kredit` 
	)
	VALUES
	(
	NOW(),'6','".$result['end_date']."','".$id."','0','".$result['902_debet']."','791','902'
	)");
	mysql_query ("INSERT INTO $user_db.`plan` 
	(
	`created`,`document`,`date`,`number`,
	`kontragent`,`summa`,`debet`,`kredit` 
	)
	VALUES
	(
	NOW(),'6','".$result['end_date']."','".$id."','0','".$result['92_debet']."','791','92'
	)");
	mysql_query ("INSERT INTO $user_db.`plan` 
	(
	`created`,`document`,`date`,`number`,
	`kontragent`,`summa`,`debet`,`kredit` 
	)
	VALUES
	(
	NOW(),'6','".$result['end_date']."','".$id."','0','".$result['702_kredit']."','702','791'
	)");
	mysql_query ("INSERT INTO $user_db.`plan` 
	(
	`created`,`document`,`date`,`number`,
	`kontragent`,`summa`,`debet`,`kredit` 
	)
	VALUES
	(
	NOW(),'6','".$result['end_date']."','".$id."','0','".$result['703_kredit']."','703','791'
	)");
	//Додаємо проводки по 791-му
	
	//Позначаємо фін.рез. проведеним
	mysql_query ("UPDATE `result` SET `status` = 1 WHERE `id` = ".$id."");
	//Позначаємо фін.рез. проведеним
}
//Проводимо фінансові результати

//Робимо фінансові результати непроведеними
if ($result['status'] == 1)
	{
	//Видаляємо підсумки фін.рез.
	mysql_query ("DELETE FROM `plan` WHERE `number` = ".$id." AND `document` = 6");
	//Видаляємо підсумки фін.рез.
	
	//позначаємо фін.рез. не проведеним
	mysql_query ("UPDATE `result` SET `status` = 0 WHERE `id` = ".$id."");
	//позначаємо фін.рез. не проведеним
	}
//Робимо фінансові результати непроведеними

//Масив даних
//echo "<pre>";
//print_r ($result);
//echo "</pre>";												
//Масив даних
?>