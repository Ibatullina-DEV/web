<?php
$host = 'localhost';
$database = 'a0654147_films';
$user = 'a0654147_root';
$password = 'root';
//require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database)
or die("ошибка" . mysqli_error($link));
?>