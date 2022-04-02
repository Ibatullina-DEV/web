<HTML>
<TITLE>  Ибатуллина А.И. Пи-323</TITLE>
<BODY>
 <h1>Ибатуллина А.И. Пи-323</h1><p>
Задача 2.5.<p>
Найти значение переменной z, заданной суммой функций. Для нахождения значения
функции f(u,t) написать пользовательскую функцию. Числа a и b – случайные.<p>

<?php
$a = rand(-50, 49);
$b = rand(-50, 49);
print('a = '. $a . '<br>'); //Выводим
print('b = '. $b . '<br>'); //Выводим

//z1
if ((pow($a, 2))<=(-$b)){
    $z1=pow($a, 2)*log(pow($a, 2))+exp($b-1);
}
elseif (((-$b)<(pow($a, 2))) AND ((pow($a, 2))<$b)){
  $z1=2*$b*(pow($a,2));
}  
elseif ((pow($a,2))>$b){
  $z1=pow(cos(pow($a,2)),2)+(pow($b,2)/5);
}

//z2
if($a>=(-$b)){
    $z2=$b*log($b)+exp($a-1);
}
elseif (((-$b)>$a) AND ($a>$b)){
  $z2=2*$a*$b;
}  
elseif ($a<$b){
  $z2=pow(cos($b),2)+(pow($a,2)/5);
} 

print('z = cos f(a^2,b) + sin f^2(b,a) '. '<br>'); //Выводим
$z=cos($z1)+sin(pow($z2,2));
print('cos f(a^2,b) = '. cos($z1) . '<br>'); //Выводим
print('sin f^2(b,a) = '. sin(pow($z2,2)) . '<br>'); //Выводим
print('z = '. $z); //Выводим
?>
</BODY>
</HTML>