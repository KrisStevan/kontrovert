const getGlobalLayoutBase = () => {
    const currentScript = document.currentScript || document.querySelector('script[src*="global-layout.js"]');
    const scriptUrl = currentScript ? new URL(currentScript.getAttribute('src'), window.location.href) : new URL('global-layout.js', window.location.href);
    return new URL('.', scriptUrl).href;
};

const getGlobalLayoutAsset = (fileName) => {
    return new URL(fileName, getGlobalLayoutBase()).href;
};

class GlobalHeader extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
            <link rel="stylesheet" href="${getGlobalLayoutAsset('penampilan.css')}">
            <meta charset="UTF-8">
            
            <title>Kontrovert - Home of Measurements</title>
            
            <div id="header">
                <a href="${getGlobalLayoutAsset('home.php')}">
                    <img src="${getGlobalLayoutAsset('Images/logo.jpg')}" alt="Kontrovert logo" style="height:56px; width:auto; float:left;">
                </a>
                <form class="search" action="${getGlobalLayoutAsset('searches.php')}" method="get" style="float:right;margin-top:15px;">
                    <input type="text" name="src" placeholder="Search articles, converters, topics...">
                    <button type="submit" style="background:none;border:none;padding:6px;vertical-align:middle"> 
                        <img src="${getGlobalLayoutAsset('Images/SearchButton.jpg')}" alt="Search" style="height:30px;">
                    </button>
                </form>
                <button class="menu-toggle" aria-expanded="false" aria-controls="main-navigation" onclick="this.closest('#header').classList.toggle('menu-open'); this.setAttribute('aria-expanded', this.closest('#header').classList.contains('menu-open'))">Menu</button>
                <ul class="mainNav" id="main-navigation">
                    <li class="dropDown">
                        <a href="#" onclick="event.preventDefault(); this.parentElement.classList.toggle('open');">Daftar Satuan</a>
                        <ul class="dropNav">
                            <li><a href="${getGlobalLayoutAsset('besaranSatuan.php')}">Besaran dan Satuan</a></li>
                            <li><a href="${getGlobalLayoutAsset('currencySatuan.php')}">Mata Uang</a></li>
                            <li><a href="${getGlobalLayoutAsset('beratSatuan.php')}">Berat / Massa</a></li>
                            <li><a href="${getGlobalLayoutAsset('panjangSatuan.php')}">Panjang</a></li>
                            <li><a href="${getGlobalLayoutAsset('suhuSatuan.php')}">Suhu</a></li>
                            <li><a href="${getGlobalLayoutAsset('waktuSatuan.php')}">Waktu</a></li>
                            <li><a href="${getGlobalLayoutAsset('zonawaktuSatuan.php')}">Zona Waktu</a></li>
                        </ul>
                    </li>
                    <li class="dropDown">
                        <a href="#" onclick="event.preventDefault(); this.parentElement.classList.toggle('open');">Konversi</a>
                        <ul class="dropNav">
                            <li><a href="${getGlobalLayoutAsset('currencyKonv.php')}">Umum</a></li>
                            <li><a href="${getGlobalLayoutAsset('suhuKonv.php')}">Suhu</a></li>
                            <li><a href="${getGlobalLayoutAsset('beratKonv.php')}">Berat / Massa</a></li>
                            <li><a href="${getGlobalLayoutAsset('panjangKonv.php')}">Panjang</a></li>
                            <li><a href="${getGlobalLayoutAsset('geometriKonv.php')}">Geometri</a></li>
                            <li><a href="${getGlobalLayoutAsset('waktuKonv.php')}">Waktu</a></li>
                        </ul>
                    </li>
                    <li class="dropDown">
                        <a href="#" onclick="event.preventDefault(); this.parentElement.classList.toggle('open');">Materi</a>
                        <ul class="dropNav" id="materi-menu">
                            <li><a href="#">Memuat materi...</a></li>
                        </ul>
                    </li>
                    <li class="dropDown">
                        <a href="#" onclick="event.preventDefault(); this.parentElement.classList.toggle('open');">Berita Sains</a>
                        <ul class="dropNav">
                            <li><a href="${getGlobalLayoutAsset('berita.php')}">Berita</a></li>
                            <li><a href="${getGlobalLayoutAsset('trivia.php')}">Trivia</a></li>
                        </ul>
                    </li>

                    <!-- login menu -->
                    <li class="dropDown">
                        <a href="#" onclick="event.preventDefault(); this.parentElement.classList.toggle('open');">Login</a>
                        <ul class="dropNav-login">
                            <li style="padding: 10px 15px; background-color: #f9f9f9; border-radius: 4px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                                <form class="login-form" action="${getGlobalLayoutAsset('logs/login.php')}" method="post" style="display:flex;flex-direction:column;gap:8px;min-width:240px;">
                                    <input type="text" name="username" placeholder="Username" required>
                                    <input type="password" name="password" placeholder="Password" required>
                                    <button type="submit" name="submit" style="background:var(--crimson);color:#fff;border:none;padding:8px 10px;border-radius:6px;cursor:pointer">Login</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <script src="${getGlobalLayoutAsset('myscripts.js')}"></script>
            <script src="${getGlobalLayoutAsset('rumus.js')}"></script>
        `;
        this.loadMateriMenu();
    }

    async loadMateriMenu() {
        const menu = this.querySelector('#materi-menu');
        if (!menu) {
            return;
        }

        try {
            const response = await fetch(getGlobalLayoutAsset('topics-menu.php'), { cache: 'no-store' });
            if (!response.ok) {
                throw new Error(`HTTP ${response.status}`);
            }

            const html = await response.text();
            menu.innerHTML = html;
        } 
        catch (error) {
            console.error('Failed to load menu:', error);
            menu.innerHTML = '<li><a href="#">Materi tidak tersedia</a></li>';
        }
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