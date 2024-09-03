<html>
	<?php require "menuUtama.php";?>
	<body>
		<?php require "slideMenu.php";?>
		<!--bagian untuk isinya -->
		<div id="isian">
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
						echo "<center><img src='Images/$gambar' id='gambarDB' width=900px height=600px></center>";
						
						//tombol pengatur gambar
						echo "<br><center>";
						echo " <button onclick=\"perkecilGDB()\"><</button> ";
						echo " <button onclick=\"perbesarGDB()\">></button> ";
						echo " <button onclick=\"pertinggiGDB()\">^</button> ";
						echo " <button onclick=\"perendahGDB()\">v</button> ";
						echo "</center>";
						
						echo "<p>Sumber : $sumber</p>";
					}while($row=mysqli_fetch_row($hasil));
				}// akhir else
			?>
			</p>
		</div>
	</body>
</html>