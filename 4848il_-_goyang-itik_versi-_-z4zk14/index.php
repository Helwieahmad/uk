tml>
<head>
	<title>Selamat Datang di Halaman Administrator & Staff UNIKAMA</title>
	<link href="css/login.css" rel="stylesheet" type="text/css">
	<meta http-equiv="Copyright" content="Helwie Ahmad">
	<meta name="Author" content="Helwie Ahmad">
	<link rel="shortcut icon" href="images/favicon.jpg">
</head>

<body bgcolor="#000">

<div id="login-box">
	<center>
	  <h3>Login System <br />For<br />Administrator & Staff UNIKAMA MALANG</h3></center>
	<form method="POST" action="cek_login.php">
	<div id="login-box-name" style="margin-top:20px;">Username:</div>
	<div id="login-box-field" style="margin-top:20px;"><input name="username" type="text" class="form-login" title="Username" size="30" maxlength="50"></div>
	<div id="login-box-name">Password:</div>
	<div id="login-box-field"><input name="password" type="password" class="form-login" title="Password" size="30" maxlength="50"></div>
	<div id="login-box-name">Level:</div>
	<div id="login-box-field">
		<select name="level" id="level" class="form-login">
			<option value='++' selected> Pilih Level</option>
			<option value='1'>Administrator</option>
			<option value='2'>Staff Kampus</option>
		</select><br><br>
		<input type='submit' value='Login'  style="width:60px; background:#FFF; margin-top:3px;" />&nbsp;<input type="Reset" style="width:60px; background:#FFF; margin-top:3px; value="Cancel" ><br><br>
	</div>
	</form>
	<div align="center">Copyright &copy; 2012 Team Web UNIKAMA MALANG | Version <b>1.0</b></div>
</div>

</body>
</html>