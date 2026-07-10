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
						<h1 class="page-title">Konversi Umum</h1>
						<p class="converter-note">
							Masukkan nilai awal dan faktor konversi. Hasil akhir akan ditampilkan secara otomatis.<br>
							Untuk nilai mata uang, lihat <a href="currencySatuan.php">currency satuan</a>. <br>
							Untuk satuan internasional, lihat <a href="besaranSatuan.php">besaran satuan</a>. <br>
							Gunakan titik (.) sebagai pemisah desimal.
						</p>
						<table class="converter-table">
							<tr>
								<td>Masukkan nilai awal </td>
								<td><input type="text" name="nilaiAwal" value="0" onkeyup="document.BoxForm.nilaiAkhir.value = konversi(parseFloat(document.BoxForm.nilaiAwal.value))"></td>
							</tr>
							<tr>
								<td>Masukkan nilai konversi </td>
								<td><input type="text" name="nilaiKonversi" value="0" onkeyup="document.BoxForm.nilaiAkhir.value = konversi(parseFloat(document.BoxForm.nilaiAwal.value))"></td>
							</tr>
							<tr>
								<td>Nilai Akhir </td>
								<td><input type="text" name="nilaiAkhir" value="0" readonly></td>
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