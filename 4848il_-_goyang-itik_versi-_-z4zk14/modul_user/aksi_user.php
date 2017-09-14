<?php
session_start();
include "../../config/koneksi.php";
$act 	= $_GET[act];
$modul 	= $_GET[module];

if ($modul == 'manajemen_user' AND $act == 'input'){
	if (empty($_POST[nip]) || empty($_POST[nama_lengkap]) || empty($_POST[pendidikan_terakhir]) || empty($_POST[alamat])  || empty($_POST[telepon]) || empty($_POST[username]) || empty($_POST[email]) || empty($_POST[password])){
		echo "<script language='javascript'>alert('Isi seluruh kolom yang berkaitan dengan identitas User');
			  window.location = '../master.php?module=manajemen_user&act=tambahuser'</script>";
	}
	elseif ($_POST[agama] == '++'){
		echo "<script language='javascript'>alert('Silahkan Pilih Agama');
			  window.location = '../master.php?module=manajemen_user&act=tambahuser'</script>";
	}
	else{
		$numRowsUsername = mysql_num_rows(mysql_query("SELECT username FROM user WHERE username = '$_POST[username]'"));
		$numRowsNIP		 = mysql_num_rows(mysql_query("SELECT nip FROM user WHERE nip = '$_POST[nip]'"));
		if ($numRowsUsername > 0){
			echo "<script language='javascript'>alert('Username sudah digunakan, gunakan Username lain.');
					window.location = '../master.php?module=manajemen_user&act=tambahuser'</script>";
		}
		elseif ($numRowsNIP > 0){
			echo "<script language='javascript'>alert('NIP sudah ada didatabase, gunakan NIP lain.');
					window.location = '../master.php?module=manajemen_user&act=tambahuser'</script>";
		}
		else{
			$createddate = date('Y-m-d H:i:s');
			$passwordEnkrip = md5($_POST[password]);
			mysql_query("INSERT INTO user(nip,
											nama_lengkap,
											tempat,
											tanggal,
											pendidikan,
											alamat,
											telepon,
											hp,
											agama,
											email,
											aktif,
											username,
											kata_sandi,
											level,
											createddate)
									VALUES ('$_POST[nip]',
											'$_POST[nama_lengkap]',
											'$_POST[tempat]',
											'$_POST[tanggal]',
											'$_POST[pendidikan_terakhir]',
											'$_POST[alamat]',
											'$_POST[telepon]',
											'$_POST[hp]',
											'$_POST[agama]',
											'$_POST[email]',
											'$_POST[aktif]',
											'$_POST[username]',
											'$passwordEnkrip',
											'$_POST[level]',
											'$createddate')");
			
			echo "<script language='javascript'>alert('User $_POST[nama_lengkap] dengan NIP = $_POST[nip] berhasil ditambahkan / disimpan');
				window.location = '../master.php?module=manajemen_user'</script>";
		}
	}
}

elseif ($modul == 'manajemen_user' AND $act == 'update'){
	$id_user = $_POST[id_user];
	if (empty($_POST[nip]) || empty($_POST[nama_lengkap]) || empty($_POST[pendidikan_terakhir]) || empty($_POST[alamat])  || empty($_POST[telepon]) || empty($_POST[password]) || empty($_POST[email])){
		echo "<script language='javascript'>alert('Isi seluruh identitas Anda');
			  window.location = '../master.php?module=manajemen_user&act=edit_user&id=$id_user'</script>";
	}
	elseif ($_POST[agama] == '++'){
		echo "<script language='javascript'>alert('Silahkan Pilih Agama');
			  window.location = '../master.php?module=manajemen_user&act=edit_user&id=$id_user'</script>";
	}
	else{
		$updateDate = date('Y-m-d H:i:s');
		$passwordEnkrip = md5($_POST[password]);
		mysql_query("UPDATE user SET nip = '$_POST[nip]',
					nama_lengkap = '$_POST[nama_lengkap]',
					tempat='$_POST[tempat]',
					tanggal='$_POST[tanggal]',
					pendidikan = '$_POST[pendidikan_terakhir]',
					alamat		= '$_POST[alamat]',
					telepon		= '$_POST[telepon]',
					hp	= '$_POST[hp]',
					agama		= '$_POST[agama]',
					email		= '$_POST[email]',
					aktif		= '$_POST[aktif]',
					kata_sandi = '$passwordEnkrip',
					level		= '$_POST[level]',										
					lastupdatedate = '$updateDate',
					lastupdateuser = '$_SESSION[id_user]'
					WHERE id_user = '$id_user'");
			
		echo "<script language='javascript'>alert('User $_POST[nama_lengkap] berhasil diupdate');
				window.location = '../master.php?module=manajemen_user'</script>";
	}
}

elseif ($modul == 'manajemen_user' AND $act == 'hapus_user'){
	mysql_query("DELETE FROM user WHERE id_user = '$_GET[id]'");
	header('location: ../master.php?module=manajemen_user');
}
?>