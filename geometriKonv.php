<html>
	<?php require "menuUtama.php";?>
	<body>
		<?php require "slideMenu.php";?>
		<div id="isian">
			<form name="BoxForm">
				<center><h1>Konversi Geometri</h1></center>
				<h2>Hasil akan segera diketahui dengan cara mengklik kotak inputan lainnya setelah melakukan pengisian</h2>
				<p>
					<table>
						<tr>
							<td colspan="8" style="color:red;"><b>Satuan Luas</b></td>
						</tr>
						<tr>
							<td>Kilometer (km<sup>2</sup>)</td>
							<td><input type="text" name="km2" value="0" onChange="konversiKM2()"></td>
							<td>Mil (mil<sup>2</sup>)</td>
							<td><input type="text" name="mil2" value="" onChange="konversiMil2()"></td>
							<td>Meter (m<sup>2</sup>)</td>
							<td><input type="text" name="m2" value="" onChange="konversiM2()"></td>
							<td>Perch dan Rods<sup>2</sup></td>
							<td><input type="text" name="perch" value="" onChange="konversiPerch()"></td>
						</tr>
						<tr>
							<td>Yard (yard<sup>2</sup>)</td>
							<td><input type="text" name="yard2" value="0" onChange="konversiYard()"></td>
							<td>Rood </td>
							<td><input type="text" name="rood" value="" onChange="konversiRood()"></td>
							<td>Hektar (ha)</td>
							<td><input type="text" name="ha" value="" onChange="konversiHa()"></td>
							<td>Acre</td>
							<td><input type="text" name="acre" value="" onChange="konversiAcre()"></td>
						</tr>
						<tr>
							<td colspan="8">----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</td>
						</tr>
						<tr>
							<td colspan="8" style="color:green;"><b>Satuan Volum (Inggris)</b></td>
						</tr>
						<tr>
							<td>Meter Kubik(m<sup>3</sup>)</td>
							<td><input type="text" name="m3" value="" onChange="konversiM3()"></td>
							<td>Liter (l / dm<sup>3</sup>)</td>
							<td><input type="text" name="l" value="" onChange="konversiL()"></td>
							<td>Gallon (gal)</td>
							<td><input type="text" name="gal" value="" onChange="konversiGal()"></td>
							<td>Mililiter (ml / cc)</td>
							<td><input type="text" name="ml" value="" onChange="konversiML()"></td>
						</tr>
						<tr>
							<td>Pint</td>
							<td><input type="text" name="pint" value="" onChange="konversiPint()"></td>
							<td>Quart</td>
							<td><input type="text" name="quart" value="" onChange="konversiQuart()"></td>
							<td>Fluid Ounce (fl oz)</td>
							<td><input type="text" name="floz" value="" onChange="konversiFloz()"></td>
							<td>Barrel (barrel)</td>
							<td><input type="text" name="barrel" value="" onChange="konversiBarrel()"></td>
						</tr>
						<tr>
							<td colspan="8">----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</td>
						</tr>
						<tr>
							<td colspan="8" style="color:blue;"><b>Satuan Sudut</b></td>
						</tr>
						<tr>
							<td>Derajat (dg)</td>
							<td><input type="text" name="dg" value="" onChange="konversiDg()"></td>
							<td>Radian (rad)</td>
							<td><input type="text" name="rad" value="" onChange="konversiRad()"></td>
							<td>Pi Radian (pi rad)</td>
							<td><input type="text" name="pirad" value="" onChange="konversiPirad()"></td>
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