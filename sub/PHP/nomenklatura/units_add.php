<?php
//������������ ������� � ������� � ��
error_reporting(0);
require_once "../dbconnect.php";
//������������ ������� � ������� � ��

//�������� ������ �����
$units = $_POST;
$units['lock'] = 1;
//�������� ������ �����

//������ ����� �����
mysql_query("INSERT INTO $user_db.`units`
(
`created` , `modified` , `name` , `lock`
)
VALUES
(
NOW(), NOW(), '".$units['name']."', ".$units['lock']."
)");
//������ ����� �����
?>
<script>
window.close();
</script>