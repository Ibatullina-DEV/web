<HTML>
<TITLE>  Ибатуллина А.И. Пи-323</TITLE>
<BODY>
 <h1>Ибатуллина А.И. Пи-323</h1><p>
12. Дан одномерный массив случайных чисел А=(А1,А2,...,А21), заполнить матрицу: <p>
    <img src="s.png"><p>
<table border="1">
<?php
$num = range(-99, 99); //Создаём набор чисел
shuffle($num); //Смешиваем набор чисел
$mass = array_slice($num, 0, 21); //Создаём массив от 0 до 99 со смешанными чиселами

print('<br>Одномерный массив случайных чисел А= <br>'); 
print_r($mass); //Выводим исходный массив
print("<br><tr><th></th>");
for ($j = 1; $j <= 6; $j++) {
print("<th>$j</th>");
}
print("</tr><tr>");
$u=0;
for ($k = 1; $k <= 6; $k++) {
        print('<td>'.$k.'</td>');
for ($r = 1; $r <= $k; $r++) {
print('<td>'.$mass[$u].'</td>');
$u++;
}
for ($n = 6; $n > $k; $n--) {
print('<td>0</td>');
}
print_r("</tr>");
}

?>
</TABLE>
</BODY>
</HTML>
</HTML>