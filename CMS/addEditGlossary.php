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
        <title>Add/Edit Glossary</title>
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
            if($id != "0")
            {
                $result = mysqli_query($db, "SELECT id, term, slug, definition, topic, related_page, source FROM glossary WHERE id='$id'");
                while($tampil = mysqli_fetch_array($result)){
                    $id = $tampil["id"];
                    $term = $tampil["term"];
                    $slug = $tampil["slug"];
                    $definition = $tampil["definition"];
                    $idTopik = $tampil["topic"];
                    $related_page = $tampil["related_page"];
                    $source = $tampil["source"];
                }
            }

            //submit to add or edit
            if($_SERVER['REQUEST_METHOD'] === 'POST')
            {
                $term = isset($_POST['term']) ? $_POST['term'] : '';
                $slug = isset($_POST['slug']) ? $_POST['slug'] : '';
                $definition = isset($_POST['definition']) ? $_POST['definition'] : '';
                $idTopik = isset($_POST['idTopik']) ? $_POST['idTopik'] : '';
                $related_page = isset($_POST['related_page']) ? $_POST['related_page'] : '';
                $source = isset($_POST['source']) ? $_POST['source'] : '';

                if(!empty($_POST['id']))
                {
                    // Update existing glossary
                    $sqlstr = "UPDATE glossary 
                                SET term = '$term', slug = '$slug', definition = '$definition',
                                    topic = '$idTopik', related_page = '$related_page', source = '$source'
                                WHERE id = $id ";
                    
                    $finMessage = "Glossary sudah di-update!";
                }
                else
                {
                    // Insert new glossary
                    $sqlstr = "INSERT INTO glossary (term, slug, definition, topic, related_page, source) 
                                VALUES ('$term', '$slug', '$definition', '$idTopik', '$related_page', '$source')";
                
                    $finMessage = "Glossary sudah ditambah!";
                }

                $dml = mysqli_query($db, $sqlstr);
                if(!$dml){
                    echo "Ada Masalah Pengeditan<br> " . mysqli_error($db);
                } else{
                    echo "<b>Terima kasih! " . $finMessage . "<br>silahkan tunggu.!";
                    echo "<meta http-equiv=Refresh content=4;url=glossariesCMS.php>";
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
                                echo "Add Glossary";
                            }
                            else
                            {
                                echo "Edit Glossary";
                            }
                        ?>
                    </h2>
                </center>
                <div class="hero-cta">
                    <form class="adminaddnews admin-form" method="post" action="#" align="left" enctype="multipart/form-data" onsubmit="return validateForm();">
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
                                <td>Istilah (Term)</td>
                                <td><input type="text" value= "<?php echo $term ?? null; ?>" name='term' class="adminaddnews" /></td>
                            </tr>
                            <tr>
                                <td>Slug</td>
                                <td><input type="text" value= "<?php echo $slug ?? null; ?>" name='slug' class="adminaddnews" /></td>
                            </tr>
                            <tr>
                                <td>Definition</td>
                                <td><textarea name='definition' class="adminaddnews" rows="5"><?php echo $definition ?? null; ?></textarea></td>
                            </tr>
                            <tr>
                                <td>Topic</td>
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
                                <td>Related Page</td>
                                <td><input type="text" value= "<?php echo $related_page ?? null; ?>" name='related_page' class="adminaddnews" /></td>
                            </tr>
                            <tr>
                                <td>Source</td>
                                <td><input type="text" value= "<?php echo $source ?? null; ?>" name='source' class="adminaddnews" /></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" value="<?php echo ($id == 0) ? 'Tambah' : 'Simpan'; ?>" class="btn-primary"/></td>
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