<?php
//error_reporting(0);
session_start();
if (empty($_SESSION[username]) AND empty($_SESSION[password]) AND empty($_SESSION[level])){
	header('location:index.php');
	
}
elseif($_SESSION[level] == '3'){
		include "master/master_dosen.php";
	}
else{
	echo "<script>alert('Maaf Anda Harus Login Terlebih Dahulu...!'); 
	window.location = 'index.php'</script>";
	
}
?>