<html>
<head><title> Сведения о Фильмах </title></head>

<v> <a href="http://a0654147.xsph.ru/">Вернуться назад</a></v><br><br>
<style>
a { 
    text-align: center;
    text-decoration: none; /* Отменяем подчеркивание у ссылки */
    color: black;
   }
v { 
    position: relative;
    top: 20px;
    left: -560px;
    opacity: 0.8;
    background: #fff;
    padding: 1em;
    border: 1px solid #000;
    border-radius: 1em;
   }
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
<div>
<h2>Оператор</h2>
</div><br><br>
<body align="center">
<lable align="center">
<div align="center">
<h2>Сведения о Фильмах:</h2>
</div>

<br>
<div align="center">
<table border="1">
    <tr>
        <th>ID</th>
        <th>Название</th>
        <th>Жанр</th>
        <th>Режиссер</th>
        <th>Год</th>
        <th>Сборы</th>
        <th>Описание</th>
        <th>Редактировать</th>
    </tr>
    </tr>
    <?php
    include("checks.php");
    require_once 'connect1.php';
    $link = mysqli_connect($host, $user, $password, $database) or die ("Невозможно
подключиться к серверу" . mysqli_error($link));
    $result = mysqli_query($link, "SELECT id_film, name_film, cinema, director, `year`, fees, des
FROM films");
    mysqli_select_db($link, "films");

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['id_film'] . "</td>";
        echo "<td>" . $row['name_film'] . "</td>";
        echo "<td>" . $row['cinema'] . "</td>";
        echo "<td>" . $row['director'] . "</td>";
        echo "<td>" . $row['year'] . "</td>";
        echo "<td>" . $row['fees'] . "</td>";
        echo "<td>" . $row['des'] . "</td>";

        echo "<td><a href='edit_film.php?id_film=" . $row['id_film']
            . "'>Редактировать</a></td>"; // запуск скрипта для редактирования
        echo "</tr>";
    }
    print "</table>";
    $num_rows = mysqli_num_rows($result); // число записей в таблице БД
    print("<P>Всего Фильмов: $num_rows </p>");
    if ($_SESSION['type'] == 1) {
        echo "<p><a href=new_film.php> Добавить Фильм</a>";
        echo "<p><a href=sean.php>Киносеанс</a>";
        echo "<p><a href=zal.php>Кинозал</a>";
        echo "<p><a href=edit_users.php?id_u=" . $_SESSION['id_u'] . "> Изменить данные Оператора</a>";
    } elseif ($_SESSION['type'] == 2) {
        echo "<p><a href=new_film.php> Добавить Фильм</a>";
        echo "<p><a href=seanAdm.php>Киносеанс</a>";
        echo "<p><a href=zalAdm.php>Кинозал</a>";
        echo "<p><a href=usersAdm.php>Изменить данные Пользователей</a>";
    }
    echo "<p><a href=gen_pdf.php>Скачать pdf-файл</a>";
    echo "<p><a href=gen_xls.php>Скачать xls-файл</a>";
    include("checkSession.php");
    ?>


</body>
</html>