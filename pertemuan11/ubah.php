<?php
	require 'fungsi.php';

	// ambil data dari URL
	$id = $_GET["id"];

	// ambil data menggunakan query yang sudah dibuat difile function
	$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];
	
	if (isset($_POST["submit"])) {


		if(ubah($_POST) > 0) {
			echo "<script>
				alert('Berhasil');
				document.location.href = 'index.php';
			</script>";
		} else {
			echo "<script>
				alert('Gagal');
			</script>";
		}

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Ubah Data Mahasiswa</title>
</head>
<body>
	<h3>Ubah Data Mahasiswa</h3>

	<form action="" method="post">
	<input type="hidden" name="id" value="<?= $id; ?>">
		<ul>
			<li>
				<label>NRP : </label>
				<input type="text" name="nrp" required value="<?= $mhs["nrp"]; ?>">
			</li>
			<li>
				<label>Nama : </label>
				<input type="text" name="nama" required value="<?= $mhs["nama"] ?>">
			</li>
			<li>
				<label>Email : </label>
				<input type="email" name="email" required value="<?= $mhs["email"];?>">
			</li>
			<li>
				<label>Jurusan : </label>
				<input type="text" name="jurusan" required value="<?= $mhs["jurusan"]; ?>">
			</li>
			<li>
				<label>Gambar : </label>
				<input type="text" name="gambar" required value="<?= $mhs["gambar"]; ?>">
			</li>
			<li>
				<button type="submit" name="submit">Ubah</button>
				<a href="index.php">kembali</a>
			</li>
		</ul>
	</form>
</body>
</html>