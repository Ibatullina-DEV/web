   <meta charset="utf-8" />
</head>
<BODY>
<FORM method="post" action="<?php print $PHP_SELF ?>">
Введите N: <INPUT type="text" name="n" size="3">
 <p><label for="font">Показать только: </label><select name="font" id="font">
      <option value="uneven">Нечетные</option>
	  <option value="even">Четные</option>
	  <option value="simle">Простые</option>
	  <option value="composite">Составные</option>
	</select>
   </p>
 <P> <INPUT type="submit" name="obr" value="Посчитать!">
</FORM>
<?
$m = range(0, $_POST["n"]);
unset($m[0]);
switch ($_POST["font"]) {
  case uneven:
  echo  "Список нечетных чисел от 1 до N: <br>";
  for ($i = 1; $i <= $_POST["n"]; $i++) {
    if ($m[$i] % 2 <> 0){echo $m[$i] . "<br>";}
  }
  break;
  case even:
  echo  "Список четных чисел от 1 до N: <br>";
  for ($i = 1; $i <= $_POST["n"]; $i++) {
    if ($m[$i] % 2 === 0){echo $m[$i] . "<br>";}
  }
  break;
  case simle:
  echo  "Список простых чисел от 1 до N: <br>";
  for ($i = 1; $i <= $_POST["n"]; $i++) {
    for ($j = 2; $j < $m[$i]; $j++){
      if ($m[$i] % $j == 0){
      unset($m[$i]);
        break;
      }
    }
  }
  for ($i = 2; $i <= $_POST["n"]; $i++) {
    if ($m[$i] <> ''){echo $m[$i] . "<br>";}
  } 
  break;
  case composite:
  echo  "Список составных чисел от 1 до N: <br>";
  for ($i = 1; $i <= $_POST["n"]; $i++) {
    for ($j = 2; $j < $m[$i]; $j++){
      if ($m[$i] % $j == 0){
        echo $m[$i] . "<br>";
        break;
      }
    }
  }
  break;
}
?>