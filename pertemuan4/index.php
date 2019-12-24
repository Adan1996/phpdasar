<?php

// FUNCTION
	// Built-in Function
		// Date/Time
			// time()
			// UNIX Timestamp / EPOCH time
			// detik yang sudah berlalu sejak 1 Januari 1970
			// echo time();

			// date()
			// untuk menampilkan tanggal format tertentu
			// echo date("l", time() - 60 * 60 * 24 * 100);

			// mktime(0,0,0,0,0,0)
			// (jam, menit, detik, bulan, tanggal, tahun)
			// membuat detik sendiri
			// echo date("l",mktime(0,0,0,3,19,1996));

			// strtotime()
			// echo date("l", strtotime("25 aug 1985"));

		// STRING
			// strlen()
			// strcmp()
			// explode()
			// htmlspecialchars()

		// UTILITY
			// var_dump()
			// isset()
			// empty()
			// die()
			// sleep()
	
	// User-Defined Function
		// function salam($waktu = "Datang", $nama = "Admin") {
		// 	return "Selamat $waktu, $nama";
		// }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Latihan Function</title>
</head>
<body>
	
</body>
</html>