<html>
<head><title> Сведения о Фильмах </title></head>
<div align="left">
<a href="http://a0654147.xsph.ru/">Вернуться назад</a></div>
<body>

<style>
a { 
    text-decoration: none; /* Отменяем подчеркивание у ссылки */
    color: black;
   }
body {
  background-color: #C0D7E6; /* Цвет фона веб-страницы */
  background-size: 100% 100%;
}
div {
  /* Определим размер и выравнивание */
  display: inline-block;
  opacity: 0.8;
  background: #FFF;
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
<h2>Сведения о Фильмах:</h2>
</div><br>
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
        <th>Уничтожить</th>
    </tr>
    </tr>
    <?php
    require_once 'connect1.php';
    $link = mysqli_connect($host, $user, $password, $database) or die ("Невозможно
подключиться к серверу" . mysqli_error($link));
    $result = mysqli_query($link, "SELECT id_film, name_film, cinema, director, `year`, fees, des
FROM films");
    mysqli_select_db($link, "users");

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['id_film'] . "</td>";
        echo "<td>" . $row['name_film'] . "</td>";
        echo "<td>" . $row['cinema'] . "</td>";
        echo "<td>" . $row['director'] . "</td>";
        echo "<td>" . $row['year'] . "</td>";
        echo "<td>" . $row['fees'] . "</td>";
        echo "<td>" . $row['des'] . "</td>";
        echo "<td><a href='edit_films.php?id_film=" . $row['id_film']
            . "'>Редактировать</a></td>"; // запуск скрипта для редактирования
        echo "<td><a href='delete_films.php?id_film=" . $row['id_film']
            . "'>Удалить</a></td>"; // запуск скрипта для удаления записи
        echo "</tr>";
    }
    print "</table>";
    $num_rows = mysqli_num_rows($result); // число записей в таблице БД
    print("<P>Всего Фильмов: $num_rows </p>");
    ?>
    </div><br>
    <div>
    <p><a href="new_films.php"> Добавить Фильм</a>
    <p><a href="seans.php">Киносеанс</a>
    <p><a href="zal.php">Кинозал</a>
    <p><a href="gen_pdf.php">Скачать pdf-файл</a>
    <p><a href="gen_xls.php">Скачать xls-файл</a>
    </div>
    </lable>
</body>
</html>