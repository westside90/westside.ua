<?php
//������������ ������� � ������� � ��
error_reporting(0);
require_once "dbconnect.php";
//������������ ������� � ������� � ��

mysql_query ("DELETE FROM `users`.`reestr` WHERE `user` = 0");

//�������� ����� �����
$reestr = $_POST;
//�������� ����� �����

//������ ������� �����������
mysql_query ("INSERT INTO users.`reestr` 
(
`created` , `modified` , `user` , `derzh_date` , `derzh_number` , `derzh_organ` , 
`dpi_date` , `dpi_kod` , `dpi_organ` , `dpi_ident` , 
`pfu_date` , `pfu_ident` , `pfu_kod`, `pfu_organ`
)
VALUES
(
NOW(), NOW(), 0, '".$reestr['derzh_date']."', '".$reestr['derzh_number']."', '".$reestr['derzh_organ']."', 
'".$reestr['dpi_date']."', '".$reestr['dpi_kod']."', '".$reestr['dpi_organ']."', '".$reestr['dpi_ident']."', 
'".$reestr['pfu_date']."', '".$reestr['pfu_ident']."', '".$reestr['pfu_kod']."', '".$reestr['pfu_organ']."'
) ");
//������ ������� �����������

//������ �����
//echo "<pre>";
//print_r($reestr);
//echo "</pre>";
//������ �����
?>
<script>
window.close();
</script>