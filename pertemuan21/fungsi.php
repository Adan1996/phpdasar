<?php
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query) {
	global $conn;

	$result = mysqli_query($conn, $query);
	$rows = [];
	while($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function tambah($data) {
	global $conn;

	$nrp = htmlspecialchars($data["nrp"]);
	$nama = htmlspecialchars($data["nama"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	
	// upload gambar
	$gambar = upload();
	if (!$gambar) {
		return false;
	}

	$sql = "INSERT INTO mahasiswa VALUES ('','$nrp','$nama','$email','$jurusan','$gambar')";

	$query = mysqli_query($conn, $sql);

	return mysqli_affected_rows($conn);

}

function upload() {
	
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if ($error === 4) {
		echo "<script>
			alert('Pilih gambar terlebih dahulu');
		</script>";
		return false;
	}

	// cek apakah yang diupload itu gambar atau bukan
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "<script>
			alert('yang anda pilih bukan gambar');
		</script>";
		return false;
	}

	// cek jika ukuran gambarnya terlalu besar
	if ($ukuranFile > 1000000) {
		echo "<script>
			alert('ukuran gambar terlalu besar');
		</script>";
		return false;
	}

	// jika lolos pengecekan, gambar siap diupload
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
	return $namaFileBaru;
}

function hapus($id) {
	global $conn;

	$query = mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
	return mysqli_affected_rows($conn);
}

function ubah($data) {
	global $conn;

	$id = $data["id"];
	$nrp = htmlspecialchars($data["nrp"]);
	$nama = htmlspecialchars($data["nama"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	$gambarLama = $data["gambarLama"];

	// cek apakah user pilih gambar atau tidak
	if ( $_FILES['gambar']['error'] === 4 ) {
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
	}

	$sql = "UPDATE mahasiswa SET nrp = '$nrp',nama = '$nama',email = '$email',jurusan = '$jurusan',gambar = '$gambar' WHERE id = $id";

	$query = mysqli_query($conn, $sql);
	return mysqli_affected_rows($conn);
}

function cari($keyword) {
	$query = "SELECT * FROM mahasiswa WHERE nrp LIKE '%$keyword%' OR nama LIKE '%$keyword%' OR email LIKE '%$keyword%' OR jurusan LIKE '%$keyword%'";

	return query($query);
}

function registrasi($data) {
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

	if( mysqli_fetch_assoc($result)) {
		echo "<script>
			alert('username sudah ada');
		</script>";
		return false;
	}

	if ($password !== $password2) {
		echo "<script>
			alert('password tidak sama');
		</script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);
	
	// tambah user baru ke database
	mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");
	return mysqli_affected_rows($conn);
}

?>