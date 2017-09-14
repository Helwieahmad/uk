<?php
include "../config/koneksi.php";
$username	= $_POST[username];
$password	= md5($_POST[password]);
$level		= $_POST[level];

$sql 	= mysql_query("SELECT * FROM user WHERE username = '$username' AND kata_sandi = '$password' AND level = '$level'");
$ketemu = mysql_num_rows($sql);
$data	= mysql_fetch_array($sql);

if (empty($username) || empty($password)){
	echo "<script>alert('Anda belum memasukkan username atau password'); window.location = 'index.php'</script>";
}
elseif ($level == '++'){
	echo "<script>alert('Anda belum memilih level user'); window.location = 'index.php'</script>";
}
else{
	if ($ketemu > 0){
		$date = date('Y-m-d H:i:s');
		mysql_query("UPDATE user SET lastlogin = '$date' WHERE id_user = '$data[id_user]'");
		session_start();
		session_register("id_user");
		session_register("nip");
		session_register("nama_lengkap");
		session_register("username");
		session_register("kata_sandi");
		session_register("level");
	
		$_SESSION[id_user] 	= $data[id_user];
		$_SESSION[username] = $data[username];
		$_SESSION[password]	= $data[password];
		$_SESSION[nip]		= $data[nip];
		$_SESSION[level]	= $data[level];
		$_SESSION[nama_lengkap] = $data[nama_lengkap];
	
		header('location: master.php');
	}
	else{
		header('location: index.php');
	}
}
?>