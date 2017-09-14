<link href="css/form_style.css" rel="stylesheet" />
<div id="back">
<?php
include "config/koneksi.php";
include "config/fungsi_indotgl.php";
include "config/library.php";
include "config/class_paging.php";
// Bagian Home
?>
<table width='610'>
<? if ($_GET[module]=='home'){
  echo "<div class=judul_head>&#187; PUBLIKASI TERBARU</div><br>";
  // Tampilkan 3 berita terbaru
 	$terkini= mysql_query("SELECT * FROM publikasi ORDER BY id_publikasi DESC LIMIT 3");		 
	while($t=mysql_fetch_array($terkini)){
		$tgl =($t[tanggal]);
		echo "<div class='post'>
		<div class=juju><a class='juju' href=?module=detailpublikasi&id=$t[id_publikasi]>$t[judul]</a></div>";
		echo "<div class=isi>";
  		$wadaw=mysql_query("SELECT * FROM profil_dosen ORDER BY id_dosen");
 		while ($r=mysql_fetch_array($wadaw)){
			if($r[username]==$t[pemilik_publikasi]){
			echo "<img class='gambar' src='image_profil/$r[Foto]' height=100 border=0 align=left><br><br>"; 
    $isi_berita = nl2br($t[abstrak]);
    $isi = substr($isi_berita,0,410); // ambil sebanyak 410 karakter
    $isi = substr($isi_berita,0,strrpos($isi," ")); // spasi antar kalimat
	echo "<div class=isi_kecil>Pengarang : $t[pengarang]&nbsp;|&nbsp;$tgl</div>";
    echo "$isi ...  <div class='selengkapnya'><a class='lengkap' href=?module=detailpublikasi&id=$t[id_publikasi]>Selengkapnya</a></div>
          <br></td></tr></div></div>";
}		
}
}	
}
?>
<div style="clear: both"></div></div></table>
<table width='610'>
<? if ($_GET[module]=='home'){
  echo "<br><br><div class=judul_head>&#187; PENELITIAN TERBARU</div><br>";
  // Tampilkan 3 berita terbaru
 	$terkini= mysql_query("SELECT * FROM penelitian ORDER BY id_penelitian DESC LIMIT 3");		 
	while($t=mysql_fetch_array($terkini)){
		$tgl =($t[createddate]);
		echo "<div class='post'>
		<div class=juju><a class='juju' href=?module=detailpenelitian&id=$t[id_penelitian]>$t[judul]</a></div>";
		echo "<div class=isi>";
  		$wadaw=mysql_query("SELECT * FROM profil_dosen ORDER BY id_dosen");
 		while ($r=mysql_fetch_array($wadaw)){
			if($r[username]==$t[pemilik_penelitian]){
			echo "<img class='gambar' src='image_profil/$r[Foto]' height=100 border=0 align=left><br><br>"; 
    $isi_berita = nl2br($t[abstraksi]);
    $isi = substr($isi_berita,0,410); // ambil sebanyak 410 karakter
    $isi = substr($isi_berita,0,strrpos($isi," ")); // spasi antar kalimat
	echo "<div class=isi_kecil>Oleh : $t[penulis]&nbsp;|&nbsp;$tgl</div>";
    echo "$isi ...  <div class='selengkapnya'><a class='lengkap' href=?module=detailpenelitian&id=$t[id_penelitian]>Selengkapnya</a></div>
          <br></td></tr></div></div>";
}
}
}
}
?>
<div style="clear: both"></div></div></table>
<table width='610'>
<? if ($_GET[module]=='detailpublikasi'){
	$detail=mysql_query("SELECT * FROM publikasi,profil_dosen 
                      WHERE profil_dosen.username=publikasi.pemilik_publikasi 
                      AND id_publikasi='$_GET[id]'");
	$demo   = mysql_fetch_array($detail);
	$tgl = tgl_indo($demo[createddate]);
	echo "<div class=jujur>$demo[judul]</div>";
	echo "<div class=isi_kecil>Ditulis Oleh : $demo[pengarang] | $tgl</div><br>";
  echo "<div class=isi_unyu2>";
 	if ($demo[Foto]!=''){
		echo "<img src='gambar' src='image_profil/$r[Foto]' height=100 border=0 align=left><br><br>";
	}
 	$isi_berita=nl2br($demo[abstrak]);
	echo "$isi_berita</div>";	 		  
	echo "<div class=kembali><br>
        [ <a href=javascript:history.go(-1)>Kembali</a> ]</dvi>";	 		  

	}

?>
<div style="clear: both"></div></div></table>
<table width='610'>
<? if ($_GET[module]=='detailpenelitian'){
	$detail=mysql_query("SELECT * FROM penelitian,profil_dosen 
                      WHERE profil_dosen.username=penelitian.pemilik_penelitian 
                      AND id_penelitian='$_GET[id]'");
	$demo   = mysql_fetch_array($detail);
	$tgl = tgl_indo($demo[createddate]);
	echo "<div class=jujur>$demo[judul]</div>";
	echo "<div class=isi_kecil>Ditulis Oleh : $demo[penulis] | $tgl</div><br>";
  echo "<div class=isi_unyu2>";
 	if ($demo[Foto]!=''){
		echo "<img src='gambar' src='image_profil/$r[Foto]' height=100 border=0 align=left><br><br>";
	}
 	$isi_berita=nl2br($demo[abstraksi]);
	echo "$isi_berita</div>";	 		  
	echo "<div class=kembali><br>
        [ <a href=javascript:history.go(-1)>Kembali</a> ]</dvi>";	 		  

	}

?>
<div style="clear: both"></div></div></table>