<? include"fungsi/class_paging.php";
include"config/koneksi.php"; ?>

<link href="css/form_style.css" rel="stylesheet" />
<div id="koplak"><p align="center">Di bawah ini adalah List Daftar Bidang Penelitian</p></div>
<tr>	
				<td>
<div style="background: rgb(252,255,244); /* Old browsers */
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
    border-radius: 3px; border:#d98033 solid 1px; height:700px;">
<table width='617'>
								<tr style="background:#444444; height:35px; font-family:Tahoma, Geneva, sans-serif; font-size:14px; font-weight:bold; color:#ffffff; height:35px;">
									<th width="100%">Judul Penelitian</th>
									
								</tr>
								
								<?php
								$p      = new PagingDosen;
								$batas  = 20;
								$posisi = $p->cariPosisi($batas);
						      	$sql=mysql_query("SELECT * FROM penelitian ORDER BY id_penelitian ASC LIMIT $posisi,$batas");$no = $posisi+1;
								while ($data = mysql_fetch_array($sql)){
									?>
									<tr height="30"> 
										<td align="center" hidden><?php echo $no; ?></td>
										<td  style="border-bottom:1px solid #6e6e6f;">&nbsp; <a style="color:#6e6e6f;font-family:Verdana, Geneva, sans-serif; font-size:13px;" href=""><?php echo $data[judul] ; ?></a></td>
									</tr>
									<?php
									$no++;
								}
								echo "</table>";
								?>
			<div style="clear: both"></div></div>
           <?php
		$jmldata = mysql_num_rows(mysql_query("SELECT * FROM penelitian"));
		$jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
		$linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);
?>
        <!-- Page Navigation -->
        <div class="kacau">
            <div class="capek">
                <?php echo "Hal: $linkHalaman"; ?>
            </div>
        </div>      
        <!-- END Page Navigation -->
		