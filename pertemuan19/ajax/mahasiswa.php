<?php
require '../fungsi.php';

$keyword = $_GET["keyword"];
$query = "SELECT * FROM mahasiswa WHERE nrp LIKE '%$keyword%' OR nama LIKE '%$keyword%' OR email LIKE '%$keyword%' OR jurusan LIKE '%$keyword%'";
$mahasiswa = query($query);

?>

        <table border="1" cellpadding="10" cellspacing="0">
			<tr>
				<th>No.</th>
				<th>Aksi</th>
				<th>Gambar</th>
				<th>NRP</th>
				<th>Nama</th>
				<th>Email</th>
				<th>Jurusan</th>
			</tr>
			<?php $i = 1; ?>
			<?php foreach($mahasiswa as $mhs) : ?>
				<tr>
					<td><?= $i++ ?></td>
					<td>
						<a href="ubah.php?id=<?= $mhs["id"]; ?>">ubah</a> |
						<a href="hapus.php?id=<?= $mhs["id"]; ?>" onclick="return confirm('apakah anda yakin ingin menghapus data ini ???');">hapus</a>
					</td>
					<td><img class="images" src="img/<?= $mhs["gambar"]; ?>"></td>
					<td><?= $mhs["nrp"]; ?></td>
					<td><?= $mhs["nama"]; ?></td>
					<td><?= $mhs["email"]; ?></td>
					<td><?= $mhs["jurusan"]; ?></td>
				</tr>
			<?php endforeach; ?>
		</table>