<html>
<body>
<?php
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Невозможно подключиться к серверу";
} // установление соединения с сервером

$id_film = $_GET['id_film'];

$name_film = $_GET['name_film'];
$cinema = $_GET['cinema'];
$director = $_GET['director'];
$year = $_GET['year'];
$fees = $_GET['fees'];
$des = $_GET['des'];

$zapros = "UPDATE films SET name_film='$name_film', cinema='$cinema',
director='$director', `year`='$year', fees='$fees', des='$des'
WHERE id_film='$id_film'";

$result = $mysqli->query($zapros);

if ($result) {
    echo 'Все сохранено. <a href="index.php"> Вернуться к списку Фильмов </a>';
} else {
    echo 'Ошибка сохранения. <a href="index.php">Вернуться к списку Фильмов</a> ';
}
?>
</body>
</html>