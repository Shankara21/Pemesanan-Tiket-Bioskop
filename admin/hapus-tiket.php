<?php
	include ("../config/koneksi.php");
	if (isset($_GET['kd'])) {
		$kd = $_GET['kd'];
		$hapus = mysqli_query($conn,"DELETE FROM tiket where kd_tiket='$kd'");
		if ($hapus) {
			echo "<script>alert('Tiket Berhasil Dihapus');document.location='manajemen-tiket.php'</script>";
		} else {
			echo "<script>alert('Tiket Gagal Dihapus');document.location='manajemen-tiket.php'</script>";
		}
	} else {
		echo "<script>alert('Tiket Belum Dipilih');document.location='manajemen-tiket.php'</script>";
	}
?>