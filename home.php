<!DOCTYPE html>
<html>
	<head>
		<script src="global-layout.js" defer></script>
		<global-header></global-header>
		<link rel="stylesheet" href="CMS/buttons.css">
	</head>
	<body>
		<div class="hero" role="banner">
			<div class="hero-inner">
				<h2>Explore Science &amp; Conversions</h2>
				<p>Quick converters, clear formulas, and bite-sized science for curious students.</p>
				<div class="hero-cta">
					<a class="btn-student" href="currencyKonv.php">Start Converting</a>
				</div>
			</div>
		</div>
		<!--bagian kiri atas, untuk tentang (about)-->

		<!--bagian kiri bawah, untuk gambar-->
		<script type="text/javascript" src="jquery-1.7.1.js"></script>
		<script type="text/javascript" src="coin-slider.js"></script>
		<link rel="stylesheet" href="coin-slider-styles.css">
		<script type="text/javascript" type="text/javascript">
			$(document).ready(function(){
				$("#coin-slider").coinslider()
			});
		</script>

		<div id="gambar">
			<div id="coin-slider">
				<?php
					include "db.inc.php";
					connect_db($db);
					
					$sqlstr = "SELECT * from gambar WHERE kodeTempat='H' order by id DESC limit 10";
					$hasil_1=mysqli_query($db, $sqlstr);
					$row=mysqli_fetch_row($hasil_1);
					if(!$row)
						echo "Terjadi Kesalahan pada sistem anda";
					else{
						do{
							list($id,$tanggal,$kodeTempat,$idTopik,$gambar,$keterangan,$sumber) = $row;
							echo "<img src=\"Images/$gambar\" width=\"100%\" height=\"400px\">";
							echo "<span><center>$keterangan</center></span>";
						}while($row=mysqli_fetch_row($hasil_1));
					}
				?>
			</div>
		</div>
		
		<!--bagian tengah, untuk berita-->
		<div id="newsAndOTD">
			<div id="scienceNews">
				<img src="Images/TitleNews.jpg" width="100%" height="50px" id="title">
				<?php
					$jml_list=4;
					$halaman=isset($_GET['page'])?(int) $_GET['page']:1;
								
					if(!empty($awal)) $awal = 0;
						
					$offset=($halaman-1)*4;
					$sqlstr = "SELECT * from articles WHERE idJenis='1' order by id DESC limit $offset,4";
					$hasil_1=mysqli_query($db, $sqlstr);
					$row=mysqli_fetch_row($hasil_1);
					if(!$row)
						echo "Tidak ada berita terbaru saat ini<br>";
					else
					{
						do{
							list($id,$idTopik,$idJenis,$gambar,$judul,$isi,$sumber,$tanggal) = $row;
							echo "<p>";
							echo "<img src='Images/$gambar' width=50px height=50px align=left>";
							echo date_format(date_create($tanggal), "d F Y") . "<br>";
							echo "<a href='beritaDetail.php?id=$id' target='_blank'>$judul</a>
									<br>";
							$isian = substr($isi,0,120);
							echo "$isian ...<br>";
							echo "</p>";
						}while($row=mysqli_fetch_row($hasil_1));
					}
				?>
			</div>
			
			<!--bagian kanan, untuk topik science of the day-->
			<div id="scienceOTD" onload="startTime()">
				<img src="Images/TitleOTD.jpg" width="100%" height="50px">
				<h2>
					<center><?php echo date("d F Y");?></center>
				</h2>
				<p>
					<?php
						$i = date("Y-m-d"); //tanggal hari ini, format = YYYY-MM-DD
						$tahun = date("Y");

						$sqlstr = "SELECT id,tanggal,judul from articles WHERE idJenis='2' AND tanggal = '$i' order by id DESC";
						$hasil_1=mysqli_query($db, $sqlstr);
						$row=mysqli_fetch_row($hasil_1);
						
						if(!$row)
							echo "Tidak ada yang terjadi pada tahun sebelumnya";
						else{
							do{
								list($id,$tanggal,$judul) = $row;
								echo "<b>$tahun</b> - $judul<br><br>";
							}while($row=mysqli_fetch_row($hasil_1));
						}
					?>
				</p>
			</div>
		</div>
		
		<footer id="footer" class="site-footer">
			<global-footer></global-footer>
		</footer>
	</body>
</html>