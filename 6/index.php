<!DOCTYPE html>
<html lang="en">
    <head><title> Авторизация</title></head>
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
              background-size: 130%, 100%;
            }
            div {
              /* Определим размер и выравнивание */
              display: inline-block;
              text-align: center;
              opacity: 0.7;
              background: #fff;
              padding: 0.55em;
              border: 0.5px solid #000;
              border-radius: 1em;
            }
            adm {
              /* Определим размер и выравнивание */
              position: absolute;
              background-repeat: no-repeat;
              background-size: 100%, 100%;
              top: 5px; 
              right: 35px;
              display: inline-block;
              text-align: center;
              opacity: 0.7;
              background: #fff;
              padding: 0.55em;
              border: 0.5px solid #000;
              border-radius: 1em;
            }
</style>

<body align="center">

<adm>
        Администратор:<br>
        Логин - adm<br>
        Пароль - adm<br><br>
        Оператор:<br>
        Логин - alina<br>
        Пароль - admin<br>
</adm>

<div >
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
    <h2 align="center">Авторизация</h2>
    
    <p align="left">
    Введите Логин: <input type="text" size=21 name="user"> <br><br>
    Введите Пароль: <input type="password" name="pass"> <br></p>
   <p align="center"><input type="submit" name="come" value="Войти">
    <input type="reset" name="reset" value="Очистить"></p>
</form>
<?php
require_once 'connect1.php';
if (isset($_POST["come"])) {
    $link = mysqli_connect($host, $user, $password, $database) or die ("Невозможно
подключиться к серверу" . mysqli_error($link));
    $user = $link->query("SELECT id_u, username, password, type FROM users");
    // Ввод
    $username = $_POST["user"];
    $password = $_POST["pass"];
    // Для индитификации входа
    $errFlag = false;
    // Проверка вводимых данных
    while ($data = mysqli_fetch_array($user)) {
        $usernameBD = $data['username'];
        $passwordBD = $data['password'];
        $typeBD = $data['type'];
        $idUserBD = $data['id_u'];

        if ($username === $usernameBD && md5($password) === $passwordBD) {
            $errFlag = true;
            session_start();
            $_SESSION['type'] = $typeBD;
            $_SESSION['id_u'] = $idUserBD;
            break;
        } else
            $errFlag = false;
    }

    if ($errFlag && $_SESSION['type'] == 1)
        header("Refresh:0; url=film.php");
    elseif ($errFlag && $_SESSION['type'] == 2)
        header("Refresh:0; url=filmAdm.php");
    else
        echo "Логин или пароль введен не верно";

}
?>
<br>
</body>
</html>