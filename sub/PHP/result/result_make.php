<?
//��������� ������������� � �������� � ��
header ("Location: /result.php?page=0"); 
require_once "../dbconnect.php";
//��������� ������������� � �������� � ��

//�������� ��������� ������
$id = $_GET['id'];
$result = mysql_fetch_array (mysql_query ("SELECT `status`,`begin_date`,`end_date` FROM `result` WHERE `id` = ".$id.""), MYSQL_ASSOC);
//�������� ��������� ������

//��������� �������� ����������
if ($result['status'] == 0)
	{
	//�������� ���� ��� ����������� ����������
	$result['902_debet'] = 0 + mysql_result (mysql_query ("SELECT SUM(`summa`) FROM `plan` WHERE `debet` = 902 
															AND DATE(`date`) BETWEEN '".$result['begin_date']."' AND '".$result['end_date']."'"), 0);
	$result['92_debet'] = 0 + mysql_result (mysql_query ("SELECT SUM(`summa`) FROM `plan` WHERE `debet` = 92  
															AND DATE(`date`) BETWEEN '".$result['begin_date']."' AND '".$result['end_date']."'"), 0);												
	$result['702_kredit'] = 0 + mysql_result (mysql_query ("SELECT SUM(`summa`) FROM `plan` WHERE `kredit` = 702 
															AND DATE(`date`) BETWEEN '".$result['begin_date']."' AND '".$result['end_date']."'"), 0);
	$result['703_kredit'] = 0 + mysql_result (mysql_query ("SELECT SUM(`summa`) FROM `plan` WHERE `kredit` = 703  
															AND DATE(`date`) BETWEEN '".$result['begin_date']."' AND '".$result['end_date']."'"), 0);
	//�������� ���� ��� ����������� ����������
	
	//������ �������� �� 791-��
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
	//������ �������� �� 791-��
	
	//��������� ���.���. ����������
	mysql_query ("UPDATE `result` SET `status` = 1 WHERE `id` = ".$id."");
	//��������� ���.���. ����������
}
//��������� �������� ����������

//������ �������� ���������� �������������
if ($result['status'] == 1)
	{
	//��������� ������� ���.���.
	mysql_query ("DELETE FROM `plan` WHERE `number` = ".$id." AND `document` = 6");
	//��������� ������� ���.���.
	
	//��������� ���.���. �� ����������
	mysql_query ("UPDATE `result` SET `status` = 0 WHERE `id` = ".$id."");
	//��������� ���.���. �� ����������
	}
//������ �������� ���������� �������������

//����� �����
//echo "<pre>";
//print_r ($result);
//echo "</pre>";												
//����� �����
?>