<?php
session_start();
include "config/koneksi.php";
include "fungsi/fungsi_indotgl.php";
$module = $_GET[module];

if ($_SESSION[level] == '3'){
	if ($module == 'manajemen_dosen'){
		include "modul/modul_dosen/dosen.php";
	}
	elseif ($module == 'manajemen_penelitian'){
		include "modul/modul_penelitian/penelitian.php";
	}
	elseif ($module == 'manajemen_publikasi'){
		include "modul/modul_publikasi/publikasi.php";
	}
	elseif ($module == 'manajemen_pengajaran'){
		include "modul/modul_pengajaran/pengajaran.php";
	}
	elseif ($module == 'manajemen_pendidikan'){
		include "modul/modul_riwayat/pendidikan.php";
	}
	elseif ($module == 'manajemen_pekerjaan'){
		include "modul/modul_riwayat/pekerjaan.php";
	}
	elseif ($module == 'manajemen_materi'){
		include "modul/modul_materi/materi.php";
	}
	elseif ($module == 'manajemen_riwayat'){
		include "modul/modul_riwayat/riwayat.php";
	}
	else{
		include "home.php";
	}
	
}
else{
	echo "<script language='javascript'>alert('Anda tidak memiliki hak akses di halaman ini.');
			window.location = 'index.php'</script>";
}
?>