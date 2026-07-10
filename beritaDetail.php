<!DOCTYPE html>
<html>
	<head>
		<script src="global-layout.js" defer></script>
		<global-header></global-header>
		<style>
			.article { max-width:980px; margin:0 auto; padding:20px; }
			.article .title { text-align:center; margin-bottom:10px; }
			.article .meta { text-align:center; color:#333; margin-bottom:18px; }
			.article-content { overflow:hidden; }
			.article-image { float:left; margin-right:18px; width:200px; }
			.article-image img{ display:block; width:100%; height:auto; }
			.article-body { text-align:justify; line-height:1.6; }
			@media (max-width:600px){ .article-image{ float:none; margin:0 0 12px 0; width:100%; } }
		</style>
	</head>
	<body>
		<div class="hero" role="banner">
			<div class="hero-inner">
				<?php
					include "db.inc.php";
					connect_db($db);

					$halaman = isset($_GET['page']) ? (int) $_GET['page'] : 1;
					$offset = ($halaman - 1) * 2000;
					$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

					$sqlstr = "SELECT * FROM articles WHERE id='$id'";
					$hasil = mysqli_query($db, $sqlstr);
					$baris = mysqli_fetch_assoc($hasil);

					if(!$baris){
						echo "<div class='article'><p>Berita tidak tersedia</p></div>";
					} 
					else {
						$judul = htmlspecialchars($baris['judul'], ENT_QUOTES, 'UTF-8');
						$tanggal = date_format(date_create($baris['tanggal']), "d-M-Y");
						$isi = nl2br(htmlspecialchars($baris['isi'], ENT_QUOTES, 'UTF-8'));
						$gambar = $baris['gambar'];

						echo "<article class='article'>";
						echo "<div class='title'><h3>$judul</h3></div>";
						echo "<div class='meta'><p><strong>Tanggal:</strong> $tanggal</p></div>";
						echo "<div class='article-content'>";
						if (!empty($gambar)) {
							$img = htmlspecialchars($gambar, ENT_QUOTES, 'UTF-8');
							echo "<div class='article-image'><img src='Images/".$img."' alt=''></div>";
						}
						echo "<div class='article-body'>$isi</div>";

						if (!empty($baris['sumber'])) {
							$sumber = htmlspecialchars($baris['sumber'], ENT_QUOTES, 'UTF-8');
							echo "<div class='article-source'><p><strong>Sumber:</strong> $sumber</p></div>";
						}
						echo "</div></article>";
					}
					
				?>
			</div>
		</div>
		
		<footer id="footer" class="site-footer">
			<global-footer></global-footer>
		</footer>
	</body>
</html>