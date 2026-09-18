<?php
	require_once __DIR__ . '/../logs/session.php';
	require_once __DIR__ . '/../db.inc.php';
	connect_db($db);

	$username = isset($_SESSION['login_user']) ? $_SESSION['login_user'] : '';
	$username = mysqli_real_escape_string($db, $username);

	$sqlstr = "SELECT u.full_name, u.email, u.username, u.password, u.kode_posisi,
					u.reputation, u.domicile, u.interests, u.num_posts, u.bio,
					u.profile_photo, p.id AS posisi_id, p.nama AS nama_posisi
				FROM users u
				JOIN user_positions p ON u.kode_posisi = p.id
				WHERE u.username = '$username' LIMIT 1";

	$hasil = mysqli_query($db, $sqlstr);
	if (!$hasil || mysqli_num_rows($hasil) === 0) {
		header('Location: ../home.php');
		exit();
	}

	$row = mysqli_fetch_assoc($hasil);
	$full_name = $row['full_name'];
	$email = $row['email'];
	$username = $row['username'];
	$password = $row['password'];
	$kode_posisi = $row['kode_posisi'];
	$reputation = $row['reputation'];
	$domicile = $row['domicile'];
	$interests = $row['interests'];
	$num_posts = $row['num_posts'];
	$bio = $row['bio'];
	$profile_photo = $row['profile_photo'];
	$nama_posisi = $row['nama_posisi'];
?>

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
            
            .detail-news{
                display: grid;
                grid-template-columns: repeat(3, minmax(0, 1fr));
                gap: 1rem;
                width: 100%;
                align-items: stretch;
                margin-top: 2%;
            }
            .article-item {
                display: flex;
                flex-direction: column;
                gap: 0.65rem;
                background: #f8fafc;
                border: 1px solid #e2e8f0;
                border-radius: 18px;
                overflow: hidden;
                box-shadow: 0 12px 28px rgba(15, 23, 42, 0.08);
                min-width: 0;
            }
            .article-item img {
                width: 100%;
                height: 180px;
                object-fit: cover;
                display: block;
                background: #e2e8f0;
            }
            .article-item-text {
                padding: 0 0.85rem 0.95rem;
                display: flex;
                flex-direction: column;
                gap: 0.35rem;
                min-width: 0;
            }
            .article-date {
                color: #64748b;
                font-size: 0.8rem;
                line-height: 1.3;
            }
            .article-item a {
                color: #0f172a;
                text-decoration: none;
                font-weight: 600;
                line-height: 1.45;
            }
            .article-item a:hover {
                color: #4f46e5;
            }
            @media (max-width: 920px) {
                .detail-news { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            }
            @media (max-width: 720px) {
                .profile-page { margin: -3rem auto 1rem; }
                .profile-header { padding: 2rem 1.25rem 0.9rem; }
                .profile-avatar { left: 1.25rem; }
                .profile-header .profile-actions { position: static; margin-top: 1rem; justify-content: stretch; }
                .profile-grid { grid-template-columns: 1fr; }
                .detail-news { grid-template-columns: 1fr; }
            }
        </style>
	</head>
    <body>
        <main class="profile-page">
            <section class="profile-card" aria-label="User profile card">
                <div class="profile-header">
                    <img class="profile-avatar" 
                        src="../Images/Profile/<?php echo htmlspecialchars($profile_photo, ENT_QUOTES); ?>" 
                        alt="User avatar">
                </div>
                <div class="profile-summary">
                    <h1 class="profile-name">
                        <?php echo $full_name; ?>
                        <a href="editProfile.php">✎</a> 
                    </h1>
                    <p class="profile-username">@<?php echo $username; ?></p>
                    <p class="profile-bio"><?php echo $bio; ?></p>
                    <div class="profile-details">
                        <div class="detail-row">
                            <strong>Location</strong>
                            <span><?php echo $domicile; ?></span>
                        </div>
                        <div class="detail-row">
                            <strong>Role</strong>
                            <span><?php echo $nama_posisi; ?></span>
                        </div>
                        <div class="detail-row">
                            <strong>Interests</strong>
                            <span><?php echo $interests; ?></span>
                        </div>
                        <div class="detail-row">
                            <strong>Articles</strong><br>
                            <div class="detail-news">
                                <?php
                                    $sqlstr = "SELECT * FROM articles WHERE created_by = '$login_session' ORDER BY tanggal DESC"; // Replace 'stevan1' with the actual username
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
                                            $gambar = htmlspecialchars($row['gambar'], ENT_QUOTES, 'UTF-8');

                                            $link = ($idJenis === '5')
                                                ? "../materi.php?id=" . urlencode($idTopik) . "&article=" . urlencode($id)
                                                : "../beritaDetail.php?id=" . urlencode($id);

                                            echo "<div class='article-item'>";
                                                if ($idJenis === '5'){
                                                    echo "<img src='../Images/Materi/$gambar' width=100px height=100px align=center>";
                                                }
                                                else{
                                                    echo "<img src='../Images/$gambar' width=100px height=100px align=center>";
                                                }
                                                
                                                echo "<div class='article-item-text'>";
                                                    echo "<span class='article-date'>" . date_format(date_create($tanggal), "d F Y") . "</span> ";
                                                    echo "<a href='" . htmlspecialchars($link, ENT_QUOTES, 'UTF-8') . "' target='_blank'>" . $judul . "</a>";
                                                echo "</div>";
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