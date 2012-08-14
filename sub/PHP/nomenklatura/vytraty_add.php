<?php
//Налаштування сторінки і коннект з БД
error_reporting(0);
require_once "../dbconnect.php";
//Налаштування сторінки і коннект з БД

//Отримуємо массив даних
$nomenklatura = $_POST;
$nomenklatura['lock'] = 1;
//Отримуємо массив даних

//Додаємо новий запис
mysql_query("INSERT INTO $user_db.`vytraty`
(
`created` , `modified` , `type` , `name` , `lock`
)
VALUES
(
NOW(), NOW(), ".$nomenklatura['type'].", '".$nomenklatura['name']."', ".$nomenklatura['lock']."
)");
//Додаємо новий запис
?>
<script>
window.close();
</script>