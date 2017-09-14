<br>
<?php
switch($_GET[act]){
	default:
	session_start();
	case "tambahprodi":
	echo "<br><h2><span>Tambah Jurusan/Prodi</span></h2>";
	echo "<form method='POST' action='modul_pengajaran/aksi_prodi.php?module=manajemen_prodi&act=input' >
			<table>
				<tr>
					<td> Nama Jurusan/Prodi </td>
					<td>:</td>
					<td><input type='text' name='nama_prodi' size='50' maxlength='100'></td>
				</tr>
				<tr>
					<th colspan='6'><input type='submit' value='Simpan'><a href='javascript:history.go(-1)'><input type='button' value='Cancel'></a></th>
				</tr>
			</table>
		</form>
	
		";
	echo "<p>&nbsp;</p>";
	break;
	
	case "edit_prodi":
	$data = mysql_fetch_array(mysql_query("SELECT * FROM prodi WHERE id_prodi = '$_GET[id]'"));
	echo "<br><h2><span>Ubah Nama Jurusan/Prodi</span></h2>";
	echo "<form method='POST' action='modul_pengajaran/aksi_prodi.php?module=manajemen_prodi&act=update&id=$_GET[id]' >
				<table>
				<tr>
					<td> Nama Jurusan/Prodi </td>
					<td>:</td>
					<td><input type='text' name='nama_prodi' size='50' maxlength='100' value='$data[nama_prodi]'></td>
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
