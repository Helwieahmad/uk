<?php
session_start();
include "../../config/koneksi.php";

$act 	= $_GET[act];
$modul 	= $_GET[module];

if ($modul == 'manajemen_materi' AND $act == 'input'){
	if (empty($_POST[nama])){
		echo "<script language='javascript'>alert('Nama Materi tidak boleh kosong');
			  window.location = '../../master.php?module=manajemen_materi&act=tambahmateri'</script>";
	}
	elseif ($_POST[jenis] == '++' OR $_POST[kategori] == '++'){
		echo "<script language='javascript'>alert('Silahkan Pilih Jenis Materi & Kategori');
			  window.location = '../../master.php?module=manajemen_materi&act=tambahmateri'</script>";
	}
		else{ 
			$pemilik_materi = $_SESSION['username'];
			$createddate = date('Y-m-d H:i:s');
			$lokasi_file    = $_FILES['upload']['tmp_name'];
			$tipe_file      = $_FILES['upload']['type'];
			$nama_file      = $_FILES['upload']['name'];
			move_uploaded_file($lokasi_file, '../../file_materi/'.$nama_file);
			mysql_query("INSERT INTO materi (nama,
												jenis,
												kategori,
												file,
												url,
												keterangan,
												pemilik_materi,createddate)
										VALUES('$_POST[nama]',
												'$_POST[jenis]',
												'$_POST[kategori]',
												'$nama_file',
												'$_POST[url]',
												'$_POST[keterangan]',
												'$pemilik_materi',
												'$createddate')");
												
			echo "<script language='javascript'>alert('Materi $_POST[nama] berhasil ditambahkan / disimpan');
				window.location = '../../master.php?module=manajemen_materi'</script>";
		}
	}

elseif ($modul == 'manajemen_materi' AND $act == 'update'){
	if (empty($_POST[nama])){
		echo "<script language='javascript'>alert('Nama Materi Tidak Boleh Kosong');
			  window.location = '../../master.php?module=manajemen_materi&act=edit_materi&id=$_GET[id]'</script>";
	}
	else{	$pemilik_materi = $_SESSION['username'];
			$lastupdatedate = date('Y-m-d H:i:s');
			$lokasi_file    = $_FILES['upload']['tmp_name'];
			$tipe_file      = $_FILES['upload']['type'];
			$nama_file      = $_FILES['upload']['name'];
		if(empty($lokasi_file)){
			mysql_query("UPDATE materi SET	nama ='$_POST[nama]',
												jenis  ='$_POST[jenis]',
												kategori ='$_POST[kategori]',
												url='$_POST[url]',
												keterangan='$_POST[keterangan]',
												lastupdatedate = '$lastupdatedate',																						 												pemilik_materi='$pemilik_materi'
												WHERE id_materi = '$_GET[id]'");
		}
		else{
			$data = mysql_fetch_array(mysql_query("SELECT file FROM materi WHERE id_materi = '$_GET[id]'"));
			if(!empty($data[file])){
				$hapus = unlink('../../file_materi/'.$data[file]);
				if($hapus){
					move_uploaded_file($lokasi_file, '../../file_materi/'.$nama_file);
				}
				mysql_query("UPDATE materi SET	nama ='$_POST[nama]',
												jenis  ='$_POST[jenis]',
												kategori ='$_POST[kategori]',
												file='$nama_file',
												url='$_POST[url]',
												keterangan='$_POST[keterangan]',
												lastupdatedate = '$lastupdatedate',
												pemilik_materi='$pemilik_materi'
												WHERE id_materi = '$_GET[id]'");
			}
			else{
				move_uploaded_file($lokasi_file, '../../file_materi/'.$nama_file);
				mysql_query("UPDATE materi SET	nama ='$_POST[nama]',
												jenis  ='$_POST[jenis]',
												kategori ='$_POST[kategori]',
												file='$nama_file',
												url='$_POST[url]',
												keterangan='$_POST[keterangan]',
												lastupdatedate = '$lastupdatedate',
												pemilik_materi='$pemilik_materi'
												WHERE id_materi = '$_GET[id]'");
						}
		}
										
				echo "<script language='javascript'>alert('Materi $_POST[nama] berhasil diedit...');
				window.location = '../../master.php?module=manajemen_materi'</script>";
}
}

elseif ($modul == 'manajemen_materi' AND $act == 'hapus_materi'){
	$data = mysql_fetch_array(mysql_query("SELECT file FROM materi WHERE id_materi = '$_GET[id]'"));
	if(!empty($data[file])){
		$hapus = unlink('../../file_materi/'.$data[file]);
		mysql_query("DELETE FROM materi WHERE id_materi = '$_GET[id]'");
	}
	else{
		mysql_query("DELETE FROM materi WHERE id_materi = '$_GET[id]'");
	}
	header('location: ../../master.php?module=manajemen_materi');
}
?>