<html>
	<head>
		<script src="global-layout.js" defer></script>
		<global-header></global-header>
	</head>
	<body>
		<script src="myscripts.js"></script>
		
		<!--bagian untuk isinya -->
		<div class="hero" role="banner">
			<div class="hero-inner">
				<center><h1>Berat dan Massa</h1></center>
				<p>
					<?php
						include "db.inc.php";
						connect_db($db);
						$sqlstr = "SELECT * from gambar WHERE idTopik = 2 AND kodeTempat = 'K' ORDER BY id DESC limit 1";
						$hasil=mysqli_query($db, $sqlstr);
						$row=mysqli_fetch_row($hasil);
						if(!$row)
							echo "Data Tidak Dapat Ditampilkan";
						else{
							do{
								list($id,$tanggal,$kodeTempat,$idTopik,$gambar,$keterangan,$sumber) = $row;
								echo "<p>$keterangan</p>";
								
								//tombol pengatur gambar
								echo "<br><center>";
								echo " <button id=\"perkecilGDB\" onclick=\"perkecilGDB()\">←</button> ";
								echo " <button id=\"perbesarGDB\" onclick=\"perbesarGDB()\">→</button> ";
								echo " <button id=\"pertinggiGDB\" onclick=\"pertinggiGDB()\">↑</button> ";
								echo " <button id=\"perendahGDB\" onclick=\"perendahGDB()\">↓</button> ";
								echo "</center>";

								echo "<center><img src='Images/$gambar' id='gambarDB' width=300px height=200px></center>";
								
								echo "<p>Sumber : $sumber</p>";
							}while($row=mysqli_fetch_row($hasil));
						}// akhir else
					?>
				</p>
			</div>
		</div>

		<footer id="footer" class="site-footer">
			<global-footer></global-footer>
		</footer>
	</body>
</html>