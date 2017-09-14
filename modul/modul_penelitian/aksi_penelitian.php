<?php
session_start();
include "../../config/koneksi.php";

$act 	= $_GET[act];
$modul 	= $_GET[module];

if ($modul == 'manajemen_penelitian' AND $act == 'input'){
	if (empty($_POST[judul]) || empty($_POST[penulis]) || empty($_POST[abstraksi])){
		echo "<script language='javascript'>alert('Judul, Penulis dan Abstraksi  tidak boleh kosong!');
			  window.location = '../../master.php?module=manajemen_penelitian&act=tambahpenelitian'</script>";
	}
	elseif ($_POST[email] == '++' OR $_POST[kategori] == '++'){
		echo "<script language='javascript'>alert('Kategori dan belum terpilih');
			  window.location = '../../master.php?module=manajemen_penelitian&act=tambahpenelitian'</script>";
	}
		else{
			$pemilik_penelitian = $_SESSION['username'];
			$createddate = date('Y-m-d H:i:s');
			$lokasi_file    = $_FILES['file_penelitian']['tmp_name'];
			$tipe_file      = $_FILES['file_penelitian']['type'];
			$nama_file      = $_FILES['file_penelitian']['name'];
			move_uploaded_file($lokasi_file, '../../file_penelitian/'.$nama_file);
			$lokasi_cover    = $_FILES['cover']['tmp_name'];
			$tipe_cover      = $_FILES['cover']['type'];
			$nama_cover      = $_FILES['cover']['name'];
			move_uploaded_file($lokasi_cover, '../../cover_penelitian/'.$nama_cover);
			mysql_query("INSERT INTO penelitian (	judul,
												kategori,
												penulis,
												abstraksi,
												keyword,
												file,
												cover,
												createddate,pemilik_penelitian)
										VALUES('$_POST[judul]',
												'$_POST[kategori]',
												'$_POST[penulis]',
												'$_POST[abstraksi]',
												'$_POST[keyword]',
												'$nama_file',
												'$nama_cover',
												'$createddate',
												'$pemilik_penelitian')");
												
			echo "<script language='javascript'>alert('Penelitian $_POST[judul] dengan Penulis $_POST[penulis] berhasil disimpan');
				window.location = '../../master.php?module=manajemen_penelitian'</script>";
		}
	}

