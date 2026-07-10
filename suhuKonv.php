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
						<h1 class="page-title">Konversi Suhu</h1>
						<p class="converter-note">
							Masukkan nilai suhu pada salah satu satuan untuk melihat hasil konversi instan ke satuan lainnya.
						</p>
						<table class="converter-table">
							<tr>
								<td>Celcius</td>
								<td><input type="text" name="celcius" value="0" onkeyup="konversiCelcius()"></td>
							</tr>
							<tr>
								<td>Fahrenheit</td>
								<td><input type="text" name="fahrenheit" value="" onkeyup="konversiFahrenheit()"></td>
							</tr>
							<tr>
								<td>Reamur</td>
								<td><input type="text" name="reamur" value="" onkeyup="konversiReamur()"></td>
							</tr>
							<tr>
								<td>Kelvin</td>
								<td><input type="text" name="kelvin" value="" onkeyup="konversiKelvin()"></td>
							</tr>
							<tr>
								<td>Rankine</td>
								<td><input type="text" name="rankine" value="" onkeyup="konversiRankine()"></td>
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