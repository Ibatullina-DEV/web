<?php
echo 'Ассоциативный массив: ';
$cust= array("cnum"=>"2001", "cname"=>"Hoffman", "city"=>"London", "snum"=>"1001");
print_r ($cust);

echo '<br><br>' . 'Добавлен ключ rating со значением 100 в массив: ';
$cust["rating"] = 100;
foreach($cust as $k => $v)
echo  $k, ' => ', $v;

echo '<br><br>' . 'Сортировка массива по значениям: ';
asort($cust);
print_r($cust);

echo '<br><br>' . 'Сортировка массива по ключам: ';
ksort($cust);
print_r($cust);

echo '<br><br>' . 'Отсортированный массив: ';
sort($cust);
print_r($cust);
?>
