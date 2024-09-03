<html>
	<?php require "menuUtama.php";?>
	<body>
		<?php require "slideMenu.php";?>
		<div id="isian">
			<center><h1></h1></center>
			<p>
				<?php
					include "db.inc.php";
					connect_db($db);
					$halaman=isset($_GET['page'])?(int) $_GET['page']:1;
					if(!empty($awal)) $awal = 0;
					
					$offset=($halaman-1)*2000;
					
					$id = $_GET["id"];
					
					$sqlstr = "SELECT * FROM articles WHERE id='$id'";
					$hasil=mysqli_query($db, $sqlstr);
					$baris=mysqli_fetch_row($hasil);
						
					if(!$baris){
						die("Terjadi Kesalahan Sistem");
						die(mysqli_error);
					}
					
					do{
						list($id,$tanggal,$bulan,$tahun,$id_topik,$idJenis,$gambar,$judul,$isi,$sumber) = $baris;
						echo "<table width=100% border=0 cellpadding=0 cellspacing=0><tr><td>";
						echo "<h1><b><center>$judul</center></b></h1>";
						$isian = substr($isi,$offset,2000);
						echo "<div align='justify'>$isian<br><br>";
						echo "Yang bilang = ".$sumber;
						echo "</div>";
						echo "</td></tr></table>";
					}while($baris=mysqli_fetch_row($hasil));
						
					/*
					//paginasi halaman
					$jumlahKalimat = strlen($isi);
					$i = $jumlahKalimat/2000;
					$i=ceil($i);
						
					echo "<p><center>Halaman ";
					for($j=1;$j<=$i;$j++)
					{
						$awal = (($j-1)*4+$j)-1;
						echo "[<a href='berita_detail.php?id=$id&awal=$awal&page=$j'>$j</a>]";
					}
					*/
					echo "</center></p>";
					echo "<p><a href=\"trivia.php\">Kembali ke Menu</a></p>";
				?>
			</p>
		</div>
	</body>
</html>