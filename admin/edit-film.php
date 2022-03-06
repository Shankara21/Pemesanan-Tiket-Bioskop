<?php
session_start();
include "../config/koneksi.php";
error_reporting(0);
if (isset($_GET['kd'])) {
    $kd = $_GET['kd'];
} else {
    echo "<script>alert('Kode Film Belum Dipilih');document.location='manajemen-film.php'</script>";
}
$data = mysqli_query($conn, "SELECT * FROM film where kd_film='$kd'");
$daftar = mysqli_fetch_array($data);
$daftarkategori = mysqli_query($conn, "SELECT * FROM kategori");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GOMOVIE | Edit Film</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php
        include "sidebar.php";
        ?>


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php
                include "topbar.php";
                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit Film</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">


                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col">
                            <!-- Card Body -->
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="hidden" name="kd_film" value="<?php echo $daftar['kd_film']; ?>">
                                        <label for="user">Nama</label>
                                        <input type="text" class="form-control" id="nm_film"
                                            placeholder="Ganti Nama Film" required="" name="nm_film"
                                            value="<?php echo $daftar['nm_film']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="ktgr">Kategori Film</label>
                                        <select id="ktgr" name="ktgr[]" class="form-control multiple" multiple>
                                            <?php
                                            while ($dataktgr = mysqli_fetch_array($daftarkategori)) { ?>
                                            <option value="<?php echo $dataktgr['nm_kategori']; ?>">
                                                <?php echo $dataktgr['nm_kategori']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="thn_film">Tahun Film</label>
                                        <input type="text" class="form-control" id="thn_film" placeholder="Tahun Film"
                                            name="thn_film" required="" value="<?php echo $daftar['thn_film']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="director">Director</label>
                                        <input type="text" class="form-control" id="director" placeholder="Director"
                                            name="director" required="" value="<?php echo $daftar['director']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="cast">Casting</label>
                                        <input type="text" class="form-control" id="cast" placeholder="Casting"
                                            name="cast" value="<?php echo $daftar['cast']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="cast">Rating Film</label>
                                        <input type="text" class="form-control" id="rate"
                                            placeholder="Masukkan Rating Film" name="rate"
                                            value="<?php echo $daftar['rate']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="harga">Harga Tiket</label>
                                        <input type="text" class="form-control" id="harga"
                                            placeholder="Masukkan Harga Tiket" name="harga"
                                            value="<?php echo $daftar['harga']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="sinopsis">Sinopsis</label>
                                        <input type="text" class="form-control" id="sinopsis" placeholder="Sinopsis"
                                            name="sinopsis" value="<?php echo $daftar['sinopsis']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="gambar">Gambar Film</label>
                                        <input type="file" class="form-control-file" id="file" name="gambar"
                                            value="<?php echo $daftar['gambar']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>ID Jadwal</label>
                                        <select class="form-control" name="id_jadwal" onchange="changeValue(this.value)"
                                            required>
                                            <option value=0>-Pilih-</option>
                                            <?php 
	 					            $query = mysqli_query($conn, "SELECT * FROM jadwal");
	 					            $jsarray = "var dt = new Array();\n";
	 					            while ($row = mysqli_fetch_array($query)) {
	 					            ?>
                                            <option value="<?= $row['id_jadwal'] ?>"><?= $row['id_jadwal'] ?></option>
                                            <?php
	 						        $jsarray .= "dt['".$row['id_jadwal']."'] = { tanggal:'".addslashes($row['tanggal'])."', tayang:'".addslashes($row['jam_tayang'])."'};\n";
	 					            }
	 				                ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal">Tanggal Tayang</label>
                                        <input type="text" class="form-control" id="tanggal" required="" name="tanggal"
                                            readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label for="tayang">Jam Tayang</label>
                                        <input type="text" class="form-control" id="tayang" required="" name="tayang"
                                            readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label>Kode Studio</label>
                                        <select class="form-control" name="kd_studio" onchange="change(this.value)"
                                            required>
                                            <option value=0>-Pilih-</option>
                                            <?php 
	 					            $query = mysqli_query($conn, "SELECT * FROM studio");
	 					            $js = "var data = new Array();\n";
	 					            while ($row = mysqli_fetch_array($query)) {
	 					            ?>
                                            <option value="<?= $row['kd_studio'] ?>"><?= $row['kd_studio'] ?></option>
                                            <?php
	 						       $js .= "data['".$row['kd_studio']."'] = { nama:'".addslashes($row['nm_studio'])."'};\n";
	 					            }
	 				                ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nm_studio">Nama Studio</label>
                                        <input type="text" class="form-control" id="nm_studio" required=""
                                            name="nm_studio" readonly="">
                                    </div>
                                    <br>
                                    <input type="submit" class="btn btn-outline-primary" value="Edit" name="edit">
                                    <a class="btn btn-outline-primary" href="manajemen-film.php"
                                        role="button">Kembali</a>
                                </form>
                                <script>
                                <?php echo $jsarray; ?>


                                function changeValue(id) {
                                    document.getElementById('tanggal').value = dt[id].tanggal;
                                    document.getElementById('tayang').value = dt[id].tayang;

                                }
                                <?php echo $js; ?>

                                function change(id) {
                                    document.getElementById('nm_studio').value = data[id].nama;
                                }
                                </script>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->


    </div>
    <!-- End of Content Wrapper -->


    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
    $(".multiple").select2({
        // maximumSelectionLength: 10
    });
    </script>

</body>

</html>
<?php
if (isset($_POST['edit'])) {

    $kd = $_POST['kd_film'];
    $name = $_POST['nm_film'];
    $dktgr = $_POST['ktgr'];
    $thn = $_POST['thn_film'];
    $drc = $_POST['director'];
    $cst = $_POST['cast'];
    $rate = $_POST['rate'];
    $harga = $_POST['harga'];
    $sin = $_POST['sinopsis'];
    $id_jadwal = $_POST['id_jadwal'];
    $tgl = $_POST['tanggal'];
    $tayang = $_POST['tayang'];
    $kd_studio = $_POST['kd_studio'];
    $nm_studio = $_POST['nm_studio'];
    $nama_file = $_FILES['gambar']['name'];
    $source = $_FILES['gambar']['tmp_name'];
    $folder = '../img/film/';
    move_uploaded_file($source, $folder . $nama_file);
    $ktgr_string = implode(', ', $dktgr);
    $edit = mysqli_query($conn, "UPDATE film set nm_film='$name', ktgr_film='$ktgr_string', thn_film='$thn', director='$drc', cast='$cst',rate='$rate',harga='$harga', sinopsis='$sin', gambar='$nama_file', 
    id_jadwal='$id_jadwal', tanggal='$tgl', jam_tayang='$tayang', kd_studio='$kd_studio', nm_studio='$nm_studio' where kd_film='$kd'");
    if ($edit) {
        echo "<script>alert('Film berhasil diedit'); document.location='manajemen-film.php'</script>";
    } else {
        echo "<script>alert('Film gagal diedit')</script>";
        echo mysqli_error($conn);
    }
}
?>