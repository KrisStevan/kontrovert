<html>
	<?php require "menuUtama.php";?>
	<body>
		<?php require "slideMenu.php";?>
		<!--bagian untuk isinya -->
		<div id="isian">
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
						echo "<center><img src='Images/$gambar' id='gambarDB$id' width=300px height=150px></center>";
						
						//tombol pengatur gambar
						echo "<br><center>";
						echo " <button onclick=\"perkecilGDBVar('gambarDB$id')\"><</button> ";
						echo " <button onclick=\"perbesarGDBVar('gambarDB$id')\">></button> ";
						echo " <button onclick=\"pertinggiGDBVar('gambarDB$id')\">^</button> ";
						echo " <button onclick=\"perendahGDBVar('gambarDB$id')\">v</button> ";
						echo "</center>";
					}while($row=mysqli_fetch_row($hasil));
					echo "<p>Sumber : $sumber</p>";
				}// akhir else
			?>
			</p>
		</div>
	</body>
</html>