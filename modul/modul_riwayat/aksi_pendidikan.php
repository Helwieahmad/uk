<?php
session_start();
include "../../config/koneksi.php";

$act 	= $_GET[act];
$modul 	= $_GET[module];

if ($modul == 'manajemen_pendidikan' AND $act == 'input'){
	if (empty($_POST[nama])){
		echo "<script language='javascript'>alert('Kolom Nama Tidak Boleh Kosong...!');
			  window.location = '../../master.php?module=manajemen_pendidikan&act=tambahpendidikan'</script>";
	}
			else{ 
			$pemilik_pendidikan = $_SESSION['username'];
			$createddate = date('Y-m-d H:i:s');
			mysql_query("INSERT INTO riwayat_pendidikan (nama, 
														keterangan,
														tahun_masuk,
														tahun_keluar,
														createddate,
														pemilik_pendidikan)
										VALUES('$_POST[nama]',
												'$_POST[keterangan]',
												'$_POST[tahun_masuk]',
												'$_POST[tahun_keluar]',
												'$createddate',
												'$pemilik_pendidikan')");
												
			echo "<script language='javascript'>alert('Riwayat Pendidikan Anda berhasil disimpan');
				window.location = '../../master.php?module=manajemen_riwayat'</script>";
		}
	}

elseif ($modul == 'manajemen_pendidikan' AND $act == 'update'){
	if (empty($_POST[nama])){
		echo "<script language='javascript'>alert('Kolom Nama Tidak Boleh Kosong');
			  window.location = '../../master.php?module=manajemen_pendidikan&act=edit_pendidikan&id=$_GET[id]'</script>";
	}
	else{	$pemilik_pendidikan = $_SESSION['username'];
			$lastupdatedate = date('Y-m-d H:i:s');
				mysql_query("UPDATE riwayat_pendidikan SET	nama ='$_POST[nama]',
												keterangan  ='$_POST[keterangan]',
												tahun_masuk ='$_POST[tahun_masuk]',
												tahun_keluar='$_POST[tahun_keluar]',
												lastupdatedate = '$lastupdatedate',
												pemilik_pendidikan='$pemilik_pendidikan'
												WHERE riwayat_pendidikan = '$_GET[id]'");
															
		
										
				echo "<script language='javascript'>alert('Riwayat Pendidikan Anda berhasil diedit...');
				window.location = '../../master.php?module=manajemen_riwayat'</script>";
}
}

elseif ($modul == 'manajemen_pendidikan' AND $act == 'hapus_pendidikan'){
	mysql_query("DELETE FROM riwayat_pendidikan WHERE riwayat_pendidikan = '$_GET[id]'");
	header('location: ../../master.php?module=manajemen_riwayat');
}
?>