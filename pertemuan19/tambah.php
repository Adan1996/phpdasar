<?php
session_start();
if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}
	require 'fungsi.php';

	if (isset($_POST["submit"])) {

		if(tambah($_POST) > 0) {
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
	<title>Tambah Data Mahasiswa</title>
</head>
<body>
	<h3>Tambah Data Mahasiswa</h3>

	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label>NRP : </label>
				<input type="text" name="nrp" required>
			</li>
			<li>
				<label>Nama : </label>
				<input type="text" name="nama" required>
			</li>
			<li>
				<label>Email : </label>
				<input type="email" name="email" required>
			</li>
			<li>
				<label>Jurusan : </label>
				<input type="text" name="jurusan" required>
			</li>
			<li>
				<label>Gambar : </label>
				<input type="file" name="gambar">
			</li>
			<li>
				<button type="submit" name="submit">Simpan</button>
				<a href="index.php">kembali</a>
			</li>
		</ul>
	</form>
</body>
</html>