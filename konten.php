<?php
include ('koneksi.php');
error_reporting(0);

$page=htmlentities($_GET['page']);
$halaman="$page.php";

if(!file_exists($halaman) || empty($page)){
	include "awal.php";
}else{
	include "$halaman";
}

?>