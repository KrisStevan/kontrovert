<html>
	<head>
		<script src="global-layout.js" defer></script>
		<global-header></global-header>
	</head>
	<body>
		<script src="myscripts.js"></script>
		<!--bagian untuk isinya -->
		<div class="hero" role="banner">
			<div class="hero-inner">
				<center><h2>Besaran dan Satuan</h2></center>
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
					<br>
					<center>
						<button id="perkecilGNDB" onclick="perkecilGNDB()">←</button>
						<button id="perbesarGNDB" onclick="perbesarGNDB()">→</button>
						<button id="pertinggiGNDB" onclick="pertinggiGNDB()">↑</button>
						<button id="perendahGNDB" onclick="perendahGNDB()">↓</button>
						<br>
						<img src='Images/besaran.jpg' id='gambarNonDB' width='900px' height='300px'>
					</center>
				</p>
				<p>
					Contoh satuan turunan dalam SI adalah:
					<br>
					<center>
						<button id="perkecilGDB" onclick="perkecilGDB()">←</button>
						<button id="perbesarGDB" onclick="perbesarGDB()">→</button>
						<button id="pertinggiGDB" onclick="pertinggiGDB()">↑</button>
						<button id="perendahGDB" onclick="perendahGDB()">↓</button>
						<br>
						<img src='Images/turunan.jpg' id='gambarDB' width='700px' height='250px'>
					</center>
				</p>
				<p>Sumber: Buku Pelajaran Fisika Kelas X</p>
			</div>
		</div>

		<footer id="footer" class="site-footer">
			<global-footer></global-footer>
		</footer>
	</body>
</html>