class GlobalHeader extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
            <link rel="stylesheet" href="penampilan.css">
            <meta charset="UTF-8">
            
            <title>Kontrovert - Home of Measurements</title>
            
            <div id="header">
                <a href="home.php">
                    <img src="Images/logo.jpg" alt="Kontrovert logo" style="height:56px; width:auto; float:left;">
                </a>
                <form class="search" action="searches.php" method="get" style="float:right;margin-top:15px;">
                    <input type="text" name="src" placeholder="Search articles, converters, topics...">
                    <button type="submit" style="background:none;border:none;padding:6px;vertical-align:middle"> 
                        <img src="Images/SearchButton.jpg" alt="Search" style="height:30px;">
                    </button>
                </form>
                <button class="menu-toggle" aria-expanded="false" aria-controls="main-navigation" onclick="this.closest('#header').classList.toggle('menu-open'); this.setAttribute('aria-expanded', this.closest('#header').classList.contains('menu-open'))">Menu</button>
                <ul class="mainNav" id="main-navigation">
                    <li class="dropDown">
                        <a href="#" onclick="event.preventDefault(); this.parentElement.classList.toggle('open');">Daftar Satuan</a>
                        <ul class="dropNav">
                            <li><a href="besaranSatuan.php">Besaran dan Satuan</a></li>
                            <li><a href="currencySatuan.php">Mata Uang</a></li>
                            <li><a href="beratSatuan.php">Berat / Massa</a></li>
                            <li><a href="panjangSatuan.php">Panjang</a></li>
                            <li><a href="suhuSatuan.php">Suhu</a></li>
                            <li><a href="waktuSatuan.php">Waktu</a></li>
                            <li><a href="zonawaktuSatuan.php">Zona Waktu</a></li>
                        </ul>
                    </li>
                    <li class="dropDown">
                        <a href="#" onclick="event.preventDefault(); this.parentElement.classList.toggle('open');">Konversi</a>
                        <ul class="dropNav">
                            <li><a href="currencyKonv.php">Umum</a></li>
                            <li><a href="suhuKonv.php">Suhu</a></li>
                            <li><a href="beratKonv.php">Berat / Massa</a></li>
                            <li><a href="panjangKonv.php">Panjang</a></li>
                            <li><a href="geometriKonv.php">Geometri</a></li>
                            <li><a href="waktuKonv.php">Waktu</a></li>
                        </ul>
                    </li>
                    <!--
                    <li class="dropDown">
                        <a href="">Rumus</a>
                        <ul class="dropNav">
                            <li><a href="rumusFisika.php">Fisika</a></li>
                            <li><a href="rumusKimia.php">Kimia</a></li>
                            <li><a href="algoritma.php">Algoritma</a></li>
                            <li><a href="rumusGeometri.php">Geometri</a></li>
                            <li><a href="rumusProbStat.php">Statistika</a></li>
                            <li><a href="rumusBisnis.php">Matematika Ekonomi</a></li>
                        </ul>
                    </li>
                    <li><a href="berita.php">Berita Sains</a></li>
                    <li class="dropDown">
                        <a href="">Sejarah Sains</a>
                        <ul class="dropNav">
                            <li><a href="sejarahSM.php">Sebelum Masehi</a></li>
                            <li><a href="sejarahAP.php">Abad Pertengahan</a></li>
                            <li><a href="sejarah10.php">Tahun 1500-1900</a></li>
                            <li><a href="sejarah20.php">Abad ke-20</a></li>
                            <li><a href="sejarah21.php">Abad ke-21</a></li>
                        </ul>
                    </li>
                    <li><a href="terapan.php">Sains Sehari-hari</a></li>
                    <li class="dropDown">
                        <a href="">Kenali Para Ilmuwan</a>
                        <ul class="dropNav">
                            <li><a href="ilmuwanBiologi.php">Biologi</a></li>
                            <li><a href="ilmuwanFisika.php">Fisika</a></li>
                            <li><a href="ilmuwanKimia.php">Kimia</a></li>
                            <li><a href="ilmuwanMatematika.php">Matematika</a></li>
                            <li><a href="ilmuwanKomputer.php">Komputer</a></li>
                        </ul>
                    </li>
                    -->
                    <li><a href="trivia.php">Trivia</a></li>
                </ul>
            </div>

            <script src="myscripts.js"></script>
            <script src="rumus.js"></script>
        `;
  }
}

class GlobalFooter extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
            <div class="footer-content-top">
				<div class="footer-content-left">
					<h4>Kontrovert</h4>
					<p>Sains, rumus, konverter bersatu.</p>
				</div>
				<div class="footer-content-right">
					<h4>Contact Us</h4>
					<p>SD Tarakanita</p>
					<p>Jl. xxxxxxxxxxxxxx blok xxxxx xxxx xxxxxx<br>
						xxxxxxx</p>
					<p>021-1234567<br></p>
				</div>
			</div>

			<div class="footer-content-bottom">
				<h4>Copyright 2016 - Stevan</h4>
			</div>
        `;
    }
}

customElements.define('global-header', GlobalHeader);
customElements.define('global-footer', GlobalFooter);