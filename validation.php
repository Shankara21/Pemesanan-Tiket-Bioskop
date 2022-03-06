<?php
session_start();
include "config/koneksi.php";
error_reporting(0);
$kd_tiket = $_GET['kd_tiket'];
$query = mysqli_query($conn, "SELECT * FROM tiket, user, film WHERE tiket.id_user = user.id_user AND tiket.kd_film = film.kd_film AND kd_tiket = '$kd_tiket'");
$t = mysqli_fetch_array($query);
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


    <title>GOMOVIE | Payments</title>
</head>

<body>
    <?php
    include "navbar.php";
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <section class="section section--bg" data-bg="img/section/section.jpg">
            <div class="container" style="margin-top: 50px;margin-bottom:30px;background-color:rgba(43,43,49,0.9);color:white; width:500px;border-radius:10px; height:550px;padding:20px">
                <div class="payment" style="text-align:center;">
                    <input type="text" name="kd_tiket" value="<?= $t['kd_tiket']; ?>" hidden>
                    <h1>Pembayaran</h1>
                    <div class="detail" style="margin:20px;">
                        <?php
                        if ($t['pembayaran'] == "BCA") {
                        ?>
                            <img src="img/bahan/bca.png" alt="" style="width: 250px;">
                        <?php
                        } elseif ($t['pembayaran'] == "Gopay") {
                        ?>
                            <img src="img/bahan/gopay.png" alt="" style="width: 200px;">
                        <?php
                        } elseif ($t['pembayaran'] == "Shopeepay") {
                        ?>
                            <img src="img/bahan/Shopeepay.png" alt="" style="width: 250px;">
                        <?php
                        } elseif ($t['pembayaran'] == "BRI") {
                        ?>
                            <img src="img/bahan/bri.png" alt="" style="width: 250px;">
                        <?php
                        }
                        ?>
                        <br><br>
                        <div class="text" style="text-align: left;margin-left:100px">
                            <table>
                                <tr>
                                    <td>Nomor Rekening </td>
                                    <?php
                                    if ($t['pembayaran'] == "BCA") {
                                    ?>
                                        <td>&ensp;:&ensp; 5220304132</td>
                                    <?php
                                    } elseif ($t['pembayaran'] == "Gopay") {
                                    ?>
                                        <td>&ensp;:&ensp; 082871574124</td>
                                    <?php
                                    } elseif ($t['pembayaran'] == "Shopeepay") {
                                    ?>
                                        <td>&ensp;:&ensp; 085817402935</td>
                                    <?php
                                    } elseif ($t['pembayaran'] == "BRI") {
                                    ?>
                                        <td>&ensp;:&ensp; 098456172946</td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td>Atas Nama </td>
                                    <td>&ensp;: &ensp;GOMOVIE</td>
                                </tr>
                            </table>
                        </div><br>
                        <form action="" enctype="multipart/form-data">
                            <div class="mb-3" style="width: 230px;margin:auto">
                                <label for="exampleFormControlInput1" class="form-label">Total</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="<?= $t['total'] ?>" style="background-color:#2B2B2B;text-align:center;color:white" value="<?= $t['total'] ?>" readonly>
                            </div>
                            <div class="sign__group">
                                <label for="bp">Bukti Pembayaran</label><br>
                                <input type="file" class="sign__input" name="bukti" id="bp" style="padding: 10px;">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="button" style="margin-left:120px; margin-top:30px">
                    <input type="submit" name="pesan" class="header__sign-in" value="Checkout">
                </div>
            </div>
        </section>
    </form>
    <?php
    include "footer.php";
    ?>
</body>

</html>
<?php
if (isset($_POST['pesan'])) {
    $kd_tiket = $_POST['kd_tiket'];
    $nama_file = $_FILES['bukti']['name'];
    $source = $_FILES['bukti']['tmp_name'];
    $folder = './img/bukti/';
    move_uploaded_file($source, $folder . $nama_file);
    $simpan = mysqli_query($conn, "UPDATE tiket SET bukti = '$nama_file' WHERE kd_tiket = '$kd_tiket'");
    if ($simpan) {
?>
        <Script>
            alert('Pembayaran Berhasil');
            document.location = "histori-pesan.php";
        </Script>
<?php
    }
}
?>