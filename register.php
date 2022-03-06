<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600%7CUbuntu:300,400,500,700" rel="stylesheet">

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

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="icon/favicon-32x32.png" sizes="32x32">
    <link rel="apple-touch-icon" href="icon/favicon-32x32.png">
    <link rel="apple-touch-icon" sizes="72x72" href="icon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="icon/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="144x144" href="icon/apple-touch-icon-144x144.png">

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Dmitry Volkov">
    <title>GOMOVIE | Register</title>

</head>

<body class="body">

    <div class="sign section--bg" data-bg="img/section/section.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sign__content">
                        <!-- authorization form -->
                        <form action="" class="sign__form" method="post">
                            <h1 style="color: white;">REGISTER</h1>

                            <div class="sign__group">
                                <input type="text" class="sign__input" placeholder="Nama Lengkap" name="nm_user">
                            </div>

                            <div class="sign__group">
                                <input type="text" class="sign__input" placeholder="Username" name="username">
                            </div>

                            <div class="sign__group">
                                <input type="password" class="sign__input" placeholder="Password" name="password">
                            </div>

                            <div class="sign__group">
                                <input type="text" class="sign__input" placeholder="Email" name="email">
                            </div>

                            <div class="sign__group">
                                <select class="sign__input" id="jenis_kelamin" name="jenis_kelamin" required="" placeholder="Masukkan jenis kelamin">
                                    <option>Masukan Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>

                            <div class="sign__group">
                                <input type="date" class="sign__input" placeholder="Tanggal" name="tgl_lahir">
                            </div>

                            <div class="sign__group">
                                <input type="text" class="sign__input" placeholder="Alamat" name="alamat">
                            </div>

                            <div class="sign__group">
                                <input type="text" class="sign__input" placeholder="No Telepon" name="no_telp">
                            </div>

                            <button type="submit" class="sign__btn" type="button" name="register">Sign up</button>

                            <span class="sign__text">Already have an account? <a href="login.php">Sign in!</a></span>
                        </form>
                        <!-- end authorization form -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.mousewheel.min.js"></script>
    <script src="js/jquery.mCustomScrollbar.min.js"></script>
    <script src="js/wNumb.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/plyr.min.js"></script>
    <script src="js/jquery.morelines.min.js"></script>
    <script src="js/photoswipe.min.js"></script>
    <script src="js/photoswipe-ui-default.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
<?php
include "config/koneksi.php";

if (isset($_POST['register'])) {
    $name = $_POST['nm_user'];
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $level = "user";
    $jk = $_POST['jenis_kelamin'];
    $email = $_POST['email'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $almt = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $query = mysqli_query($conn, "SELECT * FROM user where username='$user'");
    if (mysqli_num_rows($query) > 0) {
        echo "
		<script>
        alert('Username Telah Terdaftar!')
        </script>";
    } else {
        $save = mysqli_query($conn, "INSERT INTO user (nm_user,username,password,level,jenis_kelamin,email,tgl_lahir,alamat,no_telp) VALUES ('$name','$user','$pass','user','$jk','$email','$tgl_lahir','$almt','$no_telp')");
        if ($save) {
            echo "<script> alert('Berhasil Mendaftar ! Silahkan Login')</script>";
            echo "<meta http-equiv='refresh' content='1 url=login.php'>";
        } else {
            echo mysqli_error($conn);
            echo "<script> alert('Proses Gagal !')</script>";
            echo "<meta http-equiv='refresh' content='1 url=daftar.php'>";
        }
    }
}
?>