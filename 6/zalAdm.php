<html>
<head><title> Сведения о Кинозалах </title></head>


<div>
<h2>Администратор</h2>
</div><br><br>
<body align="center">

<style>
body {
  background-color: #C0D7E6; /* Цвет фона веб-страницы */
  background-size: 100% 100%;
}
div {
  /* Определим размер и выравнивание */
  display: inline-block;
  text-align: center;
  opacity: 0.8;
  background: #fff;
  padding: 1em;
  border: 1px solid #000;
  border-radius: 1em;
}
lable {
  /* Определим размер и выравнивание */
  display: inline-block;
  vertical-align: top;
  opacity: 0.8;
  background: #0001;
  padding: 1em;
  border: 1px solid #000;
  border-radius: 1em;
}
</style>
<lable align="center">
<div align="center">
<h2>Сведения о Кинозалах:</h2>
</div><br>
<div align="center">
<table border="1">
    <tr>
        <th>id Зала</th>
        <th>Название</th>
        <th>Категория</th>
        <th>Редактировать</th>
        <th>Уничтожить</th>
    </tr>
    </tr>
    <?php
    include("checks.php");
    require_once 'connect1.php';
    $link = mysqli_connect($host, $user, $password, $database) or die ("Невозможно
подключиться к серверу" . mysqli_error($link));
    $result = mysqli_query($link, "SELECT id_zal, name_z, cat_z FROM zal"); // запрос на выборку сведений о пользователях
    mysqli_select_db($link, "subj");

    while ($row = mysqli_fetch_array($result)) {// для каждой строки из запроса
        echo "<tr>";
        echo "<td>" . $row['id_zal'] . "</td>";
        echo "<td>" . $row['name_z'] . "</td>";
        echo "<td>" . $row['cat_z'] . "</td>";
        echo "<td><a href='edit_zal.php?id_zal=" . $row['id_zal']
            . "'>Редактировать</a></td>"; // запуск скрипта для редактирования
        echo "<td><a href='delete_zal.php?id_zal=" . $row['id_zal']
            . "'>Удалить</a></td>"; // запуск скрипта для удаления записи
        echo "</tr>";
    }
    print "</table>";
    $num_rows = mysqli_num_rows($result); // число записей в таблице БД
    print("<P>Всего Залов: $num_rows </p>");
    echo "<p><a href=new_zal.php> Добавить Кинозал </a>";
    if ($_SESSION['type'] == 1)
        echo "<p><a href=film.php> Вернуться назад </a>";
    elseif ($_SESSION['type'] == 2)
        echo "<p><a href=filmAdm.php> Вернуться назад </a>";
    include("checkSession.php");
    ?>
</body>
</html>