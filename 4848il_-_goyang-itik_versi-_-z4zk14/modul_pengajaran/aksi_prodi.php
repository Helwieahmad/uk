<?php
session_start();
include "../../config/koneksi.php";
$act 	= $_GET[act];
$modul 	= $_GET[module];

if ($modul == 'manajemen_prodi' AND $act == 'input'){
	if (empty($_POST[nama_prodi])){
		echo "<script language='javascript'>alert('Anda belum Menginputkan Nama Jurusan/Prodi...! ');
			  window.location = '../master.php?module=manajemen_prodi&act=tambahprodi'</script>";
	}
	else{
		$numRowsnama = mysql_num_rows(mysql_query("SELECT nama_prodi FROM prodi WHERE nama_prodi = '$_POST[nama_prodi]'"));
		if ($numRowsnama > 0){
			echo "<script language='javascript'>alert('Nama Jurusan/Prodi yang Anda Inputkan sudah ada.');
					window.location = '../master.php?module=manajemen_prodi&act=tambahprodi'</script>";
		}
		else{
			$createddate = date('Y-m-d H:i:s');
			mysql_query("INSERT INTO prodi(nama_prodi,
											createddate)
									VALUES ('$_POST[nama_prodi]',
											'$createddate')");
			
			echo "<script language='javascript'>alert('Jurusan/Prodi $_POST[nama_prodi] berhasil disimpan');
				window.location = '../master.php?module=manajemen_view'</script>";
		}
	}
}

elseif ($modul == 'manajemen_prodi' AND $act == 'update'){
	if (empty($_POST[nama_prodi])){
		echo "<script language='javascript'>alert('Kolom Jurusan/Prodi tidak boleh kosong');
			  window.location = '../master.php?module=manajemen_prodi&act=edit_prodi&id=$id_prodi'</script>";
	}
	
	else{
		$updateDate = date('Y-m-d H:i:s');
		mysql_query("UPDATE prodi SET nama_prodi = '$_POST[nama_prodi]',
					lastupdatedate = '$updateDate' WHERE id_prodi = '$_GET[id]'");
			
		echo "<script language='javascript'>alert('Jurusan/Prodi $_POST[nama_prodi] berhasil diupdate');
				window.location = '../master.php?module=manajemen_view'</script>";
	}
}

elseif ($modul == 'manajemen_prodi' AND $act == 'hapus_prodi'){
	mysql_query("DELETE FROM prodi WHERE id_prodi = '$_GET[id]'");
	header('location: ../master.php?module=manajemen_view');
}
?>