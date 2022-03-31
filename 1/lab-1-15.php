<TITLE> Самостоятельная работа 2</TITLE>
<BODY>
<TABLE border=1
<?php
 for ($i=1; $i<=10; $i++) {
    echo ("<tr>");
 for ($k=1; $k<=10; $k++) {
    $count++;
	echo ("<td align=center>");
 if ($count%2==0) {
    print "<font style=\"color:#FF0000\">$count</font>";}
 else  {
    print "<font style=\"color:#000000\">$count</font>";}
 echo ("</td>");
}
 echo ("</tr>");
}
?>