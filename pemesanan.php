<?php
include "config/koneksi.php";

$id = $_SESSION['id_user'];
$session = $_SESSION['nm_user'];
$sql = mysqli_query($conn, "SELECT * FROM user where id_user='$id' AND nm_user='$session'");
$result = mysqli_fetch_array($sql);

$query = mysqli_query($conn, "SELECT * FROM kategori");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Dmitry Volkov">
    <title>GOMOVIE | Pemesanan Tiket</title>

    <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="css/nouislider.min.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/plyr.css">
    <link rel="stylesheet" href="css/photoswipe.css">
    <link rel="stylesheet" href="css/default-skin.css">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>

<body>
    <?php
    include "navbar.php";
    ?>
    <section class="section section--bg" data-bg="img/section/section.jpg">
        <div class="container" style="margin-top: 50px;height:90vh;display:flex; justify-content:center;">
            <div class="inp">
                <div class="sign__group">
                    <label for="username" class="form-label" style="color: white;">Username</label>
                    <input id="username" type="text" class="form-control sign__input" placeholder="Username" name="username" value="<?= $result['nm_film'] ?>">
                </div>
                <div class="sign__group">
                    <label for="username" class="form-label" style="color: white;">Nama Film</label>
                    <input id="username" type="text" class="form-control sign__input" placeholder="Username" name="username">
                </div>
                <div class="sign__group">
                    <label for="username" class="form-label" style="color: white;">Pilih Studio</label>
                    <input id="username" type="text" class="form-control sign__input" placeholder="Username" name="username">
                </div>
            </div>
        </div>
    </section>
    <?php
    include "footer.php";
    ?>
</body>

</html>