<!DOCTYPE html>
<html>
    <head>
		<script src="global-layout.js" defer></script>
		<global-header></global-header>
	</head>
	<body>
        <div class="hero" role="banner">
            <div class="hero-inner search-page">
                <?php
                    include "db.inc.php";
                    connect_db($db);

                    $jml_list = 8;
                    $halaman = isset($_GET['page']) ? (int) $_GET['page'] : 1;
                    $offset = ($halaman - 1) * $jml_list;
                    $src = isset($_GET["src"]) ? trim($_GET["src"]) : '';
                    $safeSrc = htmlspecialchars($src, ENT_QUOTES, 'UTF-8');

                    echo '<section class="search-page-intro">';
                    echo '<h1>Hasil Pencarian "' . $safeSrc . '"</h1>';
                    echo '</section>';

                    if ($src === '') {
                        echo '<div class="search-empty">';
                        echo '<h2>Cari sesuatu dulu, ya!</h2>';
                        echo '<p>Masukkan kata kunci seperti nama hewan, angka, topik, atau kata penting lain di kotak pencarian. Contoh: <strong>suhu</strong>, <strong>energi</strong>, atau <strong>rusa</strong>.</p>';
                        echo '</div>';
                    } 
					else {
                        $escapedSrc = mysqli_real_escape_string($db, $src);
                        $sqlstr = "SELECT * FROM articles WHERE (isi LIKE '%$escapedSrc%') OR (judul LIKE '%$escapedSrc%') OR (sumber LIKE '%$escapedSrc%') ORDER BY tanggal DESC LIMIT $offset,$jml_list";
                        $hasil = mysqli_query($db, $sqlstr);

                        if (!$hasil || mysqli_num_rows($hasil) === 0) {
                            echo '<div class="search-empty">';
                            echo '<h2>Maaf, belum ada hasil.</h2>';
                            echo '<p>Coba kata lain yang lebih singkat atau gunakan bagian dari kata yang kamu cari. Contoh: <strong>euro</strong> atau <strong>konversi</strong>.</p>';
                            echo '</div>';
                        } 
						else {
                            echo '<div class="search-results">';
								while ($baris = mysqli_fetch_assoc($hasil)) {
									$id = $baris['id'];
									$judul = $baris['judul'];
									$isi = $baris['isi'];
									$tanggal = $baris['tanggal'];
									$snippet = '';

									if ($src !== '') {
										$pos = stripos($isi, $src);
										if ($pos !== false) {
											$start = max(0, $pos - 20);
											$snippet = substr($isi, $start, 140);
										} else {
											$snippet = substr($isi, 0, 140);
										}
									} else {
										$snippet = substr($isi, 0, 140);
									}

									$escapedSnippet = htmlspecialchars($snippet, ENT_QUOTES, 'UTF-8');
									$escapedTerm = htmlspecialchars($src, ENT_QUOTES, 'UTF-8');
									if ($escapedTerm !== '') {
										$escapedSnippet = preg_replace('/(' . preg_quote($escapedTerm, '/') . ')/iu', '<span class="search-highlight">$1</span>', $escapedSnippet);
									}

									$formattedDate = date('j M Y', strtotime($tanggal));

									echo '<article class="search-card">';
										echo '<div class="search-meta">';
											echo '<span class="search-card-date">' . htmlspecialchars($formattedDate, ENT_QUOTES, 'UTF-8') . '</span>';
											echo '<span class="search-card-source">Sumber: ' . htmlspecialchars($baris['sumber'], ENT_QUOTES, 'UTF-8') . '</span>';
										echo '</div>';
										echo '<h2>
												<a href="beritaDetail.php?id=' . (int)$id . '">' . htmlspecialchars($judul, ENT_QUOTES, 'UTF-8') . '</a>
											</h2>';
										echo '<p class="search-snippet">... ' . $escapedSnippet . ' ...</p>';
									echo '</article>';
								}
                            echo '</div>';
                        }
                    }
                ?>
            </div>
        </div>

        <footer id="footer" class="site-footer">
            <global-footer></global-footer>
        </footer>
    </body>
</html>