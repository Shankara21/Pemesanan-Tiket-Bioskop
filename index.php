<?php include "navbar.php";
include "config/koneksi.php";
$ktgr = $_GET['kategori'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Dmitry Volkov">

    <title>GOMOVIE | Beranda</title>

</head>

<body class="body">






    </section> -->





    <!-- expected premiere -->
    <section class="section section--bg" data-bg="img/section/section.jpg">
        <div class="container">
            <div class="row">
                <!-- section title -->
                <div class="col-12" style="margin-top: 20px;">
                    <h2 class="section__title"><strong>Movies</strong></h2>
                </div>
                <!-- end section title -->
                <?php
                if ($ktgr) {
                    $sql = mysqli_query($conn, "SELECT * FROM film WHERE ktgr_film = '$ktgr'");
                } else {
                    $sql = mysqli_query($conn, "SELECT * FROM film");
                }
                if (mysqli_num_rows($sql) > 0) {
                    while ($hasil = mysqli_fetch_array($sql)) {

                ?>
                        <!-- card -->

                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <img src="img/film/<?= $hasil['gambar'] ?>" alt="" style="height: 240px;">
                                    <a href="detail.php?kd=<?php echo $hasil['kd_film']; ?>" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a href="#"><?= $hasil['nm_film'] ?></a></h3>
                                    <span class="card__category">
                                        <a href="#"><?= $hasil['ktgr_film'] ?></a>
                                        <!-- <a href="#">Triler</a> -->
                                    </span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i><?= $hasil['rate'] ?></span>
                                </div>
                            </div>
                        </div>

                        <!-- end card -->
                <?php
                    }
                }
                ?>



            </div>
        </div>
    </section>
    <!-- end expected premiere -->





    <?php include "footer.php"; ?>
</body>

</html>