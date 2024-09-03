-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2024 at 11:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kontrovert`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `id_topik` int(11) NOT NULL,
  `idJenis` int(11) NOT NULL,
  `gambar` varchar(10) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `sumber` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `tanggal`, `bulan`, `tahun`, `id_topik`, `idJenis`, `gambar`, `judul`, `isi`, `sumber`) VALUES
(1, 3, 9, 2024, 6, 4, '', 'Rusa kutub.', 'Rusa kutub memiliki kapiler pada hidungnya. Dengan kamera termal, kalian bisa melihatnya bersinar.', 'asapscience'),
(2, 3, 9, 2024, 8, 4, '', 'Pohon natal palsu', 'Pohon natal palsu terbuat dari PVC yang membuat emisi karbon semakin tinggi dan meningkatkan risiko kanker. Jangan kira lingkungan aman ya.', 'asapscience');

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id` int(11) NOT NULL,
  `tanggal` varchar(15) NOT NULL,
  `kodeTempat` varchar(2) NOT NULL,
  `idTopik` int(11) NOT NULL,
  `gambar` varchar(300) NOT NULL,
  `keterangan` text NOT NULL,
  `sumber` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id`, `tanggal`, `kodeTempat`, `idTopik`, `gambar`, `keterangan`, `sumber`) VALUES
(1, '14 Agustus 2015', 'K', 1, 'Kurs14Agu.jpg', 'Rupiah masih melemah turun, ', 'seputarforex.com'),
(2, '15 Agustus 2015', 'K', 2, 'Berat.jpg', 'Dalam fisika, berat dari suatu benda adalah gaya yang disebabkan oleh gravitasi berkaitan dengan massa benda tersebut. Massa benda adalah tetap di mana-mana, namun berat sebuah benda akan berubah-ubah sesuai dengan besarnya percepatan gravitasi di tempat tersebut.\r\n\r\nDalam penggunaan istilah secara modern, berat dan massa secara mendasar adalah dua kuantitas yang berbeda: massa adalah suatu sifat intrinsik dari materi, sedangkan berat adalah suatu gaya yang merupakan hasil aksi gravitasi pada materi.', 'bestconverter.org'),
(3, '17 Agustus 2015', 'K', 3, 'Panjang.jpg', 'Panjang adalah dimensi suatu benda yang menyatakan jarak antar ujung. Panjang dapat dibagi menjadi tinggi, yaitu jarak vertikal, serta lebar, yaitu jarak dari satu sisi ke sisi yang satu dengan yang lain sisi satu ke sisi yang lain, diukur pada sudut tegak lurus tegak lurus terhadap panjang benda. Dalam ilmu fisika dan teknik, kata \"panjang\" biasanya digunakan secara sinonim dengan \"jarak\", dengan simbol \"l\" atau \"L\" (singkatan dari bahasa Inggris length).\r\n\r\nDalam SI satuan panjang adalah meter(m).Meter adalah satuan panjang internasional yang pertama,yang terbuat dari campuran bahan platina iridium,dan disimpan di The International Bureau Of Weinght and Measure.', 'bestconverter.org'),
(4, '30 Agustus 2024', 'H', 11, 'bc.jpg', 'Sebelum Masehi', ''),
(5, '30 Agustus 2024', 'H', 12, 'abadPencerahan.jpg', 'Abad Pertengahan', ''),
(6, '30 Agustus 2024', 'H', 14, 'abad20.jpg', 'Abad ke 20', ''),
(7, '30 Agustus 2024', 'H', 15, 'GW.jpg', 'Masa Kini', ''),
(8, '30 Agustus 2024', 'K', 6, 'Suhu.JPG', 'Dalam Kamus Besar Bahasa Indonesia (KBBI), suhu diartikan sebagai ukuran kuantitatif dari temperatur, panas atau dingin, dan diukur menggunakan  termometer. Suhu menjadi besaran yang akan menyatakan ukuran derajat dingin dan panas suatu benda. Selain bisa dinyatakan secara kualitatif, suhu juga dapat dinyatakan secara kuantitatif dengan satuan derajat tertentu.\r\n\r\nTri Cahyono (2007) dalam buku Penyehatan Udara menyatakan bahwa suhu adalah keadaan panas dinginnya suatu udara. Daerah tropis memiliki suhu udara yang tertinggi di muka bumi, dan semakin ke kutub, suhu udaranya akan semakin rendah.\r\n\r\nLalu jika berdasarkan datarannya, dataran rendah cenderung memiliki suhu yang lebih tinggi jika dibandingkan dengan dataran tinggi. Semakin tinggi permukaan tanah, maka suhunya juga akan semakin rendah. Seperti suhu dingin yang akan dirasakan menusuk tulang jika sedang berada di gunung.\r\n\r\nKemudian dalam Encyclopedia Britannica juga disebutkan bahwa suhu adalah ukuran panas atau dingin yang dinyatakan dengan skala sembarang. Di mana skala tersebut menunjukkan bahwa suhu panas yang memiliki energi tinggi akan mengalir ke suhu yang lebih rendah atau dingin. Maka dari itu, suhu dapat dinyatakan pula menjadi ukuran kualitatif sebuah benda. Suhu ini bisa diukur karena adanya energi kinetik dalam suatu benda. Jadi, semakin besar energi kinetik suatu benda, suhunya akan semakin tinggi.', ''),
(9, '30 Agustus 2024', 'K', 5, 'waktuJam.JPG', 'Perbedaan waktu merupakan selisih waktu pada dua tempat yang berbeda, sehingga membuat waktu dan kegiatan yang tak sama terjadi di setiap negara.', ''),
(10, '30 Agustus 2024', 'K', 5, 'waktuKalender.JPG', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id` int(11) NOT NULL,
  `namaJenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id`, `namaJenis`) VALUES
(1, 'Berita'),
(2, 'Sejarah'),
(3, 'Sehari Hari'),
(4, 'Trivia');

-- --------------------------------------------------------

--
-- Table structure for table `tempats`
--

CREATE TABLE `tempats` (
  `id` varchar(2) NOT NULL,
  `namaTempat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tempats`
--

INSERT INTO `tempats` (`id`, `namaTempat`) VALUES
('H', 'Home'),
('R', 'Rumus'),
('I', 'Ilmuwan'),
('K', 'Rumus Konversi');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `namaTopik` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `namaTopik`) VALUES
(1, 'Mata Uang'),
(2, 'Berat'),
(3, 'Panjang'),
(4, 'Geometri'),
(5, 'Zona Waktu'),
(6, 'Suhu'),
(7, 'Fisika'),
(8, 'Kimia'),
(9, 'Algoritma'),
(10, 'Bisnis'),
(11, 'Sejarah SM'),
(12, 'Abad Pertengahan'),
(13, 'Tahun 1500-1900'),
(14, 'Abad ke-20'),
(15, 'Abad 21'),
(16, 'Ilmuwan Biologi'),
(17, 'Ilmuwan Fisika'),
(18, 'Ilmuwan Kimia'),
(19, 'Ilmuwan Matematika'),
(20, 'Ilmuwan Komputer');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
