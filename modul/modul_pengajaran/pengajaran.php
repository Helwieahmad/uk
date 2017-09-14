<link href="css/form_style.css" rel="stylesheet" /><?php
	session_start();
	$Num_Rows = mysql_num_rows(mysql_query("SELECT * FROM pengajaran Where pemilik_pengajaran ='".$_SESSION['username']."'"));
?>
	<div id='koplak'><span>Bidang Mata Kuliah yang Anda Ajarkan</span></div>
			<div id='form_guwe'><tr>	
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
								<tr style="background:#d98033; height:35px; font-family:Tahoma, Geneva, sans-serif; font-size:14px; font-weight:bold; color:#ffffff; height:35px">
									<th style=" font-family:Tahoma, Geneva, sans-serif; font-size:14px; font-weight:bold; color:#ffffff;">Bidang Pengajaran / Mata Kuliah yang diajarkan</th>
									<th>Pilihan</th>
								</tr>
								
								<?php
								$sql=mysql_query("SELECT * FROM pengajaran WHERE pemilik_pengajaran='$_SESSION[username]' ORDER BY id_pengajaran DESC");
								$no = $posisi+1;
								while ($data = mysql_fetch_array($sql)){
									?>
									<tr height="30">
										<td align="center"><?php echo $data[nama]; ?></td>
										<td align="center" style="background:#d98033; height:35px; font-family:Tahoma, Geneva, sans-serif; font-size:14px; font-weight:bold; color:#ffffff; height:35px"><a href="modul/modul_pengajaran/aksi_pengajaran.php?module=manajemen_pengajaran&act=hapus_pengajaran&id=<?php echo $data[id_pengajaran]; ?>&namepengajaran=<?php echo $data[nama]; ?>" onclick="return confirm('Anda yakin ingin menghapus <?php echo $data[nama]; ?>?');"><font color="#FFFFFF";>Hapus</font></a> </td>
									</tr>
									<?php
									$no++;
								}
								echo "</table>";
								?>
						</td>
					</tr>
				</table></div>
<div id="form_guwe">
<?php 
echo" <form method='POST' action='modul/modul_pengajaran/aksi_pengajaran.php?module=manajemen_pengajaran&act=input'>
          

<table width='595' style='border:#d98033 solid 1px;'>		
				<tr style=' background:#d98033; line-height:35px; font-family:Tahoma, Geneva, sans-serif; font-size:14px; font-weight:bold; color:#ffffff;'>
             <th>Menambahkan Mata Kuliah yang Anda ajarkan</th></tr>
		</table>
	
<table width='595' style='border:#d98033 solid 1px;'>	
		<tr>		
		<td><select name='nama'>
		<option value='---' selected>---&nbsp;&nbsp;&nbsp; Pilih Bidang Pengajaran/Mata Kuliah &nbsp;&nbsp;&nbsp;---</option>";
						$sql2 = mysql_query("SELECT * FROM pengajaran_admin ORDER BY id_pengajaran ASC");
						while ($data2 = mysql_fetch_array($sql2)){
							echo "<option value='$data2[nama]'>$data2[nama]</option>";
						}
				echo "	</select></td>
				<td style='float:right;'><input type='submit' value='Tambahkan'></td></tr></table>
</form>
";?></div><div id='form_guwe'>
<?php
	
	echo "<div style=' background:#d98033; line-height:35px; font-family:Tahoma, Geneva, sans-serif; font-size:13px; font-weight:bold; color:#ffffff;text-align:center;'><span>Jika Pilihan Bidang Mata Kuliah diatas tidak ada, silahkan tambahkan dibawah ini!</span></div>";
	echo "<form method='POST' action='modul/modul_pengajaran/aksi_pengajaran_to_admin.php?module=manajemen_pengajaran&act=input'>
			<table width='595' style='border:#d98033 solid 1px;'>	
				<tr>
					<td><label> Nama Mata Kuliah </label></td>
					<td><label>:</label></td>
					<td><input type='text' name='nama' size='30' maxlength='100'></td><td align='right'><input type='submit' value='Tambahkan'></td>
				</tr>
			</table>
		</form>
	
		";
	echo "<p>&nbsp;</p>";

?></div>