<html>
	<?php require "menuUtama.php";?>
	<body>
		<?php require "slideMenu.php";?>
		<div id="isian">
			<form name="BoxForm">
				<center><h1>Konversi Umum</h1></center>
				<h2>Hasil akan segera diketahui dengan cara mengklik kotak inputan lainnya setelah melakukan pengisian</h2>
				<p>
					<ul>
						<li>Untuk nilai mata uang dapat dilihat <u><a href = "currencySatuan.php">disini</a></u></li>
						<li>Untuk konversi dengan Satuan Internasional, dapat dilihat <u><a href = "besaranSatuan.php">disini</a></u></li>
					</ul>
				</p>
				<p>
					<table>
						<tr>
							<td>Masukkan nilai awal </td>
							<td><input type="text" name="nilaiAwal" value="0" onchange="document.BoxForm.nilaiAkhir.value = konversi(parseFloat(document.BoxForm.nilaiAwal.value))"></td>
						</tr>
						<tr>
							<td>Masukkan nilai konversi </td>
							<td><input type="text" name="nilaiKonversi" value="0" onchange="document.BoxForm.nilaiAkhir.value = konversi(parseFloat(document.BoxForm.nilaiAwal.value))"></td>
						</tr>
						<tr>
							<td>Nilai Akhir </td>
							<td><input type="text" name="nilaiAkhir" value="0" readonly></td>
						</tr>
					</table>
				</p>
			</form>
		</div>
	</body>
</html>