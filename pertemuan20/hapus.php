<?php
session_start();
if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'fungsi.php';

$id = $_GET["id"];

if(hapus($id) > 0) {
	echo "<script>
			alert('Berhasil dihapus');
			document.location.href = 'index.php';
		</script>";
} else {
	echo "<script>
				alert('Gagal dihapus');
				document.location.href = 'index.php';
			</script>";
}