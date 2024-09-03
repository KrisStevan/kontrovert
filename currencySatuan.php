<html>
	<?php require "menuUtama.php";?>
	<body>
		<?php require "slideMenu.php";?>
		<!--bagian untuk isinya -->
		<div id="isian">
			<center><h1>Daftar Kurs Mata Uang Asing </h1></center>
			<?php
				include "showSatuan.php";
				//showDetail(1,'K');
				//showDetail();
				
				include "db.inc.php";
				connect_db($db);
				$sqlstr = "SELECT * from gambar WHERE idTopik = 1 AND kodeTempat = 'K' ORDER BY id DESC limit 1";
				$hasil=mysqli_query($db, $sqlstr);
				$row=mysqli_fetch_row($hasil);
				if(!$row)
					echo "Data Tidak Dapat Ditampilkan";
				else{
					do{
						list($id,$tanggal,$kodeTempat,$idTopik,$gambar,$keterangan,$sumber) = $row;
						echo "<p>$keterangan</p>";
						echo "<center><img src='Images/$gambar' id='gambarDB' width=600px height=400px></center>";
						
						//tombol pengatur gambar
						echo "<br><center>";
						echo " <button onclick=\"perkecilGDB()\"><</button> ";
						echo " <button onclick=\"perbesarGDB()\">></button> ";
						echo " <button onclick=\"pertinggiGDB()\">^</button> ";
						echo " <button onclick=\"perendahGDB()\">v</button> ";
						echo "</center>";
						
						echo "<p>Sumber : $sumber</p>";
						echo "<p>Terhitung Tanggal = $tanggal</p>";
					}while($row=mysqli_fetch_row($hasil));
				}// akhir else
				
			?>
		</div>
	</body>
</html>