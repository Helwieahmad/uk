<?php
session_start();
include "../../config/koneksi.php";
$act 	= $_GET[act];
$modul 	= $_GET[module];

if ($modul == 'manajemen_pengajaran' AND $act == 'input'){
	if (empty($_POST[nama])){
		echo "<script language='javascript'>alert('Anda belum Menginputkan Nama Mata Kuliah...! ');
			  window.location = '../master.php?module=manajemen_pengajaran&act=tambahpengajaran'</script>";
	}
	else{
		$numRowsnama = mysql_num_rows(mysql_query("SELECT nama FROM pengajaran_admin WHERE nama = '$_POST[nama]'"));
		if ($numRowsnama > 0){
			echo "<script language='javascript'>alert('Nama Mata Kuliah yang Anda Inputkan sudah ada.');
					window.location = '../master.php?module=manajemen_pengajaran&act=tambahpengajaran'</script>";
		}
		else{
			$createddate = date('Y-m-d H:i:s');
			mysql_query("INSERT INTO pengajaran_admin(nama,
											createddate)
									VALUES ('$_POST[nama]',
											'$createddate')");
			
			echo "<script language='javascript'>alert('Mata Kuliah $_POST[nama] berhasil disimpan');
				window.location = '../master.php?module=manajemen_view'</script>";
		}
	}
}

elseif ($modul == 'manajemen_pengajaran' AND $act == 'update'){
	if (empty($_POST[nama])){
		echo "<script language='javascript'>alert('Kolom Mata Kuliah tidak boleh kosong');
			  window.location = '../master.php?module=manajemen_pengajaran&act=edit_pengajaran&id=$id_pengajaran'</script>";
	}
	
	else{
		$updateDate = date('Y-m-d H:i:s');
		mysql_query("UPDATE pengajaran_admin SET nama = '$_POST[nama]',
					lastupdatedate = '$updateDate' WHERE id_pengajaran = '$_GET[id]'");
			
		echo "<script language='javascript'>alert('Mata Kuliah $_POST[nama] berhasil diupdate');
				window.location = '../master.php?module=manajemen_view'</script>";
	}
}

elseif ($modul == 'manajemen_pengajaran' AND $act == 'hapus_pengajaran'){
	mysql_query("DELETE FROM pengajaran_admin WHERE id_pengajaran = '$_GET[id]'");
	header('location: ../master.php?module=manajemen_view');
}
?>