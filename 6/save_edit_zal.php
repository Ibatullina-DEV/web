<html>
<body>
<?php
include("checks.php");
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
    if ($_SESSION['type'] == 1)
        echo "Все сохранено.<a href=zal.php> Вернуться к списку Кинозалов </a>";
    elseif ($_SESSION['type'] == 2)
        echo "Все сохранено.<a href=zalAdm.php> Вернуться к списку Кинозалов </a>";
} else {
    if ($_SESSION['type'] == 1)
        echo "Ошибка сохранения.<a href=zal.php> Вернуться к списку Кинозалов </a>";
    elseif ($_SESSION['type'] == 2)
        echo "Ошибка сохранения.<a href=zalAdm.php> Вернуться к списку Кинозалов </a>";
}
?>
</body>
</html>