<html>
	<?php require "menuUtama.php";?>
	<body>
		<?php require "slideMenu.php";?>
		<!--bagian untuk isinya -->
		<div id="isian">
			<center><h1>Zona Waktu</h1></center>
			<p>
			Pengaruh rotasi bumi dalam mengelilingi matahari menyebabkan perbedaan zona waktu pada setiap wilayah tertentu karena hanya beberapa bagian bumi yang mendapatkan sinar matahari dalam proses revolusinya.
			Hal ini menyebabkan setiap negara di dunia menetapkan zona waktunya masing-masing.
			Tujuannya adalah untuk kepentingan sosial dan komersial. 
			Patokan zona waktu di dunia berada di kota Greenwich, Inggris yang (dianggap) terletak tepat di tengah-tengah belahan bumi.
			Berikut inilah gambar penetapan zona waktu di setiap wilayah.
			<center><img src='Images/timezone.gif' id='gambarDB' width='900px' height='600px'></center>";
			<br><center>
				<button onclick="perkecilGDB()"><</button>
				<button onclick="perbesarGDB()">></button>
				<button onclick="pertinggiGDB()">^</button>
				<button onclick="perendahGDB()">v</button>
			</center>
			<p>Dengan rincian wilayah sebagai berikut:</p>
			<center>
			<table border="3" width="75%" id="tabelIsi">
				<tr border="1">
					<td>Offset</td>
					<td>Contoh Lokasi</td>
				</tr>
				<tr>
					<td>GMT-12:00</td>
					<td>Baker Island, Howland Island</td>
				</tr>
				<tr>
					<td>GMT-11:00</td>
					<td>Samoa Amerika</td>
				</tr>
				<tr>
					<td>GMT-10:00</td>
					<td>Kepulauan Hawaii</td>
				</tr>
				<tr>
					<td>GMT-9:30</td>
					<td>Kepulauan Marquesas</td>
				</tr>
				<tr>
					<td>GMT-9:00</td>
					<td>Kepulauan Gambier, Alaska</td>
				</tr>
				<tr>
					<td>GMT-8:00</td>
					<td>Pantai Barat Kanada dan Amerika</td>
				</tr>
				<tr>
					<td>GMT-7:00</td>
					<td>British Columbia bagian Timur (Kanada), Pegunungan Rocky, Sonora (Meksiko)</td>
				</tr>
				<tr>
					<td>GMT-6:00</td>
					<td>Saskatchewan,Ontario (Kanada), Chicago, Indiana, Texas (Amerika Serikat), Sebagian besar Meksiko,  Costa Rica, El Salvador, Kepulauan Galapagos, Guatemala, Honduras</td>
				</tr>
				<tr>
					<td>GMT-5:00</td>
					<td>Quebec (Kanada), Panama, Kolombia, Ekuador, Peru, Karibia, Pantai Timur Amerika Serikat</td>
				</tr>
				<tr>
					<td>GMT-4:30</td>
					<td>Venezuela</td>
				</tr>
				<tr>
					<td>GMT-4:00</td>
					<td>Amazonas, Rondonia, Roraima (Brasil), Nova Scotia (Kanada), Bolivia, Dominika</td>
				</tr>
				<tr>
					<td>GMT-3:00</td>
					<td>Argentina, Pantai Timur Brasil, Uruguay</td>
				</tr>
				<tr>
					<td>GMT-2:00</td>
					<td>Kempualan Sandwich</td>
				</tr>
				<tr>
					<td>GMT-1:00</td>
					<td>Cape Verde, Azores</td>
				</tr>
				<tr>
					<td>GMT</td>
					<td>Pantai Gading, Ghana, Islandia, Senegal, Mali, Mauritania, Portugal, Inggris, Kepulauan Faroe, Irlandia</td>
				</tr>
				<tr>
					<td>GMT+1:00</td>
					<td>Aljazair, Angola, Benin, Kamerun, Niger, Nigeria, Eropa Kontinental (Barat dan Tengah)</td>
				</tr>
				<tr>
					<td>GMT+2:00</td>
					<td>Afrika Selatan, Sudan, Mesir, Ukraina, Finlandia, Turki, Balkan</td>
				</tr>
				<tr>
					<td>GMT+3:00</td>
					<td>Belarusia, Rusia Barat (Sebelum pegunungan Ural), Arab Saudi, Somalia, Pantai Timur Afrika</td>
				</tr>
				<tr>
					<td>GMT+3:30</td>
					<td>Iran</td>
				</tr>
				<tr>
					<td>GMT+4:00</td>
					<td>Georgia, Armenia, Azerbaijan, Oman, Mauritius</td>
				</tr>
				<tr>
					<td>GMT+4:30</td>
					<td>Afganistan</td>
				</tr>
				<tr>
					<td>GMT+5:00</td>
					<td>Kazakstan Barat, Pakistan, Uzbekistan, Omsk (Rusia)</td>
				</tr>
				<tr>
					<td>GMT+5:30</td>
					<td>India, Sri Lanka</td>
				</tr>
				<tr>
					<td>GMT+6:00</td>
					<td>Irkutsk (Rusia),Kazakstan Tengah dan Timur, Bangladesh, Bhutan</td>
				</tr>
				<tr>
					<td>GMT+6:30</td>
					<td>Myanmar</td>
				</tr>
				<tr>
					<td>GMT+7:00</td>
					<td>Jawa, Sumatera, Kalimantan Barat (Indonesia), Thailand, Vietnam, Kamboja, Laos</td>
				</tr>
				<tr>
					<td>GMT+8:00</td>
					<td>Sulawesi, Bali, Kepulauan Nusa Tenggara, Kalimantan Timur (Indonesia), Australia bagian Barat, Malaysia, Singapura, China, Filipina, Mongolia</td>
				</tr>
				<tr>
					<td>GMT+8:30</td>
					<td>Korea Utara</td>
				</tr>
				<tr>
					<td>GMT+9:00</td>
					<td>Maluku, Papua (Indonesia),Jepang, Korea Selatan</td>
				</tr>
				<tr>
					<td>GMT+9:30</td>
					<td>Darwin, Adelaide (Australia)</td>
				</tr>
				<tr>
					<td>GMT+10:00</td>
					<td>Sydney, Tasmania, Brisbane, Melbourne(Australia), Papua Nugini, Vladivostok (Rusia)</td>
				</tr>
				<tr>
					<td>GMT+11:00</td>
					<td>Kaledonia Baru, Vanuatu, Kepulauan Solomon</td>
				</tr>
				<tr>
					<td>GMT+11:30</td>
					<td>Norfolk</td>
				</tr>
				<tr>
					<td>GMT+12:00</td>
					<td>Selandia Baru, Fiji, Semenanjung Kamchatka (Rusia)</td>
				</tr>
				<tr>
					<td>GMT+13:00</td>
					<td>Kepulauan Phoenix (Kiribati),Tokelau, Tonga</td>
				</tr>
				<tr>
					<td>GMT+14:00</td>
					<td>Kepulauan Line (Kiribati)</td>
				</tr>
			</table>
			</center><br>
			Sumber = www.timetemperature.com/
			</p>
		</div>
	</body>
</html>