<?php

$mahasiswa = [
	[
		"nama" => "Syahdan",
		"nrp" => "04001234",
		"email" => "syahdanmasyhuri@yahoo.com",
		"jurusan" => "Teknik Informatika",
		"gambar" => "gambar1.jpg"
	],
	[
		"nama" => "Enden",
		"nrp" => "040012345",
		"email" => "endenkurnaeli@yahoo.com",
		"jurusan" => "Teknik Komputer",
		"gambar" => "gambar2.jpg"
	],
	[
		"nama" => "Dhani",
		"nrp" => "0512347658",
		"email" => "dhani@gmail.com",
		"jurusan" => "Teknik Musik",
		"gambar" => "gambar3.jpg"
	]
];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Daftar Mahasiswa</title>
</head>
<body>

	<h1>Daftar Mahasiswa</h1>
<ul>
<?php foreach ($mahasiswa as $mhs) : ?>
	<li>
		<a href="latihan1.php?gambar=<?= $mhs["gambar"]; ?>&nama=<?= $mhs["nama"]; ?>&nrp=<?= $mhs["nrp"]; ?>&email=<?= $mhs["email"]; ?>&jurusan=<?= $mhs["jurusan"]; ?>"><?= $mhs["nama"]; ?></a>
	</li>
<?php endforeach; ?>
</ul>
</body>
</html>