<?php
	require_once __DIR__ . '/../logs/session.php';
	require_once __DIR__ . '/../db.inc.php';
	connect_db($db);

	$username = isset($_SESSION['login_user']) ? $_SESSION['login_user'] : '';
	$username = mysqli_real_escape_string($db, $username);

	$sqlstr = "SELECT u.id, u.full_name, u.email, u.username, u.password, u.kode_posisi,
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

	$row = mysqli_fetch_assoc($hasil);
	$id = $row['id'];
	$full_name = $row['full_name'];
	$email = $row['email'];
	$username = $row['username'];
	$password = $row['password'];
	$kode_posisi = $row['kode_posisi'];
	$reputation = $row['reputation'];
	$domicile = $row['domicile'];
	$interests = $row['interests'];
	$num_posts = $row['num_posts'];
	$bio = $row['bio'];
	$profile_photo = $row['profile_photo'];
	$nama_posisi = $row['nama_posisi'];
?>
<!DOCTYPE html>
<html>
	<head>
        <title>Edit Profile</title>
        <script src="cms-layout.js" defer></script>
        <global-header></global-header>
        <link rel="stylesheet" href="buttons.css">

        <style>
            .admin-form { 
				width:30vw; 
				max-width:100%; 
				margin:30px auto; 
				background:#fff; 
				padding:18px; 
				border-radius:8px; 
				box-shadow:0 2px 8px rgba(0,0,0,0.06);
			}

            .admin-form table { width:100%; border-collapse:collapse; }
            .admin-form table td:first-child { width:120px; padding-right:20px; }
            .admin-form td { padding:8px 6px; vertical-align:top; }
            .admin-form input[type="text"], .admin-form input[type="password"], .admin-form select, .admin-form textarea { 
				width:100%; 
				padding:8px; 
				border:1px solid #d1c7d1; 
				border-radius:4px; 
			}

			.admin-form input[type="file"] { padding:4px; }
			.admin-form .form-actions { text-align:left; }
			.hero-inner h2 { margin-top:0; }
		</style>
    </head>
	<body>
		<?php
			//submit to add or edit
			if($_SERVER['REQUEST_METHOD'] === 'POST'){
				$full_name = isset($_POST['full_name']) ? $_POST['full_name'] : '';
				$email = isset($_POST['email']) ? $_POST['email'] : '';
				$username = isset($_POST['username']) ? $_POST['username'] : '';
				$password = isset($_POST['password']) ? $_POST['password'] : '';
				$bio = isset($_POST['bio']) ? $_POST['bio'] : '';
				$domicile = isset($_POST['domicile']) ? $_POST['domicile'] : '';
				$kode_posisi = isset($_POST['role']) ? $_POST['role'] : '';
				$interests = isset($_POST['interests']) ? $_POST['interests'] : '';

				// Handle profile photo upload
				$gambar = '';
                $uploadedFilePath = '';
                $hasNewUpload = false;

				if(isset($_FILES['profile_photo']) && is_uploaded_file($_FILES['profile_photo']['tmp_name']) && $_FILES['profile_photo']['error'] === UPLOAD_ERR_OK){
					$uploadDir = realpath(__DIR__ . '/../Images/Profile');
					if($uploadDir === false){
						$uploadDir = __DIR__ . '/../Images/Profile';
					}

					$origName = basename($_FILES['profile_photo']['name']);
                    $ext = pathinfo($origName, PATHINFO_EXTENSION);
                    $safeName = preg_replace('/[^A-Za-z0-9._-]/', '_', pathinfo($origName, PATHINFO_FILENAME));
                    $newName = $safeName . '_' . time() . ($ext ? '.' . $ext : '');
                    $targetPath = $uploadDir . DIRECTORY_SEPARATOR . $newName;

					if(move_uploaded_file($_FILES['profile_photo']['tmp_name'], $targetPath)){
						$gambar = $newName;
						$uploadedFilePath = 'Images/Profile/' . $gambar;
						$hasNewUpload = true;
					} else {
						echo "Error uploading file.";
					}
				}

				// Update user profile in the database
				$sqlstr = "UPDATE users 
							SET full_name = '$full_name', email = '$email', 
								username = '$username', password = '$password', 
								bio = '$bio', domicile = '$domicile', 
								kode_posisi = '$kode_posisi', interests = '$interests',
								profile_photo = '$gambar'
							WHERE id = $id ";

				// execute the query
                $dml = mysqli_query($db, $sqlstr);

				if(!$dml){
                    echo "Ada Masalah Pengeditan<br> " . mysqli_error($db);
                } else{
                    echo "<b>Terima kasih! Profil sudah di-update<br>silahkan tunggu.!";
                    echo "<meta http-equiv=Refresh content=4;url=userCMS.php>";
                }
			}
		?>
		<!-- Your page content goes here -->
        <div class="hero" role="banner">
			<!-- Form content would go here -->
			<div class="hero-inner">
				<center>
                    <h2>Edit Profile</h2>
                </center>
				<div class="hero-cta">
					<form class="adminaddnews admin-form" method="post" action="#" align="left" enctype="multipart/form-data">
                        <table border = "0" style="font-size: 15px;">
							<tr>
                                <td>Full Name</td>
                                <td><input type="text" value= "<?php echo $full_name ?? null; ?>" name='full_name' class="adminaddnews" /></td>
                            </tr>
							<tr>
								<td>Email</td>
								<td><input type="text" value= "<?php echo $email ?? null; ?>" name='email' class="adminaddnews" /></td>
							</tr>
							<tr>
								<td>Username</td>
								<td><input type="text" value= "<?php echo $username ?? null; ?>" name='username' class="adminaddnews" /></td>
							</tr>
							<tr>
								<td>Password</td>
								<td><input type="password" value= "<?php echo $password ?? null; ?>" name='password' class="adminaddnews" /></td>
							</tr>
							<tr>
								<td>Bio</td>
								<td>
									<textarea name='bio' class="adminaddnews" rows="4" cols="50"><?php echo $bio ?? null; ?></textarea>
								</td>
							</tr>
							<tr>
								<td>Location</td>
								<td><input type="text" value= "<?php echo $domicile ?? null; ?>" name='domicile' class="adminaddnews" /></td>
							</tr>
							<tr>
								<td>Role</td>
								<td>
									<select name="role" class="adminaddnews">
                                        <option value="">Select Role</option>
                                        <?php
                                            $rolesResult = mysqli_query($db, "SELECT id, kode_posisi, nama FROM user_positions");
                                            while($role = mysqli_fetch_array($rolesResult)){
                                                echo "<option value='" . $role['id'] . "' " . ($role['id'] == $kode_posisi ? 'selected' : '') . ">" . $role['nama'] . "</option>";
                                            }
                                        ?>
                                    </select>
								</td>
							</tr>
							<tr>
								<td>Interests</td>
								<td><input type="text" value= "<?php echo $interests ?? null; ?>" name='interests' class="adminaddnews" /></td>
							</tr>
							<tr>
								<td>Profile Photo</td>
								<td>
									<input type="file" name="profile_photo" accept="image/*" />
									<?php if (!empty($profile_photo)) : ?>
										<br><img src="<?php echo $profile_photo; ?>" alt="Profile Photo" style="max-width: 100px; max-height: 100px;">
									<?php endif; ?>
								</td>
							</tr>
							<tr>
                                <td></td>
                                <td><input type="submit" value="Simpan Perubahan" class="btn-primary"/></td>
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