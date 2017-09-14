<?php
session_start();
include "../../config/koneksi.php";

$act 	= $_GET[act];
$modul 	= $_GET[module];

if ($modul == 'manajemen_pekerjaan' AND $act == 'input'){
	if (empty($_POST[nama])){
		echo "<script language='javascript'>alert('Kolom Nama Tidak Boleh Kosong...!');
			  window.location = '../../master.php?module=manajemen_pekerjaan&act=tambahpekerjaan'</script>";
	}
			else{ 
			$pemilik_pekerjaan = $_SESSION['username'];
			$createddate = date('Y-m-d H:i:s');
			mysql_query("INSERT INTO riwayat_pekerjaan (nama,
														jabatan,
														daerah,
														keterangan,
														tahun_masuk,
														tahun_keluar,
														createddate,
														pemilik_pekerjaan)
										VALUES('$_POST[nama]',
												'$_POST[jabatan]',
												'$_POST[daerah]',
												'$_POST[keterangan]',
												'$_POST[tahun_masuk]',
												'$_POST[tahun_keluar]',
												'$createddate',
												'$pemilik_pekerjaan')");
												
			echo "<script language='javascript'>alert('Riwayat Pekerjaan Anda berhasil disimpan');
				window.location = '../../master.php?module=manajemen_riwayat'</script>";
		}
	}

elseif ($modul == 'manajemen_pekerjaan' AND $act == 'update'){
	if (empty($_POST[nama])){
		echo "<script language='javascript'>alert('Kolom Nama Tidak Boleh Kosong');
			  window.location = '../../master.php?module=manajemen_pekerjaan&act=edit_pekerjaan&id=$_GET[id]'</script>";
	}
	else{	$pemilik_pekerjaan = $_SESSION['username'];
			$lastupdatedate = date('Y-m-d H:i:s');
				mysql_query("UPDATE riwayat_pekerjaan SET	nama ='$_POST[nama]',
												jabatan ='$_POST[jabatan]',
												daerah ='$_POST[daerah]',
												keterangan  ='$_POST[keterangan]',
												tahun_masuk ='$_POST[tahun_masuk]',
												tahun_keluar='$_POST[tahun_keluar]',
												lastupdatedate = '$lastupdatedate',
												pemilik_pekerjaan='$pemilik_pekerjaan'
												WHERE riwayat_pekerjaan = '$_GET[id]'");
															
		
										
				echo "<script language='javascript'>alert('Riwayat Pekerjaan Anda berhasil diedit...');
				window.location = '../../master.php?module=manajemen_riwayat'</script>";
}
}

elseif ($modul == 'manajemen_pekerjaan' AND $act == 'hapus_pekerjaan'){
	mysql_query("DELETE FROM riwayat_pekerjaan WHERE riwayat_pekerjaan = '$_GET[id]'");
	header('location: ../../master.php?module=manajemen_riwayat');
}
?>