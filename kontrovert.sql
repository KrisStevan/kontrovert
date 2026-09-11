-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Sep 11, 2026 at 03:52 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
  `idTopik` int(10) NOT NULL,
  `idJenis` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `sumber` varchar(100) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `idMateri` int(10) DEFAULT NULL,
  `created_by` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `idTopik`, `idJenis`, `gambar`, `judul`, `isi`, `sumber`, `tanggal`, `idMateri`, `created_by`) VALUES
(1, 2, 4, '', 'Rusa kutub.', 'Rusa kutub memiliki kapiler pada hidungnya. Dengan kamera termal, kalian bisa melihatnya bersinar.', 'asapscience', '2026-09-03', NULL, 'stevan1'),
(2, 2, 4, '', 'Pohon natal palsu', 'Pohon natal palsu terbuat dari PVC yang membuat emisi karbon semakin tinggi dan meningkatkan risiko kanker. Jangan kira lingkungan aman ya.', 'asapscience', '2026-09-03', NULL, 'stevan1'),
(3, 8, 1, 'GW.jpg', 'Ini yang Bikin Eropa Memanas Lebih Cepat dari Dunia!', 'Gelombang panas di Eropa menunjukkan fakta lain yang mencengangkan dunia. Sebab, pemanasan suhu di Benua Biru ini tercatat dua kali lebih cepat dari rata-rata dunia.Seluruh penjuru Eropa mulai melaporkan peningkatan suhu yang cukup ekstrem. Bahkan, Perancis telah mencatatkan jumlah kematian yang meningkat tajam hanya dalam beberapa hari, yang disinyalir terkait gelombang panas.Dua gelombang panas dahsyat yang melanda Benua Eropa sepanjang Mei hingga Juni memecahkan rekor suhu tertinggi di seantero Perancis, Jerman, Spanyol, dan Inggris. Di sejumlah titik wilayah, suhu bahkan melesat hingga menembus angka di atas 40 derajat Celcius.\r\n\r\nLantas, mengapa Eropa mengalami pemanasan begitu cepat?\r\n\r\nSimak selengkapnya dalam video berikut!\r\n\r\nPenulis: Ahmad Naufal DzulfarohPenulis Naskah: Vina Muthi AmbarwatiNarator: Vina Muthi AmbarwatiVideo Editor: Vina Muthi AmbarwatiProduser: Holy Kartika Nurwigati SumartiningtyasSumber video: VIORYMusic: Sandy Guise - The SoundlingsArtikel terkait:https://internasional.kompas.com/read/2026/06/28/120000270/mengapa-eropa-alami-pemanasan-dua-kali-lebih-cepat-dari-dunia?#Global #Bencana #Eropa #GelombangPanas #PerubahanIklim #PemanasanGlobal #SuhuPanas #CuacaPanasEkstrem', 'kompas.com', '2026-07-01', NULL, 'stevan1'),
(4, 7, 1, 'f1.jpg', 'Bagaimana Rasanya Mengemudikan Mobil Balap F1?', 'Karena mobil F1 didesain dengan mesin bertenaga besar dan memiliki berat hanya separuh dari berat mobil biasa, F1 memiliki rasio tenaga dan berat sebesar lebih dari 1400 tenaga kuda per ton, jauh lebih besar daripada mobil Bugatti Veyron yang hanya mencapai 530. Akibatnya, akselerasi mobil F1 menjadi sangat cepat. \r\n\r\nSementara mobil standar butuh waktu rata-rata 10-14 detik untuk mencapai 100 km/jam dari keadaan berhenti sempurna. Karena itu orang yang menyetir mobil F1 akan merasakan dorongan (G-Force) ke belakang sebesar 1,45 G (seperti didorong ke belakang dengan gaya sebesar 1,45 kali berat badannya sendiri) ketika ia mempercepat mobilnya dengan selisih kecepatan 200 km/jam dari kecepatan semula. Perlu diketahui, manusia bisa merasakan dorongan hingga 1 G ketika mobilnya berakselerasi dari 0-100 km per jam dalam waktu tepat 3 detik.\r\n\r\nKetika mobil menikung, orang itu akan terdorong dengan gaya 2,1 G pada kecepatan rendah, tetapi pada kecepatan sedang (kira-kira 210 km/jam), seperti pada tikungan 3 dan 4 di Suzuka, gayanya bisa 3 G. Sedangkan pada tikungan berkecepatan tinggi, seperti di 130R (Suzuka) dan Blanchimont (Spa-Francorchamps), gaya diatas 5 G harus bisa ditahan. \r\n\r\nTercatat gaya dorong terbesar yang pernah dirasakan pembalap F1 ketika menikung adalah 5,5 G ketika melintasi tikungan 8 di Istanbul Park selama 7 detik. Itu pun pada tahun 2005-2011 ketika mobil F1 masih memiliki tenaga mesin tidak sebesar sekarang.\r\n\r\nSementara saat pengereman, pengemudi akan merasakan gaya paling besar 6,3 G ketika mengerem mobil dari kecepatan di atas 300 km/jam. Contohnya seperti yang dialami di sirkuit Meksiko dari kecepatan 370 km/jam sebelum tikungan pertama. Pada tahun 2007, Martin Brundle pernah mengemudikan mobil F1 Williams dan mengatakan bahwa rasanya seperti paru-parunya menempel tulang rusuk dalam. Perlu diketahui, mobil F1 hanya butuh waktu di bawah 4 detik untuk mengerem dari kecepatan 300 km/jam hingga berhenti. \r\n\r\nJika mobil F1 bertabrakan pada kecepatan 150 km/jam, maka pengemudi akan merasakan gaya sebesar 46 G. Seperti yang dialami oleh Carlos Sainz Jr pada saat mengalami tabrakan pada sesi latihan bebas di Rusia tahun 2015. Atau lebih besar lagi 67 G seperti Romain Grosjean di Bahrain pada tahun 2020, cukup untuk menyebabkan mobilnya kebakaran. Untungnya mereka masih baik-baik saja.\r\n\r\nManusia normal umumnya akan pingsan jika merasakan dorongan sebesar 5 G sampai 7 G, tergantung dari kondisi fisik mereka. Sementara pada saat mengalami dorongan lebih dari 10 G selama beberapa menit, akan menyebabkan kematian.', 'blog', '2020-07-04', NULL, 'stevan1'),
(5, 1, 2, '', 'Rupiah terus menurun', 'Rupiah menunjukkan rekor terandahnya sepanjang sejarah', 'semua sumber', '2026-07-09', NULL, 'stevan1'),
(6, 2, 5, 'tree.jpg', 'Apa itu ilmu Ekologi?', '<p>Ekologi adalah cabang ilmu biologi yang mempelajari hubungan timbal balik antara makhluk hidup dan lingkungannya. Istilah ini berasal dari bahasa Yunani oikos (rumah/tempat tinggal) dan logos (ilmu).</p>\r\n<p>Ekologi mengkaji bagaimana organisme bertahan hidup, berinteraksi, dan membentuk keseimbangan alam.</p>\r\n<p>Untuk memahami studi tentang alam ini, ekologi memiliki beberapa tingkatan organisasi dan cabang utama yang sering dipelajari:</p>\r\n<p>1. Tingkatan Organisasi Ekologi</p>\r\n<ul>\r\n<li>Individu: Satu organisme tunggal (misalnya, seekor harimau atau sebatang pohon).</li>\r\n<li>Populasi: Sekumpulan individu dari spesies yang sama di suatu wilayah tertentu (misalnya, sekumpulan rusa).</li>\r\n<li>Komunitas: Kumpulan berbagai populasi yang hidup dan berinteraksi di area yang sama.</li>\r\n<li>Ekosistem: Sistem yang terbentuk dari hubungan timbal balik antara makhluk hidup (komponen biotik) dan lingkungan fisiknya (komponen abiotik).</li>\r\n<li>Biosfer: Seluruh sistem ekologi yang ada di planet Bumi yang mendukung kehidupan.</li>\r\n</ul>\r\n<p>2. Komponen Utama</p>\r\n<ul>\r\n<li>Ekosistem Biotik: Semua komponen makhluk hidup, seperti tumbuhan, hewan, manusia, dan mikroorganisme.</li>\r\n<li>Abiotik: Segala unsur tak hidup di sekitar makhluk hidup, seperti suhu, cahaya matahari, air, udara, dan tanah.</li>\r\n</ul>\r\n<p>3. Cabang Ilmu Ekologi</p>\r\n<ul>\r\n<li>Ekologi Perairan: Mempelajari kehidupan dan ekosistem di air (sungai, danau, laut).</li>\r\n<li>Ekologi Populasi: Mempelajari ukuran, struktur, dan dinamika perubahan populasi.</li>\r\n<li>Ekologi Sosial: Mempelajari interaksi manusia dengan lingkungan sosial dan alam sekitarnya.</li>\r\n<li>Ekologi Perkotaan: Studi tentang bagaimana organisme hidup (termasuk manusia) berinteraksi di dalam lingkungan perkotaan.</li>\r\n</ul>', 'populix', '2026-08-05', 2, 'stevan1'),
(7, 5, 5, 'chem.jpg', 'Materi dan Penyusunnya', 'Materi itu apa sih? Materi pelajaran bukan? Atau materi kekayaan? Kalau materi menurut kimia gimana tuh? Temukan jawabannya di video ini! Video ini video konsep kilat dengan penjelasan cepat. Kalau mau lebih pelan, cek subbab \"Hakikat Ilmu Kimia\" ya!\r\n\r\nKonsep terkait:\r\n\r\nPemisahan Campuran dengan Kristalisasi, Molekul Unsur, Zat Tunggal, Atom (Kimia), Unsur (Kimia), Pemisahan Campuran, Pemisahan Campuran dengan Ekstraksi, Molekul Senyawa, Pemisahan Campuran dengan Filtrasi, Ion (Kimia), Senyawa, Campuran, Molekul (Kimia), Campuran Homogen, Pemisahan Campuran dengan Kromatografi, Campuran Heterogen, Pemisahan Campuran dengan Distilasi,\r\nSifat Materi dan Perubahannya\r\nAir sepanci dan segelas, pasti mendidih di suhu yang sama. Kenapa ya? Padahal yang sepanci lebih banyak. Simak videonya biar lebih ngerti. Ini video konsep kilat. Materi dijelaskan lebih cepat. Kalau mau lebih pelan, cek subbab \"Materi dan Klasifikasinya\".\r\n\r\nKonsep terkait:\r\n\r\nSifat Intensif Zat (Kimia), Perubahan Kimia, Sifat Kimia Materi, Sifat Fisik Materi, Sifat Ekstensif Zat (Kimia), Perubahan Fisika,\r\nWujud Materi\r\nPerubahan wujud padat menjadi gas namanya menyublim atau mengkristal ya? Lalu,kapur barus kalo dibiarin aja kok lama-lama habis? Cari tahu di video konsep kilat ini, materinya dijelasin lebih cepat. Mau lebih pelan, tonton subtopik \"Materi dan Klasifikasinya\".\r\n\r\n', 'ruangguru', '2026-07-14', 10, 'stevan1'),
(8, 5, 5, 'skk.jpg', 'Simbol keselamatan kerja', 'Ketika menggunakan alat-alat laboratorium, peneliti harus memahami aturan dan prosedur yang berlaku karena melakukan kontak langsung dengan bahan-bahan kimia yang dapat memberikan reaksi berbahaya ke tubuh kita.\r\n\r\nBahan-bahan kimia berbahaya tersebut disimpan pada wadah yang sudah diberikan simbol keselamatan kerja sebagai keterangan bahaya dan karakteristik dari bahan kimia tersebut. Simbol ini bertujuan sebagai peringatan dan menjaga peneliti atau siapa saja yang ada di laboratorium untuk tetap aman.\r\n\r\nJadi, selain memperhitungkan sebuah metode ilmiah, seorang peneliti juga harus harus memperhatikan keselamatan kerja ketika sudah berada di laboratorium.', 'ruangguru', '2026-07-21', 12, 'stevan1'),
(9, 2, 5, 'scopeEco.jpg', 'Ruang Lingkup Ekologi', '<p>Untuk memahami lebih lanjut, ruang lingkup ekologi terbagi menjadi beberapa tingkatan, yakni sebagai berikut:</p>\r\n<ol>\r\n<li>Individu <br>Satu makhluk hidup tunggal yang memiliki ciri khas dan kemampuan untuk berkembang biak. Contoh: Seekor burung, Seekor harimau, Sebuah pohon</li>\r\n<li>Populasi <br>Kumpulan individu dari spesies yang sama yang hidup dalam habitat tertentu. Contoh populasi dalam ekologi, misalnya: Populasi ikan di suatu sungai, populasi kaktus di gurun, populasi rusa di hutan hujan tropis</li>\r\n<li>Komunitas <br>Kumpulan berbagai populasi yang hidup bersama dan saling berinteraksi dalam satu tempat. Artinya, di dalam komunitas, ada banyak jenis makhluk hidup yang berbeda, mulai dari tumbuhan, hewan, serangga, hingga mikroorganisme. <br><br>Contohnya, dalam komunitas hutan hujan tropis terdapat berbagai spesies burung, monyet, ular, serangga, dan pohon-pohon besar yang saling berhubungan melalui rantai makanan. <br><br>Nah, di tingkat komunitas ini, ekologi mempelajari hubungan yang lebih kompleks, seperti siapa yang memangsa siapa, siapa yang saling bersaing mencari makanan, dan hubungan simbiosis agar alam tetap seimbang.</li>\r\n<li>Ekosistem <br>Ekosistem adalah gabungan antara makhluk hidup (biotik) dan lingkungan tak hidup (abiotik) yang saling berinteraksi.&nbsp;<br>Kalau satu bagian rusak, ekosistem bisa ikut terganggu. contoh ekosistem laut Contoh ekosistem laut. (Sumber: Kompasiana)</li>\r\n<li>Biosfer <br>Tingkatan paling besar dalam ekologi. Biosfer mencakup seluruh tempat di Bumi yang bisa mendukung kehidupan. Mulai dari daratan, lautan, maupun udara. Di tingkat ini, ekologi mempelajari bagaimana semua ekosistem di dunia saling terhubung dan memengaruhi satu sama lain.</li>\r\n</ol>\r\n<p><strong>Jenis-Jenis Cabang Ilmu Ekologi dan Contohnya&nbsp;</strong></p>\r\n<p>Ilmu Ekologi juga terbagi menjadi beberapa cabang yang dikaitkan dengan disiplin ilmu lainnya, loh. Setiap cabang membahas hubungan makhluk hidup dengan lingkungannya dari sudut pandang yang berbeda.</p>\r\n<p>Supaya lebih mudah dipahami, yuk kita pelajari satu per satu jenis ekologi berikut ini!</p>\r\n<ol>\r\n<li>Ekologi Manusia&nbsp;<br>Ekologi manusia mempelajari hubungan antara manusia dan lingkungannya, baik secara sosial, budaya, maupun ekologis. <br><br>Contoh:<br>- Cara manusia menciptakan sistem pertanian yang ramah lingkungan untuk mempertahankan keberlanjutan sumber daya alam,&nbsp;<br>- Bagaimana manusia mengelola sampah agar tidak mencemari lingkungan, atau bagaimana manusia menghemat energi.&nbsp;<br><br></li>\r\n<li>Ekologi Tumbuhan <br>Ekologi tumbuhan mempelajari hubungan antara tanaman dengan lingkungan tempat tumbuhnya. Setiap tumbuhan memiliki cara khusus untuk bertahan hidup sesuai dengan kondisi alam sekitarnya. <br><br>Contoh:<br>- pohon bakau memiliki akar kuat untuk menahan ombak laut, <br>- Kaktus memiliki batang tebal untuk menyimpan air, dan padi tumbuh subur di daerah yang&nbsp;banyak air. <br><br>Melalui ekologi tumbuhan, kita bisa memahami bagaimana anatomi tanaman menyesuaikan diri dengan lingkungannya.&nbsp;<br><br></li>\r\n<li>Ekologi Hewan&nbsp;<br>Nah, mirip dengan ekologi tumbuhan, ekologi hewan mempelajari tentang hubungan antara hewan dengan lingkungannya serta dengan hewan lain. Di alam, hewan saling berinteraksi melalui berbagai cara, seperti mencari makan, berkembang biak, dan mempertahankan diri. Ilmu ini membantu kita memahami peran setiap hewan dalam menjaga keseimbangan ekosistem.<br><br></li>\r\n<li>Ekologi&nbsp;<br>Ekologi perairan mempelajari kehidupan makhluk hidup di lingkungan air, seperti sungai, danau, laut, dan rawa. Meskipun sama-sama di air, pada dasarnya, setiap tempat memiliki kondisi khusus. Misalnya, kadar garam, suhu, arus air, dan sebagainya. Sehingga, makhluk hidup di dalamnya harus beradaptasi.&nbsp;<br><br></li>\r\n<li>Ekologi Habitat&nbsp;<br>Ekologi habitat mempelajari ciri-ciri tempat tinggal makhluk hidup untuk mendukung kehidupan ekosistem di dalamnya. Setiap habitat memiliki kondisi yang berbeda-beda, seperti suhu, kelembaban, dan jenis tumbuhan. <br>Di habitat hutan hujan, misalnya, banyak hidup burung, harimau, serangga, dan tumbuhan epifit yang saling bergantung satu sama lain.&nbsp;<br><br></li>\r\n<li>Ekologi Populasi&nbsp;<br>Ekologi populasi mempelajari jumlah makhluk hidup dalam suatu kelompok dan faktor yang mempengaruhinya. Ada beberapa faktor yang memengaruhi populasi, di antaranya ketersediaan makanan, penyakit, perburuan, dan perubahan lingkungan. Dengan mempelajari ekologi populasi, kita bisa mengetahui cara melindungi hewan dan tumbuhan yang terancam punah.&nbsp;<br><br></li>\r\n<li>Ekologi Sosial <br>Ekologi sosial membahas hubungan antara manusia, lingkungan, dan kehidupan sosialnya. Ilmu ini akan melihat bagaimana manusia bekerja sama untuk menyesuaikan diri dengan kondisi alam. <br><br>Contohnya, masyarakat pesisir yang hidup dari hasil laut, atau petani yang menanam jenis tanaman berdasarkan musim dan kondisi geografis.<br><br></li>\r\n<li>Ekologi Bahasa <br>Ekologi bahasa mempelajari hubungan antara bahasa dan lingkungan sosial manusia. Contohnya, masyarakat pedalaman memiliki kosakata yang lebih kaya dalam menggambarkan alam sekitar mereka.<br>&nbsp;</li>\r\n<li>Ekologi Antariksa <br>Ekologi antariksa mempelajari kemungkinan kehidupan di luar Bumi dan cara menciptakan lingkungan yang mendukung kehidupan di luar angkasa. Ilmu ini masih terus dikembangkan oleh para ilmuwan. Contohnya adalah penelitian tentang kemungkinan kehidupan di Mars dan bagaimana menciptakan ekosistem buatan di luar angkasa.&nbsp;</li>\r\n</ol>\r\n<p><strong>Piramida Ekologi </strong></p>\r\n<p>Dalam Ilmu Ekologi, ada juga konsep penting yang disebut piramida ekologi. Piramida ekologi biasanya disusun dari bagian paling bawah hingga paling atas, sesuai dengan peran setiap makhluk hidup dalam ekosistem.</p>\r\n<p>Piramida ini menunjukkan aliran energi dan hubungan makan-memakan antarmakhluk hidup dalam suatu ekosistem. Jadi, kita bisa tahu dari mana energi berasal, proses perpindahan energi/aliran energi, dan kenapa populasi makhluk hidup semakin sedikit di tingkat paling atas.&nbsp;</p>\r\n<p>Dalam piramida ekologi, setiap lapisan disebut tingkat trofik, yaitu posisi makhluk hidup dalam rantai makanan.</p>\r\n<p>1. Produsen</p>\r\n<p>Produsen berada di tingkat paling bawah piramida. Produsen merupakan makhluk hidup yang mampu membuat makanan sendiri melalui proses fotosintesis.</p>\r\n<p>Contoh produsen biasanya berupa tumbuhan hijau, alga, dan fitoplankton. Karena menjadi sumber makanan bagi makhluk hidup lain, produsen disebut sebagai dasar kehidupan dalam ekosistem. Tanpa adanya produsen, rantai makanan tidak akan berjalan.&nbsp;</p>\r\n<p>2. Konsumen Primer (Konsumen I)</p>\r\n<p>Konsumen primer atau konsumen tingkat pertama adalah makhluk hidup yang memakan produsen. Contohnya, hewan-hewan pemakan tumbuhan (herbivora), seperti belalang, sapi, kambing, kelinci, rusa, kerbau, dan lain sebagainya. Konsumen primer mendapatkan energi dari tumbuhan yang mereka makan. Energi ini kemudian akan diteruskan ke konsumen tingkat berikutnya.&nbsp;</p>\r\n<p>3. Konsumen Sekunder (Konsumen II)</p>\r\n<p>Konsumen sekunder atau konsumen tingkat kedua adalah hewan yang memakan konsumen primer. Contohnya, hewan-hewan pemakan daging (karnivora) atau hewan pemakan segala (omnivora), seperti katak, ular, burung, serigala, dan lain sebagainya. Pada tingkat ini, energi dari tumbuhan sudah berpindah dua kali, yaitu dari produsen ke herbivora, lalu ke karnivora.&nbsp;</p>\r\n<p>4. Konsumen Tersier (Konsumen III)</p>\r\n<p>Konsumen tersier atau konsumen tingkat ketiga berada di puncak piramida. Konsumen tersier disebut juga sebagai predator puncak, yaitu hewan yang hampir tidak memiliki musuh alami. Contohnya, harimau, elang, singa, dan hiu.</p>\r\n<p>Predator puncak berperan penting dalam menjaga keseimbangan ekosistem. Mereka membantu mengontrol jumlah hewan di bawahnya agar tidak berlebihan. Setiap makhluk hidup menggunakan energi untuk bergerak, bernapas, tumbuh, dan bertahan hidup.</p>\r\n<p>Namun, hanya sekitar 10% energi yang bisa diteruskan ke tingkat berikutnya. Akibatnya, semakin ke atas, semakin sedikit energi yang tersedia untuk mendukung kehidupan. Selain itu, hewan di tingkat atas membutuhkan banyak mangsa untuk memenuhi kebutuhan hidupnya, sehingga tidak mungkin jumlah predator terlalu banyak.</p>\r\n<p>Jika predator terlalu banyak, persediaan makanan akan cepat habis dan keseimbangan ekosistem akan terganggu. Oleh karena itu, alam secara alami mengatur agar jumlah makhluk hidup di tingkat atas piramida tetap sedikit demi menjaga keseimbangan lingkungan.</p>\r\n<p>Manfaat Mempelajari Ilmu Ekologi dalam Kehidupan Memahami ilmu ekologi itu sangat penting, karena bukan cuma soal belajar tentang alam, tapi juga tentang bagaimana manusia bisa hidup selaras dengan lingkungan.</p>\r\n<p>Berikut beberapa manfaat utama dari belajar Ilmu Ekologi:&nbsp;</p>\r\n<ol>\r\n<li>Mengenal Keanekaragaman Hayati&nbsp;</li>\r\n<li>Membantu Mengatasi Masalah Pertanian&nbsp;</li>\r\n<li>Membantu Mengetahui dan Mengatasi Masalah Lingkungan&nbsp;</li>\r\n<li>Meningkatkan Kesadaran akan Pentingnya Menjaga Lingkungan&nbsp;</li>\r\n</ol>', 'ruang guru', '2026-08-06', 2, 'stevan1'),
(10, 1, 5, 'Akuntansi_1785918041.jpg', 'Apa itu Pengantar Akuntansi?', '<p>Pengantar Akuntansi adalah mata kuliah dasar yang memperkenalkan konsep, prinsip, dan proses akuntansi kepada mahasiswa. Materi yang dipelajari mencakup ruang lingkup akuntansi, persamaan dasar akuntansi, pencatatan transaksi, jurnal, buku besar, neraca saldo, hingga penyusunan laporan keuangan. Tujuan utama mata kuliah ini adalah membangun pemahaman tentang siklus akuntansi dan bagaimana informasi keuangan digunakan dalam dunia bisnis.</p>\r\n<p>Dalam praktiknya, mahasiswa akan belajar bahwa akuntansi bukan sekadar kegiatan menghitung angka. Akuntansi merupakan sistem informasi yang membantu berbagai pihak dalam menilai kondisi keuangan suatu organisasi secara objektif dan terukur.</p>\r\n<p>Pada umumnya, mahasiswa&nbsp;<strong>jurusan akuntansi</strong>&nbsp;akan mempelajari beberapa topik berikut:</p>\r\n<ol style=\"list-style-type: decimal;\">\r\n<li><strong>Konsep dan Prinsip Dasar Akuntansi</strong>\r\n<ul style=\"list-style-type: disc;\">\r\n<li>Pengertian akuntansi</li>\r\n<li>Pengguna informasi akuntansi</li>\r\n<li>Standar akuntansi keuangan</li>\r\n</ul>\r\n</li>\r\n<li><strong>Persamaan Dasar Akuntansi</strong>\r\n<ul style=\"list-style-type: disc;\">\r\n<li>Aset</li>\r\n<li>Liabilitas</li>\r\n<li>Ekuitas</li>\r\n</ul>\r\n</li>\r\n<li><strong>Siklus Akuntansi</strong>\r\n<ul style=\"list-style-type: disc;\">\r\n<li>Analisis transaksi</li>\r\n<li>Pencatatan jurnal</li>\r\n<li>Posting ke buku besar</li>\r\n<li>Penyusunan neraca saldo</li>\r\n<li>Penyesuaian dan laporan keuangan</li>\r\n</ul>\r\n</li>\r\n<li><strong>Penyusunan Laporan Keuangan</strong>\r\n<ul style=\"list-style-type: disc;\">\r\n<li>Laporan laba rugi</li>\r\n<li>Laporan perubahan ekuitas</li>\r\n<li>Neraca</li>\r\n<li>Laporan arus kas</li>\r\n</ul>\r\n</li>\r\n</ol>\r\n<p>Akuntansi lebih banyak mengandalkan logika, ketelitian, dan kemampuan analisis dibandingkan perhitungan matematika tingkat tinggi. Operasi hitung yang digunakan umumnya berupa penjumlahan, pengurangan, perkalian, dan pembagian sederhana. Banyak praktisi dan mahasiswa akuntansi juga menekankan bahwa pemahaman konsep jauh lebih penting dibandingkan menghafal rumus.</p>', 'Universitas Alma Ata', '2026-08-05', 11, 'stevan1'),
(11, 6, 5, 'Pseudo_1786006755.JPG', 'Pseudocode', '<p><em>Pseudocode&nbsp;</em>merupakan deskripsi dari suatu algoritma yang diterapkan untuk memrogram komputer dan paling mudah dimengerti oleh bahasa manusia. Tiap statement dala&nbsp;<em>pseudocode&nbsp;</em>ditulis dengan bahasa manusia yang sederhana, dengan baris terpisah untuk setiap perintah.&nbsp;</p>', 'pearson', '2026-08-06', 6, 'stevan1'),
(12, 6, 5, 'C_data_types_1786007066.JPG', 'Tipe Data', '<div>Tipe data merupakan klasifikasi yang menentukan apakah data yang diproses berupa angka, karakter (char atau string), boolean (true/false) atau list (biasanya array). Sedangkan variabel adalah nilai yang akan diproses dan disimpan dalam memori.</div>\r\n<div>&nbsp;</div>\r\n<div>Kode di atas merupakan contoh penggunaan tipe data dan variabel dalam kode bahasa C, dimana tipe data ditulis dengan warna lebih merah, sedangkan yang diberi tanda \"%\" di depannya adalah variabel penyimpan nilai yang akan ditampilkan dengan instruksi printf(). Tipe data yang paling sering muncul dalam program biasanya berupa:</div>\r\n<div>\r\n<ul>\r\n<li>char (karakter dasar, berupa huruf). Beberapa bahasa pemrograman ada yang memakai tipe sejenis seperti varchar, nvarchar dan sebagainya</li>\r\n<li>int (bilangan bulat)</li>\r\n<li>float dan double (bilangan desimal)</li>\r\n<li>void (tanpa nilai yang dikembalikan)</li>\r\n<li>bool (nilai benar atau salah)</li>\r\n<li>date (tanggal)</li>\r\n</ul>\r\n</div>', 'pearson', '2026-08-06', 6, 'stevan1'),
(13, 2, 6, 'Harrier_1786610011.jpeg', 'More Than Birds', '<p><span style=\"color: #000000; font-family: \'times new roman\', times, serif; font-size: 12pt;\">Grup komedi ilmiah, AcapellaScience merilis lagu yang berjudul \"More Than Birds\". Lagu parodi dari \"More Than Words\"-nya Extreme ini menjelaskan bagaimana burung bisa disamakan dengan dinosaurus jika dilihat dari susunan rangkanya.&nbsp;</span></p>\r\n<pre><span style=\"color: #000000; font-family: \'times new roman\', times, serif; font-size: 12pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: pre-wrap; background-color: rgba(255, 255, 255, 0.1); float: none; display: inline !important;\">Pigeons and doves coo </span><br><span style=\"color: #000000; font-family: \'times new roman\', times, serif; font-size: 12pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: pre-wrap; background-color: rgba(255, 255, 255, 0.1); float: none; display: inline !important;\">They\'re not two birds but one from a deeper view </span><br><span style=\"color: #000000; font-family: \'times new roman\', times, serif; font-size: 12pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: pre-wrap; background-color: rgba(255, 255, 255, 0.1); float: none; display: inline !important;\">With life that always holds true </span><br><span style=\"color: #000000; font-family: \'times new roman\', times, serif; font-size: 12pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: pre-wrap; background-color: rgba(255, 255, 255, 0.1); float: none; display: inline !important;\">One descent, but if you only knew <br>How clearly gulls and geese have had their roots revealed <br><br>More than birds <br>The fossils have the clues to make it real <br>By the mid-Jurassic they had warm bodies <br>And hollow airy bones <br><br>What would you do if raptors grew wings and flew?<br>More than birds, the stones reveal Archaeopteryx is real<br>What would you say If I told you birds convey<br>More than eggs and tasty stew They\'re a strain of dino too<br><br>More than birds <br><br>How could life give rise to Cockatoos from such a monstrous plan <br>Selection pressure substitutes their Jumps for glides; to powered flight it tends Adapting or T-Rex\'s feathers and wishbone <br><br>More than birds, by oviraptor\'s breeding can be shown <br>Cause like birds they laid their eggs sequentially <br>and sat on them to grow.<br><br>What would you do if you died while stuck in goo? <br>More than birds in amber sealed <br>Dino plumage is revealed <br>What would you say if our rooks and birds of prey <br>are the ancient kings made new?<br>Cause they\'re avian dinos too</span></pre>', 'youtube', '2026-08-13', 2, 'stevan1'),
(14, 3, 1, '1994_F_PSO_1786627792.jpg', 'Waktu Penyelenggaraan Piala Dunia', '<p>Piala Dunia 2026 digelar di AS, Kanada, dan Meksiko. Dengan selisih perbedaan waktu 11-15 jam Indonesia lebih cepat, pertandingannya ada yang main pagi hari!<br>Piala Dunia 2026 akan digelar pada 11 Juni 19-Juli 2026 waktu setempat. Di Indonesia dengan berpacu pada Waktu Indonesia Bagian Barat (WIB) akan main pada 12 Juni-20 Juli.<br><br>Sebabnya, laga pertama masuk pukul 12 Juni 02.00 WIB dini hari, yakni Meksiko vs Afrika Selatan di Estadio Azteca, Mexico City. Waktu setempat adalah pukul 08.00 malam.</p>\r\n<p>Begitu pula saat final. Tempatnya di MetLife Stadium, New York dengan waktu setempat pada 19 Juli pukul 15.00 waktu setempat, di Jakarta pada pukul 02.00 WIB masuk 20 Juli.<br><br>Babak grup digelar pada 12 Juni sampai 28 Juni. Jam mainnya mulai pukul 02.00 WIB, 04.00 WIB, 05.00 WIB, 06.00 WIB, 06.30 WIB, 07.00 WIB, 08.00 WIB, 09.00 WIB, 10.00 WIB, 11.00 WIB, 23.00 WIB, sampai 00.00 WIB.<br><br>Beberapa laga big match di fase grup seperti Belanda vs Jepang, Inggris vs Kroasia, sampai Norwegia vs Prancis digelar dini hari WIB.<br><br>Masuk babak 32 besar, laga-laganya digelar pada pukul 00.00 WIB, 01.00 WIB 02.00 WIB, 03.30 WIB, 04.00 WIB, 05.00 WIB, 06.00 WIB, 07.00 WIB, sampai 08.30 WIB. Masih ada yang main jam-jam pagi hari.<br><br>Masuk 16 besar, laga-laganya mulai 00.00 WIB sampai 07.00 WIB. Mayoritas dini hari, tapi ada satu laga main main pukul 23.00 WIB.<br><br>Perempatfinal mulai pukul 02.00 WIB sampai 08.00 WIB. Semifinal seluruhnya pukul 02.00 WIB, sementara tempat ketiga pukul 04.00 WIB.</p>', 'detiksport', '2026-08-13', 13, 'stevan1'),
(15, 5, 5, 'Chemistry_TPP_1786628244.jpg', 'Tabel Periodik', '<div class=\"Lyrics__Container-sc-d019c5fa-1 iHiXlq\" data-lyrics-container=\"true\">\r\n<p>And now, ASAP Science presents:<br>The elements of the Periodic Table!</p>\r\n<p>There\'s Hydrogen and Helium<br>Then Lithium, Beryllium<br>Boron, Carbon everywhere<br>Nitrogen all through the air<br>With Oxygen so you can breathe<br>And Fluorine for your pretty teeth<br>Neon to light up the signs<br>Sodium for salty times</p>\r\n<p>Magnesium, Aluminium, Silicon<br>Phosphorus, then Sulfur, Chlorine and Argon<br>Potassium, and Calcium so you\'ll grow strong<br>Scandium, Titanium, Vanadium and Chromium and Manganese</p>\r\n<p>This is the Periodic Table<br>Noble gas is stable<br>Halogens and Alkali react aggressively<br>Each period will see new outer shells<br>While electrons are added moving to the right</p>\r\n<p>Iron is the 26th<br>Then Cobalt, Nickel coins you get<br>Copper, Zinc and Gallium<br>Germanium and Arsenic<br>Selenium and Bromine film<br>While Krypton helps light up your room<br>Rubidium and Strontium then Yttrium, Zirconium</p>\r\n<p>Niobium, Molybdenum, Technetium<br>Ruthenium, Rhodium, Palladium<br>Silver-ware then Cadmium and Indium<br>Tin-cans, Antimony then Tellurium and Iodine and Xenon and then Caesium and</p>\r\n<p>Barium is 56 and this is where the table splits<br>Where Lanthanides have just begun<br>Lanthanum, Cerium and Praseodymium<br>Neodymium\'s next to<br>Promethium, then 62\'s<br>Samarium, Europium, Gadolinium and Terbium<br>Dysprosium, Holmium, Erbium, Thulium<br>Ytterbium, Lutetium</p>\r\n<p>Hafnium, Tantalum, Tungsten then we\'re on to<br>Rhenium, Osmium and Iridium<br>Platinum, Gold to make you rich \'til you grow old<br>Mercury to tell you when it\'s really cold<br>Thallium and Lead then Bismuth for your tummy<br>Polonium, Astatine would not be yummy<br>Radon, Francium will last a little time<br>Radium then Actinides at 89</p>\r\n<p>This is the Periodic Table<br>Noble gas is stable<br>Halogens and Alkali react aggressively<br>Each period will see new outer shells<br>While electrons are to the right</p>\r\n<p>Actinium, Thorium, Protactinium<br>Uranium, Neptunium, Plutonium<br>Americium, Curium, Berkelium<br>Californium, Einsteinium, Fermium<br>Mendelevium, Nobelium, Lawrencium<br>Rutherfordium, Dubnium, Seaborgium<br>Bohrium, Hassium then Meitnerium<br>Darmstadtium, Roentgenium, Copernicium<br>Nihonium, Flerovium<br>Moscovium, Livermorium<br>Tennessine, and Oganesson</p>\r\n<p>And then we\'re done!</p>\r\n</div>', 'asapscience', '2026-08-13', 10, 'stevan1');

