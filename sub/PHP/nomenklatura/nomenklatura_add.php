<?php
//������������ ������� � ������� � ��
error_reporting(0);
require_once "../dbconnect.php";
//������������ ������� � ������� � ��

//�������� ������ �����
$nomenklatura = $_POST;
//�������� ������ �����

//������ ����� �����
mysql_query("INSERT INTO $user_db.`nomenklatura`
(
`created` , `modified` , `type` , `name` , 
`full_name` , `units` , `prymitka`
)
VALUES
(
NOW(), NOW(), ".$nomenklatura['type'].", '".$nomenklatura['name']."', 
'".$nomenklatura['full_name']."', ".$nomenklatura['units'].", '".$nomenklatura['prymitka']."'
)");
//������ ����� �����
?>
<script>
window.close();
</script>