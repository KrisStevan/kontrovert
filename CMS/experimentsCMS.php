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
		<title>Experiments CMS</title>
        <script src="cms-layout.js" defer></script>
        <global-header></global-header>
        <link rel="stylesheet" href="buttons.css">
	</head>
    <body>
        <!-- Your page content goes here -->
        <div class="hero" role="banner">
            <div class="hero-inner">
                <h2>Experiments and Research</h2>
                <div class="hero-cta">
                    <table id="contentMat" border="1">
                        <tr>
                            <td>Title</td>
                            <td>Topic</td>
                            <td>Description</td>
                            <td>Journal Link</td>
                            <td>Date</td>
                            <td>Actions</td>
                        </tr>
                        <?php
                            //paging
                            $jml_list = 10;
                            $page = isset($_GET['page']) ? max(1, (int) $_GET['page']) : 1;
                            $offset = ($page - 1) * $jml_list;

                            $countResult = mysqli_query($db, "SELECT COUNT(*) FROM articles WHERE idjenis = 3");
                            $total = $countResult ? (int) mysqli_fetch_row($countResult)[0] : 0;
                            $hasNext = ($offset + $jml_list) < $total;
                            //end of paging

                            $sqlstr = "SELECT a.id, t.namaTopik, a.judul, a.isi, a.gambar, a.tanggal
                                        FROM articles a
                                            INNER JOIN topics t ON a.idTopik = t.id
                                        WHERE a.idjenis = 3
                                        ORDER BY a.id
                                        LIMIT $offset, $jml_list";

                            $hasil = mysqli_query($db, $sqlstr);
                            $row = mysqli_fetch_row($hasil);
                        
                            if($row)
                            {
                                do{
                                    list($id,$namaTopik,$judul,$isi,$gambar,$tanggal) = $row;
                                    $judul_short = strlen($judul) > 25 ? substr($judul, 0, 25) . '...' : $judul;
                                    $isi_short = strlen($isi) > 25 ? substr($isi, 0, 25) . '...' : $isi;

                                    echo "<tr>";
                                        echo "<td title='$judul'>$judul_short</td>";
                                        echo "<td>$namaTopik</td>";
                                        echo "<td>$isi_short</td>";
                                        echo "<td>$gambar</td>";
                                        echo "<td>" . date('d M Y', strtotime($tanggal)) ."</td>";
                                        echo"<td class='admin-actions'><a href=\"addEditExperiment.php?linkID=$id\">✎</a> 
                                            <a href=\"delete.php?table=articles&from=experimentsCMS&linkID=$id\" onclick=\"return confirm('Are you sure you want to delete this data?');\">✕</a></td>";
                                    echo "</tr>";

                                }while($row = mysqli_fetch_row($hasil));
                            }
                        ?>
                    </table>
                    <div name="pagination" id="pagination">
                        <?php echo $page; ?>
                        <?php if($page > 1): ?>
                            | <a href="?page=<?php echo $page-1; ?><?php if(isset($_GET['page'])) echo '&page=' . (int)$_GET['page']; ?>">Previous</a>
                        <?php endif; ?>
                        <?php if($hasNext): ?>
                            | <a href="?page=<?php echo $page+1; ?><?php if(isset($_GET['page'])) echo '&page=' . (int)$_GET['page']; ?>">Next</a>
                        <?php endif; ?>
                    </div>

                    <a class="btn-primary" href="addEditExperiment.php">Add New</a>
                </div>
            </div>
        </div>

        <footer id="footer" class="site-footer">
			<global-footer></global-footer>
		</footer>
    </body>
</html>