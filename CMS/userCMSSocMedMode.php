<!DOCTYPE html>
<html>
    <head>
		<title>User Info</title>
        <script src="cms-layout.js" defer></script>
        <global-header></global-header>
        <link rel="stylesheet" href="buttons.css">
        <style>
            body {
                font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
                background: #f4f7fb;
                color: #1f2937;
                margin: 0;
                min-height: 100vh;
            }
            .hero {
                background: linear-gradient(135deg, #4f46e5 0%, #2563eb 100%);
                color: #fff;
                padding: 2rem 1rem 5rem;
                position: relative;
            }
            .hero-inner {
                max-width: 960px;
                margin: 0 auto;
            }
            .hero h2 {
                margin: 0;
                font-size: 2.3rem;
                letter-spacing: 0.02em;
            }
            .profile-page {
                max-width: 960px;
                margin: -4rem auto 2rem;
                padding: 0 1rem 2rem;
            }
            .profile-card {
                background: #ffffff;
                border-radius: 24px;
                box-shadow: 0 24px 60px rgba(15, 23, 42, 0.12);
                overflow: hidden;
                margin-top:10%;
            }
            .profile-header {
                background: linear-gradient(135deg, #fd9b9b, #7a0808);
                padding: 2.5rem 2rem 1.25rem;
                position: relative;
            }
            .profile-avatar {
                width: 100px;
                height: 100px;
                border-radius: 50%;
                border: 6px solid #ffffff;
                object-fit: cover;
                background: #e2e8f0;
                position: absolute;
                bottom: -60px;
                left: 40px;
                left: 2rem;
            }
            .profile-header .profile-actions {
                position: absolute;
                right: 2rem;
                bottom: 0.75rem;
                display: flex;
                gap: 0.75rem;
                flex-wrap: wrap;
            }
            .profile-header .btn-primary,
            .profile-header .btn-student {
                min-width: 110px;
            }
            .profile-summary {
                padding: 5.5rem 2rem 2rem;
            }
            .profile-name {
                margin: -30px 0px 0.3rem;
                font-size: 1.8rem;
                font-weight: 700;
            }
            .profile-username {
                color: #7c3aed;
                margin: 0 0 0.75rem;
                font-size: 0.98rem;
            }
            .profile-bio {
                margin: 0px 0 1rem;
                line-height: 1.7;
                max-width: 680px;
                color: #334155;
            }
            .profile-grid {
                display: grid;
                grid-template-columns: repeat(3, minmax(0, 1fr));
                gap: 1rem;
                margin-bottom: 1rem;
            }
            .profile-stat {
                background: #f7e9e9;
                border-radius: 18px;
                padding: 1rem 1rem 0.9rem;
                text-align: center;
            }
            .profile-stat strong {
                display: block;
                font-size: 1.5rem;
                margin-bottom: 0.25rem;
                color: #111827;
            }
            .profile-stat span {
                color: #64748b;
                font-size: 0.95rem;
            }
            .profile-details {
                display: grid;
                gap: 1rem;
            }
            .detail-row {
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
                padding: 1rem 1.2rem;
                border-radius: 18px;
                border: 1px solid #e2e8f0;
                background: #ffffff;
                flex-direction: row;
                flex-wrap: wrap;
            }
            .detail-row strong {
                font-size: 0.98rem;
                color: #0f172a;
            }
            .detail-row span {
                font-size: 0.95rem;
                color: #475569;
            }
            .detail-row-news{
                display: flex;
                flex-direction: column;
                gap: 0.5rem;
                justify-content: flex-start;
            }
            .article-item {
                display: flex;
                align-items: center;
                gap: 0.75rem;
                width: 100%;
                white-space: normal;
            }
            .article-date {
                color: #475569;
                font-size: 0.9rem;
                min-width: 120px;
            }
            @media (max-width: 720px) {
                .profile-page { margin: -3rem auto 1rem; }
                .profile-header { padding: 2rem 1.25rem 0.9rem; }
                .profile-avatar { left: 1.25rem; }
                .profile-header .profile-actions { position: static; margin-top: 1rem; justify-content: stretch; }
                .profile-grid { grid-template-columns: 1fr; }
            }
        </style>
	</head>
    <body>
        <main class="profile-page">
            <section class="profile-card" aria-label="User profile card">
                <div class="profile-header">
                    <img class="profile-avatar" src="https://via.placeholder.com/240" alt="User avatar">
                    <div class="profile-actions">
                        <button class="btn-primary" type="button">Message</button>
                        <button class="btn-student" type="button">Follow</button>
                    </div>
                </div>
                <div class="profile-summary">
                    <h1 class="profile-name">Alyssa Hart</h1>
                    <p class="profile-username">@alyssahart</p>
                    <p class="profile-bio">Educator, content creator, and lifelong learner. Passionate about making math and science engaging for every learner through clear explanations and fun visuals.</p>
                    <div class="profile-grid">
                        <div class="profile-stat">
                            <strong>284</strong>
                            <span>Posts</span>
                        </div>
                        <div class="profile-stat">
                            <strong>12.4K</strong>
                            <span>Followers</span>
                        </div>
                        <div class="profile-stat">
                            <strong>420</strong>
                            <span>Following</span>
                        </div>
                    </div>
                    <div class="profile-details">
                        <div class="detail-row">
                            <strong>Location</strong>
                            <span>Jakarta, Indonesia</span>
                        </div>
                        <div class="detail-row">
                            <strong>Role</strong>
                            <span>Content Manager / CMS Admin</span>
                        </div>
                        <div class="detail-row">
                            <strong>Interests</strong>
                            <span>Edtech, Mathematics, Physics, Web Design</span>
                        </div>
                        <div class="detail-row">
                            <strong>Articles</strong>
                            <div class="detail-row-news">
                                <?php
                                    include "../db.inc.php";
                                    connect_db($db);

                                    $sqlstr = "SELECT * FROM articles WHERE created_by = 'stevan1' ORDER BY tanggal DESC"; // Replace 'stevan1' with the actual username
                                    $result = mysqli_query($db, $sqlstr);

                                    if (!$result || mysqli_num_rows($result) === 0) {
                                        echo "Tidak ada artikel yang dibuat";
                                    } else {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $id = $row['id'];
                                            $idTopik = $row['idTopik'];
                                            $idJenis = $row['idJenis'];
                                            $judul = htmlspecialchars($row['judul'], ENT_QUOTES, 'UTF-8');
                                            $tanggal = $row['tanggal'];

                                            $link = ($idJenis === '5')
                                                ? "../materi.php?id=" . urlencode($idTopik) . "&article=" . urlencode($id)
                                                : "../beritaDetail.php?id=" . urlencode($id);

                                            echo "<div class='article-item'>";
                                                echo "<span class='article-date'>" . date_format(date_create($tanggal), "d F Y") . "</span> ";
                                                echo "<a href='" . htmlspecialchars($link, ENT_QUOTES, 'UTF-8') . "' target='_blank'>" . $judul . "</a>";
                                            echo "</div>";
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <footer id="footer" class="site-footer">
			<global-footer></global-footer>
		</footer>
    </body>
</html>