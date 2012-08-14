<?php
//Налаштування сторінки і коннект з БД
error_reporting(0);
require_once "../dbconnect.php";
//Налаштування сторінки і коннект з БД

//Отримуємо массив даних
$units = $_POST;
$units['lock'] = 1;
//Отримуємо массив даних

//Додаємо новий запис
mysql_query("INSERT INTO $user_db.`units`
(
`created` , `modified` , `name` , `lock`
)
VALUES
(
NOW(), NOW(), '".$units['name']."', ".$units['lock']."
)");
//Додаємо новий запис
?>
<script>
window.close();
</script>