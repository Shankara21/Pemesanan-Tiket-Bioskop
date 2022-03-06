<?php
	include ("../config/koneksi.php");
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$hapus = mysqli_query($conn,"DELETE FROM jadwal where id_jadwal='$id'");
		if ($hapus) {
			echo "<script>alert('Jadwal Berhasil Dihapus');document.location='manajemen-jadwal.php'</script>";
		} else {
			echo "<script>alert('Jadwal Gagal Dihapus');document.location='manajemen-jadwal.php'</script>";
		}
	} else {
		echo "<script>alert('Jadwal Belum Dipilih');document.location='manajemen-jadwal.php'</script>";
	}
?>