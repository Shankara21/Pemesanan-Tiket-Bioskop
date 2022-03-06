<?php
	include ("../config/koneksi.php");
	if (isset($_GET['kd_pesan'])) {
		$kd = $_GET['kd_pesan'];
		$hapus = mysqli_query($conn,"DELETE FROM pesan_tiket where kd_pesan='$kd'");
		if ($hapus) {
			echo "<script>alert('Histori Pesanan Berhasil Dihapus');document.location='histori-penjualan.php'</script>";
		} else {
			echo "<script>alert('Histori Pesanan Gagal Dihapus');document.location='histori-penjualan.php'</script>";
		}
	} else {
		echo "<script>alert('Kode Pesanan Belum Dipilih');document.location='histori-penjualan.php'</script>";
	}
?>