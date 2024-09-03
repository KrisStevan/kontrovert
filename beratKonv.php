<html>
	<?php require "menuUtama.php";?>
	<body>
		<?php require "slideMenu.php";?>
		<div id="isian">
			<form name="BoxForm">
				<center><h1>Konversi Berat dan Massa</h1></center>
				<h2>Hasil akan segera diketahui dengan cara mengklik kotak inputan lainnya setelah melakukan pengisian</h2>
				<p>
					<table>
						<tr>
							<td colspan="8"><b>Satuan Gram Besar</b></td>
						</tr>
						<tr>
							<td>Ton (t)</td>
							<td><input type="text" name="ton" value="0" onChange="konversiTon()"></td>
							<td>Kilogram (kg)</td>
							<td><input type="text" name="kg" value="" onChange="konversiKG()"></td>
							<td>Hektogram (hg)</td>
							<td><input type="text" name="hg" value="" onChange="konversiHG()"></td>
							<td>Dekagram (dag)</td>
							<td><input type="text" name="dag" value="" onChange="konversiDAG()"></td>
						</tr>
						<tr>
							<td colspan="8">----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</td>
						</tr>
						<tr>
							<td colspan="8"><b>Satuan Gram Kecil</b></td>
						</tr>
						<tr>
							<td>Gram (g)</td>
							<td><input type="text" name="g" value="" onChange="konversiG()"></td>
							<td>Desigram (dg)</td>
							<td><input type="text" name="dg" value="" onChange="konversiDG()"></td>
							<td>Centigram (cg)</td>
							<td><input type="text" name="cg" value="" onChange="konversiCG()"></td>
							<td>Miligram (mg)</td>
							<td><input type="text" name="mg" value="" onChange="konversiMG()"></td>
						</tr>
						<tr>
							<td colspan="8">----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</td>
						</tr>
						<tr>
							<td colspan="8"><b>Satuan Kuintal dan Imperial</b></td>
						</tr>
						<tr>
							<td>Ons (oz)</td>
							<td><input type="text" name="ons" value="" onChange="konversiOns()"></td>
							<td>Kuintal (kw)</td>
							<td><input type="text" name="kw" value="" onChange="konversiKw()"></td>
							<td>Pon (lb/lbs)</td>
							<td><input type="text" name="pon" value="" onChange="konversiPon()"></td>
							<td>Troy Ons (oz t)</td>
							<td><input type="text" name="troyons" value="" onChange="konversiTroyOns()"></td>
						</tr>
						<tr>
							<td colspan="8">----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</td>
						</tr>
						<tr>
							<td colspan="8"><b>Satuan Benda</b></td>
						</tr>
						<tr>
							<td>Slug (slug)</td>
							<td><input type="text" name="slug" value="" onChange="konversiSlug()"></td>
							<td>Batu (stone)</td>
							<td><input type="text" name="stone" value="" onChange="konversiStone()"></td>
							<td>Grain (gr)</td>
							<td><input type="text" name="gr" value="" onChange="konversiGr()"></td>
							<td>Karat</td>
							<td><input type="text" name="karat" value="" onChange="konversiKarat()"></td>
						</tr>
					</table>
				</p>
			</form>
		</div>
	</body>
</html>