<script type="text/javascript" 
        src="js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" 
src="js/jquery-ui-1.8.11.custom.min.js"></script>        
<script type="text/javascript" 
src="js/jquery.ui.datepicker-id.js"></script>        
<link rel="stylesheet" type="text/css" href="js/jquery-ui-1.8.11.custom.css" />        
<script type="text/javascript">
   $(document).ready(function() {
      $("#tanggal").datepicker({ 
         dateFormat: "dd-mm-yy",
         changeMonth: true,
         changeYear: true ,
         yearRange: "-100:+0",
         showOn: "button",
         buttonText: "Menampilkan date picker",
         buttonImage: "images/calendar.gif",
         buttonImageOnly: true
      });
   });
</script>        
<link href="css/form_style.css" rel="stylesheet" />
 <script src="tiny_mce/tiny_mce.js" type="text/javascript"></script>
<script src="tiny_mce/tiny_lokomedia.js" type="text/javascript"></script>

<?php
switch($_GET[act]){
	default:
	session_start();
	$Num_Rows = mysql_num_rows(mysql_query("SELECT * FROM publikasi Where pemilik_publikasi ='".$_SESSION['username']."'"));
?>
	<div id='koplak'><span>Anda Memilki <?php echo $Num_Rows; ?> Publikasi Ilmiah</span></div>

		<div id='form_guwe'>
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
								
								<tr style="background:#d98033; height:35px; font-family:Tahoma, Geneva, sans-serif; font-size:14px; font-weight:bold; color:#ffffff; height:35px">		<th>NO</th>
									<th>Judul Publikasi</th>
                                    <th>File</th>
									<th>Pilihan</th>
								</tr>
								
								<?php
								
						      $sql=mysql_query("SELECT * FROM publikasi WHERE pemilik_publikasi='$_SESSION[username]' ORDER BY id_publikasi DESC");
								$no = $posisi+1;
								while ($data = mysql_fetch_array($sql)){
									?>
									<tr height="30">
										<td align="center"><?php echo $no; ?></td>
                                        <td width="60%"><?php echo $data[judul]; ?></td>
                                        <td align="center" width="20%"><a href="<?php echo $data[file]; ?>"><font color="#444444">[File Penelitian]</a></td>
										<td align="center" width="20%" style="background:#d98033; font-family:Tahoma, Geneva, sans-serif; font-size:14px; font-weight:bold; color:#ffffff; height:35px"><a href="?module=manajemen_publikasi&act=edit_publikasi&id=<?php echo $data[id_publikasi]; ?>"><font color="#FFFFFF";>Edit</font></a> | <a href="modul/modul_publikasi/aksi_publikasi.php?module=manajemen_publikasi&act=hapus_publikasi&id=<?php echo $data[id_publikasi]; ?>&namepublikasi=<?php echo $data[judul]; ?>" onclick="return confirm('Anda yakin akan Menghapus Publikasi berjudul <?php echo $data[judul]; ?>?');"><font color="#FFFFFF";>Hapus</font></a> </td>
									</tr>
									<?php
									$no++;
								}
								echo "</table>";
								?>
                                	<tr>
				<th align='right'><?php echo "<input type='button' value='Tambah Publikasi Ilmiah' onclick=\"window.location.href='?module=manajemen_publikasi&act=tambahpublikasi';\">"; ?></th>
			</tr>
						</td>
					</tr>
				</table>
</div>
<?php
	break;
	case "tambahpublikasi":
	echo "<div id='koplak'><span>Tambah Publikas Ilmiah</span></div>";
	?>
	<div id='form_guwe'>
	<?
	echo "<form method='POST' id='form_guwe' action='modul/modul_publikasi/aksi_publikasi.php?module=manajemen_publikasi&act=input' enctype='multipart/form-data'>
			<table width='595'>
				<tr>
					<td><label>Judul Publikasi </label></td>
					<td><label:</label></td>
					<td><input type='text' name='judul' size='40' maxlength='100'></td>
				</tr>
				<tr>
					<td width='150'><label> Pengarang </label></td>
					<td width='15'><label>:</label></td>
					<td><input type='text' name='pengarang' size='40' maxlength='100'></td>
				</tr>
				<tr>
					<td><label>Tanggal Publikasi</label></td>
					<td><label>:</label></td>
					<td><input name='tanggal' id='tanggal'></td>
				</tr>
				<tr>
					<td> <label>Dipublikasi di </label></td>
					<td><label>:</label></td>
					<td><input type='text' name='dipublikasi' size='40' maxlength='100'></td>
				</tr>
				<tr>
					<td> <label>Jenis Jurnal</label></td>
					<td><label>:</label></td>
					<td><input type='text' name='jenis_jurnal' size='40' maxlength='50'></td>
				</tr>
				<tr>
					<td> <label>Link </label></td>
					<td><label>:</label></td>
					<td><input type='text' name='link' size='40' maxlength='100'</td>
				</tr>
				<tr>
					<td><label> Bidang Penelitian </label></td>
					<td><label>:</label></td>
					<td><input type='text' name='bidang_penelitian' size='40' maxlength='100'></td>
				</tr>
				<tr>
					<td><label> Abstrak</label></td>
					<td><label:</label></td>
					<td><textarea name='abstrak' id='loko' style='width: 400px;'></textarea></td>
				</tr>
				<tr>
					<td><label>Upload File </label></td>
					<td><label:</label></td>
					<td><input type='file' name='upload' size='30'></td>
				</tr>
				<tr>
					<th colspan='6'><input type='submit' value='Simpan'>&nbsp;<a href='javascript:history.go(-1)'><input type='button' value='Cancel'></a></th>
				</tr>
			</table>
		</form>
	
		";
	echo "<p>&nbsp;</p>";
	break;?></div>
	<?
	case "edit_publikasi":
	$data = mysql_fetch_array(mysql_query("SELECT * FROM publikasi WHERE id_publikasi = '$_GET[id]'"));
	echo "<div id='koplak'><span>Edit Publikasi Ilmiah</span></div>";
	?>
	<div id='form_guwe'>
	<?
	echo "<form method='POST' id='form_guwe' action='modul/modul_publikasi/aksi_publikasi.php?module=manajemen_publikasi&act=update&id=$_GET[id]' enctype='multipart/form-data'>
			<table width='595'>
				<tr>
					<td> <label>Judul Publikasi</label></td>
					<td><label>:</label></td>
					<td><input type='text' name='judul' size='40' value='$data[judul]' maxlength='100'></td>
				</tr>
				<tr>
					<td width='150'><label> Pengarang </label></td>
					<td width='15'><label>:</label></td>
					<td><input type='text' name='pengarang' size='40' value='$data[pengarang]' maxlength='100'></td>
				</tr>
				<tr>
					<td><label>Tanggal Publikasi</label></td>
					<td><label>:</label></td>
					<td><input type='text' id='tanggal' name='tanggal' value='$data[tanggal]'></td>
				</tr>
				<tr>
					<td> <label>Dipublikasi di </label></td>
					<td><label>:</label></td>
					<td><input type='text' name='dipublikasi' size='40' value='$data[dipublikasi]' maxlength='100'></td>
				</tr>
				<tr>
					<td><label> Jenis Jurnal</label></td>
					<td><label>:</label></td>
					<td><input type='text' name='jenis_jurnal' size='40' value='$data[jenis_jurnal]' maxlength='50'></td>
				</tr>
				<tr>
					<td> <label>Link </label></td>
					<td><label>:</label></td>
					<td><input type='text' name='link' size='40' maxlength='100' value='$data[link]'</td>
				</tr>
				<tr>
					<td><label>Bidang Penelitian </label></td>
					<td><label>:</label></td>
					<td><input type='text' name='bidang_penelitian' size='30' value='$data[bidang_penelitian]' maxlength='100'></td>
				</tr>
				<tr>
					<td><label> Abstrak</label></td>
					<td><label>:</label></td>
					<td><textarea name='abstrak' id='loko' style='width:400;'>$data[abstrak]</textarea></td>
				</tr>
				<tr>
					<td><label>Upload File </label></td>
					<td><label>:</label></td>
					<td><input type='file' name='upload' size='30'></td>
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