<?php
$server  	= "localhost";
$username 	= "root";
$password	= "";
$database	="personal_dosen";

mysql_connect($server,$username,$password) or die("gagal");
mysql_select_db($database) or die ("Database tidak ditemukan");
?>