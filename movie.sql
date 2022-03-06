-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jan 2022 pada 14.32
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `film`
--

CREATE TABLE `film` (
  `kd_film` varchar(255) NOT NULL,
  `nm_film` varchar(255) NOT NULL,
  `ktgr_film` varchar(255) NOT NULL,
  `thn_film` int(100) NOT NULL,
  `director` varchar(255) NOT NULL,
  `cast` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `sinopsis` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `id_jadwal` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_tayang` time NOT NULL,
  `kd_studio` varchar(255) NOT NULL,
  `nm_studio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `film`
--

INSERT INTO `film` (`kd_film`, `nm_film`, `ktgr_film`, `thn_film`, `director`, `cast`, `rate`, `harga`, `sinopsis`, `gambar`, `id_jadwal`, `tanggal`, `jam_tayang`, `kd_studio`, `nm_studio`) VALUES
('KDF-001', 'SPIDER-MAN: NO WAY HOME', 'Action', 2021, 'Jon Watts', 'Zendaya, Tom Holland, Benedict Cumberbatch', '9.5', 50000, 'Pertama kalinya dalam sejarah layar lebar Spider-Man, identitas asli dari pahlawan nan ramah ini terbongkar, sehingga membuat tanggung jawabnya sebagai seorang berkekuatan super berbenturan dengan kehidupan normalnya, dan menempatkan semua orang terdekatnya dalam posisi paling terancam. Saat ia meminta pertolongan dari Doctor Strange untuk mengembalikan identitas rahasianya, mantra yang dipakai menimbulkan lubang dalam dunia mereka, dan menyebabkan kemunculan penjahat-penjahat terkuat yang pernah dilawan Spider-Man dalam dimensi-dimensi lain. Kini, Peter harus mengatasi tantangan yang terberat dalam hidupnya, yang tak hanya akan mengubah masa depannya sendiri, tetapi juga masa depan Multiverse.', 'f82f44e9b38d4bb8869b07af8b0a0e43.jpg', 4, '2021-01-01', '14:00:00', 'STD-002', 'Dolby Atmos'),
('KDF-002', 'THE MATRIX RESSURECTIONS', 'Action', 2021, ' Lana Wachowski', 'Keanu Reeves, Carrie-Anne Moss, Priyanka Chopra', '8.5', 45000, 'Dalam dunia dengan dua realitas—kehidupan sehari-hari dan yang ada di baliknya—Thomas Anderson harus memilih untuk sekali lagi mengikuti kelinci putih. Memilih, sekalipun hanya ilusi, adalah satu-satunya untuk masuk atau keluar Matrix, yang kini lebih kokoh, lebih ketat, dan lebih berbahaya dari yang sebelumnya.', '4aa6bc32f0664a728805aff89bba38c3.jpg', 3, '2021-01-01', '11:00:00', 'STD-003', 'IMAX'),
('KDF-005', 'The Conjuring : The Devil Made Me Do It', 'Horror', 2021, 'James Wan', 'Vera Farmiga, Patrick Wilson, Sarah Catherine Hook', '8.7', 50000, 'Kisah mengerikan tentang teror, pembunuhan, dan kejahatan tak diketahui sebelumnya kisah yang mengejutkan bahkan dialami oleh keluarga Ed dan Lorraine Warren. Salah satu kasus paling sensasional dari arsip penyelidikan mereka, dimulai dengan pertarungan untuk jiwa seorang anak laki-laki, kemudian membawa mereka kepada seuatu yang belum pernah mereka lihat dan alami sebelumnya', 'rQfX2xx8TUoNvyk892yKWNikJaM.jpg', 4, '2021-01-01', '14:00:00', 'STD-001', 'Reguler'),
('KDF-006', 'Jumanji: The Next Level', 'Action, Adventure', 2017, 'Jake Kasdan', 'Dwayne Johnson, Karen Gillan, Kevin Hart, Jack Black', '9.2', 50000, 'Dalam sebuah petualangan Jumanji yang baru, empat anak sekolah menengah menemukan sebuah konsol video game tua dan ditarik ke dalam setting hutan permainan, yang secara harfiah menjadi avatar dewasa yang mereka pilih. Apa yang mereka temukan adalah bahwa Anda tidak hanya bermain Jumanji - Anda harus bisa bertahan. Untuk mengalahkan permainan dan kembali ke dunia nyata, mereka harus menjalani petualangan paling berbahaya dalam hidup mereka, menemukan apa yang Alan Parrish tinggalkan 20 tahun yang lalu, dan mengubah cara mereka memikirkan diri mereka sendiri - atau mereka akan terjebak. dalam permainan selamanya, untuk dimainkan oleh orang lain tanpa henti.', 'jmj.jpg', 4, '2021-01-01', '14:00:00', 'STD-004', 'The Premiere'),
('KDF-009', 'Resident Evil: Welcome to Raccoon City', 'Action, Horror, mystery', 2021, 'Johannes Roberts', 'Kaya Scodelario, Robbie Amell, Hannah John-Kamen, Neal McDonough, Tom Hopper, Avan Jogia, Avaah Blackwell, Donal Logue, Stephannie Hawkins, Lily Gao', '9.0', 50000, 'Berlatar tahun 1998, kisah asal ini akan mengungkap rahasia Spencer Mansion yang misterius dan Raccoon City yang bernasib tragis.', '163826916549493_287x421.jpg', 3, '2021-01-01', '11:00:00', 'STD-001', 'Reguler');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_tayang` time NOT NULL,
  `jam_berakhir` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `tanggal`, `jam_tayang`, `jam_berakhir`) VALUES
(3, '2021-01-01', '11:00:00', '13:00:00'),
(4, '2021-01-01', '14:00:00', '16:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(100) NOT NULL,
  `nm_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nm_kategori`) VALUES
(1, 'Action'),
(2, 'Comedy'),
(3, 'Romance'),
(4, 'Horror'),
(5, 'Adventure'),
(6, 'mystery');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kursi`
--

CREATE TABLE `kursi` (
  `kd_kursi` int(100) NOT NULL,
  `kursi` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kursi`
--

INSERT INTO `kursi` (`kd_kursi`, `kursi`, `status`) VALUES
(1, 'A1', 0),
(2, 'A2', 0),
(3, 'A3', 0),
(4, 'A4', 0),
(5, 'A5', 0),
(6, 'A6', 0),
(7, 'A7', 0),
(8, 'A8', 0),
(9, 'B1', 0),
(10, 'B2', 0),
(11, 'B3', 0),
(12, 'B4', 0),
(13, 'B5', 0),
(14, 'B6', 0),
(15, 'B7', 0),
(16, 'B8', 0),
(17, 'C1', 0),
(18, 'C2', 0),
(19, 'C3', 0),
(20, 'C4', 0),
(21, 'C5', 0),
(22, 'C6', 0),
(23, 'C7', 0),
(24, 'C8', 0),
(25, 'D1', 0),
(26, 'D2', 0),
(27, 'D3', 0),
(28, 'D4', 0),
(29, 'D5', 0),
(30, 'D6', 0),
(31, 'D7', 0),
(32, 'D8', 0),
(33, 'E1', 0),
(34, 'E2', 0),
(35, 'E3', 0),
(36, 'E4', 0),
(37, 'E5', 0),
(38, 'E6', 0),
(39, 'E7', 0),
(40, 'E8', 0),
(41, 'F1', 0),
(42, 'F2', 0),
(43, 'F3', 0),
(44, 'F4', 0),
(45, 'F5', 0),
(46, 'F6', 0),
(47, 'F7', 0),
(48, 'F8', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_tiket`
--

CREATE TABLE `stok_tiket` (
  `kd_tambahtiket` varchar(255) NOT NULL,
  `id_user` int(100) NOT NULL,
  `kd_tiket` varchar(255) NOT NULL,
  `tgl_tambah` varchar(255) NOT NULL,
  `jml_tambah` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Trigger `stok_tiket`
--
DELIMITER $$
CREATE TRIGGER `tambah_tiket` AFTER INSERT ON `stok_tiket` FOR EACH ROW BEGIN
	UPDATE tiket SET stok = stok + new.jml_tambah WHERE tiket.kd_tiket = new.kd_tiket;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `studio`
--

CREATE TABLE `studio` (
  `kd_studio` varchar(255) NOT NULL,
  `nm_studio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `studio`
--

INSERT INTO `studio` (`kd_studio`, `nm_studio`) VALUES
('STD-001', 'Reguler'),
('STD-002', 'Dolby Atmos'),
('STD-003', 'IMAX'),
('STD-004', 'The Premiere');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket`
--

CREATE TABLE `tiket` (
  `kd_tiket` varchar(255) NOT NULL,
  `id_user` int(100) NOT NULL,
  `kd_film` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kd_studio` varchar(255) NOT NULL,
  `kursi` varchar(255) NOT NULL,
  `jadwal` time NOT NULL,
  `nm_studio` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(100) NOT NULL,
  `pembayaran` varchar(255) NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tiket`
--

INSERT INTO `tiket` (`kd_tiket`, `id_user`, `kd_film`, `judul`, `kd_studio`, `kursi`, `jadwal`, `nm_studio`, `tanggal`, `total`, `pembayaran`, `bukti`) VALUES
('TKT-001', 2, 'KDF-001', '', 'STD-002', 'F3, F4, F5, F6', '14:00:00', 'Dolby Atmos', '2021-01-01', 200000, 'Shopeepay', 'download.jpg'),
('TKT-002', 2, 'KDF-005', '', 'STD-001', 'A1, A2', '14:00:00', 'Reguler', '2021-01-01', 100000, 'Gopay', 'rtaImage.png'),
('TKT-003', 2, 'KDF-001', '', 'STD-002', 'C8, D8', '14:00:00', 'Dolby Atmos', '2021-01-01', 0, '', ''),
('TKT-004', 2, 'KDF-001', 'SPIDER-MAN: NO WAY HOME', 'STD-002', 'A1, A2', '14:00:00', 'Dolby Atmos', '2021-01-01', 0, '', ''),
('TKT-005', 2, 'KDF-002', 'THE MATRIX RESSURECTIONS', 'STD-003', 'B5, B6', '11:00:00', 'IMAX', '2021-01-01', 90000, 'BCA', 'rtaImage.png'),
('TKT-006', 2, 'KDF-006', 'Jumanji: The Next Level', 'STD-004', 'B7, B8', '14:00:00', 'The Premiere', '2021-01-01', 100000, 'BRI', 'rtaImage.png'),
('TKT-007', 2, 'KDF-001', 'SPIDER-MAN: NO WAY HOME', 'STD-002', 'C3, C4, D1, D2', '14:00:00', 'Dolby Atmos', '2021-01-01', 200000, 'Gopay', 'rtaImage.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(100) NOT NULL,
  `nm_user` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nm_user`, `jenis_kelamin`, `alamat`, `tgl_lahir`, `email`, `no_telp`, `username`, `foto`, `password`, `level`) VALUES
(1, 'admin', 'Laki-Laki', 'arab', '2021-12-01', 'admin@admin.com', 987654321, 'admin', 'programmer.png', '123', 'admin'),
(2, 'user', 'Laki-Laki', 'jakarta', '2021-12-21', 'user@user.com', 1122334455, 'user', 'programmer.png', '123', 'user'),
(3, 'tes', 'Laki-Laki', 'Spanyol', '2022-01-14', 'tes@gmail.com', 123, 'tes', '', '123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`kd_film`),
  ADD KEY `kd_studio` (`kd_studio`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kursi`
--
ALTER TABLE `kursi`
  ADD PRIMARY KEY (`kd_kursi`);

--
-- Indeks untuk tabel `stok_tiket`
--
ALTER TABLE `stok_tiket`
  ADD PRIMARY KEY (`kd_tambahtiket`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `kd_tiket` (`kd_tiket`);

--
-- Indeks untuk tabel `studio`
--
ALTER TABLE `studio`
  ADD PRIMARY KEY (`kd_studio`);

--
-- Indeks untuk tabel `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`kd_tiket`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `kd_film` (`kd_film`),
  ADD KEY `kd_studio` (`kd_studio`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kursi`
--
ALTER TABLE `kursi`
  MODIFY `kd_kursi` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `film_ibfk_1` FOREIGN KEY (`kd_studio`) REFERENCES `studio` (`kd_studio`),
  ADD CONSTRAINT `film_ibfk_2` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`);

--
-- Ketidakleluasaan untuk tabel `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `tiket_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `tiket_ibfk_2` FOREIGN KEY (`kd_film`) REFERENCES `film` (`kd_film`),
  ADD CONSTRAINT `tiket_ibfk_4` FOREIGN KEY (`kd_studio`) REFERENCES `studio` (`kd_studio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
