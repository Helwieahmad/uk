<script type="text/javascript" 
        src="../js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" 
src="../js/jquery-ui-1.8.11.custom.min.js"></script>        
<script type="text/javascript" 
src="../js/jquery.ui.datepicker-id.js"></script>        
<link rel="stylesheet" type="text/css" href="../js/jquery-ui-1.8.11.custom.css" />        
<script type="text/javascript">
   $(document).ready(function() {
      $("#tanggal").datepicker({ 
         dateFormat: "dd-mm-yy",
         changeMonth: true,
         changeYear: true ,
         yearRange: "-100:+0",
         showOn: "button",
         buttonText: "Menampilkan date picker",
         buttonImage: "../images/calendar.gif",
         buttonImageOnly: true
      });
   });
</script> <br>
<?php
switch($_GET[act]){
	default:
	session_start();
	include "fungsi/class_paging.php";
	$Num_Rows = mysql_num_rows(mysql_query("SELECT * FROM user"));
?>
	<h2><span>Informasi User, Total Data: <?php echo $Num_Rows; ?> User</span></h2>

	<div class="module-table-body">
		<table id="myTable" class="tablesorter">
			<tr>
				<th><?php echo "<input type='button' value='Tambah User' onclick=\"window.location.href='?module=manajemen_user&act=tambahuser';\">"; ?></th>
			</tr>
			<tr>	
				<td>
					<div style="font-family: arial; overflow: scroll; width: 100%; height: 350px;">
						<div style="text-align: center; width: 100%; padding: 0 px; overflow: hidden;">
							<table>
								<tr>
									<th>No</th>
									<th>User ID</th>
									<th>Nama Lengkap</th> 
                                    <th>No. Telp</th>
                                    <th>Email</th>
									<th>Level</th>
									<th>Aktif</th>
									<th>Pilihan</th>
								</tr>
								
								<?php
								$p      = new PagingUser;
								$batas  = 10;
								$posisi = $p->cariPosisi($batas);
								
								$sql = mysql_query("SELECT * FROM user ORDER BY username ASC LIMIT $posisi,$batas");
								$no = $posisi+1;
								while ($data = mysql_fetch_array($sql)){
									if ($data[level] == '1'){
										$level = 'Administrator';
									}
									else{
										$level = 'Staff Kampus';
									}
									?>
									<tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $data[username]; ?></td>
										<td><?php echo $data[nama_lengkap]; ?></td>
                                        <td><?php echo $data[telepon];?></td><td><?php echo $data[email];?></td>
										<td><?php echo $level; ?></td>
										<td align="center"><?php echo $data[aktif]; ?></td>
										<td align="center"><a href="?module=manajemen_user&act=edit_user&id=<?php echo $data[id_user]; ?>">Edit</a> | <a href="modul_user/aksi_user.php?module=manajemen_user&act=hapus_user&id=<?php echo $data[id_user]; ?>&username=<?php echo $data[username]; ?>" onclick="return confirm('Anda yakin ingin menghapus user <?php echo $data[nama_lengkap]; ?>?');">Hapus</a> </td>
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
							$jmldata = mysql_num_rows(mysql_query("SELECT * FROM user"));
							$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
							$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

							echo "<div id='paging'>Hal: $linkHalaman </div>";
							?>
						</td>
					</tr>
				</table>
			<div style="clear: both"></div>
		</div> <!-- End .module-table-body -->
<?php
	break;
	
	case "tambahuser":
	echo "<br><h2><span>Tambah User</span></h2>";
	echo "<form method='POST' action='modul_user/aksi_user.php?module=manajemen_user&act=input'>
			<table>
				<tr>
					<td width='150'> NIP </td>
					<td width='15'>:</td>
					<td><input type='text' name='nip' size='30' maxlength='20' ></td>
				</tr>
				<tr>
					<td> Nama Lengkap </td>
					<td>:</td>
					<td><input type='text' name='nama_lengkap' size='50' maxlength='100'></td>
				</tr>
				<tr>
                   <td>Tempat Lahir</td>
                    <td>:</td>
					<td><input type='text' name='tempat' size='30' maxlength='30'></td>
					</tr>
					<tr>
					<td>Tanggal Lahir</td>
					<td>:</td>					
                   <td><input type='text' id='tanggal' name='tanggal'></td>
				</tr>
				<tr>
					<td> Pendidikan Terakhir </td>
					<td>:</td>
					<td><input type='text' name='pendidikan_terakhir' size='30'></td>
				</tr>
				<tr>
					<td> Alamat </td>
					<td>:</td>
					<td><input type='text' name='alamat' size='60'></td>
				</tr>
				<tr>
					<td> Telepon | HP</td>
					<td>:</td>
					<td><input type='text' name='telepon' size='30' maxlenth='20'>  <input type='text' name='hp' size='30' maxlength='20'></td>
				</tr>
				<tr>
					<td> Agama </td>
					<td>:</td>
					<td> <select name='agama'>
							<option value='++'>---------------</option>
							<option value='Islam'>Islam</option>
							<option value='Kristen'>Kristen</option>
							<option value='Katolik'>Katolik</option>
							<option value='Budha'>Budha</option>
							<option value='Hindu'>Hindu</option>
						 </select>
					</td>
				</tr>
				<tr>
					<td> Email </td>
					<td>:</td>
					<td><input type='text' name='email' size='30' maxlength='100'></td>
				</tr>
				<tr>
					<td> Aktif </td>
					<td>:</td>
					<td><input type='radio' name='aktif' value='Y'>Y &nbsp;&nbsp; <input type='radio' name='aktif' value='N'>N </td>
				</tr>
				<tr>
					<td> Username </td>
					<td>:</td>
					<td colspan='4'><input type='text' name='username' size='30' maxlength='100'> &laquo; Username Tidak bisa diganti kembali</td>
				</tr>
				<tr>
					<td> Password </td>
					<td>:</td>
					<td colspan='4'><input type='text' name='password' size='30'> </td>
				</tr>
				<tr>
					<td> Level </td>
					<td>:</td>
					<td><input type='radio' name='level' value='1'>Administrator &nbsp;&nbsp; <input type='radio' name='level' value='2'>Staff Kampus </td>
				</tr>
				<tr>
					<th colspan='6'><input type='submit' value='Simpan'><a href='javascript:history.go(-1)'><input type='button' value='Cancel'></a></th>
				</tr>
			</table>
		</form>
	
		";
	echo "<p>&nbsp;</p>";
	break;
	
	case "edit_user":
	$data = mysql_fetch_array(mysql_query("SELECT * FROM user WHERE id_user = '$_GET[id]'"));
	if ($data[agama] == 'Islam'){
		$a = 'selected';
	}
	elseif($data[agama] == 'Kristen'){
		$b = 'selected';
	}
	elseif($data[agama] == 'Katolik'){
		$c = 'selected';
	}
	elseif($data[agama] == 'Budha'){
		$d = 'selected';
	}
	elseif($data[agama] == 'Hindu'){
		$e = 'selected';
	}
	else{
		$a = '';
		$b = '';
		$c = '';
		$d = '';
		$e = '';
	}
	
	if($data[aktif] == 'Y'){
		$y = 'checked';
	}
	elseif($data[aktif] == 'N'){
		$n = 'checked';
	}
	else{
		$y = '';
		$n = '';
	}
	
	if($data[level] == '1'){
		$a1 = 'checked';
	}
	elseif($data[level] == '2'){
		$a2 = 'checked';
	}
	else{
		$a1 = '';
		$a2 = '';
	}
	
	echo "<br><h2><span>Ubah User</span></h2>";
	echo "<form method='POST' action='modul_user/aksi_user.php?module=manajemen_user&act=update'>
			<table>
				<tr>
					<td width='150'> Id User </td>
					<td width='15'>:</td>
					<td><input type='text' name='id_user' size='30' value='$data[id_user]' disabled><input type='hidden' name='id_user' size='30' value='$data[id_user]'></td>
				</tr>
				<tr>
					<td width='150'> NIP </td>
					<td width='15'>:</td>
					<td><input type='text' name='nip' size='30' maxlength='20' value='$data[nip]'> </td>
				</tr>
				<tr>
					<td> Nama Lengkap </td>
					<td>:</td>
					<td><input type='text' name='nama_lengkap' size='50' maxlength='100' value='$data[nama_lengkap]'> </td>
				</tr>
				<tr>
                   <td>Tempat Lahir</td>
                    <td>:</td>
					<td><input type='text' name='tempat' size='30' maxlength='30' value='$data[tempat]'></td>
					</tr>
					<tr>
					<td>Tanggal Lahir</td>
					<td>:</td>
					<td><input type='text' id='tanggal' name='tanggal' value='$data[tanggal]'></td>
				</tr>
				<tr>
					<td> Pendidikan Terakhir </td>
					<td>:</td>
					<td><input type='text' name='pendidikan_terakhir' size='30' maxlength='100' value='$data[pendidikan]'> </td>
				</tr>
		
				<tr>
					<td> Alamat </td>
					<td>:</td>
					<td><input type='text' name='alamat' size='60' value='$data[alamat]'></td>
				</tr>
				<tr>
					<td> Telepon | HP</td>
					<td>:</td>
					<td><input type='text' name='telepon' size='30' maxlenth='20' value='$data[telepon]'> | <input type='text' name='hp' size='30' maxlength='20' value='$data[hp]'></td>
				</tr>
				<tr>
					<td> Agama </td>
					<td>:</td>
					<td> <select name='agama'>
							<option value='++'>---------------</option>
							<option value='Islam' $a>Islam</option>
							<option value='Kristen' $b>Kristen</option>
							<option value='Katolik' $c>Katolik</option>
							<option value='Budha' $d>Budha</option>
							<option value='Hindu' $e>Hindu</option>
						 </select>
					</td>
				</tr>
				<tr>
					<td> Email </td>
					<td>:</td>
					<td><input type='text' name='email' size='30' maxlength='100' value='$data[email]'> </td>
				</tr>
				<tr>
					<td> Aktif </td>
					<td>:</td>
					<td><input type='radio' name='aktif' value='Y' $y>Y &nbsp;&nbsp; <input type='radio' name='aktif' value='N' $n>N </td>
				</tr>
				<tr>
					<td> Username</td>
					<td>:</td>
					<td><input type='text' name='username' size='30' maxlength='100' value='$data[username]' Disabled> &nbsp;&nbsp;&laquo;&nbsp;Username tidak bisa diganti</td>
				</tr>
						<tr>
					<td> Password</td>
					<td>:</td>
					<td><input type='password' name='password' size='30' maxlength='100'> </td>
				</tr>
		
				<tr>
					<td> Level </td>
					<td>:</td>
					<td><input type='radio' name='level' value='1' $a1>Administrator &nbsp;&nbsp; <input type='radio' name='level' value='2' $a2>Staff Kampus </td>
				</tr>
				<tr>
					<th colspan='6'><input type='submit' value='Simpan'><a href='javascript:history.go(-1)'><input type='button' value='Cancel'></a></th>
				</tr>
			</table>
		</form>
	
		";
	echo "<p>&nbsp;</p>";
	break;
	
	case "tambahhierarchy":
	echo "<br><h2><span>Tambah User Hierarchy</span></h2>";
	echo "<form method='POST' action='modul/mod_user/aksi_user.php?module=manajemen_user&act=inputhierarchy'>
			<table>
				<tr>
					<td width='150'> User </td>
					<td width='15'>:</td>
					<td colspan='4'>
						<select name='user_name'>
							<option value='1' selected>++ Pilih User ++</option>
						";
							$sql = mssql_query("SELECT id,username, nama_lengkap, level_user FROM tlogin WHERE level_user != 'A' AND level_user != 'S' ORDER BY nama_lengkap ASC");
							while($data = mssql_fetch_array($sql)){
								if ($data[level_user] == 'A'){
									$level = 'Administrator';
								}
								elseif ($data[level_user] == 'S'){
									$level = 'Supervisor';
								}
								else{
									$level = 'Agent';
								}
								echo "<option value='$data[username]'>$data[nama_lengkap] [$data[username]][$level]</option>";
							}
	echo "				</select>
					</td>
				</tr>
				<tr>
					<td> Dibawah Pengawasan </td>
					<td>:</td>
					<td colspan='4'>
						<select name='pimpinan_pengawas'>
						<option value='1' selected>++ Pilih Atasan ++</option>
						";
							$sql = mssql_query("SELECT id, username, nama_lengkap, level_user FROM tlogin WHERE level_user = 'S' ORDER BY nama_lengkap ASC");
							while ($data = mssql_fetch_array($sql)){
								if ($data[level_user] == 'A'){
									$level = 'Administrator';
								}
								elseif ($data[level_user] == 'S'){
									$level = 'Supervisor';
								}
								else{
									$level = 'Agent';
								}
								echo "<option value='$data[username]'>$data[nama_lengkap] [$data[username]][$level]</option>";
							}
	echo "				</select>
					</td>
				</tr>
				<tr>
					<th colspan='6'><input type='submit' value='Simpan'><a href='javascript:history.go(-1)'><input type='button' value='Cancel'></a><a href='?module=manajemen_user&act=manajemen_user_hierarchy'><input type='button' value='Tampilkan Semua User Hierarchy'></a></th>
				</tr>
			</table>
		</form>
	
		";
	echo "<p>&nbsp;</p>";
	break;
	
	case "manajemen_user_hierarchy":
	session_start();
	// =========================== LEVEL USER : ADMINISTRATOR ============================================================//
	if ($_SESSION[level_user] == 'A'){
		$Num_Rows = mssql_num_rows(mssql_query("SELECT * FROM tlogin, thierarchy WHERE thierarchy.user_bottom = tlogin.username"));
?>
		<h2><span>Informasi User Hierarchy, Total Data: <?php echo $Num_Rows; ?> User</span></h2>

		<div class="module-table-body">
			<table id="myTable" class="tablesorter">
				<tr>
					<th><?php echo "<input type='button' value='<< Back' onclick=\"window.location.href='?module=manajemen_user&act=tambahhierarchy';\">"; ?>
					</th>
				</tr>
				<tr>	
					<td>
						<div style="font-family: arial; overflow: scroll; width: 100%; height: 350px;">
							<div style="text-align: center; width: 100%; padding: 0 px; overflow: hidden;">
								<table>
									<tr>
										<th style="width:5%">No</th>
										<th style="width:20%">User ID</th>
										<th style="width:21%">Nama Lengkap</th>
										<th style="width:21%">User Group / Level</th>
										<th style="width:21%">Atasan</th>
										<th style="width:21%">Aksi</th>
									</tr>
								
									<?php
									$strSQL = "SELECT * FROM tlogin, thierarchy WHERE thierarchy.user_bottom = tlogin.username ORDER BY username ASC";
									$objQuery = mssql_query($strSQL) or die ("Error Query [".$strSQL."]");
									$Num_Rows = mssql_num_rows($objQuery);
								
									$Per_Page = 20;   // Per Page
									$Page = $_GET["Page"];
									if(!$_GET["Page"]){
										$Page=1;
									}
								
									$Prev_Page = $Page-1;
									$Next_Page = $Page+1;
								
									$Page_Start = (($Per_Page*$Page)-$Per_Page);
									if($Num_Rows<=$Per_Page){
										$Num_Pages =1;
									}
									else if(($Num_Rows % $Per_Page)==0){
										$Num_Pages =($Num_Rows/$Per_Page) ;
									}
									else{
										$Num_Pages =($Num_Rows/$Per_Page)+1;
										$Num_Pages = (int)$Num_Pages;
									}
									$Page_End = $Per_Page * $Page;
									if ($Page_End > $Num_Rows){
										$Page_End = $Num_Rows;
									}
									for($i=$Page_Start;$i<$Page_End;$i++){
										//$sql = mssql_query("SELECT TOP $limit * FROM mst_login"); // WHERE tuser.id_spv = '1' AND tuser.id_spv = tspv.id_spv");
										$idUser = mssql_result($objQuery,$i,"id_hierarchy");
										$levelUser = mssql_result($objQuery,$i,"level_user");
										if ($levelUser == 'A'){
											$level = 'Administrator';
										}
										elseif ($levelUser == 'S'){
											$level = 'Supervisor';
										}
										else{
											$level = 'Agent';
										}
										
										$fullName = mssql_result($objQuery,$i,"nama_lengkap");
										$userName = mssql_result($objQuery,$i,"username");
									?>
										<tr>
											<td><?php echo $i+1; ?></td>
											<td><?php echo mssql_result($objQuery,$i,"username"); ?></td>
											<td><?php echo mssql_result($objQuery,$i,"nama_lengkap"); ?></td>
											<td><?php echo $level; ?></td>
											<td><?php echo mssql_result($objQuery,$i,"user_top"); ?></td>
											<td><a href="?module=manajemen_user&act=edit_user_hierarchy&id=<?php echo $idUser;?>">Edit</a> | <a href="modul/mod_user/aksi_user.php?module=manajemen_user&act=hapus_user_hierarchy&id=<?php echo $idUser;?>" onclick="return confirm('Anda yakin ingin menghapus user <?php echo $fullName; ?>?');">Hapus</a> </td>
										</tr>
									<?php	
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
							<div class="paging">
								<?php
								if($Prev_Page){
									echo " <span><a href='$_SERVER[SCRIPT_NAME]?module=manajemen_user&Page=$Prev_Page'><< Back</a> </span>";
								}
							
								for($i=1; $i<=$Num_Pages; $i++){
									if($i != $Page){
										echo "<span><a href='$_SERVER[SCRIPT_NAME]?module=manajemen_user&act=manajemen_user_hierarchy&Page=$i'>$i</a></span>";
									}
									else{
										echo "<span><b> $i </b></span>";
									}
								}
								if($Page!=$Num_Pages){
									echo " <span><a href ='$_SERVER[SCRIPT_NAME]?module=manajemen_user&act=manajemen_user_hierarchy&Page=$Next_Page'>Next>></a></span> ";
								}
								?>
							</div>
						</td>
					</tr>
				</table>
			<div style="clear: both"></div>
		</div> <!-- End .module-table-body -->
<?php
	}
	else{
		echo "<link href='css/login.css' rel='stylesheet' type='text/css'>
		<center>Anda tidak mempunyai hak akses untuk memasuki halaman ini <br>";
		echo "<a href=master.php><b>Back to Home</b></a></center><p>&nbsp;</p>";
	}
	break;
	
	case "edit_user_hierarchy":
	echo "<br><h2><span>Ubah User Hierarchy</span></h2>";
	$data = mssql_fetch_array(mssql_query("SELECT * FROM thierarchy WHERE id_hierarchy = '$_GET[id]'"));
	echo "<form method='POST' action='modul/mod_user/aksi_user.php?module=manajemen_user&act=updatehierarchy&id=$_GET[id]'>
			<table>
				<tr>
					<td width='150'> User </td>
					<td width='15'>:</td>
					<td colspan='4'>
						<input type='hidden' name='user_name' value='$data[user_bottom]'>
						<select name='user_name' disabled>
						";
							
							$sql = mssql_query("SELECT id,username, nama_lengkap, level_user FROM tlogin WHERE level_user != 'A' AND level_user != 'S' ORDER BY nama_lengkap ASC");
							while($r = mssql_fetch_array($sql)){
								if ($r[level_user] == 'A'){
									$level = 'Administrator';
								}
								elseif ($r[level_user] == 'S'){
									$level = 'Supervisor';
								}
								else{
									$level = 'Agent';
								}
								if ($data[user_bottom] == $r[username]){
									echo "<option value='$r[username]' SELECTED>$r[nama_lengkap] [$r[username]][$level]</option>";
								}
								else {
									echo "<option value='$r[username]'>$r[nama_lengkap] [$r[username]][$level]</option>";
								}
							}
	echo "				</select>
					</td>
				</tr>
				<tr>
					<td> Dibawah Pengawasan </td>
					<td>:</td>
					<td colspan='4'>
						<select name='pimpinan_pengawas'>
						";
							$sql = mssql_query("SELECT id, username, nama_lengkap, level_user FROM tlogin WHERE level_user = 'S' ORDER BY nama_lengkap ASC");
							while($r = mssql_fetch_array($sql)){
								if ($r[level_user] == 'A'){
									$level = 'Administrator';
								}
								elseif ($r[level_user] == 'S'){
									$level = 'Supervisor';
								}
								else{
									$level = 'Agent';
								}
								if ($data[user_top] == $r[username]){
									echo "<option value='$r[username]' SELECTED>$r[nama_lengkap] [$r[username]][$level]</option>";
								}
								else {
									echo "<option value='$r[username]'>$r[nama_lengkap] [$r[username]][$level]</option>";
								}
							}
	echo "				</select>
					</td>
				</tr>
				<tr>
					<th colspan='6'><input type='submit' value='Update'><a href='javascript:history.go(-1)'><input type='button' value='Cancel'></a></th>
				</tr>
			</table>
		</form>
	
		";
	echo "<p>&nbsp;</p>";
	break;
}
?>