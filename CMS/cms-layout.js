const getGlobalLayoutBase = () => {
    const currentScript = document.currentScript || document.querySelector('script[src*="cms-layout.js"]');
    const scriptUrl = currentScript ? new URL(currentScript.getAttribute('src'), window.location.href) : new URL('cms-layout.js', window.location.href);
    return new URL('.', scriptUrl).href;
};

const getGlobalLayoutAsset = (fileName) => {
    return new URL(fileName, getGlobalLayoutBase()).href;
};

class GlobalHeader extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
            <link rel="stylesheet" href="${getGlobalLayoutAsset('../penampilan.css')}">
            <meta charset="UTF-8">
            
            <title>Kontrovert - Las Contentas</title>

            <div id="header">
                <a href="${getGlobalLayoutAsset('../home.php')}">
                    <img src="${getGlobalLayoutAsset('../Images/logo.jpg')}" alt="Kontrovert logo" style="height:56px; width:auto; float:left;">
                </a>

                <ul class="mainNav" id="main-navigation">
                    <li class="dropDown">
                        <a href="#" onclick="event.preventDefault(); this.parentElement.classList.toggle('open');">Artikel</a>
                        <ul class="dropNav">
                            <li><a href="${getGlobalLayoutAsset('longArticleCMS.php')}">Berita dan Materi</a></li>
                            <li><a href="${getGlobalLayoutAsset('shortArticleCMS.php')}">Trivia dan Sejarah</a></li>
                        </ul>
                    </li>
                    <li class="dropDown">
                        <a href="#" onclick="event.preventDefault(); this.parentElement.classList.toggle('open');">Manage</a>
                        <ul class="dropNav">
                            <li><a href="${getGlobalLayoutAsset('matTopCMS.php')}">Materi dan Topik</a></li>
                            <li><a href="${getGlobalLayoutAsset('userCMS.php')}">User</a></li>
                            <li><a href="${getGlobalLayoutAsset('../home.php')}">To Home</a></li>
                        </ul>
                    </li>
                    <li class="dropDown">
                        <a href="#" onclick="event.preventDefault(); this.parentElement.classList.toggle('open');">User</a>
                        <ul class="dropNav">
                            <li><a href="${getGlobalLayoutAsset('../logs/logout.php')}">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
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