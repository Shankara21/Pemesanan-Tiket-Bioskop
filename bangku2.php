<?php
session_start();
include "config/koneksi.php";
error_reporting(0);
if (isset($_GET['kd'])) {
    $kd = $_GET['kd'];
} else {
    echo "<script>alert('Kode Film Belum Dipilih');document.location='manajemen-film.php'</script>";
}
$data = mysqli_query($conn, "SELECT * FROM film where kd_film='$kd'");
$daftar = mysqli_fetch_array($data);
$a = $_SESSION['id'];
$b = $_SESSION['name'];
$user = mysqli_query($conn, "SELECT * FROM user where id_user= '$a' AND nm_user= '$b'");
$user1 = mysqli_fetch_array($user);

$ambil = mysqli_query($conn, "SELECT max(kd_tiket) as maxKode FROM tiket");
$tampung = mysqli_fetch_array($ambil);
$kd = $tampung['maxKode'];
$noUrut = (int) substr($kd, 4, 3);
$noUrut++;
$char = "TKT-";
$kd_tiket = $char . sprintf("%03s", $noUrut);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GOMOVIE | SEAT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bangku.css" type="text/css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Dmitry Volkov">
    <link rel="stylesheet" href="css/bangku2.css" type="text/css">

    <style>
        /* .app {
            max-width: 500px;
            margin: 0 auto;
        } */
    </style>
</head>

