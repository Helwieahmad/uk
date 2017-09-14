<?php
session_start();
include "../../config/koneksi.php";

$act 	= $_GET[act];
$modul 	= $_GET[module];

if ($modul == 'manajemen_dosen' AND $act == 'input'){
	if (empty($_POST[nama]) || empty($_POST[kelamin]) || empty($_POST[pendidikan_terakhir])){
		echo "<script language='javascript'>alert('Mohon Entri Nama, Pendidikan Terakhir');
			  window.location = '../master.php?module=manajemen_dosen&act=tambahdosen'</script>";
	}
	elseif ($_POST[tanggal] == '++' OR $_POST[bulan] == '++'){
		echo "<script language='javascript'>alert('Jangan lupa Untuk mengentri Tanggal Lahir dan Bulan');
			  window.location = '../master.php?module=manajemen_dosen&act=tambahdosen'</script>";
	}
	elseif ($_POST[tahun] == '++'){
		echo "<script language='javascript'>alert('Silahkan Pilih Tahun Berapa Anda Lahir...!');
			  window.location = '../master.php?module=manajemen_dosen&act=tambahdosen'</script>";
	}
	else{
		$numRowsNIP		 = mysql_num_rows(mysql_query("SELECT nip FROM profil_dosen WHERE nip = '$_POST[nip]'"));
		if ($numRowsNIP > 0){
			echo "<script language='javascript'>alert('NIP sudah digunakan, gunakan NIP lain.');
					window.location = '../master.php?module=manajemen_dosen&act=tambahdosen'</script>";
		}
		else{
			$createddate = date('Y-m-d H:i:s');
			$lokasi_file    = $_FILES['upload']['tmp_name'];
			$tipe_file      = $_FILES['upload']['type'];
			$nama_file      = $_FILES['upload']['name'];
			$passwordEnkrip = md5($_POST[password]);
			move_uploaded_file($lokasi_file, '../../image_profil/'.$nama_file);
			mysql_query("INSERT INTO profil_dosen (	nama,
												nip,
												nama_prodi,
												alamat,
												tempat,
												tanggal,
												agama,
												email,
												kelamin,
												telepon,
												hp,
												jurusan,
												aktif,
												username,
												kata_sandi,
												level,
												Foto,createddate)
										VALUES('$_POST[nama]',
										'$_POST[nip]',
												'$_POST[nama_prodi]',
												'$_POST[alamat]',
												'$_POST[tempat]',
												'$_POST[tanggal]',
												'$_POST[agama]',
												'$_POST[email]',
												'$_POST[kelamin]',
												'$_POST[telepon]',
												'$_POST[hp]',
												'$_POST[pendidikan_terakhir]',
												'$_POST[aktif]',
												'$_POST[username]',
												'$passwordEnkrip',
												'$_POST[level]',
												'$nama_file',
												'$createddate')");
												
			echo "<script language='javascript'>alert('Dosen $_POST[nama] dengan NIP = $_POST[nip] berhasil ditambahkan / disimpan');
				window.location = '../master.php?module=manajemen_dosen'</script>";
		}
	}
}


elseif ($modul == 'manajemen_dosen' AND $act == 'update'){
	if (empty($_POST[nama]) || empty($_POST[nip]) || empty($_POST[alamat]) || empty($_POST[tempat]) || empty($_POST[kelamin]) || empty($_POST[telepon]) || empty($_POST[pendidikan_terakhir]) || empty($_POST[aktif])){
		echo "<script language='javascript'>alert('Yakinkan Anda Telah Mengisi Kolom Nama, NIP Alamat, TTL, Agama,Kelamin, No Telepon serta Keaktifan Anda');
			  window.location = '../master.php?module=manajemen_dosen&act=edit_dosen&id=$_GET[id]'</script>";
	}
	elseif ($_POST[tanggal] == '++' OR $_POST[bulan] == '++'){
		echo "<script language='javascript'>alert('Isi kolom  Email dan password');
			  window.location = '../master.php?module=manajemen_dosen&act=edit_dosen&id=$_GET[id]'</script>";
	
	}
	elseif ($_POST[Tahun] == '++'){
		echo "<script language='javascript'>alert('Isi kolom  Email dan password');
			  window.location = '../master.php?module=manajemen_dosen&act=edit_dosen&id=$_GET[id]'</script>";
	
	}
	else{	$lastupdatedate = date('Y-m-d H:i:s');
			$lokasi_file    = $_FILES['foto']['tmp_name'];
			$tipe_file      = $_FILES['foto']['type'];
			$nama_file      = $_FILES['foto']['name'];
			$passwordEnkrip = md5($_POST[password]);
		
		if(empty($_POST[nip]) && empty($lokasi_file)){
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
												lastupdatedate = '$lastupdatedate',
												lastupdateuser = '$_SESSION[id_dosen]'
												WHERE id_dosen = '$_GET[id]'");
		}
		elseif(empty($_POST[nip])){
			$data = mysql_fetch_array(mysql_query("SELECT Foto FROM profil_dosen WHERE id_dosen = '$_GET[id]'"));
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
												WHERE id_dosen = '$_GET[id]'");
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
	level='$_POST[level]',											Foto='$nama_file',
												lastupdatedate = '$lastupdatedate',
												lastupdateuser = '$_SESSION[id_dosen]'
												WHERE id_dosen = '$_GET[id]'");
			}
		}
		elseif(empty($lokasi_file)){
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
	level='$_POST[level]',											lastupdatedate = '$lastupdatedate',
												lastupdateuser = '$_SESSION[id_dosen]'
												WHERE id_dosen = '$_GET[id]'");
		}
		else{
			$data = mysql_fetch_array(mysql_query("SELECT Foto FROM profil_dosen WHERE id_dosen = '$_GET[id]'"));
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
	level='$_POST[level]',											Foto='$nama_file',
												lastupdatedate = '$lastupdatedate',
												lastupdateuser = '$_SESSION[id_dosen]'
												WHERE id_dosen = '$_GET[id]'");
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
		level='$_POST[level]',										Foto='$nama_file',
												lastupdatedate = '$lastupdatedate',
												lastupdateuser = '$_SESSION[id_dosen]'
												WHERE id_dosen = '$_GET[id]'");			}
		}
										
				echo "<script language='javascript'>alert('Dosen $_POST[nama] dengan NIP = $_POST[nip] berhasil diedit...');
				window.location = '../master.php?module=manajemen_dosen'</script>";
}
}

elseif ($modul == 'manajemen_dosen' AND $act == 'hapus_dosen'){
	$data = mysql_fetch_array(mysql_query("SELECT Foto FROM profil_dosen WHERE id_dosen = '$_GET[id]'"));
	if(!empty($data[Foto])){
		$hapus = unlink('../../image_profil/'.$data[Foto]);
		mysql_query("DELETE FROM profil_dosen WHERE id_dosen = '$_GET[id]'");
	}
	else{
		mysql_query("DELETE FROM profil_dosen WHERE id_dosen = '$_GET[id]'");
	}
	header('location: ../master.php?module=manajemen_dosen');
}
?>