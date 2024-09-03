<html>
	<?php require "menuUtama.php";?>
	<body>
		<?php require "slideMenu.php";?>
		<div id="isian">
			<form name="BoxForm">
				<center><h1>Konversi Suhu</h1></center>
				<h2>Hasil akan segera diketahui dengan cara mengklik kotak inputan lainnya setelah melakukan pengisian</h2>
					<p>
						<table>
							<tr>
								<td>Celcius</td>
								<td><input type="text" name="celcius" value="0" onChange="konversiCelcius()"></td>
							</tr>
							<tr>
								<td>Fahrenheit</td>
								<td><input type="text" name="fahrenheit" value="" onChange="konversiFahrenheit()"></td>
							</tr>
							<tr>
								<td>Reamur</td>
								<td><input type="text" name="reamur" value="" onChange="konversiReamur()"></td>
							</tr>
							<tr>
								<td>Kelvin</td>
								<td><input type="text" name="kelvin" value="" onChange="konversiKelvin()"></td>
							</tr>
							<tr>
								<td>Rankine</td>
								<td><input type="text" name="rankine" value="" onChange="konversiRankine()"></td>
							</tr>
						</table>
					</p>
			</form>
		</div>
	</body>
</html>