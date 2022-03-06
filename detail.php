<?php
include "navbar.php";

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
$query_jadwal = mysqli_query($conn, "SELECT * FROM jadwal");
$sql = mysqli_query($conn, "SELECT * FROM studio");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GOMOVIE | <?= $daftar['nm_film'] ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Dmitry Volkov">
    <link rel="import" href="path/to/bower_components/vaadin-themes/valo/vaadin-text-field.html">
    <!-- Import the actual element after its theme -->
    <link rel="import" href="path/to/bower_components/vaadin-text-field/vaadin-text-field.html">

</head>

<body>
    <?php 
			if (isset($_SESSION['level'])) {
    		if ($_SESSION['level'] == "user") { ?>
    <section class="section section--bg" data-bg="img/section/section.jpg">
        <div class="container" style="display: flex;margin-top: 30px;margin-bottom:30px">
            <div class="img" style="padding: 20px;">
                <img src="img/film/<?= $daftar['gambar'] ?>" alt="" style="width: 350px; height:500px">
            </div>
            <div class="detail" style="padding: 20px;width:50%;color:white;">
                <h1 style="font-size:2.5em;"><?= $daftar['nm_film'] ?></h1>
                <h2>Rp. <?= $daftar['harga'] ?></h2>
                <h3 style="color: #9D9D9D;"><?= $daftar['ktgr_film'] ?></h3>
                <span class="card__rate" style="font-size: 1.3em;"><i class="icon ion-ios-star"></i>
                    <?= $daftar['rate'] ?></span>
                <hr>
                <div class="director" style="line-height: 10px;">
                    <p>Director</p>
                    <p><?= $daftar['director'] ?></p>
                </div><br>
                <div class="cast" style="line-height: 10px;">
                    <p>Cast</p>
                    <p><?= $daftar['cast'] ?></p>
                </div><br>
                <div class="sinopsis">
                    <p style="line-height: 10px;">Sinopsis</p>
                    <p><?= $daftar['sinopsis'] ?></p>
                </div>
            </div>
        </div>
        <div class="dropdown"
            style="width:60%;margin:auto; background-color:rgba(43,43,49,0.9); padding:30px; border-radius:10px;">
            <div class="tanggal" style="color: white;width:100%;margin-bottom:20px; ">
                <div class="sign__group">
                    <h1>Pilih Tanggal</h1>
                    <input type="date" class="sign__input" placeholder="<?= $daftar['tanggal'] ?>" name="tgl"
                        value="<?= $daftar['tanggal'] ?>"
                        style="background-color: rgb(50, 50, 50); margin-left: 50px;"><br>
                </div>
            </div>
            <h1 style="color: white;">Studio</h1>
            <div class="studio" style="width: 100%;padding:0 60px">
                <li class="header__nav-item">
                    <a class="dropdown-toggle header__nav-link" href="#" role="button" id="dropdownMenuCatalog"
                        data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><?= $daftar['nm_studio'] ?></a>
                </li>
            </div>
            <h1 style="color: white;">Jam Tayang</h1>
            <div class="studio" style="width: 100%;padding:0 60px">
                <li class="header__nav-item">
                    <a class="dropdown-toggle header__nav-link" href="#" role="button" id="dropdownMenuCatalog"
                        data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><?= $daftar['jam_tayang'] ?></a>
                </li>
            </div>
            <div class="button" style="display:flex; justify-content:center;">
                <a href="bangku2.php?kd=<?= $daftar['kd_film']; ?>" class="header__sign-in">
                    <i class="icon ion-ios-log-in"></i>
                    <span>Pilih Bangku</span>
                </a>
            </div>
        </div>
    </section>

    <?php        }
			} elseif (!isset($_SESSION['id'])) { ?>
    <section class="section section--bg" data-bg="img/section/section.jpg">
        <div class="container" style="display: flex;margin-top: 30px;margin-bottom:30px">
            <div class="img" style="padding: 20px;">
                <img src="img/film/<?= $daftar['gambar'] ?>" alt="" style="width: 350px; height:500px">
            </div>
            <div class="detail" style="padding: 20px;width:50%;color:white;">
                <h1 style="font-size:2.5em;"><?= $daftar['nm_film'] ?></h1>
                <h2>Rp. <?= $daftar['harga'] ?></h2>
                <h3 style="color: #9D9D9D;"><?= $daftar['ktgr_film'] ?></h3>
                <span class="card__rate" style="font-size: 1.3em;"><i class="icon ion-ios-star"></i>
                    <?= $daftar['rate'] ?></span>
                <hr>
                <div class="director" style="line-height: 10px;">
                    <p>Director</p>
                    <p><?= $daftar['director'] ?></p>
                </div><br>
                <div class="cast" style="line-height: 10px;">
                    <p>Cast</p>
                    <p><?= $daftar['cast'] ?></p>
                </div><br>
                <div class="sinopsis">
                    <p style="line-height: 10px;">Sinopsis</p>
                    <p><?= $daftar['sinopsis'] ?></p>
                </div>
            </div>
        </div>
        <div class="dropdown"
            style="width:60%;margin:auto; background-color:rgba(43,43,49,0.9); padding:30px; border-radius:10px;">
            <div class="tanggal" style="color: white;width:100%;margin-bottom:20px; ">
                <div class="sign__group">
                    <h1>Pilih Tanggal</h1>
                    <input type="date" class="sign__input" placeholder="<?= $daftar['tanggal'] ?>" name="tgl"
                        value="<?= $daftar['tanggal'] ?>"
                        style="background-color: rgb(50, 50, 50); margin-left: 50px;"><br>
                </div>
            </div>
            <h1 style="color: white;">Studio</h1>
            <div class="studio" style="width: 100%;padding:0 60px">
                <li class="header__nav-item">
                    <a class="dropdown-toggle header__nav-link" href="#" role="button" id="dropdownMenuCatalog"
                        data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><?= $daftar['nm_studio'] ?></a>
                </li>
            </div>
            <h1 style="color: white;">Jam Tayang</h1>
            <div class="studio" style="width: 100%;padding:0 60px">
                <li class="header__nav-item">
                    <a class="dropdown-toggle header__nav-link" href="#" role="button" id="dropdownMenuCatalog"
                        data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><?= $daftar['jam_tayang'] ?></a>
                </li>
            </div>
            <div class="button" style="display:flex; justify-content:center;">
                <a href="login.php?kd=<?= $daftar['kd_film']; ?>" class="header__sign-in">
                    <i class="icon ion-ios-log-in"></i>
                    <span>Pilih Bangku</span>
                </a>
            </div>
        </div>
    </section>
    <?php }
     ?>

    <?php
    include "footer.php";
    ?>

</body>

</html>