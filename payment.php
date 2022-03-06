<?php
session_start();
include "config/koneksi.php";
error_reporting(0);
if (isset($_GET['kd_tiket'])) {
    $kd_tiket = $_GET['kd_tiket'];
} else {
    echo "<script>alert('Kode Tiket Belum Dipilih');document.location='bangku2.php'</script>";
}
$data = mysqli_query($conn, "SELECT * FROM tiket, film where tiket.kd_film = film.kd_film AND kd_tiket='$kd_tiket'");
$daftar = mysqli_fetch_array($data);

$query = mysqli_query($conn, "SELECT (LENGTH(kursi) - LENGTH(REPLACE(kursi, ',', '')) +1) as total FROM tiket WHERE kd_tiket = '$kd_tiket'");
$dt = mysqli_fetch_array($query);
$jml = $dt['total'];
$hrg = $daftar['harga'];
$total = $jml * $hrg;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Dmitry Volkov">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <title>GOMOVIE | Payment</title>
    <style>
        td:nth-child(even) {
            width: 250px;
            height: 50px;
            text-align: right;
            color: white;
        }

        td:nth-child(odd) {
            color: #9D9D9D;
        }

        .list {
            padding: 10px 25px;
        }

        .li {
            background-color: #2B2B2B;
            color: white;
            padding: 10px;
        }

        .inp {
            border: 1px solid #334257;
            margin: 20px;
            padding: 15px 30px;
        }
    </style>
</head>

<body>
    <?php
    include "navbar.php";
    ?>
    <form action="" method="post">
        <section class="section section--bg" data-bg="img/section/section.jpg">
            <div class="container" style="margin-top: 50px;display:flex; color:white;">
                <div class="info" style="width: 40%;background-color:rgba(43,43,49,0.9);padding:15px;height:500px;border-radius:10px;margin-right:5px">
                    <h3 style="margin-bottom: 15px;">Movie Detail</h3>
                    <div class="head" style="display: flex;border-radius:10px;">
                        <div class="gambar">
                            <img src="img/film/<?=
                                                $daftar['gambar']
                                                ?>" alt="" style="width: 200px;border-radius: 5px;">
                        </div>
                        <input type="text" name="kd_tiket" value="<?= $daftar['kd_tiket']; ?>" hidden>
                        <div class="keterangan" style="color: white; padding-left:10px;">
                            <h3><?= $daftar['nm_film'] ?></h3>

                            <br>
                            <table>
                                <tr>
                                    <td style="color: #9D9D9D;">Kategori</td>
                                    <td> <?= $daftar['ktgr_film'] ?></td>
                                </tr>
                                <tr>
                                    <td>Date & <br> Time</td>
                                    <td><?= $daftar['tanggal'] ?>, <?= $daftar['jadwal'] ?></td>
                                </tr>
                                <tr>
                                    <td>Studio</td>
                                    <td><?= $daftar['nm_studio'] ?></td>
                                </tr>
                                <tr>
                                    <td>Seats</td>
                                    <td><?= $daftar['kursi'] ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="payment" style="width: 60%;background-color:rgba(43,43,49,0.9);margin-left:5px;border-radius:10px;padding:5px;height:950px;">
                    <h3 style="padding: 10px;">Payment Detail</h3>
                    <!-- <ul class="list list-group list-group-flush">
                    <li class="li list-group-item">BCA Virtual Account</li>
                    <li class="li list-group-item">GoPay</li>
                    <li class="li list-group-item">ShopeePay</li>
                    <li class="li list-group-item">A fourth item</li>
                    <li class="li list-group-item">And a fifth one</li>
                </ul> -->
                    <div class="method" style="padding: 20px;">
                        <div class="title" style="margin-left: 20px;display:flex; align-items:baseline">
                            <h3 style="transform: translateY(-5px);">Pilih Metode Pembayaran</h3>
                            <img src="img/bahan/payment.png" alt="" style="width: 50px;margin-left:10px">
                        </div>
                        <div class="inp form-check">
                            <input class="form-check-input" type="radio" name="pembayaran" id="flexRadioDefault1" style="margin-top: 15px;" value="BCA">
                            <label class="form-check-label" for="flexRadioDefault1">
                                <div class="df" style="display: flex;align-items:center;">
                                    <p style="margin-top: 10px;">BCA Virtual Account</p>
                                    <img src="img/bahan/bcaputih.png" alt="" style="width: 150px;margin-left:200px">
                                </div>
                            </label>
                        </div>
                        <div class="inp form-check">
                            <input class="form-check-input" type="radio" name="pembayaran" id="flexRadioDefault2" style="margin-top: 15px;" value="Gopay">
                            <label class="form-check-label" for="flexRadioDefault2">
                                <div class="df" style="display: flex;align-items:center;">
                                    <p>GoPay</p>
                                    <img src="img/bahan/gopay.png" alt="" style="width: 150px;margin-left:300px">
                                </div>
                            </label>
                        </div>
                        <div class="inp form-check">
                            <input class="form-check-input" type="radio" name="pembayaran" id="flexRadioDefault3" style="margin-top: 15px;" value="Shopeepay">
                            <label class="form-check-label" for="flexRadioDefault3">
                                <div class="df" style="display: flex;align-items:center;">
                                    <p style="margin-top: 10px;">ShopeePay</p>
                                    <img src="img/bahan/Shopeepay.png" alt="" style="width: 150px;margin-left:270px">
                                </div>
                            </label>
                        </div>
                        <div class="inp form-check">
                            <input class="form-check-input" type="radio" name="pembayaran" id="flexRadioDefault4" style="margin-top: 15px;" value="BRI">
                            <label class="form-check-label" for="flexRadioDefault4">
                                <div class="df" style="display: flex;align-items:center;">
                                    <p style="margin-top: 10px;">BRI Virtual Account</p>
                                    <img src="img/bahan/bri.png" alt="" style="width: 150px;margin-left:200px">
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="tablee" style="padding: 20px 50px;display:flex;justify-content:center">
                        <table>
                            <tr>
                                <td>Harga Tiket</td>
                                <td><?= $daftar['harga'] ?></td>
                            </tr>
                            <tr>
                                <td>Jumlah Bangku</td>
                                <td><?= $dt['total'] ?></td>
                            </tr>
                            <tr style="border-bottom: 1px solid #334257;">
                                <td></td>

                            </tr>

                            <tr>
                                <td>Total</td>
                                <td><input name="total" value="<?= $total ?>" hidden><?= $total ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="button" style="display:flex; justify-content:center;">
                        <input type="submit" name="pesan" class="header__sign-in" value="Continue">
                    </div>
                </div>
        </section>
    </form>
    <?php
    include "footer.php";
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>
<?php
if (isset($_POST['pesan'])) {
    $kd_tiket = $_POST['kd_tiket'];
    $total = $_POST['total'];
    $pembayaran = $_POST['pembayaran'];
    $simpan = mysqli_query($conn, "UPDATE tiket SET total = '$total', pembayaran = '$pembayaran' WHERE kd_tiket = '$kd_tiket'");
?>
    <script type="text/javascript">
        document.location = "validation.php?kd_tiket=<?= $kd_tiket ?>";
    </script>
<?php } ?>