<?php
	include ("../config/koneksi.php");
	if (isset($_GET['kd'])) {
		$kd = $_GET['kd'];
		$hapus = mysqli_query($conn,"DELETE FROM studio where kd_kategori='$kd'");
		if ($hapus) {
			echo "<script>alert('Studio Berhasil Dihapus');document.location='manajemen-studio.php'</script>";
		} else {
			echo "<script>alert('Studio Gagal Dihapus');document.location='manajemen-studio.php'</script>";
		}
	} else {
		echo "<script>alert('Studio Belum Dipilih');document.location='manajemen-studio.php'</script>";
	}
?>