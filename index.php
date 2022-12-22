<!-- author ari purnama aji -->
<!-- versi php => 5.6
versi xampp => 6.5
versi bootstrap => 4 -->
<!-- tanggal pembuatan app 19-juli-2022 -->

<?php
include 'koneksi.php';
?>
<!doctype html>
<html>

<head>
	<title>Pemesanan Tiket Bis</title>

	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">

</head>

<body>
	<div id="container">
		<div id="header">
			<div id="logo-perpustakaan-container">
				<image id="logo-perpustakaan" src="images/logobis.png" border=0 style="border:0; text-decoration:none; outline:none">
			</div>
			<div id="nama-alamat-perpustakaan-container">
				<div class="nama-alamat-perpustakaan">
					<h1> Pemesanan Tiket Bus </h1>
				</div>
			</div>
		</div>
		<div id="header2">
			<h4 style="text-align: center;">Selamat datang di website pemesanan tiket bus</h4>
		</div>
		<div id="sidebar">
			<p class="label-navigasi">Menu</p>
			<ul>
				<li><a href="index.php?p=tiket">Daftar Tiket Bus</a></li>
				<li><a href="index.php?p=harga">Harga Tiket</a></li>
				<li><a href="index.php?p=daftar-pemesan">Daftar Pemesan</a></li>
				<li><a href="index.php?p=graph">Grafik Pemesanan Tiket</a></li>
			</ul>
			<p class="label-navigasi" style="color: white;"></a></p>
		</div>
		<div id="content-container">
			<div class="container">
				<div class="row"><br /><br /><br />
					<div class="col-md-10 col-md-offset-1" style="background-image:url('../asanoer-background.jpg')">
						<div class="col-md-4 col-md-offset-4">
							<div class="panel panel-warning login-panel" style="background-color:rgba(255, 255, 255, 0.6);position:relative;">

								<div class="panel-footer">

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
			$pages_dir = 'pages';
			if (!empty($_GET['p'])) {
				$pages = scandir($pages_dir, 0);
				unset($pages[0], $pages[1]);
				$p = $_GET['p'];
				if (in_array($p . '.php', $pages)) {
					include($pages_dir . '/' . $p . '.php');
				} else {
					echo 'Halaman Tidak Ditemukan';
				}
			} else {
				echo "";
			}
			?>
		</div>
		<div id="footer">
		</div>
	</div>
</body>

</html>