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
            <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
            
            <title>Kontrovert - Home of Measurements</title>
            
            <div id="header">
                <a href="${getGlobalLayoutAsset('home.php')}">
                    <img src="${getGlobalLayoutAsset('Images/logo.jpg')}" alt="Kontrovert logo">
                </a>
                <form class="search" action="${getGlobalLayoutAsset('searches.php')}" method="get">
                    <input type="text" name="src" placeholder="Search...">
                    <button type="submit"> 
                        <img src="${getGlobalLayoutAsset('Images/SearchButton.jpg')}" alt="Search">
                    </button>
                </form>
                <button class="menu-toggle" aria-expanded="false" aria-controls="main-navigation">Menu</button>
                <ul class="mainNav" id="main-navigation">
                    <li class="dropDown">
                        <a href="#">Besaran</a>
                        <ul class="dropNav">
                            <li><a href="${getGlobalLayoutAsset('besaranSatuan.php')}">Pengenalan</a></li>
                            <li><a href="${getGlobalLayoutAsset('beratSatuan.php')}">Berat / Massa</a></li>
                            <li><a href="${getGlobalLayoutAsset('panjangSatuan.php')}">Panjang</a></li>
                            <li><a href="${getGlobalLayoutAsset('suhuSatuan.php')}">Suhu</a></li>
                            <li><a href="${getGlobalLayoutAsset('waktuSatuan.php')}">Waktu</a></li>
                            <li><a href="${getGlobalLayoutAsset('zonawaktuSatuan.php')}">Zona Waktu</a></li>
                        </ul>
                    </li>
                    <li class="dropDown">
                        <a href="#">Konversi</a>
                        <ul class="dropNav">
                            <li><a href="${getGlobalLayoutAsset('genKonv.php')}">Umum</a></li>
                            <li><a href="${getGlobalLayoutAsset('currencySatuan.php')}">Mata Uang</a></li>
                            <li><a href="${getGlobalLayoutAsset('suhuKonv.php')}">Suhu</a></li>
                            <li><a href="${getGlobalLayoutAsset('beratKonv.php')}">Berat / Massa</a></li>
                            <li><a href="${getGlobalLayoutAsset('panjangKonv.php')}">Panjang</a></li>
                            <li><a href="${getGlobalLayoutAsset('geometriKonv.php')}">Geometri</a></li>
                            <li><a href="${getGlobalLayoutAsset('waktuKonv.php')}">Waktu</a></li>
                        </ul>
                    </li>
                    <li class="dropDown">
                        <a href="#">Materi</a>
                        <ul class="dropNav" id="materi-menu">
                            <li><a href="#">Memuat materi...</a></li>
                        </ul>
                    </li>
                    <li class="dropDown">
                        <a href="#">Info</a>
                        <ul class="dropNav">
                            <li><a href="${getGlobalLayoutAsset('berita.php')}">Berita</a></li>
                            <li><a href="${getGlobalLayoutAsset('trivia.php')}">Trivia</a></li>
                            <li><a href="${getGlobalLayoutAsset('glossary.php')}">Glosarium</a></li>
                            <li><a href="${getGlobalLayoutAsset('formula.php')}">Formula</a></li>
                        </ul>
                    </li>

                    <!-- login menu-->
                    <li class="dropDown" id="login-menu">
                        <!-- Loaded dynamically -->
                    </li>
                </ul>
            </div>

            <script src="${getGlobalLayoutAsset('myscripts.js')}"></script>
            <script src="${getGlobalLayoutAsset('rumus.js')}"></script>
        `;
        this.setupMobileMenu();
        this.loadMateriMenu();
        this.loadLoginMenu();
    }

    setupMobileMenu() {
        const header = this.querySelector('#header');
        const toggleBtn = this.querySelector('.menu-toggle');
        const mainNav = this.querySelector('.mainNav');
        const dropDowns = this.querySelectorAll('.dropDown > a');

        if (!toggleBtn || !mainNav) return;

        // Mobile menu toggle
        toggleBtn.addEventListener('click', () => {
            header.classList.toggle('menu-open');
            toggleBtn.setAttribute('aria-expanded', header.classList.contains('menu-open'));
        });

        // Close menu when a regular link is clicked
        mainNav.querySelectorAll('a[href]').forEach(link => {
            if (!link.closest('.dropDown > a')) {
                link.addEventListener('click', () => {
                    header.classList.remove('menu-open');
                    toggleBtn.setAttribute('aria-expanded', 'false');
                });
            }
        });

        // Dropdown toggle for mobile
        dropDowns.forEach(link => {
            link.addEventListener('click', (e) => {
                // Only prevent default and toggle on mobile
                if (window.innerWidth <= 768) {
                    e.preventDefault();
                    const dropDown = link.closest('.dropDown');
                    const dropNav = dropDown.querySelector('.dropNav');
                    const isOpen = dropDown.classList.contains('open');

                    if (isOpen) {
                        // Close this dropdown
                        dropDown.classList.remove('open');
                        dropNav.classList.remove('show');
                    } else {
                        // Close all other dropdowns
                        this.querySelectorAll('.dropDown').forEach(dd => {
                            dd.classList.remove('open');
                            dd.querySelector('.dropNav')?.classList.remove('show');
                        });
                        // Open current
                        dropDown.classList.add('open');
                        dropNav.classList.add('show');
                    }
                }
            });
        });

        // Close menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!header.contains(e.target)) {
                header.classList.remove('menu-open');
                toggleBtn.setAttribute('aria-expanded', 'false');
            }
        });
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

    async loadLoginMenu() {
        const menu = this.querySelector('#login-menu');
        if (!menu) {
            return;
        }

        try {
            const response = await fetch(getGlobalLayoutAsset('login-menu.php'), { cache: 'no-store' });
            if (!response.ok) {
                throw new Error(`HTTP ${response.status}`);
            }

            const html = await response.text();
            menu.innerHTML = html;
        } 
        catch (error) {
            console.error('Failed to load login menu:', error);
            menu.innerHTML = '<li><a href="#">Login unavailable</a></li>';
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