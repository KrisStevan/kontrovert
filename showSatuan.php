<?php
	function showDetail($topik,$tempat){
		require "db.inc.php";
		connect_db();
		$sqlstr = "SELECT * FROM `kontrovert`.`gambar` WHERE idTopik = $topik AND kodeTempat = '$tempat' ORDER BY id DESC limit 1";
		//$sqlstr = "SELECT * FROM `kontrovert`.`gambar` WHERE idTopik = 1 AND kodeTempat = 'K' ORDER BY id DESC limit 1";
		//echo $sqlstr ."<br>";
		$hasil=mysqli_query($sqlstr) or die (mysql_error());
		$row=mysqli_fetch_row($hasil);
		if(!$row)
			echo "<p>Data Tidak Dapat Ditampilkan</p>";
		else{
			do{
				list($id,$tanggal,$kodeTempat,$idTopik,$gambar,$keterangan,$sumber) = $row;
				echo "<p>$keterangan</p>";
				echo "<center><img src='Images/$gambar' width=900px height=600px></center>";
				echo "<p>Sumber : $sumber</p>";
				echo "<p>Terhitung Tanggal = $tanggal</p>";
			}while($row=mysqli_fetch_row($hasil));
		}// akhir else
	}
?>