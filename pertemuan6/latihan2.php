<?php

// $mahasiswa = [
// ["Syahdan", "04001234", "syahdanmasyhuri@yahoo.com", "Teknik Informatika"],
// ["Enden Kurnaeli", "040012345", "endenkurnaeli@yahoo.com", "Teknik Komputer"],
// ["Dhani", "0512347658", "dhani@gmail.com", "Teknik Musik"]
// ];

// array associative = keynya adalah string yang kita buat sendiri
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

<?php foreach ($mahasiswa as $mhs) : ?>
	<ul>
		<li><img src="img/<?= $mhs["gambar"]; ?>" style="width: 100px;"></li>
		<li>Nama : <?php echo $mhs["nama"]; ?></li>
		<li>NRP : <?php echo $mhs["nrp"]; ?></li>
		<li>Email : <?php echo $mhs["email"]; ?></li>
		<li>Jurusan : <?php echo $mhs["jurusan"]; ?></li>
	</ul>
<?php endforeach; ?>
</body>
</html>