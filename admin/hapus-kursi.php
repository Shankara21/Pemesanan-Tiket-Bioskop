<?php
	include ("../config/koneksi.php");
	if (isset($_GET['kursi'])) {
		$kursi = $_GET['kursi'];
		$hapus = mysqli_query($conn,"DELETE FROM kursi where kursi='$kursi'");
		if ($hapus) {
			echo "<script>alert('Kursi Berhasil Dihapus');document.location='manajemen-kursi.php'</script>";
		} else {
			echo "<script>alert('Kursi Gagal Dihapus');document.location='manajemen-kursi.php'</script>";
		}
	} else {
		echo "<script>alert('Kursi Belum Dipilih');document.location='manajemen-kursi.php'</script>";
	}
?>