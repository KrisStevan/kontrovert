<html>
	<?php require "menuUtama.php";?>
	<body>
		<?php require "slideMenu.php";?>
		<div id="isian">
			<form name="BoxForm">
				<center><h1>Konversi Panjang</h1></center>
				<h2>Hasil akan segera diketahui dengan cara mengklik kotak inputan lainnya setelah melakukan pengisian</h2>
				<p>
					<table>
						<tr>
							<td colspan="8"><b>Satuan Meter Besar</b></td>
						</tr>
						<tr>
							<td>Mil (mil)</td>
							<td><input type="text" name="mil" value="0" onChange="konversiMil()"></td>
							<td>Kilometer (km)</td>
							<td><input type="text" name="km" value="" onChange="konversiKM()"></td>
							<td>Hektometer (hm)</td>
							<td><input type="text" name="hm" value="" onChange="konversiHM()"></td>
							<td>Dekameter (dam)</td>
							<td><input type="text" name="dam" value="" onChange="konversiDAM()"></td>
						</tr>
						<tr>
							<td colspan="8">----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</td>
						</tr>
						<tr>
							<td colspan="8"><b>Satuan Meter Kecil</b></td>
						</tr>
						<tr>
							<td>Meter (m)</td>
							<td><input type="text" name="m" value="" onChange="konversiM()"></td>
							<td>Desimeter (dm)</td>
							<td><input type="text" name="dm" value="" onChange="konversiDM()"></td>
							<td>Centimeter (cm)</td>
							<td><input type="text" name="cm" value="" onChange="konversiCM()"></td>
							<td>Milimeter (mm)</td>
							<td><input type="text" name="mm" value="" onChange="konversiMM()"></td>
						</tr>
						<tr>
							<td colspan="8">----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</td>
						</tr>
						<tr>
							<td colspan="8"><b>Satuan Imperial</b></td>
						</tr>
						<tr>
							<td>Inch (in)</td>
							<td><input type="text" name="inch" value="" onChange="konversiInch()"></td>
							<td>Kaki (ft)</td>
							<td><input type="text" name="ft" value="" onChange="konversiKaki()"></td>
							<td>Yard (yd)</td>
							<td><input type="text" name="yard" value="" onChange="konversiYardPanjang()"></td>
							<td>Mil Laut</td>
							<td><input type="text" name="ml" value="" onChange="konversiMilLaut()"></td>
						</tr>
						<tr>
							<td colspan="8">----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</td>
						</tr>
						<tr>
							<td colspan="8"><b>Satuan Benda</b></td>
						</tr>
						<tr>
							<td>Angstrom (A)</td>
							<td><input type="text" name="angstrom" value="" onChange="konversiAngstrom()"></td>
							<td>Tahun Cahaya</td>
							<td><input type="text" name="tc" value="" onChange="konversiTC()"></td>
						</tr>
					</table>
				</p>
			</form>
		</div>
	</body>
</html>