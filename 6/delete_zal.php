<?php
include("checks.php");
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database)
or die ("Невозможно подключиться к серверу");
$id_zal = $_GET['id_zal'];
if ($_SESSION['type'] == 2)
    $result = $mysqli->query("DELETE FROM zal WHERE id_zal='$id_zal'");
else
    echo "Недостаточно прав";
header("Location: zalAdm.php");
exit;
?>
