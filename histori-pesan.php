<?php
include "config/koneksi.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GOMOVIE | Histori Pesanan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Dmitry Volkov">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <?php
    include "navbar.php";
    ?>
    <section class="section section--bg" data-bg="img/section/section.jpg">
        <div class="container" style="margin-top: 100px;height:100%; color:white">
            <div class="head" style="display: flex;align-items:baseline; margin:10px 0">
                <h1>Pesanan Tiket</h1>
                <img src="img/bahan/movie-tickets.png" alt="" style="width: 50px; margin-left:10px">
            </div>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Film</th>
                        <th scope="col">Nama Studio</th>
                        <th scope="col">Kursi</th>
                        <th scope="col">jadwal</th>
                        <th scope="col">tanggal</th>
                        <th scope="col">Pembayaran</th>
                        <th scope="col">Bukti</th>
                    </tr>
                </thead>
                <?php
                $no = 1;
                $user = $_SESSION['id'];
                $query = mysqli_query($conn, "SELECT * FROM tiket, user, film, studio WHERE tiket.id_user = user.id_user 
                AND tiket.kd_film = film.kd_film AND tiket.kd_studio = studio.kd_studio AND user.id_user = '$user' ORDER BY tiket.kd_tiket DESC");
                if (mysqli_num_rows($query)) {
                    while ($data = mysqli_fetch_array($query)) {
                ?>
                        <tbody>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['nm_film']; ?></td>
                                <td><?= $data['nm_studio']; ?></td>
                                <td><?= $data['kursi']; ?></td>
                                <td><?= $data['jadwal']; ?></td>
                                <td><?= $data['tanggal']; ?></td>
                                <td><img src="img/bahan/<?= $data['pembayaran']; ?>.png" width="80px" height="50px" alt="<?php echo $data['pembayaran'] ?>"></td>
                                <td><img src="img/bukti/<?php echo $data['bukti']; ?>" width="60px" height="80px" alt="<?php echo $data['bukti'] ?>"></td>
                            </tr>

                        </tbody>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="10" align="center">Tidak Ada Data</td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </section>
    <?php
    include "footer.php";
    ?>
</body>

</html>