<?php
    include "db.inc.php";
    connect_db($db);

    $search = isset($_GET['q']) ? trim($_GET['q']) : '';
    $topic_id = isset($_GET['topic_id']) ? (int) $_GET['topic_id'] : 0;
    $topics = [];
    $topicResult = mysqli_query($db, 
                    "SELECT DISTINCT a.idTopik, t.namaTopik
                     FROM articles a JOIN topics t ON a.idTopik = t.id
                    WHERE a.idJenis = '3' AND a.idTopik IS NOT NULL AND a.idTopik <> '' 
                    ORDER BY t.namaTopik ASC");

    if ($topicResult) {
        while ($topicRow = mysqli_fetch_assoc($topicResult)) {
            $topics[] = $topicRow;
        }
    }

    //exp and researches data from articles table. isi = link to pdf. The researchers = article created by
    $sqlstr = "SELECT a.*, t.namaTopik, u.full_name AS researcher_name, u.username 
                FROM articles a 
                    JOIN topics t ON a.idTopik = t.id 
                    JOIN users u ON a.created_by = u.username
                WHERE a.idJenis = '3' ";

    $conditions = [];
    $types = '';
    $values = [];

    if ($search !== '') {
        $conditions[] = "(a.judul LIKE ? OR a.isi LIKE ? OR a.created_by LIKE ? OR u.full_name LIKE ?)";
        $searchValue = '%' . $search . '%';
        $types .= 'ssss';
        $values[] = $searchValue;
        $values[] = $searchValue;
        $values[] = $searchValue;
        $values[] = $searchValue;
    }

    if ($topic_id > 0) {
        $conditions[] = "a.idTopik = ?";
        $types .= 'i';
        $values[] = $topic_id;
    }

    if ($conditions) {
        $sqlstr .= " AND " . implode(' AND ', $conditions);
    }
    $sqlstr .= " ORDER BY a.judul";

    $statement = mysqli_prepare($db, $sqlstr);
    if ($types !== '') {
        mysqli_stmt_bind_param($statement, $types, ...$values);
    }
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);

    function exp_escape($value) {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <script src="global-layout.js" defer></script>
        <global-header></global-header>

        <style>
            .exp-page{
                max-width:1000px;
                margin:0 auto;
            }
            .exp-filters{
                display:flex;
                flex-wrap:wrap;
                gap:10px;
                margin:0 auto 24px;
                padding:16px;
                background:var(--surface);
                border:1px solid var(--border);
                border-radius:12px;
                box-shadow:0 8px 20px var(--shadow);
            }
            .exp-filters input,.exp-filters select{
                flex:1 1 220px;
                min-width:0;
                padding:10px 12px;
                border:1px solid var(--border);
                border-radius:6px;
                font:inherit;
                color:var(--text);
                background:#fff
            }
            .exp-filters button{
                padding:10px 18px;
                border:0;
                border-radius:6px;
                background:var(--crimson);
                color:#fff;
                font:inherit;
                font-weight:700;
                cursor:pointer
            }
            .exp-filters button:hover{
                background:var(--crimson-dark)
            }
        </style>
    </head>
    <body>
        <!--bagian untuk isinya -->
		<main class="hero" role="main">
            <div class="hero-inner exp-page">
                <header class="exp-intro">
                    <h1 class="page-title">Collection of Experiments</h1>
                </header>

                <!--search experiments (Scientific literature)-->
                <form class="exp-filters" method="get" action="experiments.php">
                    <input type="text" id="exp-search" name="q" placeholder="Search experiments..."
                        value="<?= isset($_GET['q']) ? htmlspecialchars($_GET['q'], ENT_QUOTES, 'UTF-8') : '' ?>"/>

                    <select id="exp-topic" name="topic_id">
                        <option value="">Pilih topik</option>
                        <?php foreach ($topics as $availableTopic): ?>
                            <option value="<?php echo (int) $availableTopic['idTopik']; ?>" 
                                <?php echo $topic_id === (int) $availableTopic['idTopik'] ? 'selected' : ''; ?> >
                                <?php echo exp_escape($availableTopic['namaTopik']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <button type="submit">Search</button>
                </form>

                <section class="exp-list" aria-live="polite">
                    <?php 
                        if (!$result || mysqli_num_rows($result) === 0){
                            echo "<p class=\"formula-empty\">Experiments are unavailable</p>";
                        }
                        else{
                            while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <div class='detail-row'>
                                <div class='detail-news'>
                                    <h2>
                                        <?php
                                            $pdfFile = basename((string) $row['gambar']);
                                            $pdfPath = __DIR__ . DIRECTORY_SEPARATOR . 'CMS' . DIRECTORY_SEPARATOR
                                                . 'experiments' . DIRECTORY_SEPARATOR . $pdfFile;
                                            if ($pdfFile !== '' && strtolower(pathinfo($pdfFile, PATHINFO_EXTENSION)) === 'pdf' && is_file($pdfPath)):
                                            ?>
                                                <a href="<?php echo exp_escape('CMS/experiments/' . rawurlencode($pdfFile)); ?>" target="_blank" rel="noopener noreferrer">
                                                    <?php echo exp_escape($row['judul']); ?>
                                                </a>
                                            <?php else: ?>
                                            <?php echo exp_escape($row['judul']); ?>
                                        <?php endif; ?>
                                    </h2>
                                    <p>Topic: <?php echo exp_escape($row['namaTopik']); ?></p>
                                    <p>Date: <?php echo exp_escape(date('d M Y', strtotime($row['tanggal']))); ?></p>
                                    <p>Author: <?php echo exp_escape($row['researcher_name']); ?></p>
                                    <p><?php echo exp_escape($row['isi']); ?></p>
                                </div>
                            </div>
                    <?php
                            }
                        }
                    ?>
                </section>
            </div>
        </main>

        <footer id="footer" class="site-footer">
			<global-footer></global-footer>
		</footer>
    </body>
</html>
