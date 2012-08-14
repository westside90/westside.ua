<?php
//Налаштування сторінки і коннект з БД
error_reporting(0);
require_once "../dbconnect.php";
//Налаштування сторінки і коннект з БД

//Отримуємо массив даних
$nomenklatura = $_POST;
//Отримуємо массив даних

//Додаємо новий запис
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
//Додаємо новий запис
?>
<script>
window.close();
</script>