-- --------------------------------------------------------

--
-- Table structure for table `formulas`
--

CREATE TABLE `formulas` (
  `id` int(11) NOT NULL,
  `formula_title` varchar(100) NOT NULL,
  `formula_value` varchar(100) NOT NULL,
  `explanation` varchar(10000) NOT NULL,
  `topic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `formulas`
--

INSERT INTO `formulas` (`id`, `formula_title`, `formula_value`, `explanation`, `topic_id`) VALUES
(1, 'Einstein\'s Mass-Energy Equivalence', 'E = mc^2', ' the world\'s most famous equation, introduced by Albert Einstein in 1905. It represents the concept of mass-energy equivalence, meaning that mass and energy are two different forms of the exact same thing.', 4),
(2, 'Newton\'s Law of Universal Gravitation', 'F = G \\frac{m_1 m_2}{r^2}', 'Every particle in the universe attracts every other particle with a force proportional to the product of their masses and inversely proportional to the square of the distance between their centres', 4),
(3, 'Basic Accounting Formula', 'E = A - L', 'The accounting equation is what helps businesses maintain balance, transparency, and reliability when managing their finances. ', 1),
(4, 'Net Profit Formula', 'N = R - AE', 'The net profit is the profit remaining after all expenses, including operating costs, COGs, interest, and taxes, have been subtracted from revenue. If you earned $80,000 in income and had $50,000 in expenses, your net profit is $30,000. ', 1);

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
-- Table structure for table `glossary`
--

CREATE TABLE `glossary` (
  `id` int(10) UNSIGNED NOT NULL,
  `term` varchar(100) NOT NULL,
  `slug` varchar(120) NOT NULL,
  `definition` text NOT NULL,
  `topic` int(1) NOT NULL,
  `related_page` varchar(150) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `glossary`
--

INSERT INTO `glossary` (`id`, `term`, `slug`, `definition`, `topic`, `related_page`, `source`, `created_at`, `updated_at`) VALUES
(1, 'Massa', 'massa', 'Massa adalah jumlah materi yang terdapat dalam suatu benda. Satuan SI untuk massa adalah kilogram (kg).', 4, 'beratKonv.php', NULL, '2026-08-27 09:10:46', '2026-08-27 10:58:43'),
(2, 'Suhu', 'suhu', 'Suhu adalah ukuran derajat panas atau dingin suatu benda. Satuan yang umum digunakan adalah Celsius, Fahrenheit, dan Kelvin.', 4, 'suhuKonv.php', NULL, '2026-08-27 09:10:46', '2026-08-27 10:58:57'),
(3, 'Panjang', 'panjang', 'Panjang adalah ukuran jarak antara dua titik. Satuan SI untuk panjang adalah meter (m).', 4, 'panjangKonv.php', NULL, '2026-08-27 09:10:46', '2026-08-27 11:00:18'),
(4, 'Ekologi', 'ekologi', 'Ekologi adalah ilmu yang mempelajari hubungan antara makhluk hidup dan lingkungannya.', 2, NULL, NULL, '2026-08-27 09:10:46', '2026-08-27 11:00:42'),
(5, 'Atom', 'atom', 'Atom adalah bagian terkecil dari suatu unsur yang masih memiliki sifat unsur tersebut.', 5, NULL, NULL, '2026-08-27 09:10:46', '2026-08-27 10:59:15'),
(6, 'Termokimia', 'Thermochemistry', 'cabang ilmu kimia yang mempelajari energi yang menyertai perubahan fisika atau reaksi kimia', 5, '', 'Jurnal Pendidikan Kimia Undiksha', '2026-08-28 08:49:41', '2026-08-28 08:49:41');

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
(4, 'Trivia'),
(5, 'Materi Sekolah'),
(6, 'Hiburan');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `topics_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `name`, `topics_id`) VALUES
(1, 'Taksonomi', 2),
(2, 'Ekologi', 2),
(3, 'Genetika', 2),
(4, 'Mekanika', 4),
(5, 'Elektronika', 4),
(6, 'Algoritma', 6),
(7, 'Basis Data', 6),
(8, 'Kecerdasan Buatan', 6),
(9, 'Jaringan', 6),
(10, 'Materi', 5),
(11, 'Pengantar Akuntansi', 1),
(12, 'Laboratorium', 5),
(13, 'Zona Waktu', 3);

