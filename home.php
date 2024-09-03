<html>
	<?php require "menuUtama.php";?>
	<body>
		<?php require "slideMenu.php";?>
		<!--bagian kiri atas, untuk tentang (about)-->
		<div id="article">
			<img src="Images/TitleAbout.jpg" width="100%" height="50px">
			<p>
				Kontrovert adalah sebuah laman yang membahas dan menyediakan informasi seputar sains beserta rumus konversi yang berlaku dalam semua bidang kehidupan kita.
			</p>
		</div>
		
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
			<img src="Images/TitleGambar.jpg" width="100%" height="50px">
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
							echo "<img src=\"Images/$gambar\" width=\"500px\" height=\"250px\">";
							echo "<span><center>$keterangan</center></span>";
						}while($row=mysqli_fetch_row($hasil_1));
					}
				?>
			</div>
		</div>
		
		<!--bagian tengah, untuk berita-->
		<div id="scienceNews">
			<img src="Images/TitleNews.jpg" width="100%" height="50px">
			<p>
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
							list($id,$tanggal,$bulan,$tahun,$id_topik,$idJenis,$gambar,$judul,$isi,$sumber) = $row;
							//if(!empty($gambar))
								echo "<img src='Images/$gambar' width=85px height=85px align=left>";
							echo "$tanggal-$bulan-$tahun<br><a href='berita_detail.php?id=$id'>$judul</a><br>";
							$isian = substr($isi,0,120);
							echo "$isian ...<br><br>";
						}while($row=mysqli_fetch_row($hasil_1));
					}
				?>
			</p>
		</div>
		
		<!--bagian kanan, untuk topik science of the day-->
		<div id="scienceOTD" onload="startTime()">
			<img src="Images/TitleOTD.jpg" width="100%" height="50px">
			<h2>
				<center><?php echo date("d F Y");?></center>
			</h2>
			<p>
				<?php
					$i = date("d");
					$j = date("n");
					$sqlstr = "SELECT id,tanggal,bulan,tahun,judul from articles WHERE idJenis='2' AND tanggal = '$i' AND bulan = '$j' order by id DESC";
					$hasil_1=mysqli_query($db, $sqlstr);
					$row=mysqli_fetch_row($hasil_1);
					
					if(!$row)
						echo "Tidak ada yang terjadi pada tahun sebelumnya";
					else{
						do{
							list($id,$tanggal,$bulan,$tahun,$judul) = $row;
							echo "<b>$tahun</b> - $judul<br><br>";
						}while($row=mysqli_fetch_row($hasil_1));
					}
				?>
			</p>
		</div>
	</body>
</html>