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
</script>        <br>
<?php
switch($_GET[act]){
	default:
	session_start();
	include "fungsi/class_paging.php";
	$Num_Rows = mysql_num_rows(mysql_query("SELECT * FROM profil_dosen"));
?>
	<h2><span>Informasi Dosen, Total Data: <?php echo $Num_Rows; ?> Dosen</span></h2>

	<div class="module-table-body">
		<table id="myTable" class="tablesorter">
			<tr>
				<th><?php echo "<input type='button' value='Tambah Dosen' onclick=\"window.location.href='?module=manajemen_dosen&act=tambahdosen';\">"; ?></th>
			</tr>
			<tr>	
				<td>
					<div style="font-family: arial; overflow: scroll; width: 100%; height: 350px;">
						<div style="text-align: center; width: 100%; padding: 0 px; overflow: hidden;">
							<table>
								<tr>
									<th>No</th>
									<th>Username</th>
									<th>NIP</th>
									<th>Nama Lengkap</th>
									<th>Email</th>
									<th>Jenis Kelamin</th>
									<th>Aktif</th>
									<th>Pilihan</th>
								</tr>
								
								<?php
								$p      = new PagingDosen;
								$batas  = 10;
								$posisi = $p->cariPosisi($batas);
								
								$sql = mysql_query("SELECT * FROM profil_dosen ORDER BY id_dosen ASC LIMIT $posisi,$batas");
								$no = $posisi+1;
								while ($data = mysql_fetch_array($sql)){
									?>
									<tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $data[username]; ?></td>
										<td><?php echo $data[nip]; ?></td>
										<td><?php echo $data[nama]; ?></td>
										<td><?php echo $data[email]; ?></td>
										<td><?php echo $data[kelamin]; ?></td>
										<td><?php echo $data[aktif]; ?></td>
										<td><a href="?module=manajemen_dosen&act=edit_dosen&id=<?php echo $data[id_dosen]; ?>">Edit</a> | <a href="modul_dosen/aksi_dosen.php?module=manajemen_dosen&act=hapus_dosen&id=<?php echo $data[id_dosen]; ?>&nameDosen=<?php echo $data[nama]; ?>" onclick="return confirm('Anda yakin ingin menghapus user <?php echo $data[nama]; ?>?');">Hapus</a> </td>
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
							$jmldata = mysql_num_rows(mysql_query("SELECT * FROM profil_dosen"));
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
	case "tambahdosen":
	echo "<br><h2><span>Tambah Dosen</span></h2>";
	echo "<form method='POST' action='modul_dosen/aksi_dosen.php?module=manajemen_dosen&act=input' enctype='multipart/form-data'>
			<table>
				<tr>
					<td> Nama Lengkap </td>
					<td>:</td>
					<td><input type='text' name='nama' size='50' maxlength='100'></td>
				</tr>
				<tr>
					<td width='150'> NIP Dosen </td>
					<td width='15'>:</td>
					<td><input type='text' name='nip' size='30' maxlength='20'></td>
				</tr>
				<tr>
				<td>Jurusan/Prodi</td>
				<td>:</td>
				<td> <select name='nama_prodi'>
            <option value=0 selected>- Pilih Prodi Yang Anda Ajari -</option>";
            $tampil=mysql_query("SELECT * FROM prodi ORDER BY nama_prodi");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id_prodi]>$r[nama_prodi]</option>";
            }
    echo "</select></td>
				</tr>
				
				<tr>
					<td> Alamat </td>
					<td>:</td>
					<td><input type='text' name='alamat' size='60'></td>
				</tr>
				<tr>
                   <td>Tempat Lahir</td>
                    <td>:</td>
					<td><input type='text' name='tempat' size='30' maxlength='30'></td>
					</tr>
					<tr>
					<td>Tanggal Lahir</td>
					<td>:</td>
						<td><input name='tanggal' id='tanggal'></td>&nbsp;
				</tr>
				<tr>
					<td> Agama </td>
					<td>:</td>
					<td> <select name='agama'>
							<option value=''></option>
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
					<td><input type='email' name='email' size='30' maxlength='100'></td>
				</tr>
				<tr>
					<td> Jenis Kelamin </td>
					<td>:</td>
					<td><input type='radio' name='kelamin' value='L'>Laki-laki &nbsp;&nbsp; 
					<input type='radio' name='kelamin' value='P'>Perampuan</td>
				</tr>
	
				<tr>
					<td> Telepon | Hp</td>
					<td>:</td>
					<td><input type='text' name='telepon' size='30' maxlength='20'> | <input type='text' name='hp' size='30' maxlength='20'></td>
				</tr>
								<tr>
					<td> Pendidikan Terakhir </td>
					<td>:</td>
					<td><input type='text' name='pendidikan_terakhir' size='50' maxlength='100'</td>
				</tr>

				<tr>
					<td> Aktif </td>
					<td>:</td>
					<td><input type='radio' name='aktif' value='Y'>Y &nbsp;&nbsp; <input type='radio' name='aktif' value='N'>N</td>
				</tr>
				<tr>
					<td> Username </td>
					<td>:</td>
					<td><input type='text' name='username' size='30' maxlength='100'></td>
				</tr>
				<tr>
					<td> Password </td>
					<td>:</td>
					<td><input type='text' name='password' size='30' maxlength='100'></td>
				</tr>
				<tr>
					<td> Level </td>
					<td>:</td>
					<td><input type='radio' name'level' value'1'>Administrator&nbsp;<input type='radio' name='level' value='2'>Staff Kampus&nbsp;<input type='radio' name='level' value='3'> Dosen</td>
				</tr>
				<tr>
					<td>Upload Foto </td>
					<td>:</td>
					<td><input type='file' name='upload' size='30'></td>
				</tr>
				<tr>
					<th colspan='6'><input type='submit' value='Simpan'><a href='javascript:history.go(-1)'><input type='button' value='Cancel'></a></th>
				</tr>
			</table>
		</form>
	
		";
	echo "<p>&nbsp;</p>";
	break;
	
	case "edit_dosen":
	$data = mysql_fetch_array(mysql_query("SELECT * FROM profil_dosen WHERE id_dosen = '$_GET[id]'"));
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
	
	if($data[kelamin] == 'L'){
		$a1 = 'checked';
	}
	elseif($data[kelamin] == 'P'){
		$a2 = 'checked';
	}
	else{
		$a1 = '';
		$a2 = '';
	}
	if($data[Foto] == ''){
		$foto = "<b>No Photo</b>";
	}
	else{
		$foto = "<img src='../image_profil/$data[Foto]' width='150'>";
	}
	if($data[level] == '1'){
		$a1 = 'checked';
	}
	elseif($data[level] == '2'){
		$a2 = 'checked';
	}
	elseif($data[level] == '3'){
		$a3 = 'checked';
	}
	else{
		$a1 = '';
		$a2 = '';
		$a3 = '';
	}
	echo "<br><h2><span>Ubah Dosen</span></h2>";
	echo "<form method='POST' action='modul_dosen/aksi_dosen.php?module=manajemen_dosen&act=update&id=$_GET[id]' enctype='multipart/form-data'>
			<table>
				<tr>
					<td> Nama Lengkap </td>
					<td>:</td>
					<td><input type='text' name='nama' size='30' maxlength='100' value='$data[nama]'></td>
				</tr>
				<tr>
					<td width='150'> NIP Dosen </td>
					<td width='15'>:</td>
					<td><input type='text' name='nip' size='30' maxlength='20' value='$data[nip]'> </td>
				</tr>
				<tr>
				<td>Jurusan/Prodi</td>
				<td>:</td>
				<td> <select name='nama_prodi'>";
          $tampil=mysql_query("SELECT * FROM prodi ORDER BY id_prodi");
          if ($data[nama_prodi]==0){
            echo "<option value=0 selected>- Pilih Prodi Yang Anda Ajari -</option>";
          }   

          while($w=mysql_fetch_array($tampil)){
            if ($data[nama_prodi]==$w[id_prodi]){
              echo "<option value=$w[id_prodi] selected>$w[nama_prodi]</option>";
            }
            else{
              echo "<option value=$w[id_prodi]>$w[nama_prodi]</option>";
            }
          }

    echo "</select></td>
				</tr>
				<tr>
					<td> Alamat </td>
					<td>:</td>
					<td><input type='text' name='alamat' size='60' value='$data[alamat]'></td>
				</tr>
				<tr>
                   <td>Tempat Lahir</td>
                    <td>:</td>
					<td><input type='text' name='tempat' size='30' maxlength='30' value='$data[tempat]'></td></tr>
					
					<td> Tanggal Lahir </td>
					<td>:</td>
						<td><input name='tanggal' id='tanggal' value='$data[tanggal]'></td>
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
					<td><input type='text' name='email' size='30' maxlength='100' value='$data[email]'></td>
				</tr>
				<tr>
					<td> Jenis Kelamin </td>
					<td>:</td>
					<td><input type='radio' name='kelamin' value='L' $a1>Laki-laki &nbsp;&nbsp; <input type='radio' name='kelamin' value='P' $a2>Perempuan </td>
				</tr>
				<tr>
					<td> Telepon | Hp</td>
					<td>:</td>
					<td><input type='text' name='telepon' size='30' maxlenth='20' value='$data[telepon]'> | <input type='text' name='hp' size='30' maxlength='20' value='$data[hp]'></td>
				</tr>	
				<tr>
					<td> Pendidikan Terakhir </td>
					<td>:</td>
					<td><input type='text' name='pendidikan_terakhir' size='30' maxlength='100' value='$data[jurusan]'></td>
				</tr>
					<tr>
					<td> Aktif </td>
					<td>:</td>
					<td><input type='radio' name='aktif' value='Y' $y>Y &nbsp;&nbsp; <input type='radio' name='aktif' value='N' $n>N </td>
				</tr>
				<tr>
					<td> Username </td>
					<td>:</td>
					<td><input type='text' name='username' size='30' maxlength='100' value='$data[username]'></td>
				</tr>
				<tr>
					<td> Password </td>
					<td>:</td>
					<td><input type='password' name='password' size='30' maxlength='100'></td>
				</tr>
				<tr>
					<td> Level </td>
					<td>:</td>
					<td><input type='radio' name='level' value='1' $a1>Administrator &nbsp;&nbsp; <input type='radio' name='level' value='2' $a2>Staff Kampus &nbsp;&nbsp;<input type='radio' name='level' value='3' $a3> Dosen</td>
				</tr>
					<tr>
					<td> </td>
					<td></td>
					<td>$foto</td>
				</tr>
				<tr>
					<td> Ganti Foto </td>
					<td>:</td>
					<td><input type='file' name='foto' size='30'> <i>&nbsp;&nbsp;&laquo;&nbsp;Jika tidak ingin mengganti Foto, Silahkan kosongkan saja</i></td>
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