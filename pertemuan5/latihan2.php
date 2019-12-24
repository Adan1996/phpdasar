<?php

$mahasiswa = [
	["Syahdan", "00120230", "Teknik Informatika", "syahdanmasyhuri@gmail.com"],
	["Dinda", "002302302", "Akutansi", "dinda@gmail.com"]
];

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h1>Daftar Mahasiswa</h1>
	<?php foreach ($mahasiswa as $mhs) : ?>
		<ul>
			<li>Nama : <?php echo $mhs[0]; ?></li>
			<li>NPM : <?php echo $mhs[1]; ?></li>
			<li>Jurusan : <?php echo $mhs[2]; ?></li>
			<li>Email : <?php echo $mhs[3]; ?></li>
		</ul>
	<?php endforeach; ?>
</body>
</html>