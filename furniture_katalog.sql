-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Des 2025 pada 02.09
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furniture_katalog`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Kursi & Sofa'),
(2, 'Meja Makan'),
(3, 'Penyimpanan'),
(4, 'Luar Ruangan'),
(5, 'Dekorasi Kayu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar_utama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id_produk`, `nama_produk`, `id_kategori`, `deskripsi`, `gambar_utama`) VALUES
(1, 'Kursi Lengan Jati Minimalis', 1, 'Hadirkan kenyamanan dan keeleganan dengan Kursi Lengan Jati Minimalis kami. Didesain dengan ergonomis untuk memberikan kenyamanan maksimal saat duduk. Dibuat dari material berkualitas tinggi dengan finishing premium. Cocok untuk melengkapi ruang tamu, ruang kerja, atau area makan Anda. Tersedia dalam berbagai pilihan warna yang dapat disesuaikan dengan interior ruangan Anda.', 'e0a4cf6f174d69a0913bab8e6ff9d227.jpeg'),
(3, 'Meja Makan Bundar Kayu Trembesi', 2, 'Tingkatkan estetika ruangan Anda dengan Meja Makan Bundar Kayu Trembesi yang menawan. Dibuat dengan presisi tinggi dari bahan pilihan untuk memberikan tampilan elegan dan tahan lama. Permukaan yang halus dan kokoh, ideal untuk berbagai keperluan harian. Sentuhan modern yang sempurna untuk ruang kerja, ruang makan, atau ruang tamu Anda.', '50372bc8110fc3bb28f4133743600951.jpeg'),
(4, 'Set Meja & 6 Kursi Modern Oak', 2, 'Hadirkan kenyamanan dan keeleganan dengan Set Meja & 6 Kursi Modern Oak kami. Didesain dengan ergonomis untuk memberikan kenyamanan maksimal saat duduk. Dibuat dari material berkualitas tinggi dengan finishing premium. Cocok untuk melengkapi ruang tamu, ruang kerja, atau area makan Anda. Tersedia dalam berbagai pilihan warna yang dapat disesuaikan dengan interior ruangan Anda.', '48057ce1c9f6d2aa39cb2b0d19a6205d.jpg'),
(5, 'Rak Buku Dinding Jati Tingkat', 3, 'Tampilkan koleksi favorit Anda dengan Rak Buku Dinding Jati 5 Tingkat yang elegan. Desain modern dengan struktur kokoh untuk menampung berbagai barang. Ideal untuk buku, dekorasi, atau koleksi pribadi Anda. Mudah dipasang dan menambah nilai estetika ruangan.', '41a2c42f7c083a2493fc6930b619ce31.jpg'),
(6, 'Lemari Penyimpanan Dapur Serbaguna', 3, 'Maksimalkan penyimpanan Anda dengan Lemari Penyimpanan Dapur Serbaguna yang fungsional dan stylish. Dirancang dengan ruang penyimpanan yang luas dan rak yang dapat disesuaikan. Material premium dengan finishing yang tahan lama dan mudah dibersihkan. Menambah kesan rapi dan terorganisir pada interior rumah Anda.', '4b7b2770859277c09d5648c7f1bea1b8.jpeg'),
(7, 'Kursi Teras Kayu Akasia Lipat', 4, 'Hadirkan kenyamanan dan keeleganan dengan Kursi Teras Kayu Akasia Lipat kami. Didesain dengan ergonomis untuk memberikan kenyamanan maksimal saat duduk. Dibuat dari material berkualitas tinggi dengan finishing premium. Cocok untuk melengkapi ruang tamu, ruang kerja, atau area makan Anda. Tersedia dalam berbagai pilihan warna yang dapat disesuaikan dengan interior ruangan Anda.', '1b72d3e4d4637cd141c3772ead903034.jpeg'),
(8, 'Set Meja Kopi Outdoor Bambu', 4, 'Tingkatkan estetika ruangan Anda dengan Set Meja Kopi Outdoor Bambu yang menawan. Dibuat dengan presisi tinggi dari bahan pilihan untuk memberikan tampilan elegan dan tahan lama. Permukaan yang halus dan kokoh, ideal untuk berbagai keperluan harian. Sentuhan modern yang sempurna untuk ruang kerja, ruang makan, atau ruang tamu Anda.', 'b655f048310cd88b23f9c02f338024b9.jpeg'),
(9, 'Vase Bunga Ukir Kayu Mahoni', 5, 'Lengkapi rumah Anda dengan Vase Bunga Ukir Kayu Mahoni berkualitas premium dari MEBELISA. Dibuat dengan keahlian tukang kayu profesional menggunakan material terbaik. Desain yang timeless dan finishing yang sempurna untuk memberikan kesan mewah pada ruangan Anda. Produk ini menggabungkan fungsionalitas dengan estetika untuk memenuhi kebutuhan hunian modern.', 'dc75752e66bb1fa9a6f9617f348dbe88.jpeg'),
(10, 'Cermin Dinding Kayu Rustic', 5, 'Lengkapi rumah Anda dengan Cermin Dinding Kayu Rustic berkualitas premium dari MEBELISA. Dibuat dengan keahlian tukang kayu profesional menggunakan material terbaik. Desain yang timeless dan finishing yang sempurna untuk memberikan kesan mewah pada ruangan Anda. Produk ini menggabungkan fungsionalitas dengan estetika untuk memenuhi kebutuhan hunian modern.', 'de8d832efc29e153938d2986c8eba4fc.jpg'),
(11, 'Kursi Santai Rotan Alami Bohemian', 1, 'Hadirkan kenyamanan dan keeleganan dengan Kursi Santai Rotan Alami Bohemian kami. Didesain dengan ergonomis untuk memberikan kenyamanan maksimal saat duduk. Dibuat dari material berkualitas tinggi dengan finishing premium. Cocok untuk melengkapi ruang tamu, ruang kerja, atau area makan Anda. Tersedia dalam berbagai pilihan warna yang dapat disesuaikan dengan interior ruangan Anda.', '713272b50dac71ebd5596380e4292c51.jpg'),
(12, 'Bangku Panjang Solid Kayu Suar', 3, 'Lengkapi rumah Anda dengan Bangku Panjang Solid Kayu Suar berkualitas premium dari MEBELISA. Dibuat dengan keahlian tukang kayu profesional menggunakan material terbaik. Desain yang timeless dan finishing yang sempurna untuk memberikan kesan mewah pada ruangan Anda. Produk ini menggabungkan fungsionalitas dengan estetika untuk memenuhi kebutuhan hunian modern.', '9405559f0700e7955316c4c8127ba3f2.jpg'),
(13, 'Meja Kerja Sudut Minimalis', 3, 'Tingkatkan estetika ruangan Anda dengan Meja Kerja Sudut Minimalis yang menawan. Dibuat dengan presisi tinggi dari bahan pilihan untuk memberikan tampilan elegan dan tahan lama. Permukaan yang halus dan kokoh, ideal untuk berbagai keperluan harian. Sentuhan modern yang sempurna untuk ruang kerja, ruang makan, atau ruang tamu Anda.', '2e36cb9b0f160f167708d2dbcf676694.jpg'),
(14, 'Pintu Geser Kayu Pinus', 5, 'Lengkapi rumah Anda dengan Pintu Geser Gudang Kayu Pinus berkualitas premium dari MEBELISA. Dibuat dengan keahlian tukang kayu profesional menggunakan material terbaik. Desain yang timeless dan finishing yang sempurna untuk memberikan kesan mewah pada ruangan Anda. Produk ini menggabungkan fungsionalitas dengan estetika untuk memenuhi kebutuhan hunian modern.', 'bd5cbb71f21d4b7cb376d20bf8984a08.jpg'),
(15, 'Kursi Bar Jati ', 2, 'Hadirkan kenyamanan dan keeleganan dengan Kursi Bar Jati  kami. Didesain dengan ergonomis untuk memberikan kenyamanan maksimal saat duduk. Dibuat dari material berkualitas tinggi dengan finishing premium. Cocok untuk melengkapi ruang tamu, ruang kerja, atau area makan Anda. Tersedia dalam berbagai pilihan warna yang dapat disesuaikan dengan interior ruangan Anda.', '3346eddfb76c262977494881de8b6bbc.jpeg'),
(16, 'Lampu Meja Kayu Ukir', 5, 'Tingkatkan estetika ruangan Anda dengan Lampu Meja Kayu Ukir yang menawan. Dibuat dengan presisi tinggi dari bahan pilihan untuk memberikan tampilan elegan dan tahan lama. Permukaan yang halus dan kokoh, ideal untuk berbagai keperluan harian. Sentuhan modern yang sempurna untuk ruang kerja, ruang makan, atau ruang tamu Anda.', 'b63ae1e9eaa9a257a3a0c44a90b599e2.jpeg'),
(17, 'Daybed Teras Kayu Jati', 4, 'Lengkapi rumah Anda dengan Daybed Teras Kayu Jati berkualitas premium dari MEBELISA. Dibuat dengan keahlian tukang kayu profesional menggunakan material terbaik. Desain yang timeless dan finishing yang sempurna untuk memberikan kesan mewah pada ruangan Anda. Produk ini menggabungkan fungsionalitas dengan estetika untuk memenuhi kebutuhan hunian modern.', '66b4c4677ac80a63d0dab005896142ba.jpeg'),
(18, 'Credenza TV Minimalis Hitam', 3, 'Lengkapi rumah Anda dengan Credenza TV Minimalis Hitam berkualitas premium dari MEBELISA. Dibuat dengan keahlian tukang kayu profesional menggunakan material terbaik. Desain yang timeless dan finishing yang sempurna untuk memberikan kesan mewah pada ruangan Anda. Produk ini menggabungkan fungsionalitas dengan estetika untuk memenuhi kebutuhan hunian modern.', '3bb57504c07c265a8be465fde4b78dc0.jpg'),
(20, 'Meja Makan Kayu Jati', 2, 'Tingkatkan estetika ruangan Anda dengan Meja Makan Kayu Jati yang menawan. Dibuat dengan presisi tinggi dari bahan pilihan untuk memberikan tampilan elegan dan tahan lama. Permukaan yang halus dan kokoh, ideal untuk berbagai keperluan harian. Sentuhan modern yang sempurna untuk ruang kerja, ruang makan, atau ruang tamu Anda.', '3a67512bc7449bb32d45d10fd794731f.jpeg'),
(21, 'Bangku Minimalis Ruang Tamu', 1, 'Hadirkan kenyamanan dan keeleganan dengan Bangku Minimalis Ruang Tamu kami. Didesain dengan ergonomis untuk memberikan kenyamanan maksimal saat duduk. Dibuat dari material berkualitas tinggi dengan finishing premium. Cocok untuk melengkapi ruang tamu, ruang kerja, atau area makan Anda. Tersedia dalam berbagai pilihan warna yang dapat disesuaikan dengan interior ruangan Anda.', '8c7479aaaf8697b49de5fcb789c78883.jpg'),
(22, 'Ambalan Dinding Kayu Jati', 3, 'Lengkapi rumah Anda dengan Ambalan Dinding Kayu Jati berkualitas premium dari MEBELISA. Dibuat dengan keahlian tukang kayu profesional menggunakan material terbaik. Desain yang timeless dan finishing yang sempurna untuk memberikan kesan mewah pada ruangan Anda. Produk ini menggabungkan fungsionalitas dengan estetika untuk memenuhi kebutuhan hunian modern.', 'ambalan_dinding_jati.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', '$2y$10$7/1s9c.rVn5qYj4Vl6iR6.d1W8S1B3R1E0/N4Y5I0V8X2P4G4Q8W8S1B3R1E', 'admin'),
(3, 'admin1', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
(5, 'admin2', 'admin123', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `categories` (`id_kategori`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
