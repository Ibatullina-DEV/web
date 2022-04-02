<?php
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database) or die ("Невозможно
подключиться к серверу");
$id_film = $_GET['id_film'];
$result = $mysqli->query("DELETE FROM films WHERE id_film ='$id_film'");
header("Location: index.php");
exit;
?>