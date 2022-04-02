<?php
include("checks.php");
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database) or die ("Невозможно
подключиться к серверу");
$id_film = $_GET['id_film'];
if ($_SESSION['type'] == 2)
    $result = $mysqli->query("DELETE FROM films WHERE id_film ='$id_film'");
else
    echo "Недостаточно прав";
header("Location: filmAdm.php");
exit;
?>
