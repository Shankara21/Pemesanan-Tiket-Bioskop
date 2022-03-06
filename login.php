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
    <title>GOMOVIE | Login</title>

</head>

<body class="body">

    <div class="sign section--bg" data-bg="img/section/section.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sign__content">
                        <!-- authorization form -->
                        <form action="" class="sign__form" method="post">
                            <h1 style="color: white;">LOGIN</h1>

                            <div class="sign__group">
                                <input type="text" class="sign__input" placeholder="Username" name="username">
                            </div>

                            <div class="sign__group">
                                <input type="password" class="sign__input" placeholder="Password" name="password">
                            </div>

                            <button type="submit" class="sign__btn" type="button" name="login">Sign in</button>

                            <span class="sign__text">Don't have an account? <a href="register.php">Sign up!</a></span>
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
if (isset($_POST['login'])) {
    session_start();
    include "config/koneksi.php";
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $query = mysqli_query($conn, "SELECT * FROM user WHERE (username='$user' OR email='$user')");
    $tampung = mysqli_fetch_array($query);
    $cek = mysqli_num_rows($query);

    if ($cek == 0) {
        echo "
			<script>
            alert('Username tidak terdaftar!')
            </script>";
    } elseif ($pass <> $tampung['password']) {
        echo "
			<br />
			<div class='alert alert-danger' role='alert' align='center'>
			Password salah !
			</div>";
    } elseif ($user && $pass = $tampung['username'] && $tampung['password']) {
        $_SESSION['level'] = $tampung['level'];
        $_SESSION['id'] = $tampung['id_user'];
        $_SESSION['name'] = $tampung['nm_user'];
        if ($_SESSION['level'] == "admin") {
            echo "<script>
                alert('Anda Berhasil Login !');
                document.location = 'admin/index.php';
                </script>";
        } elseif ($_SESSION['level'] == "user") {
            echo "<script>
                alert('Anda Berhasil Login !');
                document.location = 'index.php';
                </script>";
        }
    } else {
        echo "<script>
            alert('Anda Gagal Login !');
            document.location = 'login.php';
            </script>";
    }
}
?>