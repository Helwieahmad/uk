<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Halaman Profil Dosen Universitas Kanjuruhan MALANG</title>
	<link rel="stylesheet" href="css/menu.css" type="text/css">  
    <link rel="shortcut icon" href="images/favicon.jpg" />
    <link href="css/primary_style_z-index.css" rel="stylesheet" />
    <link href="css/Wire_One.css" rel="stylesheet" />
<link href="css/font-sans_narrow.css" rel="stylesheet" />
<script type="text/javascript" src="4848il_-_goyang-itik_versi-_-z4zk14/js/jquery_1.4.2.js"></script>

</head>

<body>
<div id="top"></div>
<div id="kepala">
<div id="kepala_kiri"></div><div id="kepala_kanan"><?php
			include "config/koneksi.php";
			$dataExt = mysql_fetch_array(mysql_query("SELECT id_dosen FROM profil_dosen WHERE id_dosen = '$_SESSION[id_dosen]'"));
			if ($_SESSION[level] == '3'){
				$levelUser = 'Dosen';
			}
			?>
						<div style=" font:Tahoma, Geneva, sans-serif; font-size:15px; color:#FFF;"><strong>User ID : </strong><?php echo $_SESSION[username]; ?><br>
						<strong>Nama Lengkap : </strong><?php echo $_SESSION[nama]; ?><br>
						<strong>Login As :</strong> <font color="#02fffc"><strong><?php echo $levelUser; ?></strong></font>
					</div></div>
            </div></div>
</div>
<div id="bungkus_menu">
<div id="menu_galau">
<div id='container'>
<div id="container">
<div id='container_r'>
<div id='container_b'>
<div id='main_menu'>
<div class='ddsmoothmenu'>
<ul class='menu' id='main_menu'>
<li id="min-menu" class='menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home alpha'><a href='#'><span><span>Home</span></span></a></li>
<li class='main_menu'><a href='#'><span><span>Dosen</span></span></a></li>
<li class=''><a href='#'><span><span>Penelitian</span></span></a></li>
<li class=''><a href='#'><span><span>Pengajaran</span></span></a></li>
<li class=''><a href='#'><span><span>Publikasi</span></span></a></li>
<li class=''><a href='#'><span><span>Bantuan</span></span></a></li>

</ul></div>
</div>
<form action='/search' id='search_form' method='get' name='searchform'>
<div id='searchback'>
<input class='keyword' id='s-m' name='q' onblur='if (this.value == &quot;&quot;) {this.value = &quot;Cari Artikel Disini..&quot;;}' onfocus='if (this.value == &quot;Cari Artikel Disini..&quot;) {this.value = &quot;&quot;}' type='text' value='Cari Artikel Disini..'/><a id='header_search_button'/>						
</div>
</form>
</div></div></div></div></div></div></div>
<div id="kertas">
<div id="isi">
<div id="isi_kiri">
  <ul>
     <li id="sidebar" style="background:url(images/sidebar.png) no-repeat;-moz-box-shadow: 0px 10px 10px #444444; /* Firefox */
  -webkit-box-shadow: 0px 10px 10px #444444; /* Safari and Chrome */
  box-shadow: 0px 10px 10px #444444;
  -moz-border-radius: 7px;
    -webkit-border-radius: 7px;
    -khtml-border-radius: 7px;
    border-radius: 7px; height:300px">
    <ul>
    <li class="judul">Menu Pengaturan Profil</li></ul>
    		<ul class="kategori">
    		<li class="fakultas" ><a href='master.php'>Halaman Utama</a></li>
    		<li class="fakultas"><a href='?module=manajemen_dosen'>Edit Profil</a></li>
            <li class="fakultas"><a href='?module=manajemen_riwayat'>Edit Riwayat Pend. & Pekerjaan</a></li>
            <li class="fakultas"><a href='?module=manajemen_penelitian'>Edit Bidang Penelitian</a></li>
			<li class="fakultas"><a href='?module=manajemen_publikasi'>Edit Bidang Publikasi</a></li>
    		<li class="fakultas"><a href='?module=manajemen_pengajaran'>Edit Bidang Pengajaran</a></li>
    		<li class="fakultas"><a href='?module=manajemen_materi'>Edit Materi, Referensi & Link</a></li>
            <li class="fakultas"><a href='logout.php'>Logout</a></li>
            </ul>
            </li>
            </ul>
			</li>
            </ul></div>
<div id="isi_kanan">
<div class="container_12">
	<div class="grid_12">
		<div class="module">
			<?php include "konten.php"; ?>
		</div> 
	</div>
</div></div></div>
<div style="clear:both;"></div>
<div id="kaki">
<div id="kaki_kiri"></div>
<div id="kaki_tengah"></div>
<div id="kaki_kanan"></div>
</div></div>
</body>
</html>