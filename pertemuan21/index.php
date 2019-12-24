<?php
session_start();
if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'fungsi.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

if (isset($_POST["cari"])) {
	$mahasiswa = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Mahasiswa</title>
	<style>
		.loader {
			width :700px;
			display: none;
		}

		@media print {
			.logout {
				display: none;
			}
		}
	</style>
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/script.js"></script>
</head>
<body>

	<h3>Daftar Mahasiswa</h3>
	
	<a href="tambah.php">Tambah data mahasiswa</a>
	<a href="logout.php" class="logout">Logout</a> | <a href="cetak.php" target="_blank">cetak</a>
	<br><br>
	<form action="" method="post">
		<input type="text" name="keyword" style="width: 800px" autofocus placeholder="Masukkan nama....." autocomplete="off" id="keyword">
		<button type="submit" name="cari" id="tombol-cari">cari</button>
	</form>
	<br>

	<div id="container">
	<img src="img/loader.gif" class="loader">
		<table border="1" cellpadding="10" cellspacing="0">
			<tr>
				<th>No.</th>
				<th>Aksi</th>
				<th>Gambar</th>
				<th>NRP</th>
				<th>Nama</th>
				<th>Email</th>
				<th>Jurusan</th>
			</tr>
			<?php $i = 1; ?>
			<?php foreach($mahasiswa as $mhs) : ?>
				<tr>
					<td><?= $i++ ?></td>
					<td>
						<a href="ubah.php?id=<?= $mhs["id"]; ?>">ubah</a> |
						<a href="hapus.php?id=<?= $mhs["id"]; ?>" onclick="return confirm('apakah anda yakin ingin menghapus data ini ???');">hapus</a>
					</td>
					<td><img class="images" src="img/<?= $mhs["gambar"]; ?>"></td>
					<td><?= $mhs["nrp"]; ?></td>
					<td><?= $mhs["nama"]; ?></td>
					<td><?= $mhs["email"]; ?></td>
					<td><?= $mhs["jurusan"]; ?></td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>
</body>
</html>