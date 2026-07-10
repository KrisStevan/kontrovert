<html>
	<head>
		<script src="global-layout.js" defer></script>
		<global-header></global-header>
	</head>
	<body>
		<div class="hero" role="banner">
			<div class="hero-inner">
				<center><h1>Trivia Sains</h1></center>
				<p>
					<?php
						include "db.inc.php";
						connect_db($db);
						$jml_list=20;
						$halaman=isset($_GET['page'])?(int) $_GET['page']:1;
									
						if(!empty($awal)) $awal = 0;
							
						$offset=($halaman-1)*20;
						$sqlstr = "SELECT * from articles WHERE idJenis='4' order by id DESC limit $offset,20";
						$hasil_1=mysqli_query($db, $sqlstr);
						$row=mysqli_fetch_row($hasil_1);
						if(!$row)
							echo "Terjadi Kesalahan pada sistem anda";
						else{
							$i = 1;
							do{
								list($id,$id_topik,$idJenis,$gambar,$judul,$isi,$sumber,$tanggal) = $row;
								echo "$i. $judul - <a href=\"beritaDetail.php?id=$id\">Yang bener?? </a><br>";
								$i+=1;
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