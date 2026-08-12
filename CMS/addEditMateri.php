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
        <title>Add/Edit Topic</title>
        <script src="cms-layout.js" defer></script>
        <global-header></global-header>
        <link rel="stylesheet" href="buttons.css">

        <style>
            .admin-form { max-width:900px; margin:30px auto; background:#fff; padding:18px; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.06);} 
            .admin-form table { width:100%; border-collapse:collapse; }
            .admin-form td { padding:8px 6px; vertical-align:top; }
            .admin-form input[type="text"], .admin-form select, .admin-form textarea { width:100%; padding:8px; border:1px solid #d1c7d1; border-radius:4px; }
            .admin-form input[type="file"] { padding:4px; }
            .admin-form .form-actions { text-align:left; }
            .hero-inner h2 { margin-top:0; }
        </style>
    </head>
    <body>
        <?php
            $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

            //show detail
            if($id != "0")
            {
                $result = mysqli_query($db, "SELECT id, name, topics_id FROM materials WHERE id='$id'");
                while($tampil = mysqli_fetch_array($result)){
                    $id = $tampil["id"];
                    $name = $tampil["name"];
                    $topics_id = $tampil["topics_id"];
                }
            }

            //submit to add or edit
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $name = isset($_POST['name']) ? $_POST['name'] : '';
                $topics_id = isset($_POST['topics_id']) ? $_POST['topics_id'] : '';

                if(!empty($_POST['id']))
                {
                    // Update existing material
                    $sqlstr = "UPDATE materials 
                                SET name = '$name', topics_id = '$topics_id'
                                WHERE id = $id ";

                    $finMessage = "Materi sudah di-update!";
                }
                else{
                    // Add new material
                    $maxID = mysqli_query($db, "SELECT MAX(id) AS 'idMateri' FROM materials");
                    $idOld = mysqli_fetch_array($maxID);
                    $idNew = $idOld["idMateri"] + 1;

                    $sqlstr = "INSERT INTO materials (id, name, topics_id)
                                VALUES($idNew, '$name', '$topics_id')";

                    $finMessage = "Materi sudah ditambah!";
                }

                // execute the query
                $dml = mysqli_query($db, $sqlstr);

                if(!$dml){
                    echo "Ada Masalah Pengeditan<br> " . mysqli_error($db);
                } else{
                    echo "<b>Terima kasih! " . $finMessage . "<br>silahkan tunggu.!";
                    echo "<meta http-equiv=Refresh content=4;url=matTopCMS.php>";
                }
            }

        ?>

        <!-- Your page content goes here -->
        <div class="hero" role="banner">
            <div class="hero-inner">
                <center>
                    <h2>
                        <?php
                            if($id == "0")
                            {
                                echo "Add Materi";
                            }
                            else
                            {
                                echo "Edit Materi";
                            }
                        ?>
                    </h2>
                </center>

                <div class="hero-cta">
                    <form class="adminaddnews admin-form" method="post" action="#" align="left" enctype="multipart/form-data">
                        <table border = "0" style="font-size: 15px;">
                            <?php
                                if($id != "0")
                                {
                                    echo "<tr>
                                            <td>ID</td>
                                            <td><input type='text' value= '" . $id . "' name='id' style='width: 100px;' readonly/></td>
                                        </tr>";
                                }
                            ?>

                            <tr>
                                <td>Nama Materi</td>
                                <td><input type="text" value= "<?php echo $name ?? null; ?>" name='name' class="adminaddnews" /></td>
                            </tr>
                            <tr>
                                <td>Topik</td>
                                <td>
                                    <select name="topics_id" class="adminaddnews">
                                        <option value="">Pilih Topik</option>
                                        <?php
                                            $topicsResult = mysqli_query($db, "SELECT id, namaTopik FROM topics WHERE fg_in_materi = 1");
                                            while($topic = mysqli_fetch_array($topicsResult)){
                                                echo "<option value='" . $topic['id'] . "' " . ($topic['id'] == $topics_id ? 'selected' : '') . ">" . $topic['namaTopik'] . "</option>";
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" value="<?php echo ($id == 0) ? 'Tambah Materi' : 'Simpan Perubahan'; ?>" class="btn-primary"/></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>

        <footer id="footer" class="site-footer">
			<global-footer></global-footer>
		</footer>
    </body>
</html>