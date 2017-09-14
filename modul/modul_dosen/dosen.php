<link href="css/form_style.css" rel="stylesheet" />
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
<?php
	session_start();

	$data = mysql_fetch_array(mysql_query("SELECT * FROM profil_dosen Where username ='".$_SESSION['username']."'"));
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
		$foto = "<b>Tidak Ada Foto</b>";
	}
	else{
		$foto = "<img src='image_profil/$data[Foto]' width='150'>";
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
	echo "<div id='koplak'><span>Dibawah ini adalah Personal data Anda</div>";
	echo "<form method='POST' id='form_guwe' action='modul/modul_dosen/aksi_dosen.php?module=manajemen_dosen&act=update&id=$_Session[id_dosen]' enctype='multipart/form-data'>
			<table width='595'>
				<tr>
					<td><label> Nama Lengkap </label></td>
					<td><label><b>:</b></label></td>
					<td><input type='text' name='nama' size='45' maxlength='100' value='$data[nama]'></td>
				</tr>
				<th></th>
				<tr>
					<td width='150'><label> NIP Dosen </label></td>
					<td width='15'><label>:</label></td>
					<td><input type='text' name='nip' size='45' maxlength='20' value='$data[nip]'> </td>
				</tr>
				<th></th>
				<tr>
				<td><label>Jurusan/Prodi</label></td>
				<td><label>:</label></td>
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

    echo "</select></td></tr>
				<th></th>
				<tr>
					<td> <label>Alamat </label></td>
					<td><label>:</label></td>
					<td><textarea name='alamat' rows='3' cols='44'>$data[alamat]</textarea></td>
				</tr>
				<tr>
                   <td><label>Tempat Lahir</label></td>
                    <td><label>:</label></td>
					<td><input type='text' name='tempat' size='30' maxlength='30' value='$data[tempat]'></td></tr>
					
					<td><label> Tanggal Lahir </label></td>
					<td><label>:</label></td>
					<td><input name='tanggal' id='tanggal' value='$data[tanggal]'></td>
             </tr>
				<tr>
					<td><label> Agama </label></td>
					<td><label>:</label></td>
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
					<td> <label>Email </label></td>
					<td><label>:</label></td>
					<td><input type='text' name='email' size='45' maxlength='100' value='$data[email]'></td>
				</tr>
				<tr>
					<td> <label>Jenis Kelamin </label></td>
					<td><label>:</label></td>
					<td><input type='radio' name='kelamin' value='L' $a1>&nbsp;Laki-laki &nbsp;&nbsp; <input type='radio' name='kelamin' value='P' $a2>&nbsp;Perempuan </td>
				</tr>
				<tr>
					<td> <label>Telepon | Hp</label></td>
					<td><label>:</label></td>
					<td><input type='text' name='telepon' size='20' maxlenth='30' value='$data[telepon]'> | <input type='text' name='hp' size='20' maxlength='30' value='$data[hp]'></td>
				</tr>	
				<tr>
					<td> <label>Pendidikan Terakhir </label></td>
					<td><label>:</label></td>
					<td><input type='text' name='pendidikan_terakhir' size='45' maxlength='100' value='$data[jurusan]'></td>
				</tr>
					<tr>
					<td> <label>Aktif </label></td>
					<td><label>:</label></td>
					<td><input type='radio' name='aktif' value='Y' $y>&nbsp;Y &nbsp;&nbsp; <input type='radio' name='aktif' value='N' $n>&nbsp;N </td>
				</tr>
				<tr>
					<td> <label>Username </label></font></td>
					<td><label>:</label></td>
					<td><input type='text' disabled='disabled' readonly='readonly' name='username' size='30' maxlength='100' value='$data[username]'></td>
				</tr>
				<tr>
					<td> <label>Password </label></td>
					<td><label>:</label></td>
					<td><input type='password' name='password' size='30' maxlength='100'></td>
				</tr>
					<td><input type='radio' hidden name='level' value='3' $a3>
					</tr><th></th>
					<tr>
					<td> </td>
					<td></td>
					<td><label id='foto'>$foto</label></td>
				</tr>
				<tr>
					<td> <label>Ganti Foto </label></td>
					<td><label>:</label></td>
					<td><input type='file' name='foto' size='30'><br><div style='font-size:12px;'><i>Jika tidak  ingin mengganti Foto, Silahkan kosongkan saja</i></font></td>
				</tr>
				<th></th>
				<tr>
					<th colspan='6'><input type='submit' value='Simpan'>&nbsp;<a href='javascript:history.go(-1)'><input type='button' value='Cancel'></a></th>
				</tr>
			</table>
		</form>
	
		";
	echo "<p>&nbsp;</p>";
?>