<br>
<?php
switch($_GET[act]){
	default:
	session_start();

	case "tambahpengajaran":
	echo "<br><h2><span>Tambah Bidang Pengajaran/Mata Kuliah</span></h2>";
	echo "<form method='POST' action='modul_pengajaran/aksi_pengajaran.php?module=manajemen_pengajaran&act=input' >
			<table>
				<tr>
					<td> Nama Bidang Pengajaran/Mata Kuliah </td>
					<td>:</td>
					<td><input type='text' name='nama' size='50' maxlength='100'></td>
				</tr>
				<tr>
					<th colspan='6'><input type='submit' value='Simpan'><a href='javascript:history.go(-1)'><input type='button' value='Cancel'></a></th>
				</tr>
			</table>
		</form>
	
		";
	echo "<p>&nbsp;</p>";
	break;
	
	case "edit_pengajaran":
	$data = mysql_fetch_array(mysql_query("SELECT * FROM pengajaran_admin WHERE id_pengajaran = '$_GET[id]'"));
	echo "<br><h2><span>Ubah Bidang Pengajaran</span></h2>";
	echo "<form method='POST' action='modul_pengajaran/aksi_pengajaran.php?module=manajemen_pengajaran&act=update&id=$_GET[id]' >
				<table>
				<tr>
					<td> Nama Bidang Pengajaran </td>
					<td>:</td>
					<td><input type='text' name='nama' size='50' maxlength='100' value='$data[nama]'></td>
				</tr>
				<tr>
					<th colspan='6'><input type='submit' value='Simpan'><a href='javascript:history.go(-1)'><input type='button' value='Cancel'></a></th>
				</tr>
			</table>
		</form>
	
		";
	echo "<p>&nbsp;</p>";
	break;
}
?>
