<?php
include("checks.php");
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
    if ($_SESSION['type'] == 1)
        echo "<p><a href=sean.php> Вернуться к списку Сеансов </a>";
    elseif ($_SESSION['type'] == 2)
        echo ".<p><a href=seanAdm.php> Вернуться к списку Сеансов </a>";
} else {
    if ($_SESSION['type'] == 1)
        echo "Ошибка сохранения . <p><a href=sean.php> Вернуться к списку Сеансов </a>";
    elseif ($_SESSION['type'] == 2)
        echo "Ошибка сохранения . <p><a href=seanAdm.php> Вернуться к списку Сеансов </a>";
}

?>