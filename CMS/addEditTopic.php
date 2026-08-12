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
            if($id <> "0")
            {
                $result = mysqli_query($db, "SELECT id, namaTopik, fg_in_news, fg_in_materi FROM topics WHERE id='$id'");
                while($tampil = mysqli_fetch_array($result)){
                    $id = $tampil["id"];
                    $namaTopik = $tampil["namaTopik"];
                    $fg_in_news = $tampil["fg_in_news"];
                    $fg_in_materi = $tampil["fg_in_materi"];
                }
            }

            //submit to add or edit
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $namaTopik = isset($_POST['namaTopik']) ? $_POST['namaTopik'] : '';
                $fg_in_news = isset($_POST['fg_in_news']) ? $_POST['fg_in_news'] : '0';
                $fg_in_materi = isset($_POST['fg_in_materi']) ? $_POST['fg_in_materi'] : '0';

                //querying
                if(!empty($_POST['id']))
                {
                    // Update existing topic
                    //edit
                    $sqlstr = "UPDATE topics 
                                SET namaTopik = '$namaTopik', fg_in_news = '$fg_in_news', 
                                    fg_in_materi = '$fg_in_materi'
                                WHERE id = $id ";

                    $finMessage = "Topik sudah di-update!";
                }
                else{
                    //add
                    $maxID = mysqli_query($db, "SELECT MAX(id) AS 'idTopik' FROM topics");
                    $idOld = mysqli_fetch_array($maxID);
                    $idNew = $idOld["idTopik"] + 1;

                    $sqlstr = "INSERT INTO topics (id, namaTopik, fg_in_news, fg_in_materi)
                                VALUES($idNew, '$namaTopik', '$fg_in_news', '$fg_in_materi')";

                    $finMessage = "Topik sudah ditambah!";
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
                                echo "Add Topic";
                            }
                            else
                            {
                                echo "Edit Topic";
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
                                <td>Nama Topik</td>
                                <td><input type="text" value= "<?php echo $namaTopik ?? null; ?>" name='namaTopik' class="adminaddnews" /></td>
                            </tr>
                            <tr>
                                <td>In News?</td>
                                <td>
                                    <input type="checkbox" id="inNews" name="fg_in_news" value="1" 
                                        <?php if(isset($fg_in_news) && $fg_in_news == 1) echo 'checked'; ?>>
                                </td>
                            </tr>
                            <tr>
                                <td>In Materi?</td>
                                <td>
                                    <input type="checkbox" id="inMateri" name="fg_in_materi" value="1" 
                                        <?php if(isset($fg_in_materi) && $fg_in_materi == 1) echo 'checked'; ?>>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" value="<?php echo ($id == 0) ? 'Tambah Topik' : 'Simpan Perubahan'; ?>" class="btn-primary"/></td>
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