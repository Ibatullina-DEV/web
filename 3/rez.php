<?php
if (isset($_POST["v1"]) && isset($_POST["v2"]) && isset($_POST["v3"]) && isset($_POST["v4"]) && isset($_POST["v5"]) && 
isset($_POST["v6"]) && isset($_POST["v7"]) && isset($_POST["v8"]) && isset($_POST["v9"]) && isset($_POST["v10"]) &&  isset($_POST["v11"]) &&
isset($_POST["v12"]) && isset($_POST["v13"]) && isset($_POST["v14"]) && isset($_POST["v15"]) && isset($_POST["v16"]) && isset($_POST["v17"]) &&
isset($_POST["v18"]) && isset($_POST["v19"]) && isset($_POST["v20"])) {
$name = htmlentities($_POST['a']);
  $counterPoints = 0;
  
if($_POST['v3'] == '1'){
    $counterPoints++;
}

if($_POST['v9'] == '1'){
    $counterPoints++;
}

if($_POST['v10'] == '1'){
    $counterPoints++;
}

if($_POST['v13'] == '1'){
    $counterPoints++;
}

if($_POST['v14'] == '1'){
    $counterPoints++;
}

if($_POST['v19'] == '1'){
    $counterPoints++;
}

if($_POST['v1'] == '2'){
    $counterPoints++;
}

if($_POST['v2'] == '2'){
    $counterPoints++;
}

if($_POST['v4'] == '2'){
    $counterPoints++;
}

if($_POST['v5'] == '2'){
    $counterPoints++;
}

if($_POST['v6'] == '2'){
    $counterPoints++;
}

if($_POST['v7'] == '2'){
    $counterPoints++;
}

if($_POST['v8'] == '2'){
    $counterPoints++;
}

if($_POST['v11'] == '2'){
    $counterPoints++;
}

if($_POST['v12'] == '2'){
    $counterPoints++;
}

if($_POST['v15'] == '2'){
    $counterPoints++;
}

if($_POST['v16'] == '2'){
    $counterPoints++;
}

if($_POST['v17'] == '2'){
    $counterPoints++;
}

if($_POST['v18'] == '2'){
    $counterPoints++;
}

if($_POST['v20'] == '2'){
    $counterPoints++;
}

if($counterPoints >=15){
    $result = ' Хорошо';
} elseif($couterPoints < 15 && $counterPoints >= 8){
    $result = ' Не плохо';
} elseif($counterPoints < 8){
    $result= ' Плохо';
}
}
$output ="
    <html>
    <head>
    <title>Результаты тестирования</title>
    </head>
    <body>
    Имя: $name<br />
    Ваш результат: $counterPoints /20 баллов<br />
    Комментарий: $result<br />
    <ul>";
echo $output;
?>