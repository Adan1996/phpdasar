<?php
// ARRAY
// variabel yang dapat memiliki banyak nilai
// elemen pada array boleh memiliki tipe data yang berbeda
// pasangan antara key dan value
// key-nya adalah index, yang dimulai dari 0

	// 1. cara pertama
		$hari = array("Senin", "Selasa", "Rabu");
	// 2. cara kedua / cara baru
		$day = ["Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu", "Minggu"];

	// menampilkan elemen pada array
		// ada 2 cara yakni menggunakan method var_dump & print_r
		// var_dump($hari);
		// echo '<br>';
		// print_r($day);
		// echo '<br>';

	// menambahkan elemen baru pada array
		// var_dump($hari);
		// $hari[] = "Kamis";
		// $hari[] = "Jum'at";
		// var_dump($hari);

	// menampilkan menggunakan pengulangan
		// for/foreach
		$angka = [3,2,15,20,11,77,89,70];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Latihan 2</title>
	<style>
		.kotak {
			width : 50px;
			height : 50px;
			background-color : salmon;
			text-align: center;
			line-height: 50px;
			margin : 3px;
			float: left;
		}
		.clear {
			clear: both;
		}
	</style>
</head>
<body>
	<!-- ini adalah gaya penulisan templating -->
	<?php for ( $i = 0; $i < count($angka); $i++ ) : ?>
		<div class="kotak"><?php echo $angka[$i]; ?></div>
	<?php endfor; ?>

	<div class="clear"></div>

	<?php foreach ( $angka as $a ) : ?>
		<div class="kotak"><?php echo $a; ?></div>
	<?php endforeach; ?>

</body>
</html>