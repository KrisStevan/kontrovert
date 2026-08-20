<?php
	if (isset($_GET['rates']) && $_GET['rates'] === '1') {
		header('Content-Type: application/json; charset=utf-8');

		$rateUrl = 'https://open.er-api.com/v6/latest/IDR';
		$rateResponse = false;
		$rateError = '';
		if (function_exists('curl_init')) {
			$curl = curl_init($rateUrl);
			curl_setopt_array($curl, [
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_CONNECTTIMEOUT => 5,
				CURLOPT_TIMEOUT => 10,
				CURLOPT_USERAGENT => 'Kontrovert currency rates',
				CURLOPT_CAINFO => 'C:/xampp/apache/bin/curl-ca-bundle.crt',
				CURLOPT_SSL_VERIFYPEER => false,
				CURLOPT_SSL_VERIFYHOST => 0
			]);
			$rateResponse = curl_exec($curl);
			curl_close($curl);
		}
		
		if ($rateResponse === false) {
			$streamContext = stream_context_create([
				'http' => [
					'timeout' => 10,
					'user_agent' => 'Kontrovert currency rates'
				],
				'ssl' => [
					'verify_peer' => true,
					'verify_peer_name' => true,
					'cafile' => 'C:/xampp/apache/bin/curl-ca-bundle.crt'
				]
			]);
			$rateResponse = @file_get_contents($rateUrl, false, $streamContext);
		}

		$rateData = $rateResponse ? json_decode($rateResponse, true) : null;
		if (!is_array($rateData) || $rateData['result'] !== 'success' || !isset($rateData['time_last_update_utc'], $rateData['rates']['USD'], $rateData['rates']['EUR'])) {
			http_response_code(502);
			echo json_encode(['error' => 'Exchange rates are temporarily unavailable.']);
			exit;
		}

		echo json_encode([
			'date' => $rateData['time_last_update_utc'],
			'rates' => [
				'IDR' => 1,
				'USD' => (float) $rateData['rates']['USD'],
				'EUR' => (float) $rateData['rates']['EUR']
			],
			'source' => 'ExchangeRate-API'
		]);
		exit;
	}
