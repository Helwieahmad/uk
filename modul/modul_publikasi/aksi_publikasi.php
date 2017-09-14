<?php
session_start();
include "../../config/koneksi.php";

$act 	= $_GET[act];
$modul 	= $_GET[module];

if ($modul == 'manajemen_publikasi' AND $act == 'input'){
	if (empty($_POST[judul]) || empty($_POST[pengarang]) || empty($_POST[abstrak])){
		echo "<script language='javascript'>alert('Mohon isi kolom Judul Publikasi, Pengarang dan kolom Abstrak');
			  window.location = '../../master.php?module=manajemen_publikasi&act=tambahpublikasi'</script>";
	}
	elseif ($_POST[jenis_jurnal] == '++' OR $_POST[bidang_penelitian] == '++'){
		echo "<script language='javascript'>alert('Silahkan Pilih Jenis Jurnal dan bidang_penelitian');
			  window.location = '../../master.php?module=manajemen_publikasi&act=tambahpublikasi'</script>";
	}
		else{ 
			$pemilik_publikasi = $_SESSION['username'];
			$createddate = date('Y-m-d H:i:s');
			$lokasi_file    = $_FILES['upload']['tmp_name'];
			$tipe_file      = $_FILES['upload']['type'];
			$nama_file      = $_FILES['upload']['name'];
			move_uploaded_file($lokasi_file, '../../file_publikasi/'.$nama_file);
			mysql_query("INSERT INTO publikasi (judul,
												pengarang,
												tanggal,
												dipublikasi,
												jenis_jurnal,
												link,
												bidang_penelitian,
												abstrak,
												file,createddate,pemilik_publikasi)
										VALUES('$_POST[judul]',
												'$_POST[pengarang]',
												'$_POST[tanggal]',
												'$_POST[dipublikasi]',
												'$_POST[jenis_jurnal]',
												'$_POST[link]',
												'$_POST[bidang_penelitian]',
												'$_POST[abstrak]',
												'$nama_file',
												'$createddate',
												'$pemilik_publikasi')");
												
			echo "<script language='javascript'>alert('Publikasi Ilmiah ber judul $_POST[judul] dengan Pengarang= $_POST[pengarang] berhasil ditambahkan / disimpan');
				window.location = '../../master.php?module=manajemen_publikasi'</script>";
		}
	}

elseif ($modul == 'manajemen_publikasi' AND $act == 'update'){
	if (empty($_POST[judul]) || empty($_POST[pengarang]) || empty($_POST[abstrak])){
		echo "<script language='javascript'>alert('Mohon isi kolom Judul Publikasi, kolom Pengarang dan kolom Abstrak');
			  window.location = '../../master.php?module=manajemen_publikasi&act=edit_publikasi&id=$_GET[id]'</script>";
	}
	else{	$pemilik_publikasi = $_SESSION['username'];
			$lastupdatedate = date('Y-m-d H:i:s');
			$lokasi_file    = $_FILES['upload']['tmp_name'];
			$tipe_file      = $_FILES['upload']['type'];
			$nama_file      = $_FILES['upload']['name'];
		if(empty($lokasi_file)){
			mysql_query("UPDATE publikasi SET	judul ='$_POST[judul]',
												pengarang  ='$_POST[pengarang]',
												tanggal ='$_POST[tanggal]',
												dipublikasi='$_POST[dipublikasi]',
												jenis_jurnal='$_POST[jenis_jurnal]',
												link='$_POST[link]',
												bidang_penelitian='$_POST[bidang_penelitian]',
												abstrak='$_POST[abstrak]',
												lastupdatedate = '$lastupdatedate',
												pemilik_publikasi='$pemilik_publikasi'
												WHERE id_publikasi = '$_GET[id]'");
		}
		else{
			$data = mysql_fetch_array(mysql_query("SELECT file FROM publikasi WHERE id_publikasi = '$_GET[id]'"));
			if(!empty($data[file])){
				$hapus = unlink('../../file_publikasi/'.$data[file]);
				if($hapus){
					move_uploaded_file($lokasi_file, '../../file_publikasi/'.$nama_file);
				}
				mysql_query("UPDATE publikasi SET	judul ='$_POST[judul]',
												pengarang  ='$_POST[pengarang]',
												tanggal ='$_POST[tanggal]',
												dipublikasi='$_POST[dipublikasi]',
												jenis_jurnal='$_POST[jenis_jurnal]',
												link='$_POST[link]',
												bidang_penelitian='$_POST[bidang_penelitian]',
												abstrak='$_POST[abstrak]',
												file='$nama_file',
												lastupdatedate = '$lastupdatedate',
												pemilik_publikasi='$pemilik_publikasi'
												WHERE id_publikasi = '$_GET[id]'");
			}
			else{
				move_uploaded_file($lokasi_file, '../../file_publikasi/'.$nama_file);
				mysql_query("UPDATE publikasi SET	judul ='$_POST[judul]',
												pengarang  ='$_POST[pengarang]',
												tanggal ='$_POST[tanggal]',
												dipublikasi='$_POST[dipublikasi]',
												jenis_jurnal='$_POST[jenis_jurnal]',
												link='$_POST[link]',
												bidang_penelitian='$_POST[bidang_penelitian]',
												abstrak='$_POST[abstrak]',
												file='$nama_file',
												lastupdatedate = '$lastupdatedate',
												pemilik_publikasi='$pemilik_publikasi'
												WHERE id_publikasi = '$_GET[id]'");
															}
		}
										
				echo "<script language='javascript'>alert('Publikasi Ilmiah dengan berjudul $_POST[judul] dengan Pengarang = $_POST[pengarang] berhasil diedit...');
				window.location = '../../master.php?module=manajemen_publikasi'</script>";
}
}

elseif ($modul == 'manajemen_publikasi' AND $act == 'hapus_publikasi'){
	$data = mysql_fetch_array(mysql_query("SELECT file FROM publikasi WHERE id_publikasi = '$_GET[id]'"));
	if(!empty($data[file])){
		$hapus = unlink('../../file_publikasi/'.$data[file]);
		mysql_query("DELETE FROM publikasi WHERE id_publikasi = '$_GET[id]'");
	}
	else{
		mysql_query("DELETE FROM publikasi WHERE id_publikasi = '$_GET[id]'");
	}
	header('location: ../../master.php?module=manajemen_publikasi');
}
?>