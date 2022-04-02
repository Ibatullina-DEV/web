<html>
<body>
<?php
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Невозможно подключиться к серверу";
} // установление соединения с сервером


$id_zal = $_GET['id_zal'];
$name_z = $_GET['name_z'];
$cat_z = $_GET['cat_z'];

$zapros = "UPDATE zal SET name_z='$name_z', cat_z='$cat_z' 
WHERE id_zal='$id_zal'";

$result = $mysqli->query($zapros);

if ($result) {
    echo 'Все сохранено. <a href="zal.php"> Вернуться к списку Кинозалов </a>';
} else {
    echo 'Ошибка сохранения. <a href="zal.php">Вернуться к списку Кинозалов</a> ';
}
?>
</body>
</html>