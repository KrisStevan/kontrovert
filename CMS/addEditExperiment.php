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
        <title>Add/Edit Experiment</title>

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
            $id = isset($_GET['linkID']) ? (int) $_GET['linkID'] : 0;

            //show detail
            if($id <> "0")
            {
                //with ID, edit
                $result = mysqli_query($db, "SELECT * FROM articles WHERE id='$id'");
                while($tampil = mysqli_fetch_array($result)){
                    $id = $tampil["id"];
                    $idTopik = $tampil["idTopik"];
					$judul = $tampil["judul"];
                    $isi = $tampil["isi"];              //description
                    $gambar = $tampil["gambar"];        //file name
					$tanggal = $tampil["tanggal"];
                }
            }

            //submit to add or edit
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                // safe reads with defaults
                $idTopik = isset($_POST['idTopik']) ? $_POST['idTopik'] : '';
                $idJenis = 3; // fixed value for experiments
                $judul = isset($_POST['judul']) ? $_POST['judul'] : '';
                $isi = isset($_POST['isi']) ? $_POST['isi'] : '';
                $gambar = isset($_POST['gambar']) ? $_POST['gambar'] : '';
                $tanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : '';

                // escape inputs so HTML from editor is preserved and SQL is safe
                $idTopik = mysqli_real_escape_string($db, $idTopik);
                $idJenis = mysqli_real_escape_string($db, $idJenis);
                $judul = mysqli_real_escape_string($db, $judul);
                $isi = mysqli_real_escape_string($db, $isi);
                $gambar = mysqli_real_escape_string($db, $gambar);
                $tanggal = mysqli_real_escape_string($db, $tanggal);
                $hasNewUpload = false;
                $uploadedFilePath = '';
                $uploadError = '';

                // handle file upload: prefer new upload, otherwise keep existing filename
                if(isset($_FILES['gambar'])) {
                    if($_FILES['gambar']['error'] === UPLOAD_ERR_OK && is_uploaded_file($_FILES['gambar']['tmp_name'])) {
                        $uploadDir = __DIR__ . DIRECTORY_SEPARATOR . 'experiments';
                        if(!is_dir($uploadDir) && !mkdir($uploadDir, 0755, true) && !is_dir($uploadDir)) {
                            $uploadError = 'The experiment upload directory could not be created.';
                        } elseif(!is_writable($uploadDir)) {
                            $uploadError = 'The experiment upload directory is not writable.';
                        } else {
                            $originalName = basename($_FILES['gambar']['name']);
                            $extension = preg_replace('/[^A-Za-z0-9]/', '', pathinfo($originalName, PATHINFO_EXTENSION));
                            $baseName = preg_replace('/[^A-Za-z0-9._-]/', '_', pathinfo($originalName, PATHINFO_FILENAME));
                            if($baseName === '') {
                                $baseName = 'experiment';
                            }
                            $filePrefix = $baseName . '_' . time();
                            $extensionSuffix = $extension !== '' ? '.' . $extension : '';
                            $fileName = $filePrefix . $extensionSuffix;
                            $targetFilePath = $uploadDir . DIRECTORY_SEPARATOR . $fileName;
                            $collision = 1;
                            while(file_exists($targetFilePath)) {
                                $fileName = $filePrefix . '_' . $collision++ . $extensionSuffix;
                                $targetFilePath = $uploadDir . DIRECTORY_SEPARATOR . $fileName;
                            }

                            if(move_uploaded_file($_FILES['gambar']['tmp_name'], $targetFilePath)) {
                                $gambar = $fileName;
                                $uploadedFilePath = $targetFilePath;
                                $hasNewUpload = true;
                            } else {
                                $uploadError = 'Failed to save the uploaded file.';
                            }
                        }
                    } elseif($_FILES['gambar']['error'] !== UPLOAD_ERR_NO_FILE) {
                        $uploadError = 'The file upload failed. Please try again.';
                    }
                }

                if(!$hasNewUpload && $uploadError === ''){
                    // no new upload - use existing hidden field if provided
                    if(isset($_POST['existing_gambar']) && $_POST['existing_gambar'] !== ''){
                        $gambar = $_POST['existing_gambar'];
                    }
                }

                if($uploadError !== '') {
                    echo "<p role=\"alert\">" . htmlspecialchars($uploadError, ENT_QUOTES, 'UTF-8') . "</p>";
                } else {
                    $gambar = mysqli_real_escape_string($db, $gambar);

                    //querying
                    if(!empty($_POST['id']))
                    {
                        //update
                        $id = mysqli_real_escape_string($db, $_POST['id']);
                        $sqlstr = "UPDATE articles 
                                    SET idTopik='$idTopik', idJenis=3, judul='$judul', 
                                        isi='$isi', gambar='$gambar', tanggal='$tanggal' 
                                    WHERE id='$id'";
                        
                        $finMessage = "Experiment updated!";
                    }
                    else
                    {
                        $maxID = mysqli_query($db, "SELECT MAX(id) AS 'idBerita' FROM articles");
                        $idOld = mysqli_fetch_array($maxID);
                        $idNew = $idOld["idBerita"] + 1;

                        //insert
                        $sqlstr = "INSERT INTO articles (id, idTopik, idJenis, judul, isi, gambar, tanggal, created_by) 
                                    VALUES ($idNew, '$idTopik', '3', '$judul', '$isi', '$gambar', '$tanggal', '$username')";
                        
                        $finMessage = "Experiment added!";
                    }

                    // execute the query
                    $dml = mysqli_query($db, $sqlstr);

                    if(!$dml){
                        if($uploadedFilePath !== '' && file_exists($uploadedFilePath)){
                            unlink($uploadedFilePath);
                        }
                        echo "Ada Masalah Pengeditan<br>";
                        die(mysqli_error($db));
                    }
                    else{
                        echo "<b>Terima kasih! " . $finMessage . "<br>silahkan tunggu.!";
                        echo "<meta http-equiv=Refresh content=4;url=experimentsCMS.php>";
                    }
                }
            }
        ?>
        
        <!-- Your form content goes here -->
        <div class="hero" role="banner">
            <div class="hero-inner">
                <center>
                    <h2>
                        <?php
                            if($id == "0")
                            {
                                echo "Add Experiment";
                            }
                            else
                            {
                                echo "Edit Experiment";
                            }
                        ?>
                    </h2>
                </center>

                <div class="hero-cta">
                    <form class="adminaddnews admin-form" method="post" action="#"
                        align="left" enctype="multipart/form-data" 
                        onsubmit="return validateForm();">

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
                                <td>Subject/Title</td>
                                <td><input type="text" value= "<?php echo $judul ?? null; ?>" name='judul' class="adminaddnews" style="width: 500px;" /></td>
                            </tr>
                            <tr>
                                <td>Topik</td>
                                <td>
                                    <select id="idTopik" name="idTopik" onchange="chgMateri(this.value)" class="dropdownCMS" style="width: 300px; padding: 5px;" required>
                                        <option value="">-- Pilih Topik --</option>
                                        <?php
                                            $sqlstr = "SELECT id, namaTopik FROM topics";
                                            $hasil = mysqli_query($db, $sqlstr);
                                            if($id <> "0")
                                            {
                                                //with ID, edit
                                                if($hasil && mysqli_num_rows($hasil) > 0) {
                                                     while($row = mysqli_fetch_assoc($hasil)) {
                                                        $option_id = $row['id'];
                                                        $option_name = htmlspecialchars($row['namaTopik']);

                                                        $selected = ((int)$option_id === (int)$idTopik) ? ' selected="selected"' : '';
                                                        
                                                        echo "<option value=\"" . $option_id . "\"" . $selected . ">" . $option_id . " - " . $option_name . "</option>";
                                                    }
                                                }
                                                 else {
                                                    echo "<option value=\"\">-- Tidak ada jenis --</option>";
                                                }
                                            }
                                            else
                                            {
                                                //no ID, add
                                                $row = mysqli_fetch_row($hasil);
                                                if($row)
                                                {
                                                    do{
                                                        list($id, $namaTopik) = $row;
                                                        echo "<option value=\"" . $id . "\">" . $id . " - " . $namaTopik . "</option>";
                                                    }while($row = mysqli_fetch_row($hasil));
                                                }
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td>
                                    <textarea id="isi" name="isi"><?php echo $isi ?? null; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Paper/Report</td>
                                <td>
                                    <!--should be upload a file, scientific paper in PDF format-->
                                    <input type="file" name="gambar" class="adminaddnews" style="width:200px"/>
                                    <input type="hidden" name="existing_gambar" value="<?php echo htmlspecialchars($gambar ?? '', ENT_QUOTES); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Research Date</td>
                                <td>
                                    <input type="text" value= "<?php echo $tanggal ?? null; ?>" name='tanggal' class="adminaddnews" style="width:200px"/>
                                    <p>In YYYY-MM-DD format</p>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" 
                                        value="<?php echo ($id == 0) ? 'Tambah' : 'Simpan'; ?>" 
                                        class="btn-primary"/>

                                    <button type="button" class="btn-primary" onclick="window.location.href='experimentsCMS.php'">Back to Master</button>
                                </td>
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