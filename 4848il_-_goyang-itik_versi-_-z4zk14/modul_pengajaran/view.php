<br>
<?php
session_start();
include "fungsi/class_paging.php";
$Num_Rows = mysql_num_rows(mysql_query("SELECT * FROM pengajaran_admin"));
?>
	<h2><span> Total Data Ada <?php echo $Num_Rows; ?> Bidang Pengajaran/Mata Kuliah</span></h2>

	<div class="module-table-body">
		<table id="myTable" class="tablesorter">
			<tr>
				<th><?php echo "<input type='button' value='Tambah Bidang Pengajaran' onclick=\"window.location.href='?module=manajemen_pengajaran&act=tambahpengajaran';\">"; ?></th>
			</tr>
			<tr>	
				<td>
					<div style="font-family: arial; overflow: scroll; width: 100%; height: 350px;">
						<div style="text-align: center; width: 100%; padding: 0 px; overflow: hidden;">
							<table>
								<tr>
									<th>No</th>
									<th>Nama Pengajaran</th>
									<th>Pilihan</th>
								</tr>
								
								<?php
								$p      = new PagingDosen;
								$batas  = 10;
								$posisi = $p->cariPosisi($batas);
								
								$sql = mysql_query("SELECT * FROM pengajaran_admin ORDER BY id_pengajaran ASC LIMIT $posisi,$batas");
								$no = $posisi+1;
								while ($data = mysql_fetch_array($sql)){
									?>
									<tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $data[nama]; ?></td>
										<td><a href="?module=manajemen_pengajaran&act=edit_pengajaran&id=<?php echo $data[id_pengajaran]; ?>">Edit</a> | <a href="modul_pengajaran/aksi_pengajaran.php?module=manajemen_pengajaran&act=hapus_pengajaran&id=<?php echo $data[id_pengajaran]; ?>&namepengajaran=<?php echo $data[nama]; ?>" onclick="return confirm('Anda yakin ingin menghapus <?php echo $data[nama]; ?>?');">Hapus</a> </td>
									</tr>
									<?php
									$no++;
								}
								echo "</table>";
								?>
								</div>
							</div>
						</td>
					</tr>
				</table>
			
				<table>
					<tr>
						<td>
							<?php
							$jmldata = mysql_num_rows(mysql_query("SELECT * FROM pengajaran_admin"));
							$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
							$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

							echo "<div id='paging'>Hal: $linkHalaman </div>";
							?>
						</td>
					</tr>
				</table>
			<div style="clear: both"></div>
		</div> <!-- End .module-table-body -->
<?
	$Num_Rows = mysql_num_rows(mysql_query("SELECT * FROM prodi"));
?>
	<h2><span><br /><br />Ada <?php echo $Num_Rows; ?> Jurusan/Prodi pada Database</span></h2>

	<div class="module-table-body">
		<table id="myTable" class="tablesorter">
			<tr><br />
				<th><?php echo "<input type='button' value='Tambah Jurusan/Prodi' onclick=\"window.location.href='?module=manajemen_prodi&act=tambahprodi';\">"; ?></th>
			</tr>
			<tr>	
				<td>
					<div style="font-family: arial; overflow: scroll; width: 100%; height: 350px;">
						<div style="text-align: center; width: 100%; padding: 0 px; overflow: hidden;">
							<table>
								<tr>
									<th>No</th>
									<th>Nama Jurusan/Prodi</th>
									<th>Pilihan</th>
								</tr>
								
								<?php
								$p      = new PagingDosen;
								$batas  = 10;
								$posisi = $p->cariPosisi($batas);
								
								$sql = mysql_query("SELECT * FROM prodi ORDER BY id_prodi ASC LIMIT $posisi,$batas");
								$no = $posisi+1;
								while ($data = mysql_fetch_array($sql)){
									?>
									<tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $data[nama_prodi]; ?></td>
										<td><a href="?module=manajemen_prodi&act=edit_prodi&id=<?php echo $data[id_prodi]; ?>">Edit</a> | <a href="modul_pengajaran/aksi_prodi.php?module=manajemen_prodi&act=hapus_prodi&id=<?php echo $data[id_prodi]; ?>&nameprodi=<?php echo $data[nama_prodi]; ?>" onclick="return confirm('Anda yakin ingin menghapus <?php echo $data[nama_prodi]; ?>?');">Hapus</a> </td>
									</tr>
									<?php
									$no++;
								}
								echo "</table>";
								?>
								</div>
							</div>
						</td>
					</tr>
				</table>
			
				<table>
					<tr>
						<td>
							<?php
							$jmldata = mysql_num_rows(mysql_query("SELECT * FROM prodi"));
							$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
							$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

							echo "<div id='paging'>Hal: $linkHalaman </div>";
							?>
						</td>
					</tr>
				</table>
			<div style="clear: both"></div>
		</div> <!-- End .module-table-body -->