<body>
    <?php
    include "navbar.php";
    ?>
    <form action="" method="post">
        <section class="section section--bg" data-bg="img/section/section.jpg">
            <div class="container">
                <div class="back" style="margin-top:50px; display:flex; align-items:baseline;">
                    <a href="detail.php?kd=<?= $daftar['kd_film'] ?>">
                        <img src="img/bahan/arrow-left.png" alt="" style="width: 30px;">
                    </a>
                    <a href="detail.php?kd=<?= $daftar['kd_film'] ?>">
                        <p style="color: white;">&ensp;Kembali</p>
                    </a>

                </div>

                <div class="inp" style="display: flex;color:white;">
                    <div class="view" style="width: 65%;  background-color:rgba(43,43,49,0.9);margin-right:10px; height:600px">

                        <div class="containerr">
                            <div class="screen" style="margin-top: 30px;"></div>
                            <div class="seat">
                                <div class="row">
                                    <select name="seat[]" id="seat" class="custom-select" multiple="multiple">
                                        <?php $query_seat = mysqli_query($conn, "SELECT * FROM `kursi` LIMIT 0,8");
                                        while ($dt = mysqli_fetch_array($query_seat)) { ?>
                                            <option value="<?= $dt['kursi']; ?>"><?= $dt['kursi']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="row">
                                    <select name="seat[]" id="seat" class="custom-select" multiple="multiple">
                                        <?php $query_seat = mysqli_query($conn, "SELECT * FROM `kursi` LIMIT 8,8");
                                        while ($dt = mysqli_fetch_array($query_seat)) { ?>
                                            <option value="<?= $dt['kursi']; ?>"><?= $dt['kursi']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="row">
                                    <select name="seat[]" id="seat" class="custom-select" multiple="multiple">
                                        <?php $query_seat = mysqli_query($conn, "SELECT * FROM `kursi` LIMIT 16,8");
                                        while ($dt = mysqli_fetch_array($query_seat)) { ?>
                                            <option value="<?= $dt['kursi']; ?>"><?= $dt['kursi']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="row">
                                    <select name="seat[]" id="seat" class="custom-select" multiple="multiple">
                                        <?php $query_seat = mysqli_query($conn, "SELECT * FROM `kursi` LIMIT 24,8");
                                        while ($dt = mysqli_fetch_array($query_seat)) { ?>
                                            <option value="<?= $dt['kursi']; ?>"><?= $dt['kursi']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="row">
                                    <select name="seat[]" id="seat" class="custom-select" multiple="multiple">
                                        <?php $query_seat = mysqli_query($conn, "SELECT * FROM `kursi` LIMIT 32,8");
                                        while ($dt = mysqli_fetch_array($query_seat)) { ?>
                                            <option value="<?= $dt['kursi']; ?>"><?= $dt['kursi']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="row">
                                    <select name="seat[]" id="seat" class="custom-select" multiple="multiple">
                                        <?php $query_seat = mysqli_query($conn, "SELECT * FROM `kursi` LIMIT 40,8");
                                        while ($dt = mysqli_fetch_array($query_seat)) { ?>
                                            <option value="<?= $dt['kursi']; ?>"><?= $dt['kursi']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="info" style="width: 35%;background-color:rgba(43,43,49,0.9);padding:20px;height:500px">
                        <div class="head" style="display: flex;border-radius:10px;">
                            <div class="gambar">
                                <img src="img/film/<?=
                                                    $daftar['gambar']
                                                    ?>" alt="" style="width: 100px;border-radius: 5px;">
                            </div>
                            <input type="text" name="kd_tiket" value="<?= $kd_tiket; ?>" hidden>
                            <input type="text" name="kd_film" value="<?= $daftar['kd_film']; ?>" hidden>
                            <div class="keterangan" style="color: white; padding-left:10px;">
                                <h4><?= $daftar['nm_film'] ?></h4>
                                <input type="text" name="nm_film" value="<?= $daftar['nm_film'] ?>" hidden>

                                <table>
                                    <tr>
                                        <td style="color: #9D9D9D;">Kategori</td>
                                        <td><input value="<?= $daftar['ktgr_film'] ?>" hidden><?= $daftar['ktgr_film'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Date</td>
                                        <td><input name="tanggal" value="<?= $daftar['tanggal'] ?>" hidden><?= $daftar['tanggal'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Time</td>
                                        <td><input name="jam" value="<?= $daftar['jam_tayang'] ?>" hidden><?= $daftar['jam_tayang'] ?></td>
                                    </tr>
                                    <tr>
                                        <input type="text" name="kd_studio" value="<?= $daftar['kd_studio']; ?>" hidden>
                                        <td>Studio</td>
                                        <td><input name="nm_studio" value="<?= $daftar['nm_studio'] ?>" hidden><?= $daftar['nm_studio'] ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div><br>
                        <div class="payment">
                            <h3>Harga Tiket</h3>
                            <a class="btn btn-primary" style="width:70px" id="harga" name="harga" value=""><?= $daftar['harga']; ?></a><br><br>

                            <!-- <h5><span id="count">0</span> Seat Selected</h5>
                            <h5 style="color: #00aa13;">Rp. <input type="text" id="total" name="total" readonly></h5> -->

                        </div><br>
                        <!-- <input type="text" value="total2" id="total2" placeholder="0"> -->

                        <div class="button" style="display:flex; justify-content:center;">
                            <input type="submit" name="pesan" class="header__sign-in" value="Continue">


                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>

    <?php
    include "footer.php";
    ?>


    <!-- <script src="script.js"></script> -->
    <script src="script2.js"></script>

    <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
    $(".multiple").select2({
        // maximumSelectionLength: 10
    });
    </script> -->
</body>

</html>
<?php
if (isset($_POST['pesan'])) {
    $kd_tiket = $kd_tiket;
    $user = $_SESSION['id'];
    $kd_film = $_POST['kd_film'];
    $judul = $_POST['nm_film'];
    $kd_studio = $_POST['kd_studio'];
    $kursi = $_POST['seat'];
    $jadwal = $_POST['jam'];
    $nm_studio = $_POST['nm_studio'];
    $tanggal = $_POST['tanggal'];
    $seat_string = implode(', ', $kursi);

    $simpan = mysqli_query($conn, "INSERT INTO tiket (kd_tiket,id_user,kd_film,judul, kd_studio,kursi,jadwal,nm_studio,tanggal) VALUES 
            ('$kd_tiket', '$user', '$kd_film', '$judul', '$kd_studio', '$seat_string', '$jadwal', '$nm_studio', '$tanggal')");

    // $update = mysqli_query($conn, "UPDATE kursi, tiket SET status = '1' WHERE kursi.kursi = tiket.kursi");

    var_dump($simpan);
?>
    <script type="text/javascript">
        document.location = "payment.php?kd_tiket=<?= $kd_tiket ?>";
    </script>
<?php

}


?>