<?php
session_start();
include "../../config/koneksi.php";
$act 	= $_GET[act];
$modul 	= $_GET[module];

if($modul == 'manajemen_dosen' AND $act == 'update'){
	if (empty($_POST[nama]) || empty($_POST[nip]) || empty($_POST[alamat]) || empty($_POST[tempat]) || empty($_POST[email]) || empty($_POST[telepon]) || empty($_POST[pendidikan_terakhir]) || empty($_POST[password])){
		echo "<script language='javascript'>alert('Silahkan isi Nama, NIP, Alamat, TTL, Email, No Telepon, Pendidikan terakhir Beserta password Anda');
			  window.location = '../../master.php?module=manajemen_dosen&act=edit_dosen&id=$_GET[id]'</script>";
	}
	elseif ($_POST[tanggal] == '++' OR $_POST[bulan] == '++'){
		echo "<script language='javascript'>alert('Jangan lupa Untuk mengentri Tanggal Lahir dan Bulan ');
			  window.location = '../../master.php?module=manajemen_dosen&act=edit_dosen&id=$_GET[id]'</script>";
	
	}
	else{	$lastupdatedate = date('Y-m-d H:i:s');
			$lokasi_file    = $_FILES['foto']['tmp_name'];
			$tipe_file      = $_FILES['foto']['type'];
			$nama_file      = $_FILES['foto']['name'];
			$passwordEnkrip = md5($_POST[password]);
		
		if(empty($lokasi_file)){
			mysql_query("UPDATE profil_dosen SET nama ='$_POST[nama]',
												nip  ='$_POST[nip]',
												nama_prodi  ='$_POST[nama_prodi]',
												alamat ='$_POST[alamat]',
												tempat='$_POST[tempat]',
												tanggal='$_POST[tanggal]',
												agama='$_POST[agama]',
												email='$_POST[email]',
												kelamin='$_POST[kelamin]',
												telepon='$_POST[telepon]',
												hp='$_POST[hp]',
												jurusan='$_POST[pendidikan_terakhir]',
												aktif='$_POST[aktif]',
												kata_sandi='$passwordEnkrip',
												level='$_POST[level]',
												lastupdatedate = '$lastupdatedate',
												lastupdateuser = '$_SESSION[id_dosen]'
												WHERE id_dosen = '$_SESSION[id_dosen]'");
		}
		else{
			$data = mysql_fetch_array(mysql_query("SELECT Foto FROM profil_dosen WHERE id_dosen = '$_SESSION[id_dosen]'"));
			if(!empty($data[Foto])){
				$hapus = unlink('../../image_profil/'.$data[Foto]);
				if($hapus){
					move_uploaded_file($lokasi_file, '../../image_profil/'.$nama_file);
				}
				mysql_query("UPDATE profil_dosen SET	nama ='$_POST[nama]',
												nip  ='$_POST[nip]',
												nama_prodi  ='$_POST[nama_prodi]',
												alamat ='$_POST[alamat]',
												tempat='$_POST[tempat]',
												tanggal='$_POST[tanggal]',
												agama='$_POST[agama]',
												email='$_POST[email]',
												kelamin='$_POST[kelamin]',
												telepon='$_POST[telepon]',
												hp='$_POST[hp]',
												jurusan='$_POST[pendidikan_terakhir]',
												aktif='$_POST[aktif]',
												kata_sandi='$passwordEnkrip',
												level='$_POST[level]',						
												Foto='$nama_file',
												lastupdatedate = '$lastupdatedate',
												lastupdateuser = '$_SESSION[id_dosen]'
												WHERE id_dosen = '$_SESSION[id_dosen]'");
			}
			else{
				move_uploaded_file($lokasi_file, '../../image_profil/'.$nama_file);
				mysql_query("UPDATE profil_dosen SET	nama ='$_POST[nama]',
												nip  ='$_POST[nip]',
												nama_prodi  ='$_POST[nama_prodi]',
												alamat ='$_POST[alamat]',
												tempat='$_POST[tempat]',
												tanggal='$_POST[tanggal]',
												agama='$_POST[agama]',
												email='$_POST[email]',
												kelamin='$_POST[kelamin]',
												telepon='$_POST[telepon]',
												hp='$_POST[hp]',
												jurusan='$_POST[pendidikan_terakhir]',
												aktif='$_POST[aktif]',
												kata_sandi='$passwordEnkrip',
												level='$_POST[level]',
												Foto='$nama_file',
												lastupdatedate = '$lastupdatedate',
												lastupdateuser = '$_SESSION[id_dosen]'
												WHERE id_dosen = '$_SESSION[id_dosen]'");			
												}
		}
										
				echo "<script language='javascript'>alert('Dosen $_POST[nama] dengan NIP = $_POST[nip] berhasil diedit...');
				window.location = '../../master.php?module=manajemen_dosen'</script>";
}}

?>