-- --------------------------------------------------------

--
-- Table structure for table `symbols`
--

CREATE TABLE `symbols` (
  `id` int(11) NOT NULL,
  `symbol` varchar(5) NOT NULL,
  `meaning` varchar(1000) DEFAULT NULL,
  `formula_id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `symbols`
--

INSERT INTO `symbols` (`id`, `symbol`, `meaning`, `formula_id`, `description`) VALUES
(1, 'E', 'energy contained within an object', 1, 'Energy'),
(2, 'm', 'The amount of matter an object contains (its weight/inertia)', 1, 'Mass'),
(3, 'c', 'The speed of light multiplied by itself. Light travels at roughly 300,000 kilometers per second (186', 1, 'Speed of Light'),
(4, 'N', 'The net profit is the profit remaining after all expenses, including operating costs, COGs, interest, and taxes, have been subtracted from revenue. If you earned $80,000 in income and had $50,000 in expenses, your net profit is $30,000. ', 4, 'Net income/profit'),
(5, 'R', 'Total amount of money a business earns by selling goods or services before any expenses are subtracted', 4, 'Revenue'),
(6, 'AE', 'The cost a business incurs and consumes during a specific period to generate revenue and run its operations', 4, 'All Expenses');

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
('I', 'Ilmuwan'),
('K', 'Rumus Konversi'),
('R', 'Rumus');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `namaTopik` varchar(25) NOT NULL,
  `fg_in_news` tinyint(1) NOT NULL,
  `fg_in_materi` tinyint(1) NOT NULL,
  `fg_in_formulas` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `namaTopik`, `fg_in_news`, `fg_in_materi`, `fg_in_formulas`) VALUES
(1, 'Ekonomi', 1, 1, 1),
(2, 'Biologi', 1, 1, 0),
(3, 'Zona Waktu', 1, 0, 0),
(4, 'Fisika', 0, 1, 1),
(5, 'Kimia', 0, 1, 1),
(6, 'Komputer', 0, 1, 0),
(7, 'Teknik Mesin', 0, 1, 1),
(8, 'Geologi dan Geografi', 1, 1, 0),
(9, 'Penerbangan', 1, 0, 1),
(11, 'Sejarah SM', 1, 0, 0),
(12, 'Abad Pertengahan', 1, 0, 0),
(13, 'Tahun 1500-1900', 1, 0, 0),
(14, 'Abad ke-20', 1, 0, 0),
(15, 'Abad 21', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `full_name` varchar(200) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `kode_posisi` int(11) DEFAULT NULL,
  `reputation` int(11) NOT NULL,
  `domicile` varchar(100) DEFAULT NULL,
  `interests` varchar(1000) DEFAULT NULL,
  `num_posts` int(11) NOT NULL,
  `bio` varchar(1000) DEFAULT NULL,
  `profile_photo` varchar(100) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`full_name`, `email`, `username`, `password`, `kode_posisi`, `reputation`, `domicile`, `interests`, `num_posts`, `bio`, `profile_photo`, `id`) VALUES
('Alesia Marty\r\n', 'alemar@yahoo.com', 'alesiamart', '1234', 2, 100, 'konoha', 'teaching', 0, 'I\'m a martyr who would rather die than seeing everyone else as idiots', NULL, 3),
('Mira Marti', 'miram@yahoo.com', 'mira', '1234', 3, 100, 'tatooine', 'diving', 0, 'Man tasyabaha biqoumin fahuwa minhum', NULL, 4),
('Stevan', 'christoforuss@yahoo.com', 'stevan1', '1234', 1, 100, 'wakanda', 'creating, producing, writing', 0, 'manusia bisa berdosa karena kurang pendidikan', '10471509_679527105477276_7283973676337982518_n_1787233686.jpg', 1),
('Le Chanteur', 'tycoonholic@gmail.com', 'stevan2', '1234', 1, 100, 'wakanda', 'writing, creating', 0, 'ooo kevin de bruyne', NULL, 2),
('Temmu Hanshin', 'thans@yahoo.com', 'thansy', '1234', 3, 100, 'San Fransokyo', 'kickboxing', 0, 'Educator, content creator, and lifelong learner. Passionate about making math and science engaging for every learner through clear explanations and fun visuals.', NULL, 5),
('Tom Miller', 'tmill@gmail.com', 'tmilll', '1234', 4, 100, 'narnia', 'delulu', 0, 'olololo dosdsdosd', NULL, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_positions`
--

CREATE TABLE `user_positions` (
  `id` int(11) NOT NULL,
  `kode_posisi` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_positions`
--

INSERT INTO `user_positions` (`id`, `kode_posisi`, `nama`) VALUES
(1, 1, 'Superadmin'),
(2, 2, 'Guru'),
(3, 3, 'Mentor / Senior'),
(4, 4, 'Content Creator non Pengajar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_articles_topics` (`idTopik`),
  ADD KEY `fk_articles_jenis` (`idJenis`),
  ADD KEY `fk_articles_materials` (`idMateri`),
  ADD KEY `fk_articles_users` (`created_by`);

--
-- Indexes for table `formulas`
--
ALTER TABLE `formulas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_formulas_topics` (`topic_id`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_gambars_topics` (`idTopik`),
  ADD KEY `fk_gambars_tempats` (`kodeTempat`);

--
-- Indexes for table `glossary`
--
ALTER TABLE `glossary`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_glossary_slug` (`slug`),
  ADD KEY `glossary_term_index` (`term`),
  ADD KEY `glossary_category_index` (`topic`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_materials_topics` (`topics_id`);

--
-- Indexes for table `symbols`
--
ALTER TABLE `symbols`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempats`
--
ALTER TABLE `tempats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD KEY `fk_users_positions` (`kode_posisi`);

--
-- Indexes for table `user_positions`
--
ALTER TABLE `user_positions`
  ADD PRIMARY KEY (`kode_posisi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `glossary`
--
ALTER TABLE `glossary`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `fk_articles_jenis` FOREIGN KEY (`idJenis`) REFERENCES `jenis` (`id`),
  ADD CONSTRAINT `fk_articles_materials` FOREIGN KEY (`idMateri`) REFERENCES `materials` (`id`),
  ADD CONSTRAINT `fk_articles_topics` FOREIGN KEY (`idTopik`) REFERENCES `topics` (`id`),
  ADD CONSTRAINT `fk_articles_users` FOREIGN KEY (`created_by`) REFERENCES `users` (`username`);

--
-- Constraints for table `formulas`
--
ALTER TABLE `formulas`
  ADD CONSTRAINT `fk_formulas_topics` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`);

--
-- Constraints for table `gambar`
--
ALTER TABLE `gambar`
  ADD CONSTRAINT `fk_gambars_tempats` FOREIGN KEY (`kodeTempat`) REFERENCES `tempats` (`id`),
  ADD CONSTRAINT `fk_gambars_topics` FOREIGN KEY (`idTopik`) REFERENCES `topics` (`id`);

--
-- Constraints for table `glossary`
--
ALTER TABLE `glossary`
  ADD CONSTRAINT `fk_glossary_topics` FOREIGN KEY (`topic`) REFERENCES `topics` (`id`);

--
-- Constraints for table `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `fk_materials_topics` FOREIGN KEY (`topics_id`) REFERENCES `topics` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_positions` FOREIGN KEY (`kode_posisi`) REFERENCES `user_positions` (`kode_posisi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
