<?php
include "config/koneksi.php";
$username	= $_POST[username];
$password	= md5($_POST[password]);
$level		= $_POST[level];

$sql 	= mysql_query("SELECT * FROM profil_dosen WHERE username = '$username' AND kata_sandi = '$password' AND level = '$level'");
$ketemu = mysql_num_rows($sql);
$data	= mysql_fetch_array($sql);


if (empty($username) || empty($password)){
	echo "<script>alert('Anda belum memasukkan username atau password'); window.location = 'index.php'</script>";
}
else{
	if ($ketemu > 0){
		$date = date('Y-m-d H:i:s');
		mysql_query("UPDATE profil_dosen SET lastlogin = '$date' WHERE id_dosen = '$data[id_dosen]'");
		session_start();
		session_register("id_dosen");
		session_register("nip");
		session_register("nama");
		session_register("username");
		session_register("kata_sandi");
		session_register("level");
	
		$_SESSION[id_dosen] 	= $data[id_dosen];
		$_SESSION[username] = $data[username];
		$_SESSION[password]	= $data[password];
		$_SESSION[nip]		= $data[nip];
		$_SESSION[level]	= $data[level];
		$_SESSION[nama] = $data[nama];
	
		header('location: master.php');
	}
	else{
	echo "<script>alert('Untuk Login, Silahkan isi Username, Password dan inputkan Angka 3 dibawahnya '); 
	window.location = 'index.php'</script>";
	}
}
?>