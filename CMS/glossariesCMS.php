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
                <h2>Glosaries</h2>
                <div class="hero-cta">
                    <table id="contentMat" border="1">
                        <tr>
                            <td>Istilah</td>
                            <td>Slug</td>
                            <td>Artinya</td>
                            <td>Topik</td>
                            <td>Aksi</td>
                        </tr>
                        <tr>
                            <?php
                                $jml_list = 10;
                                $halamanGl = isset($_GET['pageG']) ? max(1, (int) $_GET['pageG']) : 1;
                                $offsetGl = ($halamanGl - 1) * $jml_list;

                                $countResultGl = mysqli_query($db, "SELECT COUNT(*) FROM glossary");
                                $totalGlossaries = $countResultGl ? (int) mysqli_fetch_row($countResultGl)[0] : 0;
                                $hasNextGl = ($offsetGl + $jml_list) < $totalGlossaries;

                                $sqlstr = "SELECT g.id, g.term, g.slug, g.definition, t.namaTopik
                                            FROM glossary g
                                                INNER JOIN topics t ON g.topic = t.id
                                            ORDER BY g.term
                                            LIMIT $offsetGl,$jml_list";

                                $hasilGlo = mysqli_query($db, $sqlstr);
                                $rowGlo = mysqli_fetch_row($hasilGlo);

                                if($rowGlo){
                                    do{
                                        list($id, $term, $slug, $definition, $namaTopik) = $rowGlo;
                                        $definition_short = strlen($definition) > 25 ? substr($definition, 0, 25) . '...' : $definition;
                                        
                                        echo "<tr>";
                                            echo "<td title='$term'>$term</td>";
                                            echo "<td>$slug</td>";
                                            echo "<td>$definition_short</td>";
                                            echo "<td>$namaTopik</td>";
                                            echo"<td class='admin-actions'><a href=\"addEditGlossary.php?linkID=$id\">✎</a> 
                                                <a href=\"delete.php?table=glossary&from=glossariesCMS&linkID=$id\" onclick=\"return confirm('Are you sure you want to delete this data?');\">✕</a></td>";
                                        echo "</tr>";
                                    }while($rowGlo = mysqli_fetch_row($hasilGlo));
                                }
                            ?>
                        </tr>
                    </table>

                    <div name="pagination" id="pagination">
                        <?php echo $halamanGl; ?>
                        <?php if($halamanGl > 1): ?>
                            | <a href="?pageG=<?php echo $halamanGl-1; ?><?php if(isset($_GET['pageH'])) echo '&pageH=' . (int)$_GET['pageH']; ?>">Previous</a>
                        <?php endif; ?>
                        <?php if($hasNextGl): ?>
                            | <a href="?pageG=<?php echo $halamanGl+1; ?><?php if(isset($_GET['pageH'])) echo '&pageH=' . (int)$_GET['pageH']; ?>">Next</a>
                        <?php endif; ?>
                    </div>

                    <a class="btn-primary" href="addEditGlossary.php">New Term</a>
                </div>
            </div>
        </div>

        <footer id="footer" class="site-footer">
			<global-footer></global-footer>
		</footer>
    </body>
</html>