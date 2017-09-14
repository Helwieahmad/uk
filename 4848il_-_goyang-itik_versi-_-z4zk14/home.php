<br>
<?php
session_start();
// =========================== LEVEL USER : ADMINISTRATOR ============================================================//
if ($_SESSION[level] == '1'){
	$data = mysql_fetch_array(mysql_query("SELECT * FROM user WHERE id_user = '$_SESSION[id_user]'"));
?>
	<h2><span>Welcome to Administrator System</span></h2>

	<div class="module-table-body">
		<table id="myTable" class="tablesorter">
			<tr>
				<td>
					<p align="justify">Hai <font color="#CC6666"><b><?php echo $_SESSION[nama_lengkap]; ?></b></font>, Selamat datang di halaman Administrator  Website Personal Dosen Universitas Kanjuruhan Malang,
					Anda dapat mengolah segala aktifitas dalam sistem ini.. semua aktifitas yang Anda lakukan akan terekam dalam database.</p>
				    <p>&nbsp;</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
				</td>
			</tr>
		</table>
		
		<table>
			<tr>
				<td>
					Date Login: <?php echo $data[lastlogin]; ?>
				</td>
			</tr>
		</table>
		<div style="clear: both"></div>
	</div> <!-- End .module-table-body -->
<?php
}else{
	$data = mysql_fetch_array(mysql_query("SELECT * FROM user WHERE id_user = '$_SESSION[id_user]'"));
?>
	<h2><span>Welcome to Staff System</span></h2>

	<div class="module-table-body">
		<table id="myTable" class="tablesorter">
			<tr>
				<td><p align="justify">
					Hai <font color="#0099FF"><b><?php echo $_SESSION[nama_lengkap]; ?></b></font>, Selamat datang di halaman  Staff kampus Website Personal Dosen Universitas Kanjuruhan Malang,
					Anda dapat mengolah segala aktifitas dalam sistem ini.. semua aktifitas yang Anda lakukan akan terekam dalam database.</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
				</td>
			</tr>
		</table>
		
		<table>
			<tr>
				<td>
					Date Login: <?php echo $data[lastlogin]; ?>
				</td>
			</tr>
		</table>
		<div style="clear: both"></div>
	</div> <!-- End .module-table-body -->
<?php
}
?>