?>
<html>
	<head>
		<script src="global-layout.js" defer></script>
		<global-header></global-header>
		<style>
			.currency-widget{max-width:760px;margin:24px auto;padding:24px;background:#fff;border:1px solid var(--border);border-radius:12px;box-shadow:0 10px 24px var(--shadow)}
			.currency-widget h2{margin:0 0 6px;color:var(--crimson-dark);font-size:24px}
			.currency-widget-note{margin:0 0 18px;color:var(--text-muted)}
			.currency-form{display:flex;flex-wrap:wrap;gap:12px;align-items:end}
			.currency-field{display:flex;flex:1 1 220px;flex-direction:column;gap:5px;font-weight:700}
			.currency-field input{width:100%;padding:10px 12px;border:1px solid var(--border);border-radius:6px;font:inherit;color:var(--text)}
			.currency-form button{padding:11px 18px;border:0;border-radius:6px;background:var(--crimson);color:#fff;font-weight:700;cursor:pointer}
			.currency-form button:hover{background:var(--crimson-dark)}
			.currency-results{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:12px;margin-top:22px}
			.currency-result{padding:14px;background:var(--muted);border-left:4px solid var(--crimson)}
			.currency-result strong{display:block;font-size:20px;color:var(--text)}
			.currency-status{margin:16px 0 0;color:var(--text-muted);font-size:14px}
			@media (max-width:600px){.currency-widget{padding:18px}.currency-results{grid-template-columns:1fr}}
		</style>
	</head>
	<body>
		<script src="myscripts.js"></script>
		
		<!--bagian untuk isinya -->
		<div class="hero" role="banner">
			<div class="hero-inner">
				<center><h1 class="page-title">Daftar Kurs Mata Uang Asing </h1></center>
				<section class="currency-widget" aria-labelledby="currency-title">
					<h2 id="currency-title">Kurs Rupiah Terkini</h2>
					<p class="currency-widget-note">Masukkan jumlah Rupiah untuk melihat perkiraan nilainya dalam Dolar AS dan Euro.</p>
					<form class="currency-form" id="currency-form">
						<div class="currency-field">
							<label for="idr-amount">Jumlah (IDR)</label>
							<input id="idr-amount" name="idr-amount" type="number" min="0" step="any" value="100000" inputmode="decimal" required>
						</div>
						<button type="submit">Hitung</button>
					</form>
					<div class="currency-results" aria-live="polite">
						<div class="currency-result"><span>US Dollar (USD)</span><strong id="usd-value">Memuat...</strong></div>
						<div class="currency-result"><span>Euro (EUR)</span><strong id="eur-value">Memuat...</strong></div>
					</div>
					<p class="currency-status" id="currency-status" role="status">Mengambil kurs terbaru...</p>
				</section>

				<section class="currency-widget" aria-labelledby="dollar-title">
					<h2 id="dollar-title">Kurs Dolar Terkini</h2>
					<p class="currency-widget-note">Masukkan jumlah Dolar AS untuk melihat perkiraan nilainya dalam Rupiah dan Euro.</p>
					<form class="currency-form" id="dollar-form">
						<div class="currency-field">
							<label for="usd-amount">Jumlah (USD)</label>
							<input id="usd-amount" name="usd-amount" type="number" min="0" step="any" value="100" inputmode="decimal" required>
						</div>
						<button type="submit">Hitung</button>
					</form>
					<div class="currency-results" aria-live="polite">
						<div class="currency-result"><span>Rupiah (IDR)</span><strong id="dollar-idr-value">Memuat...</strong></div>
						<div class="currency-result"><span>Euro (EUR)</span><strong id="dollar-eur-value">Memuat...</strong></div>
					</div>
					<p class="currency-status" id="dollar-status" role="status">Mengambil kurs terbaru...</p>
				</section>
			</div>
		</div>
		<script>
			(function () {
				const formatters = {
					IDR: new Intl.NumberFormat('id-ID', {style: 'currency', currency: 'IDR'}),
					USD: new Intl.NumberFormat('en-US', {style: 'currency', currency: 'USD'}),
					EUR: new Intl.NumberFormat('de-DE', {style: 'currency', currency: 'EUR'})
				};
				let rates = null;

				function bindConverter(formId, inputId, sourceCurrency, resultIds, currencies, statusId) {
					const form = document.getElementById(formId);
					const amountInput = document.getElementById(inputId);
					const resultElements = resultIds.map(function (id) { return document.getElementById(id); });
					const status = document.getElementById(statusId);

					function renderRates() {
						const amount = Number(amountInput.value);
						if (!rates || !Number.isFinite(amount) || amount < 0) return;
						currencies.forEach(function (currency, index) {
							resultElements[index].textContent = formatters[currency].format(amount * rates[currency] / rates[sourceCurrency]);
						});
					}

					form.addEventListener('submit', function (event) {
						event.preventDefault();
						renderRates();
					});
					amountInput.addEventListener('input', renderRates);
					return {renderRates: renderRates, status: status, resultElements: resultElements};
				}

				const rupiahConverter = bindConverter('currency-form', 'idr-amount', 'IDR', ['usd-value', 'eur-value'], ['USD', 'EUR'], 'currency-status');
				const dollarConverter = bindConverter('dollar-form', 'usd-amount', 'USD', ['dollar-idr-value', 'dollar-eur-value'], ['IDR', 'EUR'], 'dollar-status');

				fetch('currencySatuan.php?rates=1')
					.then(function (response) {
						if (!response.ok) throw new Error('Rate request failed');
						return response.json();
					})
					.then(function (data) {
						if (!data.rates || !data.rates.IDR || !data.rates.USD || !data.rates.EUR) throw new Error('Incomplete rate data');
						rates = data.rates;
						rupiahConverter.renderRates();
						dollarConverter.renderRates();
						const updatedMessage = 'Kurs diperbarui: ' + data.date + '. Sumber: ' + data.source + '.';
						rupiahConverter.status.textContent = updatedMessage;
						dollarConverter.status.textContent = updatedMessage;
					})
					.catch(function () {
						[rupiahConverter, dollarConverter].forEach(function (converter) {
							converter.resultElements.forEach(function (element) { element.textContent = 'Tidak tersedia'; });
							converter.status.textContent = 'Kurs tidak dapat dimuat. Periksa koneksi internet lalu coba lagi.';
						});
					});
			})();
		</script>

		<footer id="footer" class="site-footer">
			<global-footer></global-footer>
		</footer>
	</body>
</html>