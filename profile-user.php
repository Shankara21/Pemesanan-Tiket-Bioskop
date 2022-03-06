<?php
session_start();
include "config/koneksi.php";
$session = $_SESSION['id'];
$session2 = $_SESSION['name'];
$sql = mysqli_query($conn, "SELECT * FROM user where id_user = '$session'");
$result = mysqli_fetch_array($sql);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Dmitry Volkov">

    <title>GOMOVIE | Profile</title>
</head>

<body>
    <?php
    include "navbar.php";
    ?>
    <section class="section section--bg" data-bg="img/section/section.jpg" style="height: 90vh;">
        <div class="container">
            <div class="profile" style="display: flex;background-color: #212121;">
                <div class="foto" style="text-align: center; color:white; width:30%; margin:auto">
                    <img src="img/foto/<?= $result['foto'] ?>" alt="" height="300px"><br>
                    <h2><?= $result['nm_user'] ?></h2>
                </div>
                <div class="line" style="width: 1px; background-color: white; height:350px;margin:50px 25px">
                </div>
                <div class="edit" style="color: white; width: 70%; margin:20px">
                    <form action="" enctype="multipart/form-data" method="POST">
                        <div class="pack" style="display: flex;">
                            <div class="left" style="margin-right: 20px;">
                                <div class=" sign__group" style="display: none;">
                                    <label for="">ID</label><br>
                                    <input type="text" class="sign__input" placeholder="<?= $result['id_user'] ?>" name="id" value="<?= $result['id_user'] ?>">
                                </div>
                                <div class=" sign__group">
                                    <label for="">Nama Lengkap</label><br>
                                    <input type="text" class="sign__input" placeholder="<?= $result['nm_user'] ?>" name="nama" value="<?= $result['nm_user'] ?>">
                                </div>
                                <div class="sign__group">
                                    <label for="">Username</label><br>
                                    <input type="text" class="sign__input" placeholder="<?= $result['username'] ?>" name="username" value="<?= $result['username'] ?>">
                                </div>
                                <div class="sign__group">
                                    <label for="">Alamat</label><br>
                                    <input type="text" class="sign__input" placeholder="<?= $result['alamat'] ?>" name="alamat" value="<?= $result['alamat'] ?>">
                                </div>
                                <div class="sign__group">
                                    <label for="">Tanggal Lahir</label><br>
                                    <input type="date" class="sign__input" placeholder="<?= $result['tgl_lahir'] ?>" name="tgl" value="<?= $result['tgl_lahir'] ?>">
                                </div>
                            </div>
                            <div class="right">
                                <div class="sign__group">
                                    <label for="">Email</label><br>
                                    <input type="text" class="sign__input" placeholder="<?= $result['email'] ?>" name="email" value="<?= $result['email'] ?>">
                                </div>
                                <div class="sign__group">
                                    <label for="">Nomor telepon</label><br>
                                    <input type="text" class="sign__input" placeholder="<?= $result['no_telp'] ?>" name="no_telp" value="<?= $result['no_telp'] ?>">
                                </div>
                                <div class="sign__group">
                                    <label for="">Foto</label><br>
                                    <input type="file" class="sign__input" placeholder="<?= $result['foto'] ?>" name="foto" value="<?= $result['foto'] ?>" style="padding: 10px;">
                                </div>

                                <button type="submit" class="sign__btn" type="button" name="edit" style="width: 150px;margin-top:50px">Edit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php
    include "footer.php";
    ?>
</body>

</html>
<?php
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $alamat = $_POST['alamat'];
    $tgl = $_POST['tgl'];
    $email = $_POST['email'];
    $no = $_POST['no_telp'];
    $foto = $_FILES['foto']['name'];
    $tmpName = $_FILES['foto']['tmp_name'];
    $folder = "img/foto/";
    move_uploaded_file($tmpName, $folder . $foto);
    $sql = "UPDATE user SET nm_user = '$nama', username = '$username', alamat = '$alamat', tgl_lahir = '$tgl', email = '$email', no_telp = '$no', foto = '$foto' where id_user = '$id'";
    if (mysqli_query($conn, $sql)) {
        echo "
        <script>
        alert('Data berhasil diupdate!');
        document.location= 'profile-user.php';
        </script>
    ";
    } else {
        echo "Data gagal diupdate <br> " . mysqli_error($conn);
    }
}
?>