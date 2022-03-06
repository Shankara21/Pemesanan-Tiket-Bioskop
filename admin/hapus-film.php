<?php
	include ("../config/koneksi.php");
	if (isset($_GET['kd'])) {
		$kd = $_GET['kd'];
		$hapus = mysqli_query($conn,"DELETE FROM film where kd_film='$kd'");
		if ($hapus) {
			echo "<script>alert('Film Berhasil Dihapus');document.location='manajemen-film.php'</script>";
		} else {
			echo "<script>alert('Film Gagal Dihapus');document.location='manajemen-film.php'</script>";
		}
	} else {
		echo "<script>alert('Film Belum Dipilih');document.location='manajemen-film.php'</script>";
	}
?>