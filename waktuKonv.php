<html>
	<head>
		<script src="global-layout.js" defer></script>
		<global-header></global-header>
	</head>
	<body>
		<script src="myscripts.js"></script>

		<div class="hero" role="banner">
			<div class="hero-inner">
				<form name="BoxForm">
					<div class="converter-page">
						<h1 class="page-title">Konversi Waktu</h1>
						<div class="converter-note">
							Isi satu nilai waktu untuk menghitung langsung semua satuan lainnya. <br>
							<strong>Perhatian:</strong> Karena jumlah hari berbeda tiap bulan, hasil dihitung dengan rata-rata. Patokan:
							<ul>
								<li>1 tahun = 52,14286... minggu</li>
								<li>1 tahun = 365.25 hari</li>
								<li>1 bulan = 30,42 hari</li>
								<li>1 bulan = 4,34523833 minggu</li>
							</ul>
						</div>
						<table class="converter-table">
							<tr>
								<td colspan="8" class="section-heading">Satuan Waktu Harian</td>
							</tr>
							<tr>
								<td>Detik / sekon(s)</td>
								<td><input type="text" name="sec" value="0" onkeyup="konversiDetik()"></td>
								<td>Menit</td>
								<td><input type="text" name="min" value="" onkeyup="konversiMenit()"></td>
								<td>Jam</td>
								<td><input type="text" name="jam" value="" onkeyup="konversiJam()"></td>
								<td>Hari</td>
								<td><input type="text" name="hari" value="" onkeyup="konversiHari()"></td>
							</tr>
							<tr class="section-divider">
								<td colspan="8"><hr></td>
							</tr>
							<tr>
								<td colspan="8" class="section-heading">Satuan Waktu Kalender</td>
							</tr>
							<tr>
								<td>Minggu</td>
								<td><input type="text" name="minggu" value="" onkeyup="konversiMinggu()"></td>
								<td>Bulan</td>
								<td><input type="text" name="bl" value="" onkeyup="konversiBulan()"></td>
								<td>Tahun</td>
								<td><input type="text" name="th" value="" onkeyup="konversiTahun()"></td>
							</tr>
							<tr>
								<td>Lustrum</td>
								<td><input type="text" name="lust" value="" onkeyup="konversiLustrum()"></td>
								<td>Winda</td>
								<td><input type="text" name="winda" value="" onkeyup="konversiWinda()"></td>
								<td>Dasawarsa</td>
								<td><input type="text" name="dasa" value="" onkeyup="konversiDasa()"></td>
								<td>Abad</td>
								<td><input type="text" name="abad" value="" onkeyup="konversiAbad()"></td>
							</tr>
						</table>
					</div>
				</form>
			</div>
		</div>

		<footer id="footer" class="site-footer">
			<global-footer></global-footer>
		</footer>
	</body>
</html>