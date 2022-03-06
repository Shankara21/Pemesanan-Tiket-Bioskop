<?php
session_start();
include "../config/koneksi.php";
$query_film = mysqli_query($conn, "SELECT * FROM film");
while ($film = mysqli_fetch_array($query_film)) {
    $nama_film[] = $film['nm_film'];
    $kode[] = $film['kd_film'];
    $judul[] = $film['nm_film'];

    $query = mysqli_query($conn, "SELECT COUNT(kd_tiket) as jumlah FROM tiket WHERE kd_film = '" . $film['kd_film'] . "'");
    $row = $query->fetch_array();
    $jumlah[] = $row['jumlah'];
    $query1 = mysqli_query($conn, "SELECT * FROM user");
    $query2 = mysqli_query($conn, "SELECT * FROM film");
    $query3 = mysqli_query($conn, "SELECT * FROM studio");
    $query4 = mysqli_query($conn, "SELECT * FROM tiket");

    $jml_user = mysqli_num_rows($query1);
    $jml_film = mysqli_num_rows($query2);
    $jml_studio = mysqli_num_rows($query3);
    $jml_tiket = mysqli_num_rows($query4);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GOMOVIE | Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../vendor/chart.js/Chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


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
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                User</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?= number_format($jml_user, 0, ",", "."); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Film</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?= number_format($jml_film, 0, ",", "."); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-film fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Studio</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?= number_format($jml_studio, 0, ",", "."); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-archway fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Transaksi</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?= number_format($jml_tiket, 0, ",", "."); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-ticket-alt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">WELCOME</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <h2>Selamat Datang di halaman Admin</h2>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                    <!-- Content Row -->
                    <div class="row mt-3 mb-3">
                        <!-- Area Chart -->
                        <div class="col">
                            <div class="card shadow mb-10">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Penayangan Film</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area" style="width: 100%;height: 100%">
                                        <canvas id="film"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>




                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; GOMOVIE 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

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
                    <h5 class="modal-title" id="exampleModalLabel">Anda ingin keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" jika anda ingin menghentikan session</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        const labels =
            <?php echo json_encode($nama_film); ?>;

        const data = {
            labels: labels,
            datasets: [{
                label: 'Total',
                backgroundColor: [
                    'royalblue',
                    'coral',
                    'rosybrown',
                    'lightgreen',
                    'orange',
                    'salmon',
                    'magenta',
                    'pink'
                ],
                borderColor: [

                ],
                borderWidht: 1,
                data: <?php echo json_encode($jumlah); ?>,
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Jumlah Penayangan Film'
                    }
                }
            }
        };
    </script>
    <script>
        const myChart = new Chart(
            document.getElementById('film'),
            config
        );
    </script>




    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../vendor/chart.js/Chart.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>