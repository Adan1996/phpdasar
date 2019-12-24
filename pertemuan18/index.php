<?php
session_start();
if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}
require 'fungsi.php';

// pagination
// konfigurasi
$jumlahDataPerHalaman = 2;
$jumlahData = count(query("SELECT * FROM mahasiswa"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);

$halamanAktif = (isset($_GET['halaman']) ? $_GET['halaman'] : 1);
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
 

$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerHalaman");

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
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

	<h3>Daftar Mahasiswa</h3>
	
	<a href="tambah.php">Tambah data mahasiswa</a>
	<a href="logout.php">Logout</a>
	<br><br>
	<form action="" method="post">
		<input type="text" name="keyword" style="width: 800px" autofocus placeholder="Masukkan nama.....">
		<button type="submit" name="cari">cari</button>
	</form>
	<br>

	<?php if ($halamanAktif > 1) : ?>
		<a href="?halaman=<?php echo $halamanAktif - 1; ?>">&laquo</a>
	<?php endif; ?>

	<?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
		<?php if ($i == $halamanAktif) : ?>
			<a href="?halaman=<?php echo $i; ?>" style="font-weight: bold;"><?php echo $i; ?></a>
		<?php else : ?>
			<a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
		<?php endif; ?>
	<?php endfor; ?>

	<?php if ($halamanAktif < $jumlahHalaman) : ?>
		<a href="?halaman=<?php echo $halamanAktif + 1; ?>">&raquo</a>
	<?php endif; ?>

	<br>
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
</body>
</html>