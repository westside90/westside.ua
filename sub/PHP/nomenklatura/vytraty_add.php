<?php
//������������ ������� � ������� � ��
error_reporting(0);
require_once "../dbconnect.php";
//������������ ������� � ������� � ��

//�������� ������ �����
$nomenklatura = $_POST;
$nomenklatura['lock'] = 1;
//�������� ������ �����

//������ ����� �����
mysql_query("INSERT INTO $user_db.`vytraty`
(
`created` , `modified` , `type` , `name` , `lock`
)
VALUES
(
NOW(), NOW(), ".$nomenklatura['type'].", '".$nomenklatura['name']."', ".$nomenklatura['lock']."
)");
//������ ����� �����
?>
<script>
window.close();
</script>