<html>
<body>
<?php
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Невозможно подключиться к серверу";
} // установление соединения с сервером

$id = $_GET['id'];
$date_seans = $_GET['date_seans'];
$id_film = $_GET['id_film'];
$id_zal = $_GET['id_zal'];
$count_svob = $_GET['count_svob'];
$count_zan = $_GET['count_zan'];

$result = $mysqli->query("UPDATE seans SET date_seans='$date_seans', id_film='$id_film', id_zal='$id_zal', count_svob='$count_svob', count_zan='$count_zan'  WHERE id='$id'");

if ($result) {
    echo 'Все сохранено. <a href="seans.php"> Вернуться к списку Сеансов </a>';
} else {
    echo 'Ошибка сохранения. <a href="seans.php">Вернуться к списку Сеансов</a> ';
}
?>
</body>
</html>