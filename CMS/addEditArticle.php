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
		<title>Add/Edit Content</title>
        <script src="cms-layout.js" defer></script>
        <global-header></global-header>
        <link rel="stylesheet" href="buttons.css">

        <script src="https://cdn.tiny.cloud/1/w2jypw38hk4yo3f6zxzqy97j1kv600dm1cocyumjp50mis2s/tinymce/8/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const jenis = document.getElementById("idJenis").value;
                const topik = document.getElementById("idTopik").value;

                if(jenis) {
                    chgTopik(jenis);
                }

                if (topik) {
                    chgMateri(topik);
                }
            });

            // Form validation
            function validateForm() {
                const judul = document.getElementsByName("judul")[0].value.trim();
                const idJenis = document.getElementById("idJenis").value.trim();
                const idTopik = document.getElementById("idTopik").value.trim();
                const idMateri = document.getElementById("idMateri").value.trim();
                
                if (judul === '') {
                    alert('Judul tidak boleh kosong!');
                    return false;
                }
                if (idJenis === '') {
                    alert('Pilih Jenis terlebih dahulu!');
                    return false;
                }
                if (idTopik === '') {
                    alert('Pilih Topik terlebih dahulu!');
                    return false;
                }
                if ((idMateri === '') && (idJenis === '5')){
                    alert('Pilih Materi terlebih dahulu!');
                    return false;
                }
                return true;
            }

            //textarea for isi
            //https://www.tiny.cloud/my-account/integrate/cloud-based/?guide=html
            tinymce.init({
                selector: 'textarea#isi', // Replace this CSS selector to match the placeholder element for TinyMCE
                plugins: 'powerpaste advcode table lists checklist',
                toolbar: 'undo redo | blocks| bold italic | bullist numlist checklist | code | table'
            });

            //change topik
            function chgTopik(idJenis) {
                fetch("getTopik.php?idJenis=" + idJenis)
                    .then(response => response.json())
                    .then(data => {
                        let topik = document.getElementById("idTopik");
                        topik.innerHTML = "";

                        data.forEach(item => {
                            let option = document.createElement("option");
                            option.value = item.id;
                            option.text = item.namaTopik;
                            topik.appendChild(option);
                        });

                        // Clear materi dropdown when topik changes
                        let materi = document.getElementById("idMateri");
                        materi.innerHTML = "<option value=''>-- Pilih Materi --</option>";
                    }
                );
            }

            //change materi
            function chgMateri(idTopik, selectedMateri = null)
            {
                fetch("getMateri.php?idTopik=" + idTopik)
                    .then(response => response.json())
                    .then(data => {

                        let materi = document.getElementById("idMateri");
                        materi.innerHTML = "";

                        data.forEach(item => {

                            let option = document.createElement("option");

                            option.value = item.id;
                            option.text = item.name;

                            if(selectedMateri == item.id){
                                option.selected = true;
                            }

                            materi.appendChild(option);
                        });
                    }
                );
            }

            // image preview
            function previewImage(event) {
                const file = event.target.files && event.target.files[0];
                const preview = document.getElementById('imgPreview');
                if (!file) {
                    if(preview) { preview.style.display = 'none'; preview.src = ''; }
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    if(preview) {
                        preview.src = e.target.result;
                        preview.style.display = 'block';
                    }
                }
                reader.readAsDataURL(file);
            }
        </script>
        <style>
            .admin-form { max-width:900px; margin:30px auto; background:#fff; padding:18px; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.06);} 
            .admin-form table { width:100%; border-collapse:collapse; }
            .admin-form td { padding:8px 6px; vertical-align:top; }
            .admin-form input[type="text"], .admin-form select, .admin-form textarea { width:100%; padding:8px; border:1px solid #d1c7d1; border-radius:4px; }
            .admin-form input[type="file"] { padding:4px; }
            .admin-form .form-actions { text-align:left; }
            #imgPreview { max-width:240px; max-height:180px; display:none; margin-top:8px; border:1px solid #ddd; padding:4px; border-radius:4px; }
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
                    $idJenis = $tampil["idJenis"];
                    $gambar = $tampil["gambar"];
					$judul = $tampil["judul"];
                    $isi = $tampil["isi"];
                    $sumber = $tampil["sumber"];
					$tanggal = $tampil["tanggal"];
					$idMateri = $tampil["idMateri"];
                }
            }

            //submit to add or edit
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                // safe reads with defaults
                $idTopik = isset($_POST['idTopik']) ? $_POST['idTopik'] : '';
                $idJenis = isset($_POST['idJenis']) ? $_POST['idJenis'] : '';
                $judul = isset($_POST['judul']) ? $_POST['judul'] : '';
                $isi = isset($_POST['isi']) ? $_POST['isi'] : '';
                $tanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : '';
                $sumber = isset($_POST['sumber']) ? $_POST['sumber'] : '';
                $idMateri = isset($_POST['idMateri']) ? $_POST['idMateri'] : '';

                // escape inputs so HTML from editor is preserved and SQL is safe
                $idTopik = mysqli_real_escape_string($db, $idTopik);
                $idJenis = mysqli_real_escape_string($db, $idJenis);
                $judul = mysqli_real_escape_string($db, $judul);
                $isi = mysqli_real_escape_string($db, $isi);
                $tanggal = mysqli_real_escape_string($db, $tanggal);
                $sumber = mysqli_real_escape_string($db, $sumber);
                $idMateri = mysqli_real_escape_string($db, $idMateri);

                // handle image upload: prefer new upload, otherwise keep existing filename
                $gambar = '';
                $uploadedFilePath = '';
                $hasNewUpload = false;

                if(isset($_FILES['gambar']) && is_uploaded_file($_FILES['gambar']['tmp_name']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK){
                    if ($idJenis === '5') 
                    {
                        $uploadDir = realpath(__DIR__ . '/../Images/Materi');
                        if($uploadDir === false){
                            $uploadDir = __DIR__ . '/../Images/Materi';
                        }
                    } 
                    else 
                    {
                        $uploadDir = realpath(__DIR__ . '/../Images');
                        if($uploadDir === false){
                            $uploadDir = __DIR__ . '/../Images';
                        }
                    }

                    $origName = basename($_FILES['gambar']['name']);
                    $ext = pathinfo($origName, PATHINFO_EXTENSION);
                    $safeName = preg_replace('/[^A-Za-z0-9._-]/', '_', pathinfo($origName, PATHINFO_FILENAME));
                    $newName = $safeName . '_' . time() . ($ext ? '.' . $ext : '');
                    $targetPath = $uploadDir . DIRECTORY_SEPARATOR . $newName;

                    if(move_uploaded_file($_FILES['gambar']['tmp_name'], $targetPath)){
                        $gambar = $newName;
                        $uploadedFilePath = $targetPath;
                        $hasNewUpload = true;
                    }
                }

                if(!$hasNewUpload){
                    // no new upload - use existing hidden field if provided
                    if(isset($_POST['existing_gambar']) && $_POST['existing_gambar'] !== ''){
                        $gambar = $_POST['existing_gambar'];
                    }
                }

                // escape filename for SQL safety
                $gambar = mysqli_real_escape_string($db, $gambar);

                //querying
                if(!empty($_POST['id']))
                {
                    //edit
                    $sqlstr = "UPDATE articles 
                                SET idTopik = '$idTopik', idJenis = '$idJenis', 
                                    idMateri = '$idMateri', gambar = '$gambar', 
                                    judul = '$judul', isi = '$isi', sumber = '$sumber', 
                                    created_by = '$username', tanggal = '" . date("Y-m-d") . "'
                                WHERE id = $id ";

                    $finMessage = "Artikel sudah di-update!";
                }
                else{
                    //add
                    $maxID = mysqli_query($db, "SELECT MAX(id) AS 'idBerita' FROM articles");
                    $idOld = mysqli_fetch_array($maxID);
                    $idNew = $idOld["idBerita"] + 1;

                    $sqlstr = "INSERT INTO articles (id, idTopik, idJenis, idMateri, 
                                    gambar, judul, isi, sumber,
                                    tanggal, created_by)
                                VALUES($idNew, '$idTopik', '$idJenis', '$idMateri', 
                                    '$gambar', '$judul', '$isi', '$sumber', 
                                    '" . date("Y-m-d") . "', '$username')";

                    $finMessage = "Artikel sudah ditambah!";
                }

                // execute the query
                $dml = mysqli_query($db, $sqlstr);

                if(!$dml){
                    if(!empty($uploadedFilePath) && file_exists($uploadedFilePath)){
                        @unlink($uploadedFilePath);
                    }
                    echo "Ada Masalah Pengeditan<br>";
                    die(mysqli_error($db));
                }
                else{
                    echo "<b>Terima kasih! " . $finMessage . "<br>silahkan tunggu.!";
                    
                    if (($idJenis == 2) || ($idJenis == 4))
                    {
                        echo "<meta http-equiv=Refresh content=4;url=shortArticleCMS.php>";
                    }
                    else
                    {
                        echo "<meta http-equiv=Refresh content=4;url=longArticleCMS.php>";
                    }
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
                                echo "Add Article";
                            }
                            else
                            {
                                echo "Edit Article";
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
                                <td>Judul</td>
                                <td><input type="text" value= "<?php echo $judul ?? null; ?>" name='judul' class="adminaddnews" /></td>
                            </tr>
                            <tr>
                                <td>Jenis</td>
                                <td>
                                    <select id="idJenis" name="idJenis" onchange="chgTopik(this.value)" class="dropdownCMS" style="width: 300px; padding: 5px;" required>
                                    <option value="">-- Pilih Jenis --</option>
                                        <?php
                                            $sqlstr = "SELECT id, namaJenis FROM jenis";
                                            $hasil = mysqli_query($db, $sqlstr);
                                            
                                            if($id <> "0")
                                            {
                                                //with ID, edit
                                                if($hasil && mysqli_num_rows($hasil) > 0) {
                                                    while($row = mysqli_fetch_assoc($hasil)) {
                                                        $option_id = $row['id'];
                                                        $option_name = htmlspecialchars($row['namaJenis']);

                                                        $selected = ((int)$option_id === (int)$idJenis) ? ' selected="selected"' : '';
                                                        
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
                                                        list($id,$namaJenis) = $row;
                                                        echo "<option value=\"" . $id . "\">" . $id . " - " . $namaJenis . "</option>";
                                                    }while($row = mysqli_fetch_row($hasil));
                                                }
                                            } 
                                        ?>
                                    </select>
                                </td>
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
                                <td>Materi</td>
                                <td>
                                    <select id="idMateri" name="idMateri" class="dropdownCMS" style="width: 300px; padding: 5px;">
                                    <option value="">-- Pilih Materi --</option>
                                        <?php
                                            $sqlstr = "SELECT id, name, topics_id FROM materials WHERE topics_id = $option_id ";
                                            $hasil = mysqli_query($db, $sqlstr);
                                            if($id <> "0")
                                            {
                                                //with ID, edit
                                                if($hasil && mysqli_num_rows($hasil) > 0) {
                                                     while($row = mysqli_fetch_assoc($hasil)) {
                                                        $option_id = $row['id'];
                                                        $option_name = htmlspecialchars($row['name']);
                                                        
                                                        $selected = ((int)$option_id === (int)$idMateri) ? ' selected="selected"' : '';
                                                        
                                                        echo "<option value=\"" . $option_id . "\"" . $selected . ">" . $option_id . " - " . $option_name . "</option>";
                                                    }
                                                }
                                                 else {
                                                    echo "<option value=\"\">-- Tidak ada Materi --</option>";
                                                }
                                            }
                                            else
                                            {
                                                //no ID, add
                                                $row = mysqli_fetch_row($hasil);
                                                if($row)
                                                {
                                                    do{
                                                        list($id, $name, $topics_id) = $row;
                                                        echo "<option value=\"" . $id . "\">" . $id . " - " . $name . "</option>";
                                                    }while($row = mysqli_fetch_row($hasil));
                                                }
                                            }
                                        ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Isi</td>
                                <td>
                                    <textarea id="isi" name="isi"><?php echo $isi ?? null; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Gambar</td>
                                <td>
                                    <input type="file" id="gambarInput" name="gambar" accept="image/*" onchange="previewImage(event)" />
                                    <?php 
                                        if(!empty($gambar)) { 
                                            $imgPath = "../Images/" . htmlspecialchars($gambar, ENT_QUOTES); 
                                            $imgStyle = 'display:block;'; 
                                        } 
                                        else { 
                                            $imgPath = ''; 
                                            $imgStyle = 'display:none;'; 
                                        } 
                                    ?>
                                    <img id="imgPreview" src="<?php echo $imgPath; ?>" style="<?php echo $imgStyle; ?>" alt="Preview">
                                    <input type="hidden" name="existing_gambar" value="<?php echo htmlspecialchars($gambar ?? '', ENT_QUOTES); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Sumber</td>
                                <td>
                                    <input type="text" value= "<?php echo $sumber ?? null; ?>" name='sumber' class="adminaddnews" style="width:200px"/>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" value="<?php echo ($id == 0) ? 'Tambah Artikel' : 'Simpan Perubahan'; ?>" class="btn-primary"/></td>
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