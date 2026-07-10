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
				<center><h1>Waktu</h1></center>
				<p>
					<?php
						include "db.inc.php";
						connect_db($db);
						$sqlstr = "SELECT * from gambar WHERE idTopik = 5 AND kodeTempat = 'K' ORDER BY id";
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
								echo " <button id=\"perkecilGDB$id\" onclick=\"perkecilGDBVar('gambarDB$id')\">←</button> ";
								echo " <button id=\"perbesarGDB$id\" onclick=\"perbesarGDBVar('gambarDB$id')\">→</button> ";
								echo " <button id=\"pertinggiGDB$id\" onclick=\"pertinggiGDBVar('gambarDB$id')\">↑</button> ";
								echo " <button id=\"perendahGDB$id\" onclick=\"perendahGDBVar('gambarDB$id')\">↓</button> ";
								echo "</center>";

								echo "<center><img src='Images/$gambar' id='gambarDB$id' width=300px height=150px></center>";
							}while($row=mysqli_fetch_row($hasil));
							echo "<p>Sumber : $sumber</p>";
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