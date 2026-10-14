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
        <title>Add/Edit Symbols</title>
        <script src="cms-layout.js" defer></script>

        <global-header></global-header>

        <!-- KaTeX CSS -->
        <link rel="stylesheet" href="../katex/katex.min.css">
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

            //show formula detail
            if($id != "0")
            {
                $result = mysqli_query($db, "SELECT id, formula_title, formula_value FROM formulas WHERE id = '$id' LIMIT 1");
                while($tampil = mysqli_fetch_array($result)){
                    $formula_id = $tampil["id"];
                    $formula_title = $tampil["formula_title"];
                    $formula_value = '$$ '. $tampil["formula_value"] . ' $$';
                }
            } 

            //submit to add or edit
            if($_SERVER['REQUEST_METHOD'] === 'POST')
            {
                $symbol_ids = $_POST['symbolID'] ?? [];
                $symbols = $_POST['symbol'] ?? [];
                $descriptions = $_POST['description'] ?? [];
                $meanings = $_POST['meaning'] ?? [];
                
                $is_save_all = isset($_POST['saveAll']);
                $symbol_indices = $is_save_all
                    ? array_keys($symbols)
                    : [(int) ($_POST['symbolIndex'] ?? -1)];

                $max_result = mysqli_query($db, "SELECT MAX(id) AS max_id FROM symbols");
                $max_row = $max_result ? mysqli_fetch_assoc($max_result) : null;
                $new_id = (int) ($max_row['max_id'] ?? 0);
                $saved_count = 0;
                $error_message = '';

                mysqli_begin_transaction($db);
                foreach($symbol_indices as $symbol_index)
                {
                    $symbol_id = (int) ($symbol_ids[$symbol_index] ?? 0);
                    $symbol = trim($symbols[$symbol_index] ?? '');
                    $description = trim($descriptions[$symbol_index] ?? '');
                    $meaning = trim($meanings[$symbol_index] ?? '');

                    if($symbol === '' && $description === '' && $meaning === '')
                    {
                        continue;
                    }
                    if($symbol === '' || $description === '' || $meaning === '')
                    {
                        $error_message = 'Please complete every field for each symbol.';
                        break;
                    }

                    $symbol = mysqli_real_escape_string($db, $symbol);
                    $description = mysqli_real_escape_string($db, $description);
                    $meaning = mysqli_real_escape_string($db, $meaning);

                    if($symbol_id > 0)
                    {
                        $sqlstr = "UPDATE symbols
                                    SET symbol = '$symbol', description = '$description', meaning = '$meaning'
                                    WHERE id = '$symbol_id' AND formula_id = '$formula_id'";
                    }
                    else
                    {
                        $new_id++;
                        $sqlstr = "INSERT INTO symbols (id, formula_id, symbol, description, meaning)
                                    VALUES ('$new_id', '$formula_id', '$symbol', '$description', '$meaning')";
                    }

                    if(!mysqli_query($db, $sqlstr))
                    {
                        $error_message = mysqli_error($db);
                        break;
                    }
                    $saved_count++;
                }

                if($error_message !== '')
                {
                    mysqli_rollback($db);
                    echo "Ada Masalah Pengeditan<br> " . htmlspecialchars($error_message, ENT_QUOTES, 'UTF-8');
                }
                else
                {
                    mysqli_commit($db);
                    echo "<b>Terima kasih! " . ($saved_count > 0 ? "Symbols saved!" : "No symbols to save.") . "<br>silahkan tunggu.!";
                    echo "<meta http-equiv=Refresh content=4;url=addEditSymbols.php?linkID=$formula_id>";
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
                                echo "Add Symbols - $formula_title"; 
                            }
                            else
                            {
                                echo "Edit Symbols - $formula_title";
                            }
                        ?>
                    </h2>
                </center>

                <div class="hero-cta">
                    <div class="adminaddnews admin-form">
                        <table>
                            <tr>
                                <td>Formula Value</td>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo $formula_value ?? null; ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <!-- table contains of symbols-->
                <div class="hero-cta">
                    <form id="symbolsForm" class="adminaddnews admin-form" method="post" action="addEditSymbols.php?linkID=<?php echo $id; ?>" align="left" enctype="multipart/form-data">
                        <table id="contentMat" border="1">
                            <tr align="center">
                                <td width="5%">Symbol</td>
                                <td width="25%">Description</td>
                                <td width="60%">Meaning</td>
                                <td width="10%">Actions</td>
                            </tr>
                            <?php
                                //number of rows = number of symbols for the formula
                                $result = mysqli_query($db, "SELECT id, symbol, description, meaning FROM symbols WHERE formula_id = '$formula_id'");
                                $row_index = 0;
                                while($tampil = mysqli_fetch_array($result))
                                {
                                    $symbol_id = $tampil["id"];
                                    $symbol = $tampil["symbol"];
                                    $description = $tampil["description"];
                                    $meaning = $tampil["meaning"];
                            ?>
                                <tr>
                                    <td>
                                        <input type="hidden" name="symbolID[]" maxlength="10" value="<?php echo $symbol_id; ?>">
                                        <input type="text" name="symbol[]" maxlength="10" placeholder="Enter symbol" value="<?php echo $symbol; ?>">
                                    </td>
                                    <td>
                                        <input type="text" name="description[]" maxlength="100" placeholder="Enter description" value="<?php echo $description; ?>">
                                    </td>
                                    <td>
                                        <textarea name="meaning[]" rows="3" cols="100" placeholder="Enter meaning" ><?php echo ltrim($meaning) ?? null; ?></textarea>
                                    </td>
                                    <td>
                                        <div class="intable-actions">
                                            <button type="submit" name="symbolIndex" value="<?php echo $row_index; ?>" class="btn-primary">Simpan</button>
                                            
                                            <a class="btn-primary" 
                                                href="delete.php?table=symbols&from=addEditSymbols&formulaID=<?php echo $formula_id; ?>&linkID=<?php echo $symbol_id; ?>" 
                                                onclick="return confirm('Are you sure you want to delete this symbol?');">Hapus</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                                    $row_index++;
                                }
                            ?>
                        </table>
                    </form>

                    <div class="hero-buttons">
                        <button class="btn-primary" id="save" type="submit" name="saveAll" value="1" form="symbolsForm">Save all Symbols</button>
                        <a class="btn-primary" id="add" href="javascript:addRow()">Add Symbol</a>
                        <a class="btn-primary" id="return" href="addEditFormula.php?linkID=<?php echo $id; ?>">Return to Formula</a>
                    </div>
                </div>
            </div>
        </div>

        <footer id="footer" class="site-footer">
			<global-footer></global-footer>
		</footer>

        <!-- KaTeX -->
        <script src="../katex/katex.min.js"></script>
        <script src="../katex/contrib/auto-render.min.js"></script>

        <script>
            <!-- Initialize KaTeX -->
            document.addEventListener("DOMContentLoaded", function () {
                renderMathInElement(document.body, {
                    delimiters: [
                        {left: "$$", right: "$$", display: true},
                        {left: "\\(", right: "\\)", display: false},
                        {left: "\\[", right: "\\]", display: true}
                    ]
                });
            });

            // Add 1 row after click "Add Symbol"
            function addRow() {
                var table = document.getElementById("contentMat");
                var newRow = table.insertRow(-1);

                // Insert new cells into the new row
                var cellSymbol = newRow.insertCell(0);
                var cellDescription = newRow.insertCell(1);
                var cellMeaning = newRow.insertCell(2);
                var cellActions = newRow.insertCell(3);

                // Add input fields to the new cells
                var rowIndex = table.rows.length - 2;
                cellSymbol.innerHTML = '<input type="hidden" name="symbolID[]" value="0">' +
                                       '<input type="text" name="symbol[]" maxlength="10" placeholder="Enter symbol">';
                cellDescription.innerHTML = '<input type="text" name="description[]" maxlength="100" placeholder="Enter description">';
                cellMeaning.innerHTML = '<textarea name="meaning[]" rows="3" cols="100" placeholder="Enter meaning"></textarea>';
                cellActions.innerHTML = '<div class="intable-actions"> ' +
                                            '<button type="submit" name="symbolIndex" value="' + rowIndex + '" class="btn-primary">Simpan</button>' + 
                                        '</div>';
            }
        </script>
    </body>
</html>