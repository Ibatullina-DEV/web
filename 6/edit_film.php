<html>
<head>
    <title> Редактирование данных о Фильмах </title>
</head>
<body>
<?php
include ("checks.php");
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Невозможно подключиться к серверу";
}// установление соединения с сервером
$id_film = $_GET['id_film'];

$result = $mysqli->query("SELECT name_film, cinema, director, `year`, fees, des FROM films WHERE id_film='$id_film'");
if ($result) {
    while ($gm = $result->fetch_array()) {
        $name_film = $gm['name_film'];
        $cinema = $gm['cinema'];
        $director = $gm['director'];
        $year = $gm['year'];
        $fees = $gm['fees'];
        $des = $gm['des'];
    }
}

print "<form action='save_edit_film.php' method='get'>";
print "Название: <input name='name_film' size='50' type='text'
value='$name_film'>";
print "<br>Жанр: <input name='cinema' size='30' type='text'
value='$cinema'>";
print "<br>Режиссер: <input name='director' size='30' type='text'
value='$director'>";
print "<br>Год выпуска: <input name='year' size='30' type='text'
value='$year'>";
print "<br>Сборы: <input name='fees' size='11' type='int'
value='$fees'>";
print "<br>Описание: <input name='des' size='30' type='text'
value='$des'>";
print "<input type='hidden' name='id_film' size='11' type='int'
value='$id_film'>";
print "<input type='submit' name='save' value='Сохранить'>";
print "</form>";
if ($_SESSION['type'] == 1)
    echo "<p><a href=film.php> Вернуться назад </a>";
elseif ($_SESSION['type'] == 2)
    echo "<p><a href=filmAdm.php> Вернуться назад </a>";
?>
</body>
</html>