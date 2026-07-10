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
						<h1 class="page-title">Konversi Panjang</h1>
						<p class="converter-note">
							Isi salah satu nilai panjang untuk melihat hasil konversi otomatis ke semua satuan panjang.
						</p>
						<table class="converter-table">
							<tr>
								<td colspan="8" class="section-heading">Satuan Meter Besar</td>
							</tr>
							<tr>
								<td>Mil <br>(mil)</td>
								<td><input type="text" name="mil" value="0" onkeyup="konversiMil()"></td>
								<td>Kilometer <br>(km)</td>
								<td><input type="text" name="km" value="" onkeyup="konversiKM()"></td>
								<td>Hektometer <br>(hm)</td>
								<td><input type="text" name="hm" value="" onkeyup="konversiHM()"></td>
								<td>Dekameter <br>(dam)</td>
								<td><input type="text" name="dam" value="" onkeyup="konversiDAM()"></td>
							</tr>
							<tr class="section-divider">
								<td colspan="8"><hr></td>
							</tr>
							<tr>
								<td colspan="8" class="section-heading">Satuan Meter Kecil</td>
							</tr>
							<tr>
								<td>Meter <br>(m)</td>
								<td><input type="text" name="m" value="" onkeyup="konversiM()"></td>
								<td>Desimeter <br>(dm)</td>
								<td><input type="text" name="dm" value="" onkeyup="konversiDM()"></td>
								<td>Centimeter <br>(cm)</td>
								<td><input type="text" name="cm" value="" onkeyup="konversiCM()"></td>
								<td>Milimeter <br>(mm)</td>
								<td><input type="text" name="mm" value="" onkeyup="konversiMM()"></td>
							</tr>
							<tr class="section-divider">
								<td colspan="8"><hr></td>
							</tr>
							<tr>
								<td colspan="8" class="section-heading">Satuan Imperial</td>
							</tr>
							<tr>
								<td>Inch <br>(in)</td>
								<td><input type="text" name="inch" value="" onkeyup="konversiInch()"></td>
								<td>Kaki <br>(ft)</td>
								<td><input type="text" name="ft" value="" onkeyup="konversiKaki()"></td>
								<td>Yard <br>(yd)</td>
								<td><input type="text" name="yard" value="" onkeyup="konversiYardPanjang()"></td>
								<td>Mil Laut</td>
								<td><input type="text" name="ml" value="" onkeyup="konversiMilLaut()"></td>
							</tr>
							<tr class="section-divider">
								<td colspan="8"><hr></td>
							</tr>
							<tr>
								<td colspan="8" class="section-heading">Satuan Benda</td>
							</tr>
							<tr>
								<td>Angstrom (A)</td>
								<td><input type="text" name="angstrom" value="" onkeyup="konversiAngstrom()"></td>
								<td>Tahun Cahaya</td>
								<td><input type="text" name="tc" value="" onkeyup="konversiTC()"></td>
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