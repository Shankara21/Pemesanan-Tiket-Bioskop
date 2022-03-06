<?php

session_start();
include "../config/koneksi.php";
error_reporting(0);

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

    <title>GOMOVIE | Manajemen Film</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        td {
            width: 150px;
        }
    </style>
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
                        <h1 class="h3 mb-0 text-gray-800">Manajemen Film</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">


                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col">
                            <div class="card shadow mb-10">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Manajemen Film</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Aksi:</div>
                                            <a class="dropdown-item" href="tambah-film.php">Tambah Film</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <tr>
                                                <th>Kode Film</th>
                                                <th>Nama Film</th>
                                                <th>Kategori Film</th>
                                                <th>Tahun Film</th>
                                                <th>Director</th>
                                                <th>Casting</th>
                                                <th>Rating</th>
                                                <th>Harga</th>
                                                <th>Sinopsis</th>
                                                <th>Gambar</th>
                                                <th>Tanggal Tayang</th>
                                                <th>Jam Tayang</th>
                                                <th>Nama Studio</th>
                                                <th>Aksi</th>
                                            </tr>
                                            <?php
                                            include "config/koneksi.php";
                                            $query = mysqli_query($conn, "SELECT * FROM film");
                                            while ($data = mysqli_fetch_array($query)) {
                                            ?>
                                                <tr>
                                                    <td><?= $data['kd_film']; ?></td>
                                                    <td><?php echo $data['nm_film']; ?></td>
                                                    <td><?php echo $data['ktgr_film']; ?></td>
                                                    <td><?php echo $data['thn_film']; ?></td>
                                                    <td><?php echo $data['director']; ?></td>
                                                    <td><?php echo $data['cast']; ?></td>
                                                    <td><?php echo $data['rate']; ?></td>
                                                    <td>Rp. <?php echo $data['harga']; ?></td>
                                                    <td><?php echo $data['sinopsis']; ?></td>
                                                    <td><img src="../img/film/<?php echo $data['gambar']; ?>" width="60px" height="80px" alt="<?php echo $data['gambar'] ?>"></td>
                                                    <td><?php echo $data['tanggal']; ?></td>
                                                    <td><?php echo $data['jam_tayang']; ?></td>
                                                    <td><?php echo $data['nm_studio']; ?></td>
                                                    <td>
                                                        <a href="edit-film.php?kd=<?php echo $data['kd_film']; ?>" class="btn btn-success">Edit </a>
                                                        <a href="hapus-film.php?kd=<?php echo $data['kd_film']; ?>" class="btn btn-danger">Hapus</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </table>

                                    </div>
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