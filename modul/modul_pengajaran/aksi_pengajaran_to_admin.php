<?php
session_start();
include "../../config/koneksi.php";

$act 	= $_GET[act];
$modul 	= $_GET[module];

if ($modul == 'manajemen_pengajaran' AND $act == 'input'){
	if (empty($_POST[nama])){
		echo "<script language='javascript'>alert('Mohon Entri Nama Bidang Pengajaran');
			  window.location = '../../master.php?module=manajemen_pengajaran&act=tambahpengajaran'</script>";
	}elseif($numRowsnama = mysql_num_rows(mysql_query("SELECT nama FROM pengajaran_admin WHERE nama = '$_POST[nama]'")));
		if ($numRowsnama > 0){
			echo "<script language='javascript'>alert('Bidang Pengajaran/Mata Kuliah yang Anda coba Entrikan sudah Ada dalam pilihan.');
					window.location = '../../master.php?module=manajemen_pengajaran&act=tambahpengajaran'</script>";
		
		}else{
			$createddate = date('Y-m-d H:i:s');
			mysql_query("INSERT INTO pengajaran_admin (	nama,createddate)
										VALUES('$_POST[nama]',
												'$createddate')");
												
			echo "<script language='javascript'>alert('Bidang Pengajaran $_POST[nama] telah ditambahkan');
				window.location = '../../master.php?module=manajemen_pengajaran'</script>";
		}
	}
?>