<?php 
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "mobil";

mysql_connect($host,$user,$pass) or die(mysql_error()."gagal koneksi mysql");
mysql_select_db("$dbname") or die(mysql_error()."gagl koneksi database");
 ?>
