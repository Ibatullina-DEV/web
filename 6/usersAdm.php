<?
include("checks.php");
require_once 'connect1.php'; ?>
<html>
<head><title> Сведения о прользователях сайта </title></head>

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

<body align="center">

<lable align="center">
<div align="center">
    <h2>Зарегистрированные пользователи:</h2>
</div><br><br>
<div align="center">
    <table border="1">
        <tr>
            <th> Имя</th>
            <th> Редактировать</th>
            <th> Уничтожить</th>
        </tr>

        <?php
        if ($_SESSION['type'] == 2) {
            $link = mysqli_connect($host, $user, $password, $database)
            or die("Ошибка " . mysqli_error($link));

            $result = mysqli_query($link, "SELECT id_u, username, `password` FROM users");// запрос на выборку сведений о пользователях
            mysqli_select_db($link, "users");

            while ($row = mysqli_fetch_array($result)) {// для каждой строки из запроса
                echo "<tr>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td><a href='edit_users.php?id_u=" . $row['id_u'] . "'> Редактировать </a> </td>"; // запуск скрипта для редактирования
                echo "<td><a href='delete_users.php?id_u=" . $row['id_u'] . "'> Удалить </a></td>"; // запуск скрипта для удаления записи
                echo "</tr>";
            }
            print "</table>";
            $num_rows = mysqli_num_rows($result); // число записей в таблице БД
            print("<P> Всего пользователей: $num_rows </p>");
            echo "<p><a href=new_users.php> Добавить пользователя </a>";
            echo "<p><a href=filmAdm.php> На Главную </a>";
        } else {
            echo "Недостаточно прав";
            echo "<p><a href=film.php> На Главную </a>";
        }
        include("checkSession.php");
        ?>
</div>
</lable>
</body>
</html>