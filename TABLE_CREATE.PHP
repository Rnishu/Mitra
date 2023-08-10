<?php
require("dbconnect.php");
$createscores=mysqli_execute_query($conn,"CREATE TABLE `mitra`.`scores` (`userid` VARCHAR(13) NOT NULL , `score` INT NOT NULL DEFAULT '0' ) ENGINE = InnoDB");
$createusers=mysqli_execute_query($conn,"CREATE TABLE `mitra`.`users2009` (`userid` VARCHAR(13) NOT NULL , `username` VARHAR(35) NOT NULL, `userPASS` VARCHAR(60) NOT NULL, `acc_partner` VARHAR(13) NULL ) ENGINE = InnoDB");
$createtasks=mysqli_execute_query($conn,"CREATE TABLE `mitra`.`tasks` (`postid` VARCHAR(13) NOT NULL,`userid` VARCHAR(13) NOT NULL , `title` VARHAR(25) NOT NULL, `summary` VARHAR(50) NOT NULL, `amount` INT NOT NULL, 'deadline' DATETIME NULL, 'status' VARCHAR(1) ) ENGINE = InnoDB");
?>