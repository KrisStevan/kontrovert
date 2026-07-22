<html>
	<head>
		<script src="global-layout.js" defer></script>
		<global-header></global-header>
	</head>
	<body>
		<!--bagian untuk isinya -->
		<div class="hero" role="banner">
			<div class="hero-inner">
				<center><h1 class="page-title">Suhu</h1></center>
				<p>
				<?php
					include "db.inc.php";
					connect_db($db);
					$sqlstr = "SELECT * from gambar WHERE idTopik = 6 AND kodeTempat = 'K' ORDER BY id DESC limit 1";
					$hasil=mysqli_query($db, $sqlstr);
					$row=mysqli_fetch_row($hasil);
					if(!$row)
						echo "Data Tidak Dapat Ditampilkan";
					else{
						do{
							list($id,$tanggal,$kodeTempat,$idTopik,$gambar,$keterangan,$sumber) = $row;
				?>
				</p>
				<p>
							<script src="myscripts.js"></script>
							<center>
								<button id="perkecilGNDB" onclick="perkecilGNDB()">←</button>
								<button id="perbesarGNDB" onclick="perbesarGNDB()">→</button>
								<button id="pertinggiGNDB" onclick="pertinggiGNDB()">↑</button>
								<button id="perendahGNDB" onclick="perendahGNDB()">↓</button>
								<br>
								<img src='Images/titikSuhu.jpg' id='gambarNonDB' width='300px' height='100px'>
							</center>
				<?php
							echo "<p>$keterangan</p>";

							//tombol pengatur gambar
							echo "<center>";
								echo " <button id=\"perkecilGDB\" onclick=\"perkecilGDB()\">←</button> ";
								echo " <button id=\"perbesarGDB\" onclick=\"perbesarGDB()\">→</button> ";
								echo " <button id=\"pertinggiGDB\" onclick=\"pertinggiGDB()\">↑</button> ";
								echo " <button id=\"perendahGDB\" onclick=\"perendahGDB()\">↓</button> ";
							echo "</center>";

							//gambar
							echo "<center><img src='Images/$gambar' id='gambarDB' width=300px height=100px></center>";
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