<HTML>
<HEAD> <TITLE> Авторизация </TITLE>
</HEAD>
<BODY>
<FORM method="post" action="<?php print $PHP_SELF ?>">
 Введите логин:
    <INPUT type="text" name="a" size="25">
	<INPUT type="hidden" name="h" value="alina">
	<INPUT type="hidden" name="b" value="ivan_iv">
    <INPUT type="hidden" name="n" value="no_name_29">
	<INPUT type="hidden" name="m" value="stud_ugatu">
  <P> <INPUT type="submit" name="obr" value="Продолжить">
</FORM>
<?
if (isset($_POST["obr"])) {
if ($_POST["a"]==$_POST["h"]) { echo ("Привет, Алина!");
 } else {
if ($_POST["a"]==$_POST["b"]) { echo ("Здравствуйте, Иванов Иван Иванович!");
 }
 else {
if ($_POST["a"]==$_POST["n"]) { echo ("Здравствуйте, Неизвестная личность!");
 }
 else {
if ($_POST["a"]==$_POST["m"]) { echo ("Здравствуйте, студент УГАТУ!");
 }
 else
 { echo ("Вы не зарегистрированный пользователь!"); }
} } }
}
?>
 