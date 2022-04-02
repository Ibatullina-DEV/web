<html>
<head>
    <title> Редактирование данных Сеансов </title>
</head>
<body>
<?php
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Невозможно подключиться к серверу";
}// установление соединения с сервером

$id = $_GET['id'];
$prod = mysqli_query($mysqli, "SELECT
			seans.id,
			seans.date_seans,
            seans.count_svob,
            seans.count_zan,
       
			films.id_film as id_film,
			films.name_film as name_film,

			zal.id_zal as id_zal,
			zal.name_z as name_z

			FROM seans
			LEFT JOIN films ON seans.id_film=films.id_film
			LEFT JOIN zal ON seans.id_zal=zal.id_zal
			WHERE seans.id='$id'"
);

if ($prod) {
    $prod = $prod->fetch_array();

    $id = $prod['id'];
    $date_seans = $prod['date_seans'];
    $count_svob = $prod['count_svob'];
    $count_zan = $prod['count_zan'];

    $id_film = $prod['id_film'];
    $name_film = $prod['name_film'];

    $id_zal = $prod['id_zal'];
    $name_z = $prod['name_z'];

}


print "<form action='save_edit_seans.php' method='get'>";

$result = $mysqli->query("SELECT id_film, name_film FROM films WHERE id_film <> '$id_film' ");
echo "<br>Фильм:<select name='id_film'>";
echo "<option selected value='$id_film'>$name_film</option>";
if ($result) {
    while ($row = $result->fetch_array()) {
        $id_film = $row['id_film'];
        $name_film = $row['name_film'];
        echo "<option value='$id_film'>$name_film</option>";
    }
}
echo "</select>";

$result = $mysqli->query("SELECT id_zal, name_z FROM zal WHERE id_zal <> '$id_zal' ");
echo "<br>Зал: <select name='id_zal'>";
echo "<option selected value='$id_zal'>$name_z</option>";

if ($result) {
    while ($row = $result->fetch_array()) {
        $id_zal = $row['id_zal'];
        $name_z = $row['name_z'];
        echo "<option value='$id_zal'>$name_z</option>";
    }
}
echo "</select>";

print "<br>Дата: <input name='date_seans' placeholder='dd-mm-yyyy' type='datetime-local' value=$date_seans>";
print "<br> Кол-во мест: <input name='count_svob' size='11' type='int' value=$count_svob>";
print "<br> Занятых мест: <input name='count_zan' size='11' type='int' value=$count_zan>";
print "<input type='hidden' name='id' size='11' value=$id>";
print "<input  name='save' type='submit' value='Сохранить'>";
print "</form>";
print "<p><a href='seans.php'> Вернуться к Сеансам </a>";
?>
</body>
</html>