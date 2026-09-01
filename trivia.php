<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Trivia Sains - Daily Science Facts</title>
		<script src="global-layout.js" defer></script>
		<global-header></global-header>
		<link rel="stylesheet" href="CMS/buttons.css">
		<style>
			.trivia-container {
				max-width: 1000px;
				margin: 0 auto;
				padding-bottom: 20px;
			}

			.trivia-grid {
				display: grid;
				grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
				gap: 20px;
				margin-top: 30px;
			}

			.trivia-card {
				background: var(--surface);
				border-radius: 12px;
				overflow: hidden;
				box-shadow: 0 4px 12px var(--shadow);
				transition: transform 0.2s ease, box-shadow 0.2s ease;
				display: flex;
				flex-direction: column;
				height: 100%;
				border-left: 4px solid var(--crimson);
			}

			.trivia-card:hover {
				transform: translateY(-4px);
				box-shadow: 0 8px 20px rgba(220, 20, 60, 0.15);
			}

			.trivia-card-image {
				width: 100%;
				height: 180px;
				background: linear-gradient(135deg, rgba(220, 20, 60, 0.08), rgba(220, 20, 60, 0.03));
				display: flex;
				align-items: center;
				justify-content: center;
				overflow: hidden;
			}

			.trivia-card-image img {
				width: 100%;
				height: 100%;
				object-fit: cover;
			}

			.trivia-card-placeholder {
				width: 100%;
				height: 100%;
				background: linear-gradient(135deg, var(--crimson), var(--crimson-dark));
				display: flex;
				align-items: center;
				justify-content: center;
				color: white;
				font-size: 36px;
			}

			.trivia-card-content {
				padding: 16px;
				flex-grow: 1;
				display: flex;
				flex-direction: column;
			}

			.trivia-card-date {
				font-size: 12px;
				color: var(--text-muted);
				margin-bottom: 8px;
				text-transform: uppercase;
				letter-spacing: 0.5px;
			}

			.trivia-card-title {
				font-size: 16px;
				font-weight: 700;
				color: var(--text);
				margin: 0 0 10px 0;
				line-height: 1.4;
				flex-grow: 1;
			}

			.trivia-card-preview {
				font-size: 13px;
				color: var(--text-muted);
				line-height: 1.5;
				margin-bottom: 12px;
				display: -webkit-box;
				-webkit-line-clamp: 2;
				-webkit-box-orient: vertical;
				overflow: hidden;
			}

			.trivia-card-link {
				display: inline-block;
				padding: 8px 16px;
				background: linear-gradient(135deg, var(--crimson), var(--crimson-dark));
				color: white;
				text-decoration: none;
				border-radius: 6px;
				font-size: 13px;
				font-weight: 600;
				transition: all 0.2s ease;
				text-align: center;
				align-self: flex-start;
			}

			.trivia-card-link:hover {
				background: linear-gradient(135deg, var(--crimson-dark), var(--crimson));
				box-shadow: 0 6px 14px rgba(220, 20, 60, 0.3);
			}

			.pagination {
				display: flex;
				justify-content: center;
				gap: 8px;
				margin-top: 40px;
				padding: 20px 0;
				flex-wrap: wrap;
			}

			.pagination a, .pagination span {
				padding: 8px 12px;
				border-radius: 6px;
				text-decoration: none;
				border: 1px solid var(--border);
				background: var(--surface);
				color: var(--text);
				transition: all 0.2s ease;
				font-size: 14px;
				font-weight: 500;
			}

			.pagination a:hover {
				background: var(--crimson);
				color: white;
				border-color: var(--crimson);
			}

			.pagination .current {
				background: var(--crimson);
				color: white;
				border-color: var(--crimson);
			}

			.pagination .disabled {
				color: var(--text-muted);
				cursor: not-allowed;
			}

			.daily-fact {
				background: linear-gradient(135deg, var(--crimson), var(--crimson-dark));
				color: white;
				padding: 24px;
				border-radius: 12px;
				margin-bottom: 30px;
				box-shadow: 0 8px 24px rgba(220, 20, 60, 0.2);
			}

			.daily-fact-label {
				font-size: 12px;
				text-transform: uppercase;
				letter-spacing: 1px;
				opacity: 0.9;
				margin-bottom: 8px;
			}

			.daily-fact-title {
				font-size: 22px;
				font-weight: 700;
				margin: 0 0 12px 0;
				line-height: 1.4;
			}

			.daily-fact-link {
				display: inline-block;
				padding: 10px 20px;
				background: rgba(255, 255, 255, 0.2);
				color: white;
				text-decoration: none;
				border-radius: 6px;
				font-weight: 600;
				transition: all 0.2s ease;
				border: 1px solid rgba(255, 255, 255, 0.3);
				margin-top: 12px;
			}

			.daily-fact-link:hover {
				background: rgba(255, 255, 255, 0.3);
				border-color: rgba(255, 255, 255, 0.5);
			}

			.empty-state {
				text-align: center;
				padding: 40px 20px;
				color: var(--text-muted);
			}

			.empty-state-icon {
				font-size: 48px;
				margin-bottom: 16px;
			}

			@media (max-width: 768px) {
				.trivia-grid {
					grid-template-columns: 1fr;
				}

				.daily-fact-title {
					font-size: 18px;
				}

				.pagination {
					gap: 4px;
				}

				.pagination a, .pagination span {
					padding: 6px 10px;
					font-size: 12px;
				}
			}
		</style>
	</head>
	<body>
		<div class="hero" role="banner">
			<div class="hero-inner">
				<h1 class="page-title">💡 Trivia Sains</h1>
				<p>Discover fascinating science facts every day. Expand your knowledge with bite-sized science!</p>
			</div>
		</div>

		<div class="trivia-container">
			<?php
				include "db.inc.php";
				connect_db($db);
				
				$per_page = 12;
				$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
				$offset = ($page - 1) * $per_page;

				// Get total count for pagination
				$count_sql = "SELECT COUNT(*) as total FROM articles WHERE idJenis='4'";
				$count_result = mysqli_query($db, $count_sql);
				$count_row = mysqli_fetch_assoc($count_result);
				$total_articles = $count_row['total'];
				$total_pages = ceil($total_articles / $per_page);

				// Get all trivia for current page
				$sqlstr = "SELECT id, judul, isi, gambar, tanggal FROM articles WHERE idJenis='4' ORDER BY id DESC LIMIT $offset, $per_page";
				$hasil = mysqli_query($db, $sqlstr);

				if (!$hasil || mysqli_num_rows($hasil) == 0) {
					echo "<div class='empty-state'>";
					echo "<div class='empty-state-icon'>📚</div>";
					echo "<p>No science facts available at the moment.</p>";
					echo "</div>";
				} else {
					echo "<div class='trivia-grid'>";
					
					while ($row = mysqli_fetch_assoc($hasil)) {
						$id = $row['id'];
						$judul = htmlspecialchars($row['judul'], ENT_QUOTES, 'UTF-8');
						$isi = htmlspecialchars($row['isi'], ENT_QUOTES, 'UTF-8');
						$gambar = $row['gambar'];
						$tanggal = date_format(date_create($row['tanggal']), "M d, Y");
						
						// Preview text (first 120 characters)
						$preview = strlen($isi) > 120 ? substr($isi, 0, 120) . '...' : $isi;
						
						echo "<div class='trivia-card'>";
						
						// Image section
						echo "<div class='trivia-card-image'>";
						if (!empty($gambar)) {
							$img_path = htmlspecialchars("Images/$gambar", ENT_QUOTES, 'UTF-8');
							echo "<img src='$img_path' alt='" . htmlspecialchars($judul) . "' loading='lazy'>";
						} else {
							echo "<div class='trivia-card-placeholder'>⚗️</div>";
						}
						echo "</div>";
						
						// Content section
						echo "<div class='trivia-card-content'>";
							echo "<div class='trivia-card-date'>$tanggal</div>";
								echo "<h3 class='trivia-card-title'>$judul</h3>";
								echo "<p class='trivia-card-preview'>$preview</p>";
								echo "<a href='beritaDetail.php?id=$id' class='trivia-card-link'>Read Full Fact →</a>";
							echo "</div>";
						echo "</div>";
					}
					
					echo "</div>";
				}

				// Pagination
				if ($total_pages > 1) {
					echo "<div class='pagination'>";
					
					// Previous button
					if ($page > 1) {
						echo "<a href='?page=" . ($page - 1) . "'>← Previous</a>";
					} else {
						echo "<span class='disabled'>← Previous</span>";
					}
					
					// Page numbers
					$start_page = max(1, $page - 2);
					$end_page = min($total_pages, $page + 2);
					
					if ($start_page > 1) {
						echo "<a href='?page=1'>1</a>";
						if ($start_page > 2) {
							echo "<span>...</span>";
						}
					}
					
					for ($i = $start_page; $i <= $end_page; $i++) {
						if ($i == $page) {
							echo "<span class='current'>$i</span>";
						} else {
							echo "<a href='?page=$i'>$i</a>";
						}
					}
					
					if ($end_page < $total_pages) {
						if ($end_page < $total_pages - 1) {
							echo "<span>...</span>";
						}
						echo "<a href='?page=$total_pages'>$total_pages</a>";
					}
					
					// Next button
					if ($page < $total_pages) {
						echo "<a href='?page=" . ($page + 1) . "'>Next →</a>";
					} else {
						echo "<span class='disabled'>Next →</span>";
					}
					
					echo "</div>";
				}

				mysqli_close($db);
			?>
		</div>

		<footer id="footer" class="site-footer">
			<global-footer></global-footer>
		</footer>
	</body>
</html>