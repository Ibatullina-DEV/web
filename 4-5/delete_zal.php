<?php
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database)
or die ("Невозможно подключиться к серверу");
$id_zal = $_GET['id_zal'];
$result = $mysqli->query("DELETE FROM zal WHERE id_zal='$id_zal'");
header("Location: zal.php");
exit;
?>
