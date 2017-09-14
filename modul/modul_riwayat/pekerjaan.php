<link href="css/form_style.css" rel="stylesheet" /><?php
switch($_GET[act]){
	default:
	session_start();
	break;
	case "tambahpekerjaan":
	echo "<div id='koplak'><span>Tambah Riwayat Pekerjaan</span></div>";
	?>
<div id='form_guwe'>
	<?
	echo "<form method='POST' id='form_guwe' action='modul/modul_riwayat/aksi_pekerjaan.php?module=manajemen_pekerjaan&act=input' enctype='multipart/form-data'>
			<table id='595'>
				<tr>
					<td> <label>Nama Pekerjaan </label></td>
					<td><label><b>:</b></label></td>
					<td><input type='text' name='nama' size='40' maxlength='100'></td>
				</tr>
				<tr>
					<td> <label>Jabatan </label></td>
					<td><label>:</label></td>
					<td><input type='text' name='jabatan' size='40' maxlength='100'></td>
				</tr>
				<tr>
					<td> <label>Di Daerah </label></td>
					<td><label>:</label></td>
					<td><input type='text' name='daerah' size='40' maxlength='100'></td>
				</tr>
				<tr>
					<td><label>Tahun Masuk</label></td>
					<td><label>:</label></td>
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
					<td>:</td>
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
	?></div>
	<?
	case "edit_pekerjaan":
	$data = mysql_fetch_array(mysql_query("SELECT * FROM riwayat_pekerjaan WHERE riwayat_pekerjaan = '$_GET[id]'"));
	echo "<div id='koplak'><span>Edit Riwayat Pekerjaan</span></div>";
	?>
	<div id='form_guwe'>
	<?
	
	echo "<form method='POST' id='form_guwe' action='modul/modul_riwayat/aksi_pekerjaan.php?module=manajemen_pekerjaan&act=update&id=$_GET[id]'>
			<table>
				<tr>
					<td><label> Nama Pekerjaan </label></td>
					<td><label>:</label></td>
					<td><input type='text' name='nama' size='40' maxlength='100' value='$data[nama]'></td>
				</tr>
				<tr>
					<td><label> Jabatan </label></td>
					<td><label>:</label></td>
					<td><input type='text' name='jabatan' size='40' maxlength='100' value='$data[jabatan]'></td>
				</tr>
				<tr>
					<td><label> Di Daerah </label></td>
					<td><label>:</label></td>
					<td><input type='text' name='daerah' size='40' maxlength='100' value='$data[daerah]'></td>
				</tr>
				<tr>
					<td><label>Tahun Masuk</label></td>
					<td><label>:</label></td>
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
					<th colspan='6'><input type='submit' value='Simpan'>&nbsp;<a href='javascript:history.go(-1)'><input type='button' value='Cancel'></a></th>
				</tr>
			</table>
		</form>
	
		";
	echo "<p>&nbsp;</p>";
	break;
}
?></div>