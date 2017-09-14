<link href="css/form_style.css" rel="stylesheet" /><?php
switch($_GET[act]){
	default:
	session_start();
	$Num_Rows = mysql_num_rows(mysql_query("SELECT * FROM materi Where pemilik_materi ='".$_SESSION['username']."'"));
?>
	<div id='koplak'><span>Anda Memilki <?php echo $Num_Rows; ?> materi</span></div>
		<div id="form_guwe">
			<tr>	
				<td>
<table width='595' style="background: rgb(252,255,244); /* Old browsers */
/* IE9 SVG, needs conditional override of 'filter' to 'none' */
background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2ZjZmZmNCIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNlOWU5Y2UiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
background: -moz-linear-gradient(top,  rgba(252,255,244,1) 0%, rgba(233,233,206,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(252,255,244,1)), color-stop(100%,rgba(233,233,206,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  rgba(252,255,244,1) 0%,rgba(233,233,206,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  rgba(252,255,244,1) 0%,rgba(233,233,206,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  rgba(252,255,244,1) 0%,rgba(233,233,206,1) 100%); /* IE10+ */
background: linear-gradient(to bottom,  rgba(252,255,244,1) 0%,rgba(233,233,206,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fcfff4', endColorstr='#e9e9ce',GradientType=0 ); /* IE6-8 */

 -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    -khtml-border-radius: 3px;
    border-radius: 3px; border:#d98033 solid 1px; color:#6e6e6f; padding:10px;font-family:Verdana, Geneva, sans-serif; font-size:14px;">
								<tr style="background:#d98033; font-family:Tahoma, Geneva, sans-serif; font-size:14px; font-weight:bold; color:#ffffff; height:35px">
									<th>Nama Materi</th>
									<th>Jenis Materi</th>
                                    <th>File</th>
									<th>Pilihan</th>
								</tr>
								
								<?php
						      $sql=mysql_query("SELECT * FROM materi WHERE pemilik_materi='$_SESSION[username]' ORDER BY id_materi DESC");
								$no = $posisi+1;
								while ($data = mysql_fetch_array($sql)){
									?>
									<tr height="30">
										<td align="center" hidden><?php echo $no; ?></td>
										<td><?php echo $data[nama]; ?></td>
                                        <td align="center"><?php echo $data[jenis]; ?></td>
                                        <td align="center"><a href="<?php echo $data[file]; ?>"><font color="#444444">[File Penelitian]</a></td>
										<td align="center" style="background:#d98033; height:35px; font-family:Tahoma, Geneva, sans-serif; font-size:14px; font-weight:bold; color:#ffffff; height:35px"><a href="?module=manajemen_materi&act=edit_materi&id=<?php echo $data[id_materi]; ?>"><font color="#FFFFFF";>Edit</font></a> | <a href="modul/modul_materi/aksi_materi.php?module=manajemen_materi&act=hapus_materi&id=<?php echo $data[id_materi]; ?>&namemateri=<?php echo $data[judu]; ?>" onclick="return confirm('Anda yakin akan Menghapus materi Yang Anda Pilih?');"><font color="#FFFFFF";>Hapus</font></a> </td>
									</tr>
									<?php
									$no++;
								}
								echo "</table>";
								?>
							<tr>
				<th><?php echo "<input type='button' value='Tambah Materi' onclick=\"window.location.href='?module=manajemen_materi&act=tambahmateri';\">"; ?></th>
			</tr></td>
					</tr>
				</table>
			<div style="clear: both"></div></div>
<?php
	break;
	case "tambahmateri":
	echo "<div id='koplak'><span>Tambah Materi</span></div>";
	?>
	<div id='form_guwe'>
	<?
	echo "<form method='POST' id='form_guwe' action='modul/modul_materi/aksi_materi.php?module=manajemen_materi&act=input' enctype='multipart/form-data'>
			<table>
				<tr>
					<td><label> Nama Materi </label></td>
					<td><label>:</label></td>
					<td><input type='text' name='nama' size='40' maxlength='100'></td>
				</tr>
				<tr>
					<td width='150'><label> Jenis Materi </label></td>
					<td width='15'><label>:</label></td>
					<td><input type='text' name='jenis' size='40' maxlength='100'></td>
				</tr>
				
				<tr>
					<td><label> Kategori </label></td>
					<td><label>:</label></td>
					<td><input type='text' name='kategori' size='40' maxlength='100'></td>
				</tr>
				<tr>
					<td><label>Upload File </label></td>
					<td><label>:</label></td>
					<td><input type='file' name='upload' size='30'></td>
				</tr>
				<tr>
					<td><label> URL / Link </label></td>
					<td><label>:</label></td>
					<td><input type='text' name='url' size='40' maxlength='100'></td>
				</tr>
				<tr>
					<td><label> Keterangan </label></td>
					<td><label>:</label></td>
					<td><textarea name='keterangan' rows='2' cols='40'></textarea></td>
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
	case "edit_materi":
	$data = mysql_fetch_array(mysql_query("SELECT * FROM materi WHERE id_materi = '$_GET[id]'"));
	echo "<div id='koplak'><span>Edit Materi</span></div>";
	?>
	<div id='form_guwe'><?
	echo "<form method='POST' id='form_guwe' action='modul/modul_materi/aksi_materi.php?module=manajemen_materi&act=update&id=$_GET[id]' enctype='multipart/form-data'>
			<table>
				<tr>
					<td><label> Nama Materi </label></td>
					<td><label>:</label></td>
					<td><input type='text' name='nama' size='40' maxlength='100' value='$data[nama]'></td>
				</tr>
				<tr>
					<td width='150'><label> Jenis Materi </label></td>
					<td width='15'><label>:</label></td>
					<td><input type='text' name='jenis' size='40' maxlength='100' value='$data[jenis]'></td>
				</tr>
				
				<tr>
					<td><label> Kategori </label></td>
					<td><label>:</label></td>
					<td><input type='text' name='kategori' size='40' maxlength='100' value='$data[kategori]'></td>
				</tr>
				<tr>
					<td><label>Upload File </label></td>
					<td><label>:</label></td>
					<td><input type='file' name='upload' size='30'></td>
				</tr>
				<tr>
					<td><label> URL / Link </label></td>
					<td><label>:</label></td>
					<td><input type='text' name='url' size='40' maxlength='100' value='$data[url]'></td>
				</tr>
				<tr>
					<td><label> Keterangan </label></td>
					<td><label>:</label></td>
					<td><textarea name='keterangan' rows='2' cols='40'>$data[nama]</textarea></td>
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