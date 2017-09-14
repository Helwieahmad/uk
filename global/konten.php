<?php
$module = $_GET[module];
	if ($module == 'dosen'){
		include "global/dosen.php";
	}	
	elseif ($module == 'penelitian'){
		include "global/penelitian.php";
	}
	elseif ($module == 'publikasi'){
		include "global/publikasi.php";
	}
	elseif ($module == 'pengajaran'){
		include "global/pengajaran.php";
	}
	elseif ($module == 'bantuan'){
		include "global/bantuan.php";
	}
	elseif ($module == 'fti'){
		include "global/fti.php";
	}
	elseif ($module == 'fkip'){
		include "global/fkip.php";
	}
	elseif ($module == 'peternakan'){
		include "global/peternakan.php";
	}
	elseif ($module == 'bahasa'){
		include "global/bahasa.php";
	}
	elseif ($module == 'ekonomi'){
		include "global/ekonomi.php";
	}
	elseif ($module == 'hukum'){
		include "global/hukum.php";
	}
	elseif ($module == 'pg'){
		include "global/pg.php";
	}
	elseif ($module == 'pgsd'){
		include "global/pgsd.php";
	}
	else{
		include "global/home.php";
	}
?>