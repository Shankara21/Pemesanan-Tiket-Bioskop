<?php
include "../config/koneksi.php";
$ambil = mysqli_query($conn, "SELECT max(kd_studio) as maxKode FROM studio");

$tampung = mysqli_fetch_array($ambil);
$kd = $tampung['maxKode'];
$noUrut = (int) substr($kd, 4, 4);
$noUrut++;
$char = "STD-";
$kd_studio = $char . sprintf("%03s", $noUrut);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/bahan/clapperboard.png">

    <title>GOMOVIE | Tambah Studio</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

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
                        <h1 class="h3 mb-0 text-gray-800">Tambah Studio</h1>
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
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="kd_studio">Kode Studio</label>
                                        <input type="text" class="form-control" id="kd_studio" placeholder="Masukan Kode Studio Baru" required="" name="kd_studio" value="<?= $kd_studio; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="studio">Studio Baru</label>
                                        <input type="text" class="form-control" id="studio" placeholder="Masukan studio Baru" required="" name="studio">
                                    </div>
                                    <input type="submit" class="btn btn-outline-primary" value="Tambah" name="tambah">
                                    <a class="btn btn-outline-primary" href="manajemen-studio.php" role="button">Kembali</a>
                                </form>

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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

</body>

</html>
<?php

include "../config/koneksi.php";
if (isset($_POST['tambah'])) {
    $kd_studio = $kd_studio;
    $std = $_POST['studio'];
    $cek = mysqli_query($conn, "SELECT * FROM studio where nm_studio='$std'");
    if (mysqli_num_rows($cek) > 0) {
        echo "
		<div class='alert alert-danger' role='alert' align='center'>
		Studio sudah ada !
		</div>";
    } else {
        $save = mysqli_query($conn, "INSERT INTO studio (kd_studio,nm_studio) VALUES ('$kd_studio','$std')");
        if ($save) {
            echo "<script>alert('Studio Berhasil Ditamabah'); document.location = 'manajemen-studio.php';</script>";
        } else {
            echo "<script>alert('GAGAL !')</script>";
            echo mysqli_error($conn);
        }
    }
}
?>