<html>
	<head>
		<script src="global-layout.js" defer></script>
		<global-header></global-header>
	</head>
	<body>
		<!--bagian untuk isinya -->
		<div class="hero" role="banner">
			<div class="hero-inner">
				<center><h1 class="page-title">Berita Sains</h1></center>
				<?php
					include "db.inc.php";
					connect_db($db);

					$jml_list=10;
					$halaman=isset($_GET['page'])?(int) $_GET['page']:1;
								
					if(!empty($awal)) $awal = 0;
						
					$offset=($halaman-1)*10;

					$sqlstr = "SELECT id, judul, tanggal, isi, gambar, sumber
								from articles WHERE idJenis='1' order by id DESC limit $offset,4";
					$hasil=mysqli_query($db, $sqlstr);
					$row=mysqli_fetch_row($hasil);

					if(!$row)
						echo "Belum ada berita yang tersedia";
					else{
						do{
							list($id,$judul,$tanggal,$isi,$gambar,$sumber) = $row;
							echo "<div class='hero-detail'>";
								echo "<img src='Images/$gambar' width=70px height=70px align=left>";
								echo "<div class='news-text'>";
									echo date_format(date_create($tanggal), "d F Y") . "";
									echo "<a href='beritaDetail.php?id=$id' target='_blank'>$judul</a>";
									$isian = substr($isi,0,100);
									echo "$isian ...";
								echo "</div>";
							echo "</div>";
						} while($row=mysqli_fetch_row($hasil));
					}
				?>
			</div>
		</div>

		<footer id="footer" class="site-footer">
			<global-footer></global-footer>
		</footer>
	</body>
</html>