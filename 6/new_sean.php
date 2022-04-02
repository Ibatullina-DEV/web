<html>
<head><title> Добавление Сеанса </title></head>
<body>
<H2>Добавление Сеанса:</H2>
<form action="save_new_sean.php" method="get">
    <?php
    include ("checks.php");
    require_once 'connect1.php';
    $mysqli = new mysqli($host, $user, $password, $database);
    if ($mysqli->connect_errno) {
        echo "Невозможно подключиться к серверу";
    }

    $result = $mysqli->query("SELECT id_film, name_film FROM films");
    echo "<br>Фильм: <select name='id_film'>";

    if ($result) {
        while ($row = $result->fetch_array()) {
            $id_film = $row['id_film'];
            $name_film = $row['name_film'];
            echo "<option value='$id_film'>$name_film</option>";
        }
    }
    echo "</select>";

    $result = $mysqli->query("SELECT id_zal, name_z FROM zal");
    echo "<br>Зал: <select name='id_zal'>";

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
    echo "<p><input name='add' type='submit' value='Добавить'></p>";
    echo "<p><input name='b2' type='reset' value='Очистить'></p>";
    if ($_SESSION['type'] == 1)
        echo "<p><a href=sean.php> Вернуться к списку Сеансов </a></p>";
    elseif ($_SESSION['type'] == 2)
        echo "<p><a href=seanAdm.php> Вернуться к списку Сеансов </a></p>";
    ?>
</form>
</body>
</html>
