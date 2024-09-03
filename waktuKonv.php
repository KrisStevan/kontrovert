<html>
	<?php require "menuUtama.php";?>
	<body>
		<?php require "slideMenu.php";?>
		<div id="isian">
			<form name="BoxForm">
				<center><h1>Konversi Waktu</h1></center>
				<h2>Hasil akan segera diketahui dengan cara mengklik kotak inputan lainnya setelah melakukan pengisian</h2>
				<h2 style="color:red;">Perhatian! Karena jumlah hari yang berbeda-beda dalam setiap bulan, maka hasil perhitungan ini akan ditampilkan secara rata-rata. Dengan Patokan:
					<ul>
						<li>1 tahun = 52,14286... minggu</li>
						<li>1 tahun = 365.25 hari</li>
						<li>1 bulan = 30,42 hari</li>
						<li>1 bulan = 4,34523833 minggu</li>
					</ul>
				</h2>
				<p>
					<table>
						<tr>
							<td colspan="8"><b>Satuan Waktu Harian</b></td>
						</tr>
						<tr>
							<td>Detik / sekon(s)</td>
							<td><input type="text" name="sec" value="0" onChange="konversiDetik()"></td>
							<td>Menit</td>
							<td><input type="text" name="min" value="" onChange="konversiMenit()"></td>
							<td>Jam</td>
							<td><input type="text" name="jam" value="" onChange="konversiJam()"></td>
							<td>Hari</td>
							<td><input type="text" name="hari" value="" onChange="konversiHari()"></td>
						</tr>
						<tr>
							<td colspan="8">----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</td>
						</tr>
						<tr>
							<td colspan="8"><b>Satuan Waktu Kalender</b></td>
						</tr>
						<tr>
							<td>Minggu</td>
							<td><input type="text" name="minggu" value="" onChange="konversiMinggu()"></td>
							<td>Bulan</td>
							<td><input type="text" name="bl" value="" onChange="konversiBulan()"></td>
							<td>Tahun</td>
							<td><input type="text" name="th" value="" onChange="konversiTahun()"></td>
						</tr>
						<tr>
							<td>Lustrum</td>
							<td><input type="text" name="lust" value="" onChange="konversiLustrum()"></td>
							<td>Winda</td>
							<td><input type="text" name="winda" value="" onChange="konversiWinda()"></td>
							<td>Dasawarsa</td>
							<td><input type="text" name="dasa" value="" onChange="konversiDasa()"></td>
							<td>Abad</td>
							<td><input type="text" name="abad" value="" onChange="konversiAbad()"></td>
						</tr>
						<tr>
							<td colspan="8">----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</td>
						</tr>
					</table>
				</p>
			</form>
		</div>
	</body>
</html>