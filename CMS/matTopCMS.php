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
                <h2>Topics</h2>
                <div class="hero-cta">
                    <table id="contentMat" border="1">
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>News?</td>
                            <td>Materi?</td>
                            <td>Aksi</td>
                        </tr>
                        <?php
                            $jml_list = 5;
                            $halaman = isset($_GET['pageT']) ? max(1, (int) $_GET['pageT']) : 1;
                            $offset = ($halaman-1)*5;

                            $countResult = mysqli_query($db, "SELECT COUNT(*) FROM topics");
                            $totalTopics = $countResult ? (int) mysqli_fetch_row($countResult)[0] : 0;
                            $hasNextTopics = ($offset + $jml_list) < $totalTopics;

                            $sqlstr = "SELECT id, namaTopik, fg_in_news, fg_in_materi 
                                        FROM topics limit $offset,5";

                            $hasil = mysqli_query($db, $sqlstr);
                            $row = mysqli_fetch_row($hasil);

                            if($row)
                            {
                                do{
                                    list($id,$namaTopik,$fg_in_news,$fg_in_materi) = $row;
                                    echo "<tr>";
                                        echo "<td>$id</td>";
                                        echo "<td>$namaTopik</td>";
                                        echo "<td>" . ($fg_in_news ? 'Yes' : 'No') . "</td>";
                                        echo "<td>" . ($fg_in_materi ? 'Yes' : 'No') . "</td>";
                                        echo "<td><a href='addEditTopic.php?id=$id'>✎</a>
                                            <a href='delete.php?table=topics&from=matTopCMS&linkID=$id' onclick='return confirm(\"Are you sure?\")'>✕</a></td>";
                                    echo "</tr>";
                                }while($row = mysqli_fetch_row($hasil));
                            }
                        ?>
                    </table>
                    <div name="pagination" id="pagination">
                        <?php echo $halaman; ?>
                        <?php if($halaman > 1): ?>
                            | <a href="?pageT=<?php echo $halaman-1; ?><?php if(isset($_GET['pageM'])) echo '&pageM=' . (int)$_GET['pageM']; ?>">Previous</a>
                        <?php endif; ?>
                        <?php if($hasNextTopics): ?>
                            | <a href="?pageT=<?php echo $halaman+1; ?><?php if(isset($_GET['pageM'])) echo '&pageM=' . (int)$_GET['pageM']; ?>">Next</a>
                        <?php endif; ?>
                    </div>

                    <a class="btn-primary" href="addEditTopic.php">Add New</a>
                </div>
                <br>
                <h2>Materies</h2>
                <div class="hero-cta">
                    <table id="contentMat" border="1">
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Topic</td>
                            <td>Aksi</td>
                        </tr>
                        <?php
                            $halaman2=isset($_GET['pageM']) ? max(1, (int) $_GET['pageM']) : 1;
                            $offset=($halaman2-1)*5;

                            $countResultMat = mysqli_query($db, "SELECT COUNT(*) FROM materials m INNER JOIN topics t ON m.topics_id = t.id");
                            $totalMateri = $countResultMat ? (int) mysqli_fetch_row($countResultMat)[0] : 0;
                            $hasNextMateri = ($offset + $jml_list) < $totalMateri;

                            $sqlstr = "SELECT m.id, m.name, t.namaTopik
                                        FROM materials m 
                                            INNER JOIN topics t ON m.topics_id = t.id
                                        limit $offset,5";

                            $hasilMat = mysqli_query($db, $sqlstr);
                            $rowMat = mysqli_fetch_row($hasilMat);
                          
                            if($rowMat)
                            {
                                do{
                                    list($id,$name,$topic_name) = $rowMat;
                                    echo "<tr>";
                                        echo "<td>$id</td>";
                                        echo "<td>$name</td>";
                                        echo "<td>$topic_name</td>";
                                        echo "<td><a href='addEditMateri.php?id=$id'>✎</a>
                                                <a href='delete.php?table=materials&from=matTopCMS&linkID=$id' onclick='return confirm(\"Are you sure?\")'>✕</a></td>";
                                    echo "</tr>";
                                }while($rowMat = mysqli_fetch_row($hasilMat));
                            }
                        ?>
                    </table>
                    <div name="pagination" id="pagination">
                        <?php echo $halaman2; ?>
                        <?php if($halaman2 > 1): ?>
                            | <a href="?pageM=<?php echo $halaman2-1; ?><?php if(isset($_GET['pageT'])) echo '&pageT=' . (int)$_GET['pageT']; ?>">Previous</a>
                        <?php endif; ?>
                        <?php if($hasNextMateri): ?>
                            | <a href="?pageM=<?php echo $halaman2+1; ?><?php if(isset($_GET['pageT'])) echo '&pageT=' . (int)$_GET['pageT']; ?>">Next</a>
                        <?php endif; ?>
                    </div>

                    <a class="btn-primary" href="addEditMateri.php">Add New</a>
                </div>
            </div>
        </div>

        <footer id="footer" class="site-footer">
			<global-footer></global-footer>
		</footer>
    </body>
</html>