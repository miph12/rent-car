<?php 

$server ='localhost';
$user = 'root';
$pass='';
$dbnama='mobil';

$conek = mysql_connect($server,$user,$pass) or die(mysql_error());
$selctdb = mysql_select_db($dbnama);
 ?>