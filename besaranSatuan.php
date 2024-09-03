<html>
	<?php require "menuUtama.php";?>
	<body>
		<?php require "slideMenu.php";?>
		<script src="myscripts.js"></script>
		<!--bagian untuk isinya -->
		<div id="isian">
			<center><h1>Besaran dan Satuan</h1></center>
			<p>
					Besaran dirtikan sebagai sesuatu yang dapat diukur atau dihitung dan mempunyai nilai (besar) yang dinyatakan dengan angka dan satuan.
					Dalam fisika, besaran terbagi menjadi dua, yaitu:
					<ul>
						<li><b>Besaran pokok</b> - adalah besaran yang satuannya telah ditetapkan terlebih dahulu dan tidak diturunkan dari besaran lain</li>
						<li><b>Besaran turunan</b> - yang diturunkan dari beberapa besaran pokok</li>
					</ul>
			</p>
			<p>
				Dalam fisika, kita mengenal istilah satuan internasional.
				Sistem Satuan Internasional (atau nama aslinya dalam bahasa Perancis: Systeme International d'Units atau SI) adalah sistem satuan yang paling umum digunakan dalam bidang fisika di seluruh dunia.
				Sistem ini dibuat karena penggunaan satuan dasar yang berbeda-beda di setiap negara, seperti satuan imperial di Amerika dan metrik di Eropa.
				Satuan dalam SI terbagi jadi 2, yaitu satuan pokok dan satuan turunan.
				Dalam sistem SI terdapat 7 satuan dasar/pokok SI dan 2 satuan tanpa dimensi. 
				Selain itu, dalam sistem SI terdapat standar awalan-awalan (prefix) yang dapat digunakan untuk penggandaan atau menurunkan satuan-satuan yang lain.
			</p>
			<p>
				Contoh satuan dasar dalam SI adalah:
				<br><center>
					<img src='Images/besaran.jpg' id='gambarNonDB' width='900px' height='300px'><br>
						<button onclick="perkecilGNDB()"><</button>
						<button onclick="perbesarGNDB()">></button>
						<button onclick="pertinggiGNDB()">^</button>
						<button onclick="perendahGNDB()">v</button>
				</center>
			</p>
			<p>
				Contoh satuan turunan dalam SI adalah:
				<br><center>
					<img src='Images/turunan.jpg' id='gambarDB' width='700px' height='250px'><br>
						<button onclick="perkecilGDB()"><</button>
						<button onclick="perbesarGDB()">></button>
						<button onclick="pertinggiGDB()">^</button>
						<button onclick="perendahGDB()">v</button>
				</center>
			</p>
			<p>Sumber: Buku Pelajaran Fisika Kelas X</p>
		</div>
	</body>
</html>