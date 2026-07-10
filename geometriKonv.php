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
						<h1 class="page-title">Konversi Geometri</h1>
						<p class="converter-note">
							Masukkan satu nilai pada salah satu kategori untuk menerima hasil konversi langsung.
						</p>
						<table class="converter-table">
							<tr>
								<td colspan="8" class="section-heading">Satuan Luas</td>
							</tr>
							<tr>
								<td>Kilometer (km<sup>2</sup>)</td>
								<td><input type="text" name="km2" value="0" onkeyup="konversiKM2()"></td>
								<td>Mil (mil<sup>2</sup>)</td>
								<td><input type="text" name="mil2" value="" onkeyup="konversiMil2()"></td>
								<td>Meter (m<sup>2</sup>)</td>
								<td><input type="text" name="m2" value="" onkeyup="konversiM2()"></td>
								<td>Perch dan Rods<sup>2</sup></td>
								<td><input type="text" name="perch" value="" onkeyup="konversiPerch()"></td>
							</tr>
							<tr>
								<td>Yard (yard<sup>2</sup>)</td>
								<td><input type="text" name="yard2" value="0" onkeyup="konversiYard()"></td>
								<td>Rood </td>
								<td><input type="text" name="rood" value="" onkeyup="konversiRood()"></td>
								<td>Hektar (ha)</td>
								<td><input type="text" name="ha" value="" onkeyup="konversiHa()"></td>
								<td>Acre</td>
								<td><input type="text" name="acre" value="" onkeyup="konversiAcre()"></td>
							</tr>
							<tr class="section-divider">
								<td colspan="8"><hr></td>
							</tr>
							<tr>
								<td colspan="8" class="section-heading">Satuan Volum (Inggris)</td>
							</tr>
							<tr>
								<td>Meter Kubik(m<sup>3</sup>)</td>
								<td><input type="text" name="m3" value="" onkeyup="konversiM3()"></td>
								<td>Liter (l / dm<sup>3</sup>)</td>
								<td><input type="text" name="l" value="" onkeyup="konversiL()"></td>
								<td>Gallon (gal)</td>
								<td><input type="text" name="gal" value="" onkeyup="konversiGal()"></td>
								<td>Mililiter (ml / cc)</td>
								<td><input type="text" name="ml" value="" onkeyup="konversiML()"></td>
							</tr>
							<tr>
								<td>Pint</td>
								<td><input type="text" name="pint" value="" onkeyup="konversiPint()"></td>
								<td>Quart</td>
								<td><input type="text" name="quart" value="" onkeyup="konversiQuart()"></td>
								<td>Fluid Ounce (fl oz)</td>
								<td><input type="text" name="floz" value="" onkeyup="konversiFloz()"></td>
								<td>Barrel (barrel)</td>
								<td><input type="text" name="barrel" value="" onkeyup="konversiBarrel()"></td>
							</tr>
							<tr class="section-divider">
								<td colspan="8"><hr></td>
							</tr>
							<tr>
								<td colspan="8" class="section-heading">Satuan Sudut</td>
							</tr>
							<tr>
								<td>Derajat (dg)</td>
								<td><input type="text" name="dg" value="" onkeyup="konversiDg()"></td>
								<td>Radian (rad)</td>
								<td><input type="text" name="rad" value="" onkeyup="konversiRad()"></td>
								<td>Pi Radian (pi rad)</td>
								<td><input type="text" name="pirad" value="" onkeyup="konversiPirad()"></td>
							</tr>
							<tr class="section-divider">
								<td colspan="8"><hr></td>
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