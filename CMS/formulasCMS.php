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

        <!-- KaTeX CSS -->
        <link rel="stylesheet" href="../katex/katex.min.css">

        <link rel="stylesheet" href="buttons.css">
	</head>
    <body>
        <!-- Your page content goes here -->
        <div class="hero" role="banner">
            <div class="hero-inner">
                <h2>Formulae</h2>
                <div class="hero-cta">
                    <table id="contentMat" border="1">
                        <tr>
                            <td>Formula Name</td>
                            <td>Formula Value</td>
                            <td>Explanation</td>
                            <td>Topic</td>
                            <td>Actions</td>
                        </tr>
                        <tr>
                            <?php
                                $jml_list = 10;
                                $halamanFm = isset($_GET['pageF']) ? max(1, (int) $_GET['pageF']) : 1;
                                $offsetFm = ($halamanFm - 1) * $jml_list;

                                $countResultFm = mysqli_query($db, "SELECT COUNT(*) FROM formulas");
                                $totalFormulas = $countResultFm ? (int) mysqli_fetch_row($countResultFm)[0] : 0;
                                $hasNextFm = ($offsetFm + $jml_list) < $totalFormulas;

                                $sqlstr = "SELECT f.id, f.formula_title, f.formula_value, f.explanation, t.namaTopik
                                            FROM formulas f
                                                INNER JOIN topics t ON f.topic_id = t.id
                                            ORDER BY f.formula_title
                                            LIMIT $offsetFm, $jml_list";

                                $hasilF = mysqli_query($db, $sqlstr);
                                $rowF = mysqli_fetch_row($hasilF);
                            
                                if($rowF)
                                {
                                    do{
                                        list($id,$formula_title,$formula_value,$explanation,$namaTopik) = $rowF;
                                        $formula_title_short = strlen($formula_title) > 20 ? substr($formula_title, 0, 20) . '...' : $formula_title;
                                        $formula_value = '$$ '. $formula_value . ' $$';
                                        $explanation_short = strlen($explanation) > 20 ? substr($explanation, 0, 20) . '...' : $explanation;

                                        echo "<tr>";
                                            echo "<td title='$formula_title'>$formula_title_short</td>";
                                            echo "<td> $formula_value </td>";
                                            echo "<td title='$explanation'>$explanation_short</td>";
                                            echo "<td>$namaTopik</td>";
                                            echo"<td class='admin-actions'>
                                                    <a href=\"addEditFormula.php?linkID=$id\">✎</a> 
                                                    <a href=\"delete.php?table=formulas&from=formulasCMS&linkID=$id\" 
                                                        onclick=\"return confirm('Are you sure you want to delete this data?');\">✕</a>
                                                </td>";
                                        echo "</tr>";
                                    }while($rowF = mysqli_fetch_row($hasilF));
                                }
                            ?>
                        </tr>
                    </table>

                    <div name="pagination" id="pagination">
                        <?php echo $halamanFm; ?>
                        <?php if($halamanFm > 1): ?>
                            | <a href="?pageF=<?php echo $halamanFm-1; ?><?php if(isset($_GET['pageF'])) echo '&pageF=' . (int)$_GET['pageF']; ?>">Previous</a>
                        <?php endif; ?>
                        <?php if($hasNextFm): ?>
                            | <a href="?pageF=<?php echo $halamanFm+1; ?><?php if(isset($_GET['pageF'])) echo '&pageF=' . (int)$_GET['pageF']; ?>">Next</a>
                        <?php endif; ?>
                    </div>

                    <a class="btn-primary" href="addEditFormula.php">New Formula</a>
                </div>
            </div>
        </div>

        <footer id="footer" class="site-footer">
			<global-footer></global-footer>
		</footer>

        <!-- KaTeX -->
        <script src="../katex/katex.min.js"></script>
        <script src="../katex/contrib/auto-render.min.js"></script>

        <!-- Initialize KaTeX -->
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                renderMathInElement(document.body, {
                    delimiters: [
                        {left: "$$", right: "$$", display: true},
                        {left: "\\(", right: "\\)", display: false},
                        {left: "\\[", right: "\\]", display: true}
                    ]
                });
            });
        </script>
    </body>
</html>