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
				<h2>Histories</h2>
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
                            $halamanHist = isset($_GET['pageH']) ? max(1, (int) $_GET['pageH']) : 1;
                            $offsetHist = ($halamanHist - 1) * $jml_list;

                            $countResultHist = mysqli_query($db, "SELECT COUNT(*) FROM articles WHERE idjenis = 2");
                            $totalHistories = $countResultHist ? (int) mysqli_fetch_row($countResultHist)[0] : 0;
                            $hasNextHist = ($offsetHist + $jml_list) < $totalHistories;

                            $sqlstr = "SELECT a.id, t.namaTopik, a.gambar, 
                                            a.judul, a.isi, a.sumber, a.tanggal
                                        FROM articles a
                                            INNER JOIN topics t ON a.idTopik = t.id
                                        WHERE a.idjenis = 2
                                        ORDER BY a.id
                                        LIMIT $offsetHist,$jml_list";

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
                                            <a href=\"deleteArticle.php?table=articles&from=shortArticleCMS&linkID=$id\" onclick=\"return confirm('Are you sure you want to delete this data?');\">✕</a></td>";
                                    echo "</tr>";
                                }while($row = mysqli_fetch_row($hasil));
                            }
                        ?>
                    </table>
                    <div name="pagination" id="pagination">
                        <?php echo $halamanHist; ?>
                        <?php if($halamanHist > 1): ?>
                            | <a href="?pageH=<?php echo $halamanHist-1; ?><?php if(isset($_GET['pageT'])) echo '&pageT=' . (int)$_GET['pageT']; ?>">Previous</a>
                        <?php endif; ?>
                        <?php if($hasNextHist): ?>
                            | <a href="?pageH=<?php echo $halamanHist+1; ?><?php if(isset($_GET['pageT'])) echo '&pageT=' . (int)$_GET['pageT']; ?>">Next</a>
                        <?php endif; ?>
                    </div>
				</div>
                <br>
                <h2>Trivias</h2>
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
                            $halamanTr = isset($_GET['pageT']) ? max(1, (int) $_GET['pageT']) : 1;
                            $offsetTr = ($halamanTr - 1) * $jml_list;

                            $countResultTr = mysqli_query($db, "SELECT COUNT(*) FROM articles WHERE idjenis = 4");
                            $totalTrivias = $countResultTr ? (int) mysqli_fetch_row($countResultTr)[0] : 0;
                            $hasNextTr = ($offsetTr + $jml_list) < $totalTrivias;

                            $sqlstr = "SELECT a.id, t.namaTopik, a.gambar, a.judul, a.isi, a.sumber, a.tanggal 
                                        FROM articles a
                                            INNER JOIN topics t ON a.idTopik = t.id
                                        WHERE a.idjenis = 4
                                        ORDER BY a.id
                                        LIMIT $offsetTr,$jml_list";

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
                                            <a href=\"deleteArticle.php?table=articles&from=shortArticleCMS&linkID=$id\" onclick=\"return confirm('Are you sure you want to delete this data?');\">✕</a></td>";
                                    echo "</tr>";
                                }while($rowNews = mysqli_fetch_row($hasilNews));
                            }
                        ?>
                    </table>
                    <div name="pagination" id="pagination">
                        <?php echo $halamanTr; ?>
                        <?php if($halamanTr > 1): ?>
                            | <a href="?pageT=<?php echo $halamanTr-1; ?><?php if(isset($_GET['pageH'])) echo '&pageH=' . (int)$_GET['pageH']; ?>">Previous</a>
                        <?php endif; ?>
                        <?php if($hasNextTr): ?>
                            | <a href="?pageT=<?php echo $halamanTr+1; ?><?php if(isset($_GET['pageH'])) echo '&pageH=' . (int)$_GET['pageH']; ?>">Next</a>
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