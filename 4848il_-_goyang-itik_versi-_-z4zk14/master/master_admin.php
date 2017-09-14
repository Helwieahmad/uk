<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title> Halaman Administrator Website Personal Dosen UNIKAMA MALANG</title>
	<link rel="stylesheet" href="css/reset.css" type="text/css">
	<link rel="stylesheet" href="css/grid.css" type="text/css">
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="css/menu.css" type="text/css"> 
	<link rel="stylesheet" href="css/paging.css" type="text/css">  
    <link rel="shortcut icon" href="images/favicon.jpg" />
    <link rel="stylesheet" type="text/css" href="css/stimenu.css" />
		<link href="css/font-sans_narrow.css" rel='stylesheet' type='text/css' />
		<link href="css/Wire_One.css" rel='stylesheet' type='text/css' />
        <script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="js/jquery.iconmenu.js"></script>
		<script type="text/javascript">
			$(function() {
				$('#sti-menu').iconmenu({
					animMouseenter	: {
						'mText' : {speed : 400, easing : 'easeOutExpo', delay : 140, dir : 1},
						'sText' : {speed : 400, easing : 'easeOutExpo', delay : 0, dir : 1},
						'icon'  : {speed : 800, easing : 'easeOutBounce', delay : 280, dir : 1}
					},
					animMouseleave	: {
						'mText' : {speed : 400, easing : 'easeInExpo', delay : 140, dir : 1},
						'sText' : {speed : 400, easing : 'easeInExpo', delay : 280, dir : 1},
						'icon'  : {speed : 400, easing : 'easeInExpo', delay : 0, dir : 1}
					}
				});
			});
		</script>
</head>

<body>

<div id="header">
	<div id="header-status">
		<div class="container_12">
       
			<?php
			include "../config/koneksi.php";
			$dataExt = mysql_fetch_array(mysql_query("SELECT id_user FROM user WHERE id_user = '$_SESSION[id_user]'"));
			if ($_SESSION[level] == '1'){
				$levelUser = 'Administrator';
			}
			else{
				$levelUser = 'Staff Kampus';
			}
			?>
			<div class="grid_4">
				<div class="module">
					<div class="module-body">
						<strong><font color="#FFFFFF">User ID : </strong><?php echo $_SESSION[username]; ?><br>
						<strong>Nama Lengkap : </strong><?php echo $_SESSION[nama_lengkap]; ?><br>
						<strong>Login As :</strong> <?php echo $levelUser; ?></font>
					</div>
				</div>
				<div style="clear:both;"></div>
			</div>
		</div>
        <div style="clear:both;"></div>
        <div class="container_kucing">
			<ul id="sti-menu" class="sti-menu">
				<li data-hovercolor="#37c5e9">
					<a href="master.php">
						<h3 data-type="sText" class="sti-item">Home Base</h3>
						<span data-type="icon" class="sti-icon sti-icon-care sti-item"></span>
					</a>
				</li>
				<li data-hovercolor="#ff395e">
					<a href="?module=manajemen_user">
						<h3 data-type="sText" class="sti-item">Administrator & Staff</h3>
						<span data-type="icon" class="sti-icon sti-icon-alternative sti-item"></span>
					</a>
				</li>
				<li data-hovercolor="#57e676">
					<a href="?module=manajemen_dosen">
						<h3 data-type="sText" class="sti-item">Manajemen Dosen</h3>
						<span data-type="icon" class="sti-icon sti-icon-info sti-item"></span>
					</a>
				</li>
				<li data-hovercolor="#d869b2">
					<a href="?module=manajemen_view">
						<h3 data-type="sText" class="sti-item">Pengajaran & Jurusan/Prodi</h3>
						<span data-type="icon" class="sti-icon sti-icon-family sti-item"></span>
					</a>
				</li>
				<li data-hovercolor="#ffdd3f">
					<a href="logout.php">
						<h3 data-type="sText" class="sti-item">Log Out</h3>
						<span data-type="icon" class="sti-icon sti-icon-technology sti-item"></span>
					</a>
				</li>
			</ul></div>
		<div style="clear:both;"></div>
	</div>
	
	<div id="header-main">
	</div>
    
	<div style="clear: both;"></div>
</div>



<div class="container_12">
	
	<div style="clear:both;"></div>
	
	<div class="grid_12">
        
		<!-- Example table -->
		<div class="module">
			<?php include "konten.php"; ?>
		</div> <!-- End .module -->
	</div>
</div> <!-- End .container_12 -->
		
           
        <!-- Footer -->
        <div id="footer">
        	<div class="container_12">
            	<div class="grid_12">
                	<!-- You can change the copyright line for your own -->
                	<p><b> &nbsp;&nbsp;&nbsp;&nbsp;&copy; 2012.<u>Team Web Universitas Kanjuruhan Malang</u></b></p>
        		</div>
            </div>
            <div style="clear:both;"></div>
        </div> <!-- End #footer -->
	</body>
</html>