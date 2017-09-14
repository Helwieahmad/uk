<?php
session_start();
include "../../config/koneksi.php";

$act 	= $_GET[act];
$modul 	= $_GET[module];

if ($modul == 'manajemen_pengajaran' AND $act == 'input'){
	if ($_POST[nama] == '---'){
		echo "<script language='javascript'>alert('Silahkan Pilih Bidang Mata Kuliah yang Anda Ajarkan');
			  window.location = '../../master.php?module=manajemen_pengajaran&act=tambahpengajaran'</script>";
	}elseif($numRowsnama = mysql_num_rows(mysql_query("SELECT nama FROM pengajaran WHERE nama = '$_POST[nama]' And pemilik_pengajaran = '$_SESSION[username]'")));
		if ($numRowsnama > 0){
			echo "<script language='javascript'>alert('Bidang Pengajaran/Mata Kuliah yang Anda Entri Sudah ada.');
					window.location = '../../master.php?module=manajemen_pengajaran&act=tambahpengajaran'</script>";
		
		}else{
			$pemilik_pengajaran= $_SESSION['username'];
			$createddate = date('Y-m-d H:i:s');
			mysql_query("INSERT INTO pengajaran (	nama,
													createddate,
													pemilik_pengajaran)
										VALUES('$_POST[nama]',
												'$createddate',
												'$pemilik_pengajaran')");
												
			echo "<script language='javascript'>alert('Bidang Pengajaran $_POST[nama] ditambahkan');
				window.location = '../../master.php?module=manajemen_pengajaran'</script>";
		}
	}

elseif ($modul == 'manajemen_pengajaran' AND $act == 'hapus_pengajaran'){
	
		mysql_query("DELETE FROM pengajaran WHERE id_pengajaran = '$_GET[id]'");
	header('location: ../../master.php?module=manajemen_pengajaran');
}
?>