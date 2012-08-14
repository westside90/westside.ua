<?
//Створюємо базу користувача
mysql_query ("CREATE DATABASE IF NOT EXISTS $user_db DEFAULT CHARACTER SET cp1251 COLLATE cp1251_ukrainian_ci;");

//Створюємо нового користувача
//mysql_query ("CREATE USER $login@'%' IDENTIFIED BY $password;
//GRANT SELECT , INSERT , UPDATE , DELETE ON $user_db . * TO $login@'%' IDENTIFIED BY $password 
//WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;");

//CREATE TABLE `users`.`users` (
//`id` INT NOT NULL AUTO_INCREMENT ,
//`created` TIMESTAMP NOT NULL ,
//`activity` TIMESTAMP NOT NULL ,
//`ip` TINYTEXT NOT NULL ,
//`agent` TINYTEXT NOT NULL ,
//`group` TINYINT NOT NULL ,
//`payment_group` TINYINT NOT NULL ,
//`email` TINYTEXT NOT NULL ,
//`skype` TINYTEXT NOT NULL ,
//`tel` TINYTEXT NOT NULL ,
//`first_name` TINYTEXT NOT NULL ,
//`second_name` TINYTEXT NOT NULL ,
//`third_name` TINYTEXT NOT NULL ,
//PRIMARY KEY ( `id` )
//) ENGINE = InnoDB CHARACTER SET cp1251 COLLATE cp1251_ukrainian_ci;