elseif ($modul == 'manajemen_penelitian' AND $act == 'update'){
	if (empty($_POST[judul]) || empty($_POST[penulis]) || empty($_POST[abstraksi])){
		echo "<script language='javascript'>alert('Judul, Penulis dan Abstraksi tidak boleh kosong!');
			  window.location = '../../master.php?module=manajemen_penelitian&act=tambahpenelitian'</script>";
	}
	elseif ($_POST[email] == '++' OR $_POST[kategori] == '++'){
		echo "<script language='javascript'>alert('Kategori dan belum terpilih');
			  window.location = '../../master.php?module=manajemen_penelitian&act=tambahpenelitian'</script>";
	}
	else{	
			$pemilik_penelitian = $_SESSION['username'];
			$lastupdatedate = date('Y-m-d H:i:s');
			$lokasi_file    = $_FILES['file_penelitian']['tmp_name'];
			$tipe_file      = $_FILES['file_penelitian']['type'];
			$nama_file      = $_FILES['file_penelitian']['name'];
			move_uploaded_file($lokasi_file, '../../file_penelitian/'.$nama_file);
			$createddate = date('Y-m-d H:i:s');
			$lokasi_cover    = $_FILES['cover']['tmp_name'];
			$tipe_cover      = $_FILES['cover']['type'];
			$nama_cover      = $_FILES['cover']['name'];
			move_uploaded_file($lokasi_cover, '../../cover_penelitian/'.$nama_cover);
		
		if(empty($lokasi_file) && empty($lokasi_cover)){
			mysql_query("UPDATE penelitian SET judul ='$_POST[judul]',
												kategori  ='$_POST[kategori]',
												penulis ='$_POST[penulis]',
												abstraksi='$_POST[abstraksi]',
												keyword='$_POST[keyword]',
												lastupdatedate = '$lastupdatedate',
												pemilik_penelitian='$pemilik_penelitian'
												WHERE id_penelitian = '$_GET[id]'");
		}
		elseif(empty($lokasi_file)){
			$data = mysql_fetch_array(mysql_query("SELECT cover FROM penelitian WHERE id_penelitian = '$_GET[id]'"));
			if(!empty($lokasi_cover)){
				$hapus = unlink('../../cover_penelitian/'.$data[cover]);
				if($hapus){
					move_uploaded_file($lokasi_cover, '../../cover_penelitian/'.$nama_cover);
				}
				mysql_query("UPDATE penelitian SET	judul ='$_POST[judul]',
												kategori  ='$_POST[kategori]',
												penulis ='$_POST[penulis]',
												abstraksi='$_POST[abstraksi]',
												keyword='$_POST[keyword]',
												cover='$nama_cover',
												lastupdatedate = '$lastupdatedate',
												pemilik_penelitian='$pemilik_penelitian'
												WHERE id_penelitian = '$_GET[id]'");
			}
			else{
				move_uploaded_file($lokasi_cover, '../../cover_penelitian/'.$nama_cover);
				mysql_query("UPDATE penelitian SET	judul ='$_POST[judul]',
												kategori  ='$_POST[kategori]',
												penulis ='$_POST[penulis]',
												abstraksi='$_POST[abstraksi]',
												keyword='$_POST[keyword]',
												cover='$nama_cover',
												lastupdatedate = '$lastupdatedate',
												pemilik_penelitian='$pemilik_penelitian'
												WHERE id_penelitian = '$_GET[id]'");
			}
		}
		elseif(empty($lokasi_cover)){
			$data = mysql_fetch_array(mysql_query("SELECT file FROM penelitian WHERE id_penelitian = '$_GET[id]'"));
			if(!empty($lokasi_file)){
				$hapus = unlink('../../file_penelitian/'.$data[file]);
				if($hapus){
					move_uploaded_file($lokasi_file, '../../file_penelitian/'.$nama_file);
				}
				mysql_query("UPDATE penelitian SET	judul ='$_POST[judul]',
												kategori  ='$_POST[kategori]',
												penulis ='$_POST[penulis]',
												abstraksi='$_POST[abstraksi]',
												keyword='$_POST[keyword]',
												file='$nama_file',
												lastupdatedate = '$lastupdatedate',
												pemilik_penelitian='$pemilik_penelitian'
												WHERE id_penelitian = '$_GET[id]'");
			}
			else{
				move_uploaded_file($lokasi_file, '../../file_penelitian/'.$nama_file);
				mysql_query("UPDATE penelitian SET	judul ='$_POST[judul]',
												kategori  ='$_POST[kategori]',
												penulis ='$_POST[penulis]',
												abstraksi='$_POST[abstraksi]',
												keyword='$_POST[keyword]',
												file='$nama_file',
												lastupdatedate = '$lastupdatedate',
												pemilik_penelitian='$pemilik_penelitian'
												WHERE id_penelitian = '$_GET[id]'");
			}
		}
		else{
			$data = mysql_fetch_array(mysql_query("SELECT file FROM penelitian WHERE id_penelitian = '$_GET[id]'"));
			$asek = mysql_fetch_array(mysql_query("SELECT cover FROM penelitian WHERE id_penelitian = '$_GET[id]'"));
if(!empty($data[file]) && !empty($asek[cover])){
				$hapus = unlink('../../file_penelitian/'.$data[file]) && unlink('../../cover_penelitian/'.$asek[cover]);
				if($hapus){
					move_uploaded_file($lokasi_file, '../../file_penelitian/'.$nama_file) && move_uploaded_file($lokasi_cover, '../../cover_penelitian/'.$nama_cover);
				}
				mysql_query("UPDATE penelitian SET	judul ='$_POST[judul]',
												kategori  ='$_POST[kategori]',
												penulis ='$_POST[penulis]',
												abstraksi='$_POST[abstraksi]',
												keyword='$_POST[keyword]',
												file='$nama_file',
												cover='$nama_cover',
												lastupdatedate = '$lastupdatedate',
												pemilik_penelitian='$pemilik_penelitian'
												WHERE id_penelitian = '$_GET[id]'");
			}
			else{
				move_uploaded_file($lokasi_file, '../../file_penelitian/'.$nama_file) && 
				move_uploaded_file($lokasi_cover, '../../cover_penelitian/'.$nama_cover);
				mysql_query("UPDATE penelitian SET	judul ='$_POST[judul]',
												kategori  ='$_POST[kategori]',
												penulis ='$_POST[penulis]',
												abstraksi='$_POST[abstraksi]',
												keyword='$_POST[keyword]',
												file='$nama_file',
												cover='$nama_cover',
												lastupdatedate = '$lastupdatedate',
												pemilik_penelitian='$pemilik_penelitian'
												WHERE id_penelitian = '$_GET[id]'");
					}
		}
										
				echo "<script language='javascript'>alert('Penelitian $_POST[judul] dengan Penulis = $_POST[penulis] berhasil diedit...');
				window.location = '../../master.php?module=manajemen_penelitian'</script>";
}
}

elseif ($modul == 'manajemen_penelitian' AND $act == 'hapus_penelitian'){
	$data = mysql_fetch_array(mysql_query("SELECT file FROM penelitian WHERE id_penelitian = '$_GET[id]'"));
	if(!empty($data[file]) && !empty($data[cover])){
				$hapus = unlink('../../file_penelitian/'.$data[file]) && unlink('../../cover_penelitian/'.$data[cover]);
		mysql_query("DELETE FROM penelitian WHERE id_penelitian = '$_GET[id]'");
	}
	else{
		mysql_query("DELETE FROM penelitian WHERE id_penelitian = '$_GET[id]'");
	}
	header('location: ../../master.php?module=manajemen_penelitian');
}
?>