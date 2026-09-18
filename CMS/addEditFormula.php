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
        <title>Add/Edit Formula</title>
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
                $result = mysqli_query($db, "SELECT formula_title, formula_value, explanation, topic_id FROM formulas WHERE id = '$id' LIMIT 1");
                while($tampil = mysqli_fetch_array($result)){
                    $formula_title = $tampil["formula_title"];
                    $formula_value = $tampil["formula_value"];
                    $explanation = $tampil["explanation"];
                    $topic_id = $tampil["topic_id"];
                }
            } 
           
            //submit to add or edit
            if($_SERVER['REQUEST_METHOD'] === 'POST')
            {
                $formula_title = isset($_POST['formula_title']) ? $_POST['formula_title'] : '';
                $formula_value = isset($_POST['formula_value']) ? $_POST['formula_value'] : '';
                $explanation = isset($_POST['explanation']) ? $_POST['explanation'] : '';
                $topic_id = isset($_POST['topic_id']) ? $_POST['topic_id'] : '';

                $formula_title = mysqli_real_escape_string($db, $formula_title);
                $formula_value = mysqli_real_escape_string($db, $formula_value);
                $explanation = mysqli_real_escape_string($db, $explanation);
                $topic_id = mysqli_real_escape_string($db, $topic_id);

                if(!empty($_POST['id']))
                {
                    $sqlstr = "UPDATE formulas 
                                SET formula_title = '$formula_title', formula_value = '$formula_value', 
                                    explanation = '$explanation', topic_id = '$topic_id'
                                WHERE id = $id ";
                    
                    $finMessage = "Formula sudah di-update!";
                }
                else
                {
                    //get ID first
                    $sqlID = "SELECT MAX(id) AS max_id FROM formulas";
                    $result = mysqli_query($db, $sqlID);
                    $row = mysqli_fetch_assoc($result);
                    $newId = $row['max_id'] + 1;

                    // Insert new formula
                    $sqlstr = "INSERT INTO formulas (id, formula_title, formula_value, explanation, topic_id) 
                                VALUES ('$newId', '$formula_title', '$formula_value', '$explanation', '$topic_id')";
                
                    $finMessage = "Formula sudah ditambah!";
                }

                $dml = mysqli_query($db, $sqlstr);
                if(!$dml){
                    echo "Ada Masalah Pengeditan<br> " . mysqli_error($db);
                } else{
                    echo "<b>Terima kasih! " . $finMessage . "<br>silahkan tunggu.!";
                    echo "<meta http-equiv=Refresh content=4;url=formulasCMS.php>";
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
                                echo "Add Formula";
                            }
                            else
                            {
                                echo "Edit Formula";
                            }
                        ?>
                    </h2>
                </center>
                <div class="hero-cta">
                    <form class="adminaddnews admin-form" method="post" action="#" align="left" enctype="multipart/form-data">
                        <table>
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
                                <td>Formula Name</td>
                                <td><input type="text" name="formula_title" value="<?php echo $formula_title ?? null; ?>" required></td>
                            </tr>
                            <tr>
                                <td>Formula Value</td>
                                <td>
                                    <input type="text" name="formula_value" value="<?php echo $formula_value ?? null; ?>" required>
                                    <p>For fractions, use the format \frac{numerator}{denominator}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>Explanation</td>
                                <td><textarea name="explanation" rows="4" required><?php echo $explanation ?? null; ?></textarea></td>
                            </tr>
                            <tr>
                                <td>Topic</td>
                                <td>
                                    <select name="topic_id" required>
                                        <option value="">-- Pilih Topik --</option>
                                        <?php
                                            $sqlstr = "SELECT id, namaTopik FROM topics";
                                            $result = mysqli_query($db, $sqlstr);

                                            if($id <> "0")
                                            {
                                                //with ID, edit
                                                if($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $option_id = $row['id'];
                                                        $option_name = htmlspecialchars($row['namaTopik']);

                                                        $selected = ((int)$option_id === (int)$topic_id) ? ' selected="selected"' : '';

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
                                                $row = mysqli_fetch_row($result);
                                                if($row)
                                                {
                                                    do{
                                                        list($id, $namaTopik) = $row;
                                                        echo "<option value=\"" . $id . "\">" . $id . " - " . $namaTopik . "</option>";
                                                    }while($row = mysqli_fetch_row($result));
                                                }
                                            }
                                        ?>
                                    </select>
                                </td>
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