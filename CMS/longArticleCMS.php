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
?>

<!DOCTYPE html>
<html>
    <head>
		<title>Lessons CMS</title>
        <script src="cms-layout.js" defer></script>
        <global-header></global-header>
        <link rel="stylesheet" href="buttons.css">
	</head>
	<body>
		<!-- Your page content goes here -->
        <div class="hero" role="banner">
			<div class="hero-inner">
				<h2>Lessons</h2>
				<div class="hero-cta">
					<table id="contentMat" border="1">
                        <tr>
                            <td>Judul</td>
                            <td>Topik</td>
                            <td>Sumber</td>
                            <td>Tanggal</td>
                            <td>Aksi</td>
                        </tr>
                        <?php
                            $jml_list = 10;
                            $halamanLessons = isset($_GET['pageL']) ? max(1, (int) $_GET['pageL']) : 1;
                            $offsetLessons = ($halamanLessons - 1) * $jml_list;

                            $countResultLessons = mysqli_query($db, "SELECT COUNT(*) FROM articles WHERE idjenis = 5");
                            $totalLessons = $countResultLessons ? (int) mysqli_fetch_row($countResultLessons)[0] : 0;
                            $hasNextLessons = ($offsetLessons + $jml_list) < $totalLessons;

                            $sqlstr = "SELECT a.id, t.namaTopik, a.gambar, 
                                            a.judul, a.isi, a.sumber, a.tanggal
                                        FROM articles a
                                            INNER JOIN topics t ON a.idTopik = t.id
                                        WHERE a.idjenis = 5
                                        ORDER BY a.id
                                        LIMIT $offsetLessons,$jml_list";

                            $hasil = mysqli_query($db, $sqlstr);
                            $row = mysqli_fetch_row($hasil);
                            
                            if($row)
                            {
                                do{
                                    list($id,$namaTopik,$gambar,$judul,$isi,$sumber,$tanggal) = $row;
                                    $judul_short = strlen($judul) > 25 ? substr($judul, 0, 25) . '...' : $judul;
                                    
                                    echo "<tr>";
                                        echo "<td title='$judul'>$judul_short</td>";
                                        echo "<td>$namaTopik</td>";
                                        echo "<td>$sumber</td>";
                                        echo "<td>" . date('d M Y', strtotime($tanggal)) ."</td>";
                                        echo"<td class='admin-actions'><a href=\"addEditArticle.php?linkID=$id\">✎</a> 
                                            <a href=\"delete.php?table=articles&from=longArticleCMS&linkID=$id\" onclick=\"return confirm('Are you sure you want to delete this data?');\">✕</a></td>";
                                    echo "</tr>";
                                }while($row = mysqli_fetch_row($hasil));
                            }
                        ?>
                    </table>
				</div>
                <br>
                    <div name="pagination" id="pagination">
                        <?php echo $halamanLessons; ?>
                        <?php if($halamanLessons > 1): ?>
                            | <a href="?pageL=<?php echo $halamanLessons-1; ?><?php if(isset($_GET['pageN'])) echo '&pageN=' . (int)$_GET['pageN']; ?>">Previous</a>
                        <?php endif; ?>
                        <?php if($hasNextLessons): ?>
                            | <a href="?pageL=<?php echo $halamanLessons+1; ?><?php if(isset($_GET['pageN'])) echo '&pageN=' . (int)$_GET['pageN']; ?>">Next</a>
                        <?php endif; ?>
                    </div>
                <br>
                <h2>News</h2>
                <div class="hero-cta">
                    <table id="contentMat" border="1">
                        <tr>
                            <td>Judul</td>
                            <td>Topik</td>
                            <td>Sumber</td>
                            <td>Tanggal</td>
                            <td>Aksi</td>
                        </tr>
                        <?php
                            $halamanNews = isset($_GET['pageN']) ? max(1, (int) $_GET['pageN']) : 1;
                            $offsetNews = ($halamanNews - 1) * $jml_list;

                            $countResultNews = mysqli_query($db, "SELECT COUNT(*) FROM articles WHERE idjenis IN (1, 3, 6)");
                            $totalNews = $countResultNews ? (int) mysqli_fetch_row($countResultNews)[0] : 0;
                            $hasNextNews = ($offsetNews + $jml_list) < $totalNews;

                            $sqlstr = "SELECT a.id, t.namaTopik, a.gambar, a.judul, a.isi, a.sumber, a.tanggal 
                                        FROM articles a
                                            INNER JOIN topics t ON a.idTopik = t.id
                                        WHERE a.idjenis IN (1, 3, 6)
                                        ORDER BY a.id
                                        LIMIT $offsetNews,$jml_list";

                            $hasilNews = mysqli_query($db, $sqlstr);
                            $rowNews = mysqli_fetch_row($hasilNews);

                            if($rowNews)
                            {
                                do{
                                    list($id,$namaTopik,$gambar,$judul,$isi,$sumber,$tanggal) = $rowNews;
                                    $judul_short = strlen($judul) > 25 ? substr($judul, 0, 25) . '...' : $judul;
                                    
                                    echo "<tr>";
                                        echo "<td title='$judul'>$judul_short</td>";
                                        echo "<td>$namaTopik</td>";
                                        echo "<td>$sumber</td>";
                                        echo "<td>" . date('d M Y', strtotime($tanggal)) ."</td>";
                                        echo"<td class='admin-actions'><a href=\"addEditArticle.php?linkID=$id\">✎</a> 
                                            <a href=\"delete.php?table=articles&from=longArticleCMS&linkID=$id\" onclick=\"return confirm('Are you sure you want to delete this data?');\">✕</a></td>";
                                    echo "</tr>";
                                }while($rowNews = mysqli_fetch_row($hasilNews));
                            }
                        ?>
                    </table>
                    <div name="pagination" id="pagination">
                        <?php echo $halamanNews; ?>
                        <?php if($halamanNews > 1): ?>
                            | <a href="?pageN=<?php echo $halamanNews-1; ?><?php if(isset($_GET['pageL'])) echo '&pageL=' . (int)$_GET['pageL']; ?>">Previous</a>
                        <?php endif; ?>
                        <?php if($hasNextNews): ?>
                            | <a href="?pageN=<?php echo $halamanNews+1; ?><?php if(isset($_GET['pageL'])) echo '&pageL=' . (int)$_GET['pageL']; ?>">Next</a>
                        <?php endif; ?>
                    </div>

                    <a class="btn-primary" href="addEditArticle.php">Add New</a>
                </div>
			</div>
		</div>

        <footer id="footer" class="site-footer">
			<global-footer></global-footer>
		</footer>
	</body>
</html>