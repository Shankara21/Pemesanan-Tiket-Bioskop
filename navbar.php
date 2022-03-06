<?php
session_start();
include "config/koneksi.php";
error_reporting(0);
?>
<html>

<head>
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
</head>

<body>
    <?php
    if (isset($_SESSION['level'])) {
        if ($_SESSION['level'] == "user") {
            $daftarkategori = mysqli_query($conn, "SELECT * FROM kategori");
    ?>
            <!-- header -->
            <header class="header">
                <div class="header__wrap">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="header__content">
                                    <!-- header logo -->
                                    <a href="index.php" class="header__logo">
                                        <h1>GOMOVIE</h1>
                                    </a>
                                    <!-- end header logo -->

                                    <!-- header nav -->
                                    <ul class="header__nav">
                                        <!-- dropdown -->
                                        <li class="header__nav-item">
                                            <a href="index.php" class="header__nav-link">Home</a>
                                        </li>
                                        <!-- end dropdown -->

                                        <!-- dropdown -->
                                        <li class="header__nav-item">
                                            <a class="dropdown-toggle header__nav-link" href="#" role="button" id="dropdownMenuCatalog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategori</a>

                                            <ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuCatalog">
                                                <?php
                                                foreach ($daftarkategori as $kategori) { ?>
                                                    <a class="dropdown-item" href="index.php?kategori=<?= $kategori['nm_kategori']; ?>"><?= $kategori['nm_kategori']; ?></a>
                                                    <div class="dropdown-divider"></div>
                                                <?php
                                                }
                                                ?>
                                            </ul>
                                        </li>
                                        <!-- end dropdown -->

                                        <li class="header__nav-item">
                                            <a href="histori-pesan.php" class="header__nav-link">Histori Pesan</a>
                                        </li>


                                    </ul>
                                    <!-- end header nav -->

                                    <!-- header auth -->
                                    <div class="header__auth">
                                        <button class="header__search-btn" type="button">
                                            <i class="icon ion-ios-search"></i>
                                        </button>

                                        <a href="profile-user.php" class="header__sign-in">
                                            <i class="icon ion-ios-log-in"></i>
                                            <span><?= $_SESSION['name']; ?></span>
                                        </a>

                                        <a href="logout.php" class="header__sign-in">
                                            <i class="icon ion-ios-log-in"></i>
                                            <span>Log Out</span>
                                        </a>
                                    </div>
                                    <!-- end header auth -->

                                    <!-- header menu btn -->
                                    <button class="header__btn" type="button">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </button>
                                    <!-- end header menu btn -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- header search -->
                <form action="#" class="header__search">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="header__search-content">
                                    <input type="text" placeholder="Search for a movie, TV Series that you are looking for" name="film">

                                    <button type="button">search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- end header search -->
            </header>
            <!-- end header -->
        <?php
        }
    } elseif (!isset($_SESSION['id'])) {
        $daftarkategori = mysqli_query($conn, "SELECT * FROM kategori");
        ?>
        <!-- header -->
        <header class="header">
            <div class="header__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="header__content">
                                <!-- header logo -->
                                <a href="index.html" class="header__logo">
                                    <h1>GOMOVIE</h1>
                                </a>
                                <!-- end header logo -->

                                <!-- header nav -->
                                <ul class="header__nav">
                                    <!-- dropdown -->
                                    <li class="header__nav-item">
                                        <a href="index.php" class="header__nav-link">Home</a>
                                    </li>
                                    <!-- end dropdown -->

                                    <!-- dropdown -->
                                    <li class="header__nav-item">
                                        <a class="dropdown-toggle header__nav-link" href="#" role="button" id="dropdownMenuCatalog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategori</a>

                                        <ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuCatalog">
                                            <?php
                                            foreach ($daftarkategori as $kategori) { ?>
                                                <a class="dropdown-item" href="index.php?kategori=<?= $kategori['nm_kategori']; ?>"><?= $kategori['nm_kategori']; ?></a>
                                                <div class="dropdown-divider"></div>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                    <!-- end dropdown -->


                                </ul>
                                <!-- end header nav -->

                                <!-- header auth -->
                                <div class="header__auth">
                                    <!-- <button class="header__search-btn" type="button">
                                        <i class="icon ion-ios-search"></i>
                                    </button> -->

                                    <a href="login.php" class="header__sign-in">
                                        <i class="icon ion-ios-log-in"></i>
                                        <span>Sign in</span>
                                    </a>

                                    <a href="register.php" class="header__sign-in">
                                        <i class="icon ion-ios-log-in"></i>
                                        <span>Sign up</span>
                                    </a>
                                </div>
                                <!-- end header auth -->

                                <!-- header menu btn -->
                                <button class="header__btn" type="button">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </button>
                                <!-- end header menu btn -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- header search -->
            <form action="#" class="header__search">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="header__search-content">
                                <input type="text" placeholder="Search for a movie, TV Series that you are looking for">

                                <button type="button">search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- end header search -->
        </header>
        <!-- end header -->
    <?php } ?>
</body>

</html>