//Створення таблиці особистих даних користувача
mysql_query("CREATE TABLE $user_db.`personal` 
(
`id` INT NOT NULL AUTO_INCREMENT ,
`created` TIMESTAMP NOT NULL ,
`modified` TIMESTAMP NOT NULL ,
`user` INT NOT NULL ,
`first_name` TINYTEXT NOT NULL ,
`second_name` TINYTEXT NOT NULL ,
`third_name` TINYTEXT NOT NULL ,
`birth_date` DATE NULL ,
`ident_number` TINYTEXT NOT NULL ,
`indeks` TINYTEXT NOT NULL ,
`oblast` TINYTEXT NOT NULL ,
`misto` TINYTEXT NOT NULL ,
`address` TINYTEXT NULL ,
`tel` TINYTEXT NULL ,
`start_date` DATE NOT NULL ,
PRIMARY KEY ( `id` )
) 
ENGINE = InnoDB CHARACTER SET cp1251 COLLATE cp1251_ukrainian_ci;
");

//Створення таблиці даних державної реєстрації
mysql_query("CREATE TABLE $user_db.`reestr` 
(
`id` INT NOT NULL AUTO_INCREMENT ,
`created` TIMESTAMP NOT NULL ,
`modified` TIMESTAMP NOT NULL ,
`user` INT NOT NULL ,
`derzh_date` TINYTEXT NOT NULL ,
`derzh_number` TINYTEXT NOT NULL ,
`derzh_organ` TINYTEXT NOT NULL ,
`dpi_date` TINYTEXT NOT NULL ,
`dpi_kod` TINYTEXT NOT NULL ,
`dpi_organ` TINYTEXT NOT NULL ,
`dpi_ident` TINYTEXT NOT NULL ,
`cert_group` TINYTEXT NOT NULL ,
`cert_stavka` TINYTEXT NOT NULL ,
`cert_seria` TINYTEXT NOT NULL ,
`cert_number` TINYTEXT NOT NULL ,
`cert_date` TINYTEXT NOT NULL ,
`pfu_date` TINYTEXT NOT NULL ,
`pfu_ident` TINYTEXT NOT NULL ,
`pfu_kod` TINYTEXT NOT NULL ,
`pfu_organ` TINYTEXT NOT NULL ,
PRIMARY KEY ( `id` )
) 
ENGINE = InnoDB CHARACTER SET cp1251 COLLATE cp1251_ukrainian_ci;
");

//Створюємо таблицю накладних
mysql_query ("CREATE TABLE IF NOT EXISTS $user_db.`nakladna` 
(
`id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
`created` TIMESTAMP NOT NULL ,
`modified` TIMESTAMP NOT NULL ,
`document` TINYINT UNSIGNED NOT NULL ,
`status` TINYINT UNSIGNED NOT NULL ,
`number` INT UNSIGNED NOT NULL ,
`date` DATE NOT NULL ,
`kontragent` INT UNSIGNED NOT NULL ,
`rahunok` TINYTEXT NULL ,
`order_number` TINYTEXT NULL ,
`order_date` DATE NULL ,
`order_across` TINYTEXT NULL ,
`tovar` INT UNSIGNED NOT NULL ,
`partia` INT UNSIGNED NULL ,
`kkst` INT UNSIGNED NOT NULL ,
`cost` FLOAT NOT NULL ,
`summa` FLOAT NOT NULL ,
`prymitka` TINYTEXT NULL ,
`deleted` TINYINT UNSIGNED NOT NULL ,
PRIMARY KEY ( `id` ) 
)
ENGINE = InnoDB CHARACTER SET cp1251 COLLATE cp1251_ukrainian_ci;
");

//Створюємо таблицю актів
mysql_query ("CREATE TABLE IF NOT EXISTS $user_db.`akt` 
(
`id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
`created` TIMESTAMP NOT NULL ,
`modified` TIMESTAMP NOT NULL ,
`document` TINYINT UNSIGNED NOT NULL , 
`status` TINYINT UNSIGNED NOT NULL ,
`number` INT UNSIGNED NOT NULL ,
`date` DATE NOT NULL ,
`kontragent` INT UNSIGNED NOT NULL ,
`rahunok` TINYTEXT NULL ,
`posluga` INT UNSIGNED NOT NULL ,
`kkst` INT UNSIGNED NOT NULL ,
`cost` FLOAT NOT NULL ,
`summa` FLOAT NOT NULL ,
`prymitka` TINYTEXT NULL ,
`deleted` TINYINT UNSIGNED NOT NULL ,
PRIMARY KEY ( `id` ) 
) 
ENGINE = InnoDB CHARACTER SET cp1251 COLLATE cp1251_ukrainian_ci;
");

//Створюємо таблицю банківських виписок
mysql_query ("CREATE TABLE IF NOT EXISTS $user_db.`bv` 
(
`id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
`created` TIMESTAMP NOT NULL ,
`modified` TIMESTAMP NOT NULL ,
`document` TINYINT UNSIGNED NOT NULL ,
`rahunok` TINYTEXT NOT NULL ,
`status` TINYINT UNSIGNED NOT NULL ,
`date` DATE NOT NULL ,
`type` TINYINT UNSIGNED NOT NULL ,
`make_type` INT UNSIGNED NOT NULL ,
`make` INT UNSIGNED NOT NULL ,
`summa` FLOAT NOT NULL ,
`description` TINYTEXT NULL ,
`deleted` TINYINT UNSIGNED NOT NULL ,
PRIMARY KEY ( `id` ) 
) 
ENGINE = InnoDB CHARACTER SET cp1251 COLLATE cp1251_ukrainian_ci;
");

//Створюємо таблицю платіжних доручень
mysql_query ("CREATE TABLE IF NOT EXISTS $user_db.`pld`
(
`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
`created` TIMESTAMP NOT NULL ,
`modified` TIMESTAMP NOT NULL ,
`number` INT UNSIGNED NOT NULL ,
`date` DATE NOT NULL ,
`rahunok_out` INT UNSIGNED NOT NULL ,
`rahunok_in` INT UNSIGNED NOT NULL ,
`kontragent` INT UNSIGNED NOT NULL ,
`summa` FLOAT NOT NULL ,
`description` TINYTEXT NULL ,
`deleted` TINYINT UNSIGNED NOT NULL ,
PRIMARY KEY ( `id` ) 
)
ENGINE = InnoDB CHARACTER SET cp1251 COLLATE cp1251_ukrainian_ci;
");

//Створюємо таблицю касових документів
mysql_query ("CREATE TABLE IF NOT EXISTS $user_db.`kassa` 
(
`id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
`created` TIMESTAMP NOT NULL ,
`modified` TIMESTAMP NOT NULL ,
`document` TINYINT UNSIGNED NOT NULL ,
`status` TINYINT UNSIGNED NOT NULL ,
`number` INT UNSIGNED NULL ,
`date` DATE NOT NULL ,
`type` TINYINT UNSIGNED NOT NULL ,
`make_type` TINYINT UNSIGNED NOT NULL ,
`make` INT UNSIGNED NOT NULL ,
`summa` FLOAT NOT NULL ,
`description` TINYTEXT NULL ,
`deleted` TINYINT UNSIGNED NOT NULL ,
PRIMARY KEY ( `id` ) 
) 
ENGINE = InnoDB CHARACTER SET cp1251 COLLATE cp1251_ukrainian_ci;
");

//Створюємо таблицю проводок
mysql_query ("CREATE TABLE IF NOT EXISTS $user_db.`plan`
(
`id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
`created` TIMESTAMP NOT NULL ,
`document` TINYINT UNSIGNED NOT NULL ,
`date` DATE NOT NULL ,
`number` INT UNSIGNED NULL ,
`kontragent` INT UNSIGNED NOT NULL ,
`summa` FLOAT NOT NULL ,
`debet` SMALLINT UNSIGNED NOT NULL ,
`kredit` SMALLINT UNSIGNED NOT NULL ,
PRIMARY KEY ( `id` )
)
ENGINE = InnoDB CHARACTER SET cp1251 COLLATE cp1251_ukrainian_ci;
");

//Створюємо таблицю контрагентів
mysql_query ("CREATE TABLE IF NOT EXISTS $user_db.`kontragent` 
(
`id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
`created` TIMESTAMP NOT NULL ,
`modified` TIMESTAMP NOT NULL ,
`type` TINYINT UNSIGNED NOT NULL ,
`short_name` TINYTEXT NOT NULL ,
`full_name` TINYTEXT NULL ,
`ident_number` TINYTEXT NULL ,
`first_name` TINYTEXT NULL ,
`second_name` TINYTEXT NULL ,
`third_name` TINYTEXT NULL ,
`mob_tel` TINYTEXT NULL ,
`address` TINYTEXT NULL ,
`location` TINYTEXT NULL ,
`tel` TINYTEXT NULL ,
`prymitka` TINYTEXT NULL ,
`deleted` TINYINT UNSIGNED NOT NULL ,
PRIMARY KEY ( `id` ) 
) 
ENGINE = InnoDB CHARACTER SET cp1251 COLLATE cp1251_ukrainian_ci;
");

//Створюємо таблицю співробітників
mysql_query ("CREATE TABLE IF NOT EXISTS $user_db.`worker` (
`id` SMALLINT UNSIGNED NULL ,
`created` TIMESTAMP NOT NULL ,
`modified` TIMESTAMP NOT NULL ,
`post` TINYTEXT NOT NULL ,
`first_name` TINYTEXT NOT NULL ,
`second_name` TINYTEXT NOT NULL ,
`third_name` TINYTEXT NOT NULL ,
`start_date` DATE NULL ,
`end_date` DATE NULL ,
`salary` FLOAT NULL ,
`social` TINYINT UNSIGNED NULL ,
`ident_number` TINYTEXT NULL ,
`passport` TINYTEXT NULL ,
`organ` TINYTEXT NULL ,
`pass_date` DATE NULL ,
`address` TINYTEXT NULL ,
`tel` TINYTEXT NULL ,
`prymitka` TINYTEXT NULL ,
`deleted` TINYINT UNSIGNED NOT NULL ,
PRIMARY KEY ( `id` ) 
) ENGINE = InnoDB CHARACTER SET cp1251 COLLATE cp1251_ukrainian_ci;
");

//Створюємо таблицю номенклатури
mysql_query ("CREATE TABLE IF NOT EXISTS $user_db.`nomenklatura` 
(
`id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
`created` TIMESTAMP NOT NULL ,
`modified` TIMESTAMP NOT NULL ,
`type` TINYINT UNSIGNED NOT NULL ,
`name` TINYTEXT NOT NULL ,
`full_name` TINYTEXT NOT NULL ,
`units` INT UNSIGNED NOT NULL ,
`prymitka` TINYTEXT NULL ,
`deleted` TINYINT UNSIGNED NOT NULL ,
PRIMARY KEY ( `id` ) 
) 
ENGINE = InnoDB CHARACTER SET cp1251 COLLATE cp1251_ukrainian_ci");

//Створюємо таблицю рахунків
mysql_query ("CREATE TABLE IF NOT EXISTS $user_db.`rahunki`
(
`id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
`created` TIMESTAMP NOT NULL ,
`modified` TIMESTAMP NOT NULL ,
`kontragent` INT UNSIGNED NOT NULL ,
`name` TINYTEXT NOT NULL ,
`bank_id` TINYTEXT NOT NULL ,
`mfo` TINYTEXT NOT NULL ,
`bank` TINYTEXT NOT NULL ,
`valuta` TINYINT NOT NULL ,
`deleted` TINYINT UNSIGNED NOT NULL ,
PRIMARY KEY ( `id` ) 
)
ENGINE = InnoDB CHARACTER SET cp1251 COLLATE cp1251_ukrainian_ci");

//Створюємо таблицю одиниць виміру
mysql_query ("CREATE TABLE IF NOT EXISTS $user_db.`units`
(
`id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT ,
`modified` TIMESTAMP NOT NULL ,
`created` TIMESTAMP NOT NULL ,
`name` TINYTEXT NOT NULL ,
`lock` SMALLINT UNSIGNED NOT NULL ,
PRIMARY KEY ( `id` ) 
)
ENGINE = InnoDB CHARACTER SET cp1251 COLLATE cp1251_ukrainian_ci");

//Створюємо таблицю витрат і надходжень
mysql_query ("CREATE TABLE IF NOT EXISTS $user_db.`vytraty`
(
`id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
`created` TIMESTAMP NOT NULL ,
`modified` TIMESTAMP NOT NULL ,
`type` TINYINT UNSIGNED NOT NULL ,
`name` TINYTEXT NOT NULL ,
`lock` TINYINT NOT NULL ,
PRIMARY KEY ( `id` )
)
ENGINE = InnoDB CHARACTER SET cp1251 COLLATE cp1251_ukrainian_ci");

//Створюємо таблицю фін. результатів
mysql_query ("CREATE TABLE IF NOT EXISTS $user_db.`result`
(
`id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
`created` TIMESTAMP NOT NULL ,
`status` TINYINT NOT NULL ,
`begin_date` DATE NOT NULL ,
`end_date` DATE NOT NULL ,
PRIMARY KEY ( `id` )
)
ENGINE = InnoDB CHARACTER SET cp1251 COLLATE cp1251_ukrainian_ci");

//Створення таблиці власних данних
//
//
//
//
?>

