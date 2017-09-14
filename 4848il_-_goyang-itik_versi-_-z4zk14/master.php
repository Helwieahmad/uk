<?php
//error_reporting(0);
session_start();
if (empty($_SESSION[username]) AND empty($_SESSION[password]) AND empty($_SESSION[level])){
	header('location:index.php');
}
else{
	if ($_SESSION[level] == '1'){
		include "master/master_admin.php";
	}else{
		include "master/master_staff.php";
	}
}
?>