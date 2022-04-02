<?php
//1
if (isset($_POST["firstButton"])) {
$r1="";
print("Исходная строка:<br /> ".$_POST['text2']."<br><br>" );
$b=$_POST['a1'].$_POST['a2'];
$str1=str_replace($b,'',$_POST['text2']);
print("Преобразованная строка:<br /> ".str_replace(mb_strtoupper($b, 'UTF-8'),'',$str1));
}
//2
if (isset($_POST["secondButton"])) {

 
 echo "Исходное слово: ".$_POST["text3"]."<br>";
echo "Зашифрованное слово: ";
$string=$_POST["text3"];
$arr = array ();
$strlen = mb_strlen ($string);
while ($strlen) {
$arr[] = mb_substr ($string, 0, 1);
$string = mb_substr ($string, 1, $strlen);
$strlen = mb_strlen ($string);
}
for ($i = 0; $i <= (count($arr)-1); $i++) {
if ($i%2<>0) {
echo $arr[$i];
}
}
for ($i = (count($arr)-1); $i >=0 ; $i--) {
if ($i%2==0) {
echo $arr[$i];
}
}

}

//3
if (isset($_POST["thirdButton"])) {
    if (is_numeric($_POST["text1"])){
    
        if((strripos($_POST["text1"],'.')) OR (strripos($_POST["text1"],','))){
            echo "2";
        }else{
            echo "1";
        }
    }   
    else{
        echo "0";
    }
}
?>