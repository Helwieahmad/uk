<link href="css/form_style.css" rel="stylesheet" />
<div id='koplak'><span>Riwayat Pendidikan Anda</span></div>
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
								<tr style="background:#d98033; height:35px; font-family:Tahoma, Geneva, sans-serif; font-size:14px; font-weight:bold; color:#ffffff; height:35px">
                                	<th>No</th>
									<th>Nama Pendidikan</th>
									<th>Tahun Masuk</th>
                                    <th>Tahun Keluar</th>
									<th>Pilihan</th>
								</tr>
								
								<?php
								
						      $sql=mysql_query("SELECT * FROM riwayat_pendidikan WHERE pemilik_pendidikan='$_SESSION[username]' ORDER BY riwayat_pendidikan DESC");
								$no = $posisi+1;
								while ($data = mysql_fetch_array($sql)){
									?>
									<tr height="30">
										<td align="center"><?php echo $no; ?></td>
										<td align="center"><?php echo $data[nama]; ?></td>
										<td align="center"><?php echo $data[tahun_masuk]; ?></td>
                                        <td align="center"><?php echo $data[tahun_keluar]; ?></td>
										<td align="center" style="background:#d98033; height:35px; font-family:Tahoma, Geneva, sans-serif; font-size:14px; font-weight:bold; color:#ffffff; height:35px;"><a href="?module=manajemen_pendidikan&act=edit_pendidikan&id=<?php echo $data[riwayat_pendidikan]; ?>"><font color="#FFFFFF";>Edit</font></a> | <a href="modul/modul_riwayat/aksi_pendidikan.php?module=manajemen_pendidikan&act=hapus_pendidikan&id=<?php echo $data[riwayat_pendidikan]; ?>&namependidikan=<?php echo $data[nama]; ?>" onclick="return confirm('Anda yakin akan Menghapus Riwayat Pendidikan <?php echo $data[nama]; ?>?');"><font color="#FFFFFF";>Hapus</font></a></font> </td>
									</tr>
									<?php
									$no++;
								}
								echo "</table>";
								?>
						<tr>
				<th align='right'><?php echo "<input type='button' value='Tambah Riwayat Pendidikan' onclick=\"window.location.href='?module=manajemen_pendidikan&act=tambahpendidikan';\">"; ?></th>
			</tr>
			<div style="clear: both"></div></div>
            
            <div id='koplak'><span>Riwayat Pekerjaan & Jabatan</span></div>
            <div id="form_guwe">
            
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
                                	<th>No</th>
									<th>Nama Pekerjaan</th>
									<th>Tahun Masuk</th>
                                    <th>Tahun Keluar</th>
									<th>Pilihan</th>
								</tr>
								
								<?php
                                $sql=mysql_query("SELECT * FROM riwayat_pekerjaan WHERE pemilik_pekerjaan='$_SESSION[username]' ORDER BY riwayat_pekerjaan DESC");
								$no = $posisi+1;
								while ($data = mysql_fetch_array($sql)){
									?>
									<tr height="30">
										<td align="center"><?php echo $no; ?></td>
										<td align="center"><?php echo $data[nama]; ?></td>
										<td align="center"><?php echo $data[tahun_masuk]; ?></td>
                                        <td align="center"><?php echo $data[tahun_keluar]; ?></td>
										<td align="center" style="background:#d98033; height:35px; font-family:Tahoma, Geneva, sans-serif; font-size:14px; font-weight:bold; color:#ffffff; height:35px;"><a href="?module=manajemen_pekerjaan&act=edit_pekerjaan&id=<?php echo $data[riwayat_pekerjaan]; ?>"><font color="#FFFFFF";>Edit</font></a> | <a href="modul/modul_riwayat/aksi_pekerjaan.php?module=manajemen_pekerjaan&act=hapus_pekerjaan&id=<?php echo $data[riwayat_pekerjaan]; ?>&namepekerjaan=<?php echo $data[nama]; ?>" onclick="return confirm('Anda yakin akan Menghapus Riwayat Pekerjaan <?php echo $data[nama]; ?>?');"><font color="#FFFFFF";>Hapus</font></a> </td>
									</tr>
									<?php
									$no++;
								}
								echo "</table>";
								?>
					<tr>
				<th><?php echo "<input type='button' value='Tambah Riwayat Pekerjaan' onclick=\"window.location.href='?module=manajemen_pekerjaan&act=tambahpekerjaan';\">"; ?></th>
			</tr>    </tr>
				</table></div>
			<div style="clear: both"></div>