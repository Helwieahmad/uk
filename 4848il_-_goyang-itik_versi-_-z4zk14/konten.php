<?php
session_start();
include "../config/koneksi.php";
include "fungsi/fungsi_indotgl.php";
$module = $_GET[module];

// Login Administrator //
if ($_SESSION[level] == '1'){
	// bagian manajemen user
	if ($module == 'manajemen_user'){
		include "modul_user/user.php";
	}
	elseif ($module == 'manajemen_dosen'){
		include "modul_dosen/dosen.php";
	}
	elseif ($module == 'manajemen_view'){
		include "modul_pengajaran/view.php";
	}
	elseif ($module == 'manajemen_pengajaran'){
		include "modul_pengajaran/pengajaran.php";
	}
	elseif ($module == 'manajemen_prodi'){
		include "modul_pengajaran/prodi.php";
	}
	else{
		include "home.php";
	}
	
}

// Login Staff //
elseif ($_SESSION[level] == '2'){
	// bagian manajemen dosen
	if ($module == 'manajemen_dosen'){
		include "modul_dosen/dosen.php";
	}
	elseif ($module == 'manajemen_view'){
		include "modul_pengajaran/view.php";
	}
	elseif ($module == 'manajemen_pengajaran'){
		include "modul_pengajaran/pengajaran.php";
	}
	elseif ($module == 'manajemen_prodi'){
		include "modul_pengajaran/prodi.php";
	}
	else{
		include "home.php";
	}
}
// Tidak Mempunyai Hak Akses
else{
	echo "<script language='javascript'>alert('Anda tidak memiliki hak akses berada halaman ini.');
			window.location = 'index.php'</script>";
}
?>