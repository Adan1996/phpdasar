<?php

if ( !isset($_GET["gambar"]) ||
	!isset($_GET["nama"]) ||
	!isset($_GET["nrp"]) ||
	!isset($_GET["email"]) ||
	!isset($_GET["jurusan"])) {

	// redirect
	header("Location: latihan2.php");
	exit;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Detail Mahasiswa</title>
</head>
<body>

	<ul>
		<li><img src="img/<?= $_GET["gambar"]; ?>" style="width: 100px;"></li>
		<li><?= $_GET["nama"]; ?></li>
		<li><?= $_GET["nrp"]; ?></li>
		<li><?= $_GET["email"]; ?></li>
		<li><?= $_GET["jurusan"]; ?></li>
	</ul>

	<a href="latihan1.php">kembali</a>

</body>
</html>