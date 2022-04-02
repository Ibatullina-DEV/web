<?php
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к БД";
}

$date_seans = $_GET['date_seans'];
$id_film = $_GET['id_film'];
$id_zal = $_GET['id_zal'];
$count_svob = $_GET['count_svob'];
$count_zan = $_GET['count_zan'];

// Выполнение запроса
$result = $mysqli->query("INSERT INTO seans SET date_seans='$date_seans', id_film='$id_film', id_zal='$id_zal', count_svob='$count_svob', count_zan='$count_zan'");

if ($result) {
    print "<p>Внесение данных прошло успешно!";
    print "<p><a href='seans.php'> Вернуться к списку </a>";
} else {
    print "Ошибка сохранения <a href='seans.php'> Вернуться к списку </a>";
}

?>