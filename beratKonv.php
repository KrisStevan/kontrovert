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
						<h1 class="page-title">Konversi Berat dan Massa</h1>
						<p class="converter-note">
							Isi salah satu nilai untuk langsung menampilkan hasil konversi ke semua satuan yang tersedia.</p>
						<table class="converter-table">
							<tr>
								<td colspan="8" class="section-heading"><b>Satuan Gram Besar</b></td>
							</tr>
							<tr>
								<td>Ton <br>(t)</td>
								<td><input type="text" name="ton" value="0" onkeyup="konversiTon()"></td>
								<td>Kilogram <br>(kg)</td>
								<td><input type="text" name="kg" value="" onkeyup="konversiKG()"></td>
								<td>Hektogram <br>(hg)</td>
								<td><input type="text" name="hg" value="" onkeyup="konversiHG()"></td>
								<td>Dekagram <br>(dag)</td>
								<td><input type="text" name="dag" value="" onkeyup="konversiDAG()"></td>
							</tr>
							<tr class="section-divider">
								<td colspan="8"><hr></td>
							</tr>
							<tr>
								<td colspan="8" class="section-heading"><b>Satuan Gram Kecil</b></td>
							</tr>
							<tr>
								<td>Gram <br>(g)</td>
								<td><input type="text" name="g" value="" onkeyup="konversiG()"></td>
								<td>Desigram <br>(dg)</td>
								<td><input type="text" name="dg" value="" onkeyup="konversiDG()"></td>
								<td>Centigram <br>(cg)</td>
								<td><input type="text" name="cg" value="" onkeyup="konversiCG()"></td>
								<td>Miligram <br>(mg)</td>
								<td><input type="text" name="mg" value="" onkeyup="konversiMG()"></td>
							</tr>
							<tr class="section-divider">
								<td colspan="8"><hr></td>
							</tr>
							<tr>
								<td colspan="8" class="section-heading"><b>Satuan Kuintal dan Imperial</b></td>
							</tr>
							<tr>
								<td>Ons <br>(oz)</td>
								<td><input type="text" name="ons" value="" onkeyup="konversiOns()"></td>
								<td>Kuintal <br>(kw)</td>
								<td><input type="text" name="kw" value="" onkeyup="konversiKw()"></td>
								<td>Pon <br>(lb/lbs)</td>
								<td><input type="text" name="pon" value="" onkeyup="konversiPon()"></td>
								<td>Troy Ons <br>(oz t)</td>
								<td><input type="text" name="troyons" value="" onkeyup="konversiTroyOns()"></td>
							</tr>
							<tr class="section-divider">
								<td colspan="8"><hr></td>
							</tr>
							<tr>
								<td colspan="8" class="section-heading"><b>Satuan Benda</b></td>
							</tr>
							<tr>
								<td>Slug <br>(slug)</td>
								<td><input type="text" name="slug" value="" onkeyup="konversiSlug()"></td>
								<td>Batu <br>(stone)</td>
								<td><input type="text" name="stone" value="" onkeyup="konversiStone()"></td>
								<td>Grain <br>(gr)</td>
								<td><input type="text" name="gr" value="" onkeyup="konversiGr()"></td>
								<td>Karat</td>
								<td><input type="text" name="karat" value="" onkeyup="konversiKarat()"></td>
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