<link href="css/form_style.css" rel="stylesheet" /><?php
switch($_GET[act]){
	default:
	session_start();
	case "tambahpendidikan":
	echo "<div id='koplak'><span>Tambah Riwayat Pendidikan</span></div>";
?>	<div id='form_guwe'><?
	echo "<form method='POST' id='form_guwe' action='modul/modul_riwayat/aksi_pendidikan.php?module=manajemen_pendidikan&act=input'>
			<table width='595'>
				<tr>
					<td><label> Nama Sekolah / PT </label></td>
					<td><label>:</label></td>
					<td><input type='text' name='nama' size='40' maxlength='100'></td>
				</tr>
				<tr>
					<td><label>Tahun Masuk</label></td>
					<td><label>:</label></td>
					<td>
					<select name='tahun_masuk'>
     <option value=++ selected>Tahun</option>";
	  $thn_skrg=date("Y");
      for ($thn=1900;$thn<=$thn_skrg;$thn++){
        echo "<option value=$thn>$thn</option>";
      }
      echo "</select></td>
				</tr>
				<tr>
					<td><label>Tahun Keluar</label></td>
					<td><label>:</label></td>
					<td><select name='tahun_keluar'>
      <option value=++ selected>Tahun</option>";
	  $thn_skrg=date("Y");
      for ($thn=1900;$thn<=$thn_skrg;$thn++){
        echo "<option value=$thn>$thn</option>";
      }
      echo "</select></td>
				</tr>
				<tr>
					<td><label> Keterangan</label></td>
					<td><label>:</label></td>
					<td><textarea name='keterangan' cols='40' rows='2'></textarea></td>
				</tr>
				<tr>
					<th colspan='6'><input type='submit' value='Simpan'>&nbsp;<a href='javascript:history.go(-1)'><input type='button' value='Cancel'></a></th>
				</tr>
			</table>
		</form>
	
		";
	echo "<p>&nbsp;</p>";
	break;
	?>
        </div>
		<?
	case "edit_pendidikan":
	$data = mysql_fetch_array(mysql_query("SELECT * FROM riwayat_pendidikan WHERE riwayat_pendidikan = '$_GET[id]'"));
	echo "<div id='koplak'><span>Edit Riwayat Pendidikan</span></div>";
	?>
    <div id='form_guwe'>
	<?
	echo "<form method='POST' id='form_guwe' action='modul/modul_riwayat/aksi_pendidikan.php?module=manajemen_pendidikan&act=update&id=$_GET[id]'>
			<table width='595'>
				<tr>
					<td> <label>Nama Sekolah / PT</label> </td>
					<td><label>:</label></td>
					<td><input type='text' name='nama' size='40' maxlength='100' value='$data[nama]'></td>
				</tr>
				<tr>
					<td><label>Tahun Masuk</label></td>
					<td><label>:</label</td>
					<td><select name='tahun_masuk'>
<option value=++ selected>Tahun</option>";
	  $thn_skrg=date("Y");
      for ($thn=1900;$thn<=$thn_skrg;$thn++){
        echo "<option value=$thn>$thn</option>";
      }
      echo "</select></td>
				</tr>
				<tr>
					<td><label>Tahun Keluar</label></td>
					<td><label>:</label></td>
					<td><select name='tahun_keluar'>
      <option value=++ selected>Tahun</option>";
	  $thn_skrg=date("Y");
      for ($thn=1900;$thn<=$thn_skrg;$thn++){
        echo "<option value=$thn>$thn</option>";
      }
      echo "</select></td>
				</tr>
				<tr>
					<td><label> Keterangan</label></td>
					<td><label>:</label></td>
					<td><textarea name='keterangan' cols='40' rows='2'>$data[keterangan]</textarea></td>
				</tr>
				<tr>
					<th colspan='6'><input type='submit' value='Update'>&nbsp;<a href='javascript:history.go(-1)'><input type='button' value='Cancel'></a></th>
				</tr>
			</table>
		</form>
	
		";
	echo "<p>&nbsp;</p>";
	break;
}